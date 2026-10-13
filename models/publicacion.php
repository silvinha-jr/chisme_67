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

    public static function obtenerTodas($orden = 'populares', $idUsuarioActual = null) {
        try {
            $db = Database::conectar();

            $orderBy = ($orden === 'recientes')
                ? "p.fecha_publicacion DESC"
                : "likes DESC, p.fecha_publicacion DESC";

            $sql = "SELECT p.*, u.nombre_completo, u.apodo,
                           (SELECT COUNT(*) FROM reacciones r
                             WHERE r.id_publicacion = p.id_publicacion
                               AND r.tipo_reaccion = 'like') AS likes,
                           (SELECT COUNT(*) FROM reacciones r
                             WHERE r.id_publicacion = p.id_publicacion
                               AND r.tipo_reaccion = 'dislike') AS dislikes,
                           (SELECT r.tipo_reaccion FROM reacciones r
                             WHERE r.id_publicacion = p.id_publicacion
                               AND r.id_usuario = :id_usuario_actual) AS mi_reaccion
                    FROM publicaciones p
                    JOIN usuarios u ON p.id_usuario = u.id_usuario
                    ORDER BY $orderBy";

            $stmt = $db->prepare($sql);
            $stmt->execute([':id_usuario_actual' => $idUsuarioActual]);
            $publicaciones = $stmt->fetchAll(PDO::FETCH_ASSOC);

            foreach ($publicaciones as &$pub) {
                $pub['likes'] = (int)$pub['likes'];
                $pub['dislikes'] = (int)$pub['dislikes'];
            }
            unset($pub);

            return $publicaciones;
        } catch (PDOException $e) {
            return [];
        }
    }
}
?>