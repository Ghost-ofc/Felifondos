<?php

require_once __DIR__ .'/../Clases/Descargas.php';
require_once __DIR__ .'/../BD/database.php';

$conexion = new Database();
$descarga = new Descargas($conexion);

if (isset($_POST['usuario']) && isset($_POST['categoria']) && isset($_POST['nombre'])) {
    // Crea una instancia de la clase AlgoritmoDescargas

    
    $nombreusuario = $_POST['usuario'];
    $categoria = $_POST['categoria'];

    if ($nombreusuario != null) {
        $resultado = $descarga->AlgoritmoDescargar($nombreusuario, $categoria);
        echo '<script>
        window.location = "../../visualizarFondo.php?imagen=' . $_POST['nombre'] . '";
        </script>';
    }else{
        echo '<script>
        window.location = "../../visualizarFondo.php?imagen=' . $_POST['nombre'] . '";
        </script>';
        exit();
    }
    
} else {
    $resultado = "error";
    
}

?>