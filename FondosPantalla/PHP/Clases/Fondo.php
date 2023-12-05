<?php

require_once __DIR__ .'/../BD/database.php';
ini_set('memory_limit', '1000M');


class Fondo
{
    private $conexion;

    public function __construct($conexion)
    {
        $this->conexion = $conexion;
    }

    public function mostrargaleria() {

        // Consulta a la base de datos para obtener los datos de los fondos
        $consulta = "SELECT nombre, imagen FROM fondo";
        $resultado = $this->conexion->getConexion()->query($consulta);

        $datos = array();

        while ($fila = $resultado->fetch_assoc()) {
            $datos[] = $fila;
        }

        return $datos;
    }


    public function obtenerImagenesPorCategoria($categoria) {
        $query = 'SELECT nombre, imagen FROM fondo WHERE categoria = "' . $categoria . '"';
        $resultado = $this->conexion->getConexion()->query($query);

        $datos = array();

        while ($fila = $resultado->fetch_assoc()) {
            $datos[] = $fila;
        }

        return $datos;
    }

    public function MostrarFondosRelacionados($nom_usuario, $categoria)
    {
        $query = "SELECT id_usuario FROM usuario WHERE nom_usuario = '$nom_usuario'";
        $resultado = $this->conexion->getConexion()->query($query);

        if ($resultado->num_rows == 1) {
            $usuario = $resultado->fetch_assoc();
            $usuarioId = $usuario['id_usuario'];
        } else {
            return false;
        }

        $query = "SELECT * FROM descargas WHERE usuario_id_usuario = '$usuarioId' AND categoria = '$categoria'";
        $resultado = $this->conexion->getConexion()->query($query);

        if ($resultado->num_rows == 1) {
            $descargas = $resultado->fetch_assoc();
            $descargas = $descargas['cantidad_descarga'];
            $descargas = $descargas + 1;
            $query = "UPDATE descargas SET cantidad_descarga = '$descargas' WHERE usuario_id_usuario = '$usuarioId' AND categoria = '$categoria'";
            $resultado = $this->conexion->getConexion()->query($query);
            if ($resultado) {
                return true;
            } else {
                return false;
            }
        } else {
            $query = "INSERT INTO descargas (usuario_id_usuario, categoria, cantidad_descarga) VALUES ('$usuarioId', '$categoria', 1)";
            $resultado = $this->conexion->getConexion()->query($query);
            if ($resultado) {
                return true;
            } else {
                return false;
            }
        }
        return false;
    }

    public function mostrarFondo($nombre)
    {
        $consulta = "SELECT * FROM fondo WHERE nombre = '$nombre'";
        $resultado = $this->conexion->getConexion()->query($consulta);

        if ($resultado->num_rows == 1) {
            $fondo = $resultado->fetch_assoc();
            return $fondo;
        } else {
            return false;
        }
    }

    public function descargar($nombre)
    {
        $consulta = "SELECT * FROM fondo WHERE nombre = '$nombre'";
        $resultado = $this->conexion->getConexion()->query($consulta);
        
        if ($resultado->num_rows == 1) {
            $fondo = $resultado->fetch_assoc();
            return $fondo;
        } else {
            return false;
        }
    }

    public function compartir($nombre)
    {
        $consulta = "SELECT * FROM fondo WHERE nombre = '$nombre'";
        $resultado = $this->conexion->getConexion()->query($consulta);
        
        if ($resultado->num_rows == 1) {
            $fondo = $resultado->fetch_assoc();
            return $fondo;
        } else {
            return false;
        }
    }
}

?>
