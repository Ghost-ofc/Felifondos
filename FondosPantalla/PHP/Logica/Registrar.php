<?php

require_once __DIR__ .'/../BD/database.php';
require_once __DIR__ .'/../Clases/Usuario.php';

$conexion = new Database();
$usuarioregis = new Usuario($conexion);

$nom_usuario = $_POST['nom_usuario'];
$correo = $_POST['correo'];
$contraseña = $_POST['contrasena'];

if (empty($nom_usuario) || empty($correo) || empty($contraseña)) {
    echo "Por favor, rellene todos los campos";
    exit();
}


$usuarioregis->registrar($nom_usuario, $correo, $contraseña);

if ($usuarioregis == true) {
    echo 
        "<script>
            window.location = '../../iniciar_sesion.php';
        </script>";
        exit();
} else {
    echo "Error al registrar el usuario";
}

?>