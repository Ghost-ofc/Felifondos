<?php
require_once __DIR__ .'/../BD/database.php';
require_once __DIR__ .'/../Clases/Usuario.php';



$conexion = new Database();
$usuario = new Usuario($conexion);

$correo = $_POST['correo'];
$contraseña = $_POST['contrasena'];

if (empty($correo) || empty($contraseña)) {
    echo "Por favor, rellene todos los campos";
    exit();
}


$login = $usuario->login($correo, $contraseña);

if ($login == true) {

    $usuariobase64 = base64_encode($login['nom_usuario']);
    setcookie('usuario', $usuariobase64 , time() + 3600, '/'); // expira en 1 hora

    echo 
        "<script>
            window.location = '../../index.php';
        </script>";
        exit();
} else {
    
        setcookie('login', 'fallido' , time() + 3600, '/'); // expira en 1 hora
        echo "<script>
            window.location = '../../iniciar_sesion.php';
            </script>";
        exit();
}

?>