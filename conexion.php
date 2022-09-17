<?php

class conexion{

    private $servidor = "localhost:3307";
    private $usuario="root";
    private $password="";
    private $conexion;

    public function __construct()
    {
        try {
            $this->conexion = new PDO("mysql:host=$this->servidor;dbname=album",$this->usuario.$this->password);
            $this->conexion->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            return "falla de conexion".$e;
        }
    }

    public function ejecutar($sql){ // Insertar/delete/update
        $this->conexion->exec($sql);
        return $this->conexion->lastInsertId();
    }

    public function consultar($sql){
        $sentencia=$this->conexion->prepare($sql);
        $sentencia->execute();
        return $sentencia->fetchAll();
    }

}
?>