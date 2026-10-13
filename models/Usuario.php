<?php
require_once 'config/db.php';

class Usuario {

    public static function crear($nombre, $email, $contrasena) {
        try {
            $db = Database::conectar();
            $stmt = $db->prepare("INSERT INTO usuarios (nombre_completo, email, contrasena) VALUES (:nombre, :email, :password)");
            if ($stmt->execute([':nombre' => $nombre, ':email' => $email, ':password' => $contrasena])) {
                return $db->lastInsertId();
            }
            return false;
        } catch (PDOException $e) {
            return false;
        }
    }

    public static function obtenerPorEmail($email) {
        try {
            $db = Database::conectar();
            $stmt = $db->prepare("SELECT * FROM usuarios WHERE email = :email");
            $stmt->execute([':email' => $email]);
            return $stmt->fetch();
        } catch (PDOException $e) {
            return false;
        }
    }

    public static function actualizarPerfil($idUsuario, $apodo, $tema) {
        if (!in_array($tema, ['claro', 'oscuro'], true)) {
            $tema = 'claro';
        }

        $apodo = ($apodo === null) ? '' : mb_substr(trim($apodo), 0, 50);
        if ($apodo === '') {
            $apodo = null;
        }

        try {
            $db = Database::conectar();
            $stmt = $db->prepare("UPDATE usuarios SET apodo = :apodo, tema = :tema WHERE id_usuario = :id_usuario");
            return $stmt->execute([
                ':apodo' => $apodo,
                ':tema' => $tema,
                ':id_usuario' => $idUsuario
            ]);
        } catch (PDOException $e) {
            return false;
        }
    }
}
?>