<?php
require_once 'models/Reaccion.php';

class ReaccionController {

    /**
     * Ruta: index.php?action=reaccionar  (POST)
     * Campos: id_publicacion, tipo ('like' o 'dislike')
     * Opcional: formato=json para recibir la respuesta en JSON (útil para el front end).
     */
    public static function reaccionar() {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            header('Location: index.php');
            exit();
        }

        $esJson = (($_POST['formato'] ?? '') === 'json');

        if (!isset($_SESSION['usuario_id'])) {
            if ($esJson) {
                self::responderJson(['ok' => false, 'error' => 'Debes iniciar sesión'], 401);
            }
            header('Location: index.php');
            exit();
        }

        $idPublicacion = filter_var($_POST['id_publicacion'] ?? null, FILTER_VALIDATE_INT);
        $tipo = $_POST['tipo'] ?? '';

        if (!$idPublicacion || !in_array($tipo, Reaccion::tiposValidos(), true)) {
            if ($esJson) {
                self::responderJson(['ok' => false, 'error' => 'Datos inválidos'], 400);
            }
            header('Location: index.php');
            exit();
        }

        $resultado = Reaccion::alternar($_SESSION['usuario_id'], $idPublicacion, $tipo);

        if ($esJson) {
            if ($resultado === false) {
                self::responderJson(['ok' => false, 'error' => 'No se pudo guardar la reacción'], 500);
            }
            $conteo = Reaccion::contar($idPublicacion);
            self::responderJson([
                'ok' => true,
                'mi_reaccion' => $resultado, // 'like', 'dislike' o null
                'likes' => $conteo['likes'],
                'dislikes' => $conteo['dislikes']
            ]);
        }

        self::volver();
    }

    // Vuelve a la página donde estaba la persona (solo si es de este mismo sitio); si no, al inicio.
    private static function volver() {
        $destino = 'index.php';
        $referer = $_SERVER['HTTP_REFERER'] ?? '';

        if ($referer !== '') {
            $hostActual = parse_url('//' . ($_SERVER['HTTP_HOST'] ?? ''), PHP_URL_HOST);
            $hostReferer = parse_url($referer, PHP_URL_HOST);
            if ($hostReferer && $hostReferer === $hostActual) {
                $destino = $referer;
            }
        }

        header('Location: ' . $destino);
        exit();
    }

    private static function responderJson($datos, $codigo = 200) {
        http_response_code($codigo);
        header('Content-Type: application/json; charset=utf-8');
        echo json_encode($datos);
        exit();
    }
}
?>