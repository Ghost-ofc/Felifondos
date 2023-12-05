<?php

class Database
{
    private $conexion;

    public function __construct($host = 'localhost', $usuario = 'amewllte_mabelbd', $contraseña = 'Siete@47814', $baseDatos = 'amewllte_felifondos')
    {
        $this->conexion = new mysqli($host, $usuario, $contraseña, $baseDatos);

        
        if ($this->conexion->connect_error) {
            die('Error de conexión a la base de datos: ' . $this->conexion->connect_error);
        }
    }

    public function cerrarConexion()
    {
        $this->conexion->close();
    }

    public function getConexion()
    {
        return $this->conexion;
    }

    public function query($consulta)
    {
        return $this->conexion->query($consulta);
    }
}

?>