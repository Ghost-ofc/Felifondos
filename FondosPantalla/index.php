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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="style_inicio.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">

    <title>Felifondos</title>
</head>

<body>
    <nav>
        <header class="contenedor">
            <div class="logo">
                <a href="index.php"><img src="imagenes/logo_fondo.png" alt=""></a>
            </div>
            <div class="botones">
                <?php $usuario->verificacionLogin(); ?>
            </div>
        </header>
    </nav>

    <section class="cuerpo">
        <aside class="menu">
            <header>
                <button>
                    <a href="favoritos.php" id="favorito"><i class="bi bi-bookmark-fill"></i> Favoritos</a>
                </button>
            </header>
        </aside>
        <main class="contenedor-2">
            <div class="row">
                
                    <?php  require_once __DIR__ .'/PHP/Logica/MostrarGaleria.php'; ?>
                    
            </div>
        </main>
    </section>
    <script src="js/script.js"></script>
    <script src="js/cerrarsesion.js"></script>
</body>

</html>