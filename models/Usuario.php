<?php
require_once 'config/db.php';

class Usuario {

    public static function crear($nombre, $email, $contrasena) {
        try {
            $db = Database::conectar();
            $stmt = $db->prepare("INSERT INTO usuarios (nombre_completo, email, contrasena) VALUES (:nombre, :email, :password)");
            if ($stmt->execute([':nombre' => $nombre, ':email' => $email, ':password' => $contrasena])) {
                return $db->lastInsertId(); // Retorna el ID del nuevo usuario
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
}
?>