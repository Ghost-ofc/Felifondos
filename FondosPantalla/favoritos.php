<!DOCTYPE html>
<html lang="en">
<?php

require_once __DIR__ .'/PHP/Clases/Usuario.php';
require_once __DIR__ .'/PHP/BD/database.php';

$conexion = new Database();
$usuario = new Usuario($conexion);

?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Favoritos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="./css/style-favorito.css">
    <link rel="stylesheet" href="./style_inicio.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
</head>


<body>


    <nav>
        <div class="contenedor">
            <div class="logo">
                <a href="index.php"><img src="imagenes\logo_fondo.png" alt=""></a>
            </div>
            <div class="botones">
                <?php $usuario->verificacionLogin(); ?>
            </div>
        </div>
    </nav>

    <section class="cuerpo">
        <aside class="menu">
            <header>
                <button>
                    <a href="favoritos.php"><i class="bi bi-bookmark-fill"></i> Favoritos</a>
                </button>
            </header>
        </aside>

        <main class="contenedor-2">
            <div class="row">

                <h1 class="text-center">MIS FAVORITOS</h1>

                <div class="column">
                    <?php require_once __DIR__ .'/PHP/Logica/MostrarGaleriaFavoritos.php'; ?>
                </div>   
            </div>
        </main>
    </section>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script
</body>
</html>