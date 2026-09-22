<?php
require_once 'config/db.php';

class Publicacion {

    public static function crear($idUsuario, $contenido) {
        try {
            $db = Database::conectar();
            $stmt = $db->prepare("INSERT INTO publicaciones (id_usuario, contenido, fecha_publicacion) VALUES (:id_usuario, :contenido, NOW())");
            return $stmt->execute([
                ':id_usuario' => $idUsuario,
                ':contenido' => $contenido
            ]);
        } catch (PDOException $e) {
            return false;
        }
    }

    public static function obtenerTodas() {
        try {
            $db = Database::conectar();
            $sql = "SELECT p.*, u.nombre_completo 
                    FROM publicaciones p 
                    JOIN usuarios u ON p.id_usuario = u.id_usuario 
                    ORDER BY p.fecha_publicacion DESC";
            $stmt = $db->query($sql);
            return $stmt->fetchAll();
        } catch (PDOException $e) {
            return [];
        }
    }
}
?>