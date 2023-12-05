<?php

require_once __DIR__ .'/../BD/database.php';


class Usuario{

    private $conexion;

    public function __construct($conexion)
    {
        $this->conexion = $conexion;
    }

    public function login($correo, $contrasena)
    {

        $correo = $this->conexion->getConexion()->real_escape_string($correo);
        $contrasena = $this->conexion->getConexion()->real_escape_string($contrasena);
        $contrasena = hash('sha512', $contrasena);
        $consulta = "SELECT nom_usuario FROM usuario WHERE correo = '$correo' AND contrasena = '$contrasena'";
        $resultado = $this->conexion->getConexion()->query($consulta);

        if ($resultado->num_rows == 1) {
            $usuario = $resultado->fetch_assoc();
            return $usuario;
        } else {
            return false;
        }
    }


    public function registrar($nom_usuario, $correo, $contrasena)
    {
        #Por seguridad, se limpian los datos de entrada
        $nom_usuario = $this->conexion->getConexion()->real_escape_string($nom_usuario);
        $correo = $this->conexion->getConexion()->real_escape_string($correo);
        $contrasena = $this->conexion->getConexion()->real_escape_string($contrasena);

        $contrasena = hash('sha512', $contrasena);
        $consulta = "INSERT INTO usuario (nom_usuario, correo, contrasena) VALUES ('$nom_usuario', '$correo', '$contrasena')";
        $resultado = $this->conexion->getConexion()->query($consulta);
        
        if ($resultado) {
            return true;
        } else {
            return false;
        }
    }

    public function verificacionLogin() {

        if (isset($_COOKIE['usuario']) ) {
            // Si la sesión está iniciada y la clave 'usuario' está definida en $_SESSION, mostrar el nombre de usuario

            $usuario = base64_decode($_COOKIE['usuario']);
            $conexion = new Database();
            // Consulta a la base de datos para verificar la existencia del usuario
            $consulta = "SELECT * FROM usuario WHERE nom_usuario = '$usuario'";
            $resultado = $conexion->query($consulta);
            
            if ($resultado && $resultado->num_rows > 0) {
                echo '<style>#CerrarSesion {
                    background-color: #8B286D;
                    color: white;
                    border: none;
                    border-radius: 0;
                    
                    width: 200px;
                    height: 40px;
                    text-transform: uppercase;
                    font-size: large;
                    font-weight: bold;
                    font-size: 18px;
                }
                
                #CerrarSesion:hover {
                    background-color: transparent;
                    border: 2px solid #8B286D;
                }</style>';
                
                echo '<p id="nav-user">' . $usuario . '</p>';
                echo '<button id="CerrarSesion" onclick="cerrarSesion()">Cerrar Sesión</button>';

            } else {
                // No se encontró el usuario en la base de datos
                echo '<a href="iniciar_sesion.php"><button id="iniciar">Iniciar Sesión</button></a>';
                echo '<a href="registrarse.php"><button id="Registrarse">Registrarse</button></a>';
            }
        } else {
            // Si la sesión no está iniciada o la clave 'usuario' no está definida en $_SESSION
            echo '<a href="iniciar_sesion.php"><button id="iniciar">Iniciar Sesión</button></a>';
            echo '<a href="registrarse.php"><button id="Registrarse">Registrarse</button></a>';
        }
    }

    public function cerrarSesion(){
        
        setcookie('usuario', '', time() + 3600, '/');
        echo 
        "<script>
            window.location = '../../index.php';
        </script>";
        exit();
    }
}

?>