<?php

require_once __DIR__ .'/../Clases/Usuario.php';
require_once __DIR__ .'/../BD/database.php';

$conexion = new Database();
$cerrarSesion = new Usuario($conexion);
$cerrarSesion->cerrarSesion();

?>


