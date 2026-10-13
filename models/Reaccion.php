<?php
require_once 'config/db.php';

class Reaccion {

    const LIKE = 'like';
    const DISLIKE = 'dislike';

    public static function tiposValidos() {
        return [self::LIKE, self::DISLIKE];
    }

    public static function obtenerDeUsuario($idUsuario, $idPublicacion) {
        try {
            $db = Database::conectar();
            $stmt = $db->prepare("SELECT tipo_reaccion FROM reacciones WHERE id_usuario = :id_usuario AND id_publicacion = :id_publicacion");
            $stmt->execute([
                ':id_usuario' => $idUsuario,
                ':id_publicacion' => $idPublicacion
            ]);
            $fila = $stmt->fetch(PDO::FETCH_ASSOC);
            return $fila ? $fila['tipo_reaccion'] : null;
        } catch (PDOException $e) {
            return null;
        }
    }

    public static function alternar($idUsuario, $idPublicacion, $tipo) {
        if (!in_array($tipo, self::tiposValidos(), true)) {
            return false;
        }

        try {
            $db = Database::conectar();
            $actual = self::obtenerDeUsuario($idUsuario, $idPublicacion);

            if ($actual === $tipo) {
                $stmt = $db->prepare("DELETE FROM reacciones WHERE id_usuario = :id_usuario AND id_publicacion = :id_publicacion");
                $stmt->execute([
                    ':id_usuario' => $idUsuario,
                    ':id_publicacion' => $idPublicacion
                ]);
                return null;
            }


            $stmt = $db->prepare(
                "INSERT INTO reacciones (id_publicacion, id_usuario, tipo_reaccion)
                 VALUES (:id_publicacion, :id_usuario, :tipo)
                 ON DUPLICATE KEY UPDATE tipo_reaccion = VALUES(tipo_reaccion), fecha = NOW()"
            );
            $stmt->execute([
                ':id_publicacion' => $idPublicacion,
                ':id_usuario' => $idUsuario,
                ':tipo' => $tipo
            ]);
            return $tipo;
        } catch (PDOException $e) {
            return false;
        }
    }

    public static function contar($idPublicacion) {
        try {
            $db = Database::conectar();
            $stmt = $db->prepare(
                "SELECT
                    COUNT(CASE WHEN tipo_reaccion = 'like' THEN 1 END) AS likes,
                    COUNT(CASE WHEN tipo_reaccion = 'dislike' THEN 1 END) AS dislikes
                 FROM reacciones
                 WHERE id_publicacion = :id_publicacion"
            );
            $stmt->execute([':id_publicacion' => $idPublicacion]);
            $fila = $stmt->fetch(PDO::FETCH_ASSOC);
            return [
                'likes' => (int)$fila['likes'],
                'dislikes' => (int)$fila['dislikes']
            ];
        } catch (PDOException $e) {
            return ['likes' => 0, 'dislikes' => 0];
        }
    }
}
?>