<?php

require_once __DIR__ .'/../Clases/Favoritos.php';

require_once __DIR__ .'/../Clases/Fondo.php';

echo '<script src="../../js/favoritoagg.js"></script>';
echo '<style> 
.icono-favorito:hover {
    color: rgb(255, 247, 4);
    /* Color del ícono al pasar el cursor por encima */
  }
.icono-favorito.favorito-activo {
    color: rgb(255, 247, 4);
    /* Color del ícono cuando es favorito */
  } </style>';


$conexion = new Database();
$favoritos = new Favoritos($conexion);
$fondo = new Fondo($conexion);




if (isset($_COOKIE['usuario'])) {

    $nombreUsuario = isset($_COOKIE['usuario']) ? $_COOKIE['usuario'] : null;
    $nombreUsuario = base64_decode($nombreUsuario);

    if ($nombreUsuario !== null) {
        $datos = $favoritos->mostrargaleriafavorito($nombreUsuario);
    } else {
        $datos = null;
    }


    if ($datos == null) {
        echo '<div class="row">
                <h3 class="text-center">NO TIENES FAVORITOS</h3>
            </div>';
            exit();
    }
    $contadorImagenes = 0;

    foreach ($datos as $dato) {

        if ($contadorImagenes % 5 == 0) {
            echo '<div class="row">';
        }

        echo '<div class="column">
                <a href="visualizarFondo.php?imagen=' . strtolower($dato['nombre']) . '" id="' . strtolower($dato['nombre']) . 'Link">
                    <section class="contenedor-imagen">
                        <img src="data:image/jpeg;base64,' . $dato['imagen'] . '" alt="" class="imagen">
                        <section class="portafolio-text-2">';
        $nombreImagen = strtolower($dato['nombre']);


        if ($nombreUsuario !== null) {
            
            $fav = $favoritos->verificarFavorito($nombreImagen, $nombreUsuario);
            $claseFavorito = $fav ? 'favorito-activo' : '';

            echo '<p><i class="bi bi-bookmark-fill icono-favorito ' . $claseFavorito . '" onclick="agregarFavorito(\'' . $nombreImagen . '\', \'' . $nombreUsuario . '\')"></i></p>';
        } else {
            echo '<i class="bi bi-bookmark-fill icono-favorito" onclick="redirigir()"></i>';
        }
        echo'</section>
                        <section class="portafolio-text">
                            <h2>' . $dato['nombre'] . '</h2>
                        </section>
                    </section>
                </a>
            </div>';

        $contadorImagenes++;

        if ($contadorImagenes % 5 == 0) {
            echo '</div>';
        }
    }

    if ($contadorImagenes % 5 != 0) {
        echo '</div>';
    }
}
else{
    echo '<script>redirigir();</script>';
}

?>






