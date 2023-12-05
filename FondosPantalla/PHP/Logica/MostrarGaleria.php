<?php
require_once __DIR__ .'/../Clases/Descargas.php';
require_once __DIR__ .'/../Clases/Fondo.php';
require_once __DIR__ .'/../BD/database.php';
require_once __DIR__ .'/../Clases/Favoritos.php';

echo '<script src="../../js/favoritoagg.js"></script>';
echo '<link rel="stylesheet" href="style_inicio.css">';

$conexion = new Database();
$fondo = new Fondo($conexion);
$descargas = new Descargas($conexion);
$favoritos = new Favoritos($conexion);

$nomuser = isset($_COOKIE['usuario']) ? $_COOKIE['usuario'] : null;

$datos = $fondo->mostrargaleria();

if ($nomuser !== null) {
    $nomuser = base64_decode($nomuser);


    // Obtener las categorías más descargadas por el usuario
    $categoriasMasDescargadas = $descargas->obtenerCategoriasMasDescargadas($nomuser, ceil(count($datos) * 0.6));

    if (!empty($categoriasMasDescargadas)) {
        // Si hay categorías más descargadas, obtener las imágenes de la categoría más descargada
        $categoriaMasDescargada = $categoriasMasDescargadas[0]['categoria'];
        $imagenesCategoriaMasDescargada = $fondo->obtenerImagenesPorCategoria($categoriaMasDescargada);

        // Separar el 80% de imágenes de la categoría más descargada
        $cantidadImagenesCategoriaMasDescargada = ceil(count($imagenesCategoriaMasDescargada) * 0.6);
        $parte1 = array_slice($imagenesCategoriaMasDescargada, 0, $cantidadImagenesCategoriaMasDescargada);

        // Obtener el resto de las imágenes
        $parte2 = array_diff_key($datos, $parte1);

        // Combinar ambas partes
        $datos = array_merge($parte1, $parte2);
    }
} else {
    shuffle($datos);
}


$contadorImagenes = 0;

$imagenesPorColumna = ceil(count($datos) / 5); // Calculamos el número de imágenes por columna

$columnas = 5;



// Iterar para cada columna
for ($columna = 1; $columna <= $columnas; $columna++) {
    // Abre una nueva columna
    echo '<div class="column">';
    
    // Iterar sobre las imágenes
    for ($i = $columna - 1; $i < count($datos); $i += $columnas) {
        $dato = $datos[$i];

        // Inicio del código de cada imagen
        echo '<a href="visualizarFondo.php?imagen=' . strtolower($dato['nombre']) . '" id="' . strtolower($dato['nombre']) . 'Link">
                <section class="contenedor-imagen" onclick="mostrarFondo(\'' . $dato['nombre'] . '\');">
                    <img loading="lazy" src="data:image/webp;base64,' . $dato['imagen'] . '" alt="" class="imagen">
                    <section class="portafolio-text-2">';
        $nombreImagen = strtolower($dato['nombre']);

        $nombreUsuario = isset($_COOKIE['usuario']) ? $_COOKIE['usuario'] : null;


        if ($nombreUsuario !== null) {
            $nombreUsuario = base64_decode($nombreUsuario);
            $fav = $favoritos->verificarFavorito($nombreImagen, $nombreUsuario);
            $claseFavorito = $fav ? 'favorito-activo' : '';

            echo '<p><i class="bi bi-bookmark-fill icono-favorito ' . $claseFavorito . '" onclick="agregarFavorito(\'' . $nombreImagen . '\', \'' . $nombreUsuario . '\')"></i></p>';
        } else {
            echo '<i class="bi bi-bookmark-fill icono-favorito" onclick="redirigir()"></i>';
        }

        echo '</section>
                    <section class="portafolio-text">
                        <h2>' . $dato['nombre'] . '</h2>
                    </section>
                </section>
            </a>';
        // Fin del código de cada imagen
        
        $contadorImagenes++;
    }

    // Cierra la columna actual
    echo '</div>';
}


?>
