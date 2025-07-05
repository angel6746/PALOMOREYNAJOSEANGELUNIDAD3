<?php
$conexion = new mysqli("localhost", "root", "", "saberhaceru3");
if ($conexion->connect_error) {
    die("Conexión fallida: " . $conexion->connect_error);
}
?>
