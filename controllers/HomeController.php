<?php
require_once __DIR__ . '/../models/Publicacion.php';

class HomeController {
    public function index() {
        $publicacionModel = new Publicacion();
        $publicaciones = $publicacionModel->obtenerTodas();

        require_once __DIR__ . '/../views/home.php';
    }
}
?>