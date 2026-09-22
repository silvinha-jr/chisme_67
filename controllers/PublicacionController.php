<?php
require_once 'models/Publicacion.php';

class PublicacionController {

    public static function crear() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (!isset($_SESSION['usuario_id'])) {
                header('Location: index.php');
                exit();
            }

            $contenido = trim($_POST['contenido'] ?? '');
            $idUsuario = $_SESSION['usuario_id'];

            if (!empty($contenido)) {
                Publicacion::crear($idUsuario, $contenido);
            }

            header('Location: index.php');
            exit();
        }
    }
}
?>