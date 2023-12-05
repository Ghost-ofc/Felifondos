<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="style_sesion.css">
  <title>Registro de Usuario</title>
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

      <!-- Imagen en el lado izquierdo -->
      <div class="col-lg-6 d-flex align-items-center contenedor-2">
        <img src="./imagenes/registrar.png" id="registrar" class="img-fluid" alt="Imagen de fondo">
      </div>
      
      <!-- Formulario en el lado derecho -->
      <div class="col-lg-6 mt-0 contenedor-3">
        <div class="container">
            <h1 class="h2 fw-bold mt-0">REGISTRARME</h1>
       </div>
            <form action="PHP/Logica/Registrar.php" method="POST" class="p-4 formulario" id="sigupForm">
            
            <!-- Campos del formulario con sistema de rejilla -->            
            <div class="form-group row mt-5">
              <label for="username" class="col-sm-5 col-form-label fw-bold texto mb-2">Nombre de usuario:</label>
              <div class="col-sm-6">
                  <input type="text" placeholder="Ingresa tu nombre de usuario" name="nom_usuario" class="form-control" pattern="[a-zA-Z0-9]{6,15}" title="El nombre de usuario debe tener entre 6 y 15 caracteres" required id="username">
              </div>
            </div>
            
            <div class="form-group row mt-5">
              <label for="correo" class="col-sm-5 col-form-label fw-bold texto mb-2">Correo Electrónico:</label>
              <div class="col-sm-6">
                  <input type="email" placeholder="Ingresa tu correo electrónico" name="correo" class="form-control" required id="correo">
                  <small id="emailHelp" class="form-text text-danger"></small>
              </div>
          </div>  
            
            <div class="form-group row mt-5">
              <label for="contrasenaxd" class="col-sm-5 col-form-label fw-bold texto mb-2">Contraseña:</label>
              <div class="col-sm-6">
                  <div class="input-group">
                    <input type="password" placeholder="Ingresa tu contraseña" name="contrasena" class="form-control" required minlength="6"  title="La contraseña debe tener mínimo 6 caracteres" oninput="validatePassword()" id="contrasena">
                    <div class="input-group-append">
                          <button id="show-password-button" type="button" class="btn btn-light" onclick="togglePasswordVisibility()">
                              <img id="eye-icon" src="./imagenes/mostrar.png" alt="Mostrar Contraseña" />
                          </button>
                      </div>
                  </div>
                  <small id="passwordHelp" class="form-text text-danger"></small>
              </div>
          </div>
            
            <!-- Botón de registro -->
            <div class="d-flex justify-content-center mt-5">
              <button type="submit" class="btn btn-custom fw-bold">REGISTRARME</button>
            </div>
          </form>

    <!-- Enlace de iniciar sesion -->
        <div class="text-center mb-4">
            <p class="fw-bold">¿Ya tienes una cuenta? <a href="iniciar_sesion.html" class="btn btn-registrarse fw-bold">Iniciar sesión</a></p>
        </div>

        <div id="alerta" class="alerta-custom">
          <!-- El mensaje se insertará dinámicamente con JavaScript -->
        </div>
      
        </div>
      </div>
    </div>
  </div>
  <script src="js/script.js"></script> 
</body>
</html>