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
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  <script src="js/alerta.js"></script>
  <link rel="stylesheet" href="style_sesion.css">
  
  <title>Iniciar Sesión</title>
</head>
<body>
  <nav>
        <header class="contenedor">
            <div class="logo">
                <a href="index.php"><img src="imagenes/logo_fondo.png" alt=""></a>
            </div>
        </header>
    </nav>
  <div class="contenedor container-fluid">
    <div class="row align-items-center">

      <!-- Login izquierda -->
      <div class="col-lg-6 mt-0">
        <div class="container">
          <h1 class="h2 fw-bold mt-0">INICIAR SESIÓN</h1>
        </div>
        
        <form action="PHP/Logica/Login.php" id="loginForm" method="POST" class="p-4 formulario" onsubmit="return validateForm()">
        
          <!-- Campo de usuario y contraseña en la misma fila -->
          <div class="form-group row mt-5">
            <label for="correo" class="col-sm-5 col-form-label fw-bold texto mb-2">Correo Electrónico:</label>
            <div class="col-sm-6">
                <input type="email" id="correo" placeholder="Ingresa tu correo" name="correo" class="form-control" required>
            </div>
          </div>        

          

          <div class="form-group row mt-5">
            <label for="contrasena" class="col-sm-5 col-form-label fw-bold texto mb-2">Contraseña:</label>
            <div class="col-sm-6">
                <div class="input-group">
                    <input type="password" placeholder="Ingresa tu contraseña" id="contrasena" name="contrasena" class="form-control" required oninput="validatePassword()">
                    <div class="input-group-append">
                        <button id="show-password-button" type="button" class="btn btn-light" onclick="togglePasswordVisibility()">
                            <img id="eye-icon" src="./imagenes/mostrar.png" alt="Mostrar Contraseña" />
                        </button>
                    </div>
                </div>
                <small id="passwordHelp" class="form-text text-danger"></small>
            </div>
          </div>
    
          <div id="alerta" class="alerta-custom">
            <?php
              if (isset($_COOKIE['login'])) {
                if ($_COOKIE['login'] == 'fallido') {
                  setcookie('login', '', time() + 3600, '/');
                  echo "<script> mostrarAlerta('Correo electronico y/o contraseña incorrecta', 'error'); </script>";
                }
              }
            ?>
          </div>


          <!-- Botón de Iniciar Sesión -->
          <div class="d-flex justify-content-center mt-5">
            <button type="submit" class="btn btn-custom fw-bold">INICIA SESIÓN</button>
          </div>
        </form>

        <!-- Enlace de Regístrate -->
        <div class="text-center mb-4 ">
          <p class="fw-bold ">¿Todavía no tienes una cuenta? <a href="registrarse.php" class="btn btn-registrarse fw-bold">Registrarme</a></p>
        </div>
      </div>

      <!-- Imagen en el lado derecho -->
      <div class="col-lg-6  d-flex align-items-center">
        <img src="./imagenes/perroo.png" id="perro" alt="Placeholder Image" class="img-fluid">
      </div>

    </div>
  </div>
  <script src="js/script.js"></script>
  
</body>
</html>