<?php
session_start();
require_once 'controllers/AuthController.php';
require_once 'controllers/PublicacionController.php';
require_once 'controllers/ReaccionController.php';

$action = $_GET['action'] ?? 'inicio';

switch ($action) {
    case 'register':
        AuthController::registrar();
        break;

    case 'login':
        AuthController::login();
        break;

    case 'logout':
        AuthController::logout();
        break;

    case 'crear_publicacion':
        PublicacionController::crear();
        break;

    case 'reaccionar':
        ReaccionController::reaccionar();
        break;

    case 'prueba_reacciones': // Página temporal para probar el back end. Borrar antes de entregar.
        require_once 'views/prueba_reacciones.php';
        break;

    case 'sobre_nosotros':
        require_once 'views/sobre_nosotros.php';
        break;

    case 'perfil':
        require_once 'views/perfil.php';
        break;

    case 'configuracion':
        require_once 'views/configuracion.php';
        break;

    case 'notificaciones':
        require_once 'views/notificaciones.php';
        break;

    case 'inicio':
    default:
        require_once 'views/home.php';
        break;

case 'guardar_configuracion':
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (isset($_POST['apodo']) && !empty($_POST['apodo'])) {
                $_SESSION['usuario_apodo'] = trim($_POST['apodo']);
            }
            if (isset($_POST['avatar'])) {
                $_SESSION['usuario_avatar'] = $_POST['avatar'];
            }
            if (isset($_POST['tema'])) {
                $_SESSION['usuario_tema'] = $_POST['tema'];
            }
                Usuario::actualizarPerfil(
                $_SESSION['usuario_id'] ?? 0,
                $_SESSION['usuario_apodo'] ?? null,
                $_SESSION['usuario_tema'] ?? 'claro'
            );
            header('Location: index.php?action=perfil');
            exit;
        }
        break;
}
?>