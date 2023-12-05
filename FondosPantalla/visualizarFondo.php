<!DOCTYPE html>
<html lang="es">

<?php
require_once __DIR__ .'/PHP/Clases/Usuario.php';
require_once __DIR__ .'/PHP/BD/database.php';
require_once __DIR__ .'/PHP/Clases/Fondo.php';

$conexion = new Database();
$usuario = new Usuario($conexion);
$fondo = new Fondo($conexion);
?>

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Ver Fondo</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
  <!-- Enlace al archivo CSS -->
  <link rel="stylesheet" href="estilo.css">
  <!-- Enlace al archivo CSS de Bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <!-- Enlace al archivo JavaScript de Bootstrap (incluyendo Popper.js) -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
    crossorigin="anonymous"></script>
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
    <!-- Contenedor para centrar la imagen verticalmente -->
    <main>
      <div class="text-center" id="fondo-container">

        <?php require_once __DIR__ .'/PHP/Logica/MostrarFondo.php'; ?>

        
      </div>
      <!-- Modal -->
      <div class="modal " id="exampleModal" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-dialog-centered" style="width: 25;">
          <div class="modal-content text-center">
            <div class="modal-body">
              <p id="enlaceParaCopiar"></p>
            </div>
            <div class="modal-footer d-flex justify-content-center">
              <button type="button" class="btn btn-secondary fw-bold" id="copiar"
                data-bs-dismiss="modal">Copiar</button>
            </div>
          </div>
        </div>
      </div>

      <div id="alertaCopiado" class="alerta-copiado">
        El enlace fue copiado correctamente
      </div>
      
      <?php 
        $nombreUsuario = isset($_COOKIE['usuario']) ? $_COOKIE['usuario'] : null;

        if ($nombreUsuario !== null) {
            $nombreUsuario = base64_decode($nombreUsuario);

        } else {
            $usuarioid = 0;
        }
        $nombre = $_GET['imagen'];
        $datos = $fondo->descargar($nombre);
        $imagen = $datos['imagen'];
        $nombre = $datos['nombre'];
        $categoria = $datos['categoria'];
        if ($datos == null) {
            echo "Imagen no encontrada";
            exit();
        }else{
            
            echo '
            <form action="PHP/Logica/AlgoritmoDesc.php" method="POST" id="formDescargar">
                <input type="hidden" name="usuario" value="' . $nombreUsuario . '">
                <input type="hidden" name="categoria" value="' . $categoria . '">
                <input type="hidden" name="nombre" value="' . $nombre . '">
                <a id="botonDescargar" href="data:image/jpeg;base64,' . $imagen . '" download="'.$nombre.'" onclick="document.getElementById(\'formDescargar\').submit()">
                    <i class="bi bi-download"></i> Descargar
                </a>
            </form>';
        }?>


      </div>
    </main>
  </section>

</body>

<link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<?php $nombreImagen = $_GET['imagen']; 
  $datos = $fondo->compartir($nombreImagen);
  if ($datos == false) {
    echo "<script>
    window.location = '../../index.php';
    </script>";
    exit();
  }else{
      echo '<script src="../../js/copiar.js"></script>';
  }
?>
</html>