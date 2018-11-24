<?php

require_once "./Sesion.php" ;
require_once "./Database.php" ;

$sesion = Sesion::iniciarSesion() ;
$db = Database::getInstancia() ;

// Conexión a BBDD
//$mysqli = new mysqli("sql204.epizy.com","epiz_23035390","Iuzm6TjYz84L2L", "epiz_23035390_bookcloud") or die("**Error de conexión: $mysqli->connection_errno : $mysqli->connection_error") ;
//$mysqli->select_db("bookcloud") ;


// Función

$idLibro = $_GET["idLibro"];
$idLista = $_GET["idLista"];


$db->consulta("DELETE FROM lista_libro WHERE idLista='$idLista' AND idLibro='$idLibro'");

header("location:./perfilUsuario.php");