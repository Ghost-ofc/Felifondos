<?php

require_once __DIR__ .'/../Clases/Fondo.php';
require_once __DIR__ .'/../Clases/Favoritos.php';


echo '<link rel="stylesheet" href="../../estilo.css">';
echo '<script src="../../js/favoritoagg.js"></script>';

$conexion = new Database();
$fondo = new Fondo($conexion);
$favoritos = new Favoritos($conexion);


$nombreUsuario = isset($_COOKIE['usuario']) ? $_COOKIE['usuario'] : null;

if (isset($_GET['imagen'])) {
    $nombreImagen = $_GET['imagen'];

    $datos = $fondo->mostrarFondo($nombreImagen);
    $idFondo = $datos['id_fondo'];
    
    $imagen = $datos['imagen'];
    $nombre = $datos['nombre'];
    $peso = $datos['peso'];
    $categoria = $datos['categoria'];
    $resolucion = $datos['resolucion'];

    // Si está logueado, mostrar el botón de favorito
    $favorito = isset($datos['favorito']) && $datos['favorito'] == 1;
    echo '<id="contenedorImagen">';
    echo '<img src="data:image/jpeg;base64,' . $imagen . '" alt="" id="imagenKirby" class="imagen"></div>';

    echo '<div class="button-container">';
    echo '<a href="../../index.php"><i class="bi bi-arrow-left-circle-fill"></i></a>';

    if ($nombreUsuario !== null) {
        $nombreUsuario = base64_decode($nombreUsuario);
        $fav = $favoritos->verificarFavorito($nombreImagen, $nombreUsuario);
        $claseFavorito = $fav ? 'favorito-activo' : '';
        
        echo '<i class="bi bi-bookmark-fill icono-favorito ' . $claseFavorito . '" onclick="agregarFavorito(\'' . $nombre . '\', \'' . $nombreUsuario . '\')"></i>';
    } else {
        echo '<i class="bi bi-bookmark-fill icono-favorito" onclick="redirigir()"></i>';
    }

    echo '<i class="bi bi-share-fill" href="#exampleModal" data-bs-toggle="modal"></i>';
    echo '</div>';

    echo '<div class="contenedor">';
    echo '<div id="nombreFondo">' . $nombre . '</div>';
    echo '<div id="detalles">';
    echo 'Peso del fondo: <span id="tamanoArchivo">' . $peso . ' Kb</span><br>';
    echo 'Categoría: <span id="categoria">' . $categoria . '</span> <br>';
    echo 'Resolución: <span id="resolucion">' . $resolucion . '</span>';
    echo '</div>';
    echo '</div>';
    echo '<script src="../../js/ajustarImagen.js"></script>';
} else {

    echo "Imagen no especificada";
}

?>

