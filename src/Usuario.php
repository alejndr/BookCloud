<?php

require_once "Database.php" ;

class Usuario{

    private $idUsuario ;
    private $nombre ;
    private $apellidos ;
    private $usuario ;
    private $email ;
    private $imagen ;

    // Dejamos el constructor vacío y privado ya que, en un principio, solo crearemos
    // un usuario (el nuestro) y esa responsabilidad recae sobre la base de datos.
    private function __construct(){

    }

    public function __get($prop){
        return $this->$prop ;
    }

    // 
    public function setNombre($nom) { 
        $this->nombre = $nom ;
    }

    // 
    public function setApellidos($ape) { 
        $this->apellidos = $ape ;
    }

    // 
    public function setImagen($ima) { 
        $this->imagen = $ima ;
    }

    // Un usuario solo podrá actualizar sus datos.
    // No le permitiremos borrarse a sí mismo, o insertar nuevos usuarios.
    public function update(){
        // Añade aquí el código necesario !!!!!!
    }


}