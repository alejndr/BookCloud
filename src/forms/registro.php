<?php

//print_r($_POST);

//Captura de datos
$nombre = $_POST["nombre"]??"" ;
$apellido = $_POST["apellido"]??"" ;
$usuario = $_POST["usuario"]??"" ;

$email = $_POST["email"]??"" ;
// TODO $imagen = $_POST["imagen"]??"" ;

//Conexión a la BD
$mysqli = new mysqli("sql204.epizy.com","epiz_23035390","Iuzm6TjYz84L2L", "epiz_23035390_bookcloud")	or	die("**Error de conexión: $mysqli->connection_errno : $mysqli->connection_error") ;
$mysqli->select_db("bookcloud") ;
$mysqli->set_charset("utf8") ;


if (isset($_POST["flag"]) && ($_POST["flag"])){

  $pass = md5($_POST["pass"]);

  $sql = "INSERT INTO usuario (nombre,apellido,usuario,contrasena,email) 
          VALUES ('$nombre','$apellido','$usuario','$pass','$email') ;" ;

    // Cogemos la id del ultimo usuario introducido y le creamos listas de tipo 1(Quiero leer) y de tipo 2(Leido)
    if ($mysqli->query($sql)){
      $ultimoUsuario = $mysqli->insert_id ;

      $sql = "INSERT INTO lista (idUsuario,tipo)
              VALUES ('$ultimoUsuario', '1')" ;
      $mysqli->query($sql);

      $sql = "INSERT INTO lista (idUsuario,tipo)
              VALUES ('$ultimoUsuario', '2')" ;
      $mysqli->query($sql);


      header("location:../../index.php?exitoRegistro") ;

    }else{
      $err = "Se ha producido un error en el registro." ;
      require_once("formRegistro.php");

    }

} else {
  require_once("formRegistro.php");

}





$mysqli->close();
