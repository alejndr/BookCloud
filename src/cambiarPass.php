<?php

require_once "./Database.php" ;
require_once "./Sesion.php" ;


$sesion = Sesion::iniciarSesion() ;
$db = Database::getInstancia() ;

// comprobamos que haya una sesion activa, si no redirigimos a index
if (!$sesion->checkActiveSession()) {

  header("location:../index.php?SesionCaducada") ;
  
}

// cerramos la sesion activa y redirigimos a index
if($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['logout'])){
  
  $sesion->close();
  header("location:../index.php") ;
  
}

// Almacenamos la contraseña que el usuario dice que es la actual, la nueva, la id de usuario y la contraseña actual 
$passIntroducida = md5($_POST["PassActual"]);
$NuevaPass = md5($_POST["NuevaPass"]);
$NuevaPassRepetida = md5($_POST["NuevaPassRepetida"]);
$idUsuario = $_SESSION["idUsuario"];

$db->consulta("SELECT contrasena FROM usuario where idUsuario='$idUsuario'");

$res = $db->getObjeto();
$passActual = $res->contrasena ;

// Comparamos la contraseña introducida por el usuario con la real
if ($passActual == $passIntroducida) {

  if ($NuevaPass == $NuevaPassRepetida) {
    $db->consulta("UPDATE usuario SET contrasena='$NuevaPass' WHERE idUsuario='$idUsuario'");
    header("location:perfilUsuario.php?ExitoPass");
  } else {
    header("location:perfilUsuario.php?RepetidaIncorrecta") ;
  }
  
} else {
  header("location:perfilUsuario.php?ActualIncorrecta") ;
}


//echo " $passIntroducida $NuevaPass $idUsuario $passActual ";