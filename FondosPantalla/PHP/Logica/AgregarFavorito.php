<?php

require_once __DIR__ .'/../Clases/Favoritos.php';
require_once __DIR__ .'/../BD/database.php';

$conexion = new Database();
$favorito = new Favoritos($conexion);



if (isset($_POST['imagen']) && isset($_POST['usuario'])) {
        // Crea una instancia de la clase AgregarFavorito
        $nombreImagen = $_POST['imagen'];
        $nombreUsuario = $_POST['usuario'];
        
        $nombreget = str_replace(' ', '%20', $nombreImagen);
        // Llama a la función agregarFavorito para actualizar el estado del favorito
        $resultado = $favorito->controladorfavoritos($nombreImagen, $nombreUsuario);

}
else{
    $resultado = "error";
}


?>
