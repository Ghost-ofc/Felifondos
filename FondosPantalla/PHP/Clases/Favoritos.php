<?php

require_once __DIR__ .'/../BD/database.php';

class Favoritos{
    private $conexion;

    public function __construct($conexion)
    {
        $this->conexion = $conexion;
    }

    public function mostrargaleriafavorito($nombreUsuario)
    {
        $nombreUsuario = $this->conexion->getConexion()->real_escape_string($nombreUsuario);
        $nombreUsuario = trim($nombreUsuario);

        $consulta = "SELECT * FROM usuario WHERE nom_usuario = '$nombreUsuario'";
        $resultado = $this->conexion->getConexion()->query($consulta);

        if ($resultado->num_rows > 0) {
            $idUsuario = $resultado->fetch_assoc()['id_usuario'];
        } else {
            return null;
        }

        $consulta = "
            SELECT fondo.*
            FROM favoritos
            JOIN fondo ON favoritos.fondo_id_fondo = fondo.id_fondo
            WHERE favoritos.usuario_id_usuario = '$idUsuario'
        ";

        $resultado = $this->conexion->getConexion()->query($consulta);

        if ($resultado->num_rows > 0) {
            $datos = array();
            while ($fila = $resultado->fetch_assoc()) {
                $datos[] = $fila;
            }
            return $datos;
        } else {
            return null;
        }
    }

    public function verificarFavorito($nombre_imagen, $nom_usuario)
    {

        $nombre_imagen = $this->conexion->getConexion()->real_escape_string($nombre_imagen);
        $nombre_imagen = trim($nombre_imagen);

        $nom_usuario = $this->conexion->getConexion()->real_escape_string($nom_usuario);
        $nom_usuario = trim($nom_usuario);

        // Obtener el ID del fondo a partir del nombre de imagen
        $consultaFondo = "SELECT id_fondo FROM fondo WHERE nombre = '$nombre_imagen'";
        $resultadoFondo = $this->conexion->getConexion()->query($consultaFondo);


        if ($resultadoFondo->num_rows > 0) {
            $filaFondo = $resultadoFondo->fetch_assoc();
            $idFondo = $filaFondo['id_fondo'];
        } else {
            // Fondo no encontrado
            return false;
        }
        
        // Obtener el ID del usuario a partir del nombre de usuario
        $consultaUsuario = "SELECT id_usuario FROM usuario WHERE nom_usuario = '$nom_usuario'";
        $resultadoUsuario = $this->conexion->getConexion()->query($consultaUsuario);

        if ($resultadoUsuario->num_rows > 0) {
            $filaUsuario = $resultadoUsuario->fetch_assoc();
            $idUsuario = $filaUsuario['id_usuario'];
            
            // Verifica si ya existe una entrada en la tabla favoritos para este fondo y usuario
            $consultaExistencia = "SELECT * FROM favoritos WHERE fondo_id_fondo = $idFondo AND usuario_id_usuario = $idUsuario";
            $resultadoExistencia = $this->conexion->getConexion()->query($consultaExistencia);

            if ($resultadoExistencia->num_rows > 0) {
                // Si ya existe, simplemente actualiza el campo 'favorito' en la tabla favoritos
                return true;
            } else {
                // Si no existe, inserta una nueva entrada en la tabla favoritos
                return false;
            }
        } else {
            // Usuario no encontrado
            return "error";
        }
        
    }

    public function controladorfavoritos($nombreImagen, $nombreUsuario)
    {
        // Obtener el ID del usuario a partir del nombre de usuario
        $consultaUsuario = "SELECT id_usuario FROM usuario WHERE nom_usuario = '$nombreUsuario'";
        $resultadoUsuario = $this->conexion->getConexion()->query($consultaUsuario);

        if ($resultadoUsuario->num_rows > 0) {
            $filaUsuario = $resultadoUsuario->fetch_assoc();
            $idUsuario = $filaUsuario['id_usuario'];
            
            $consultaimagen = "SELECT id_fondo FROM fondo WHERE nombre = '$nombreImagen'";
            $resultadoimagen = $this->conexion->getConexion()->query($consultaimagen);

            if ($resultadoimagen->num_rows > 0) {
                $filaImagen = $resultadoimagen->fetch_assoc();
                $idfondo = $filaImagen['id_fondo'];
            }
            else{
                $idfondo = 0;
            }
            // Verifica si ya existe una entrada en la tabla favoritos para este fondo y usuario
            $consultaExistencia = "SELECT * FROM favoritos WHERE fondo_id_fondo = $idfondo AND usuario_id_usuario = $idUsuario";
            $resultadoExistencia = $this->conexion->getConexion()->query($consultaExistencia);

            if ($resultadoExistencia->num_rows > 0) {
                // Si ya existe, simplemente actualiza el campo 'favorito' en la tabla favoritos
                $consulta = "DELETE FROM favoritos WHERE usuario_id_usuario = $idUsuario AND fondo_id_fondo = $idfondo";
                $mensaje = "eliminado";
            } else {
                // Si no existe, inserta una nueva entrada en la tabla favoritos
                $consulta = "INSERT INTO favoritos (usuario_id_usuario, fondo_id_fondo) VALUES ($idUsuario, $idfondo)";
                $mensaje = "agregado";
            }
            

            $resultado = $this->conexion->getConexion()->query($consulta);
            
            // Verifica si la actualización o inserción fue exitosa
            if ($resultado) {
                echo $mensaje;
            } else {
                echo "error";
            }
        } else {
            // Usuario no encontrado
            return "error";
        }
    }
}


?>