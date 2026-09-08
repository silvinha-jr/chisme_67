<?php
require_once __DIR__ . '/../config/conexion.php';

class Publicacion {
    private $db;

    public function __construct() {
        $con = new Conexion();
        $this->db = $con->conectar();
    }

    public function obtenerTodas() {
        $sql = "SELECT p.*, u.nombre FROM publicacion p 
                JOIN usuario u ON p.UsuarioID = u.UsuarioID 
                ORDER BY p.fecha_creacion DESC";
        return $this->db->query($sql);
    }
}
?>