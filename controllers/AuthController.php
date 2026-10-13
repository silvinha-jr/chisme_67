<?php
require_once 'models/Usuario.php';

class AuthController {

    public static function registrar() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $nombre = trim($_POST['nombre_completo'] ?? '');
            $email = trim($_POST['email'] ?? '');
            $contrasena = $_POST['contrasena'] ?? '';

            if (!empty($nombre) && !empty($email) && !empty($contrasena)) {
                $passwordHash = password_hash($contrasena, PASSWORD_BCRYPT);
                $idUsuario = Usuario::crear($nombre, $email, $passwordHash);

                if ($idUsuario) {
                    $_SESSION['usuario_id'] = $idUsuario;
                    $_SESSION['usuario_nombre'] = $nombre;
                    $_SESSION['usuario_email'] = $email;
                }
            }
            header('Location: index.php');
            exit();
        }
    }

    public static function login() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $email = trim($_POST['email'] ?? '');
            $contrasena = $_POST['contrasena'] ?? '';

            $usuario = Usuario::obtenerPorEmail($email);

            if ($usuario && password_verify($contrasena, $usuario['contrasena'])) {
                $_SESSION['usuario_id'] = $usuario['id_usuario'];
                $_SESSION['usuario_nombre'] = $usuario['nombre_completo'];
                $_SESSION['usuario_email'] = $usuario['email'];

                if (!empty($usuario['apodo'])) {
                    $_SESSION['usuario_apodo'] = $usuario['apodo'];
                }
                $_SESSION['usuario_tema'] = $usuario['tema'] ?? 'claro';
            }
            header('Location: index.php');
            exit();
        }
    }

    public static function logout() {
        session_destroy();
        header('Location: index.php');
        exit();
    }
}
?>