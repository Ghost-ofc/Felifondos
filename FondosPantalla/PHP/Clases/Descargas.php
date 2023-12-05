<?php

require_once __DIR__ .'/../BD/database.php';

class Descargas{
    private $conexion;

    public function __construct($conexion)
    {
        $this->conexion = $conexion;
    }

    public function obtenerCategoriasMasDescargadas($nomuser, $cantidad_descarga) {
        $query = 'SELECT id_usuario FROM usuario WHERE nom_usuario = "' . $nomuser . '"';
        $resultado = $this->conexion->getConexion()->query($query);

        if ($resultado->num_rows == 1) {
            $usuario = $resultado->fetch_assoc();
            $usuarioId = $usuario['id_usuario'];
        } else {
            return false;
        }
    
        $query = 'SELECT categoria FROM descargas WHERE usuario_id_usuario = ' . $usuarioId . ' ORDER BY cantidad_descarga DESC LIMIT ' . $cantidad_descarga;
        $resultado = $this->conexion->getConexion()->query($query);

        if ($resultado) {
            return $resultado->fetch_all(MYSQLI_ASSOC);
        }

        return [];
    }

    public function AlgoritmoDescargar($usuarioId, $categoria)
    {
        $query = "SELECT * FROM usuario WHERE nom_usuario = '$usuarioId'";
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


}

?>