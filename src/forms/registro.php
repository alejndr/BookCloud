<?php

//print_r($_POST);

//Captura de datos
$nombre = $_POST["nombre"]??"" ;
$apellido = $_POST["apellido"]??"" ;
$usuario = $_POST["usuario"]??"" ;

$email = $_POST["email"]??"" ;
// TODO $imagen = $_POST["imagen"]??"" ;

//Conexión a la BD
$mysqli = new mysqli("localhost","root","")	or	die("**Error de conexión: $mysqli->connection_errno : $mysqli->connection_error") ;
$mysqli->select_db("bookcloud") ;
$mysqli->set_charset("utf8") ;


if (isset($_POST["flag"]) && ($_POST["flag"])){

  $pass = md5($_POST["pass"]);

  $sql = "INSERT INTO usuario (nombre,apellido,usuario,contrasena,email) 
          VALUES ('$nombre','$apellido','$usuario','$pass','$email') ;" ;

    if ($mysqli->query($sql)){
      $ultimoUsuario = $mysqli->insert_id ;

      $sql = "INSERT INTO lista (idUsuario,tipo)
              VALUES ('$ultimoUsuario', '1')" ;
      $mysqli->query($sql);

      $sql = "INSERT INTO lista (idUsuario,tipo)
              VALUES ('$ultimoUsuario', '2')" ;
      $mysqli->query($sql);


      header("location:http://localhost/php/BookCloud/?exitoRegistro") ;

    }else{
      $err = "Se ha producido un error en el registro." ;
      require_once("formRegistro.php");

    }

} else {
  require_once("formRegistro.php");

}





$mysqli->close();
