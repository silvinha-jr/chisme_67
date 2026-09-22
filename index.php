<?php
session_start();
require_once 'controllers/AuthController.php';
require_once 'controllers/PublicacionController.php';

$action = $_GET['action'] ?? '';

if ($action === 'register') {
    AuthController::registrar();
} elseif ($action === 'login') {
    AuthController::login();
} elseif ($action === 'logout') {
    AuthController::logout();
} elseif ($action === 'crear_publicacion') {
    PublicacionController::crear();
} else {
    require_once 'views/home.php';
}
?>