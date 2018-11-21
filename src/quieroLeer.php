<?php

require_once "./Sesion.php" ;

$sesion = Sesion::iniciarSesion() ;

// Conexión a BBDD
$mysqli = new mysqli("localhost","root","") or die("**Error de conexión: $mysqli->connection_errno : $mysqli->connection_error") ;
$mysqli->select_db("bookcloud") ;


$idLibro = $_GET["idLibro"];
$idUsuario = $_SESSION["idUsuario"];


$id = $mysqli->query("SELECT * from lista WHERE idUsuario='$idUsuario' AND tipo='1'");
$res = $id->fetch_object();
$idLista = $res->idLista ;

$mysqli->query("INSERT INTO lista_libro(idLista, idLibro) VALUES ('$idLista','$idLibro')");

header("location: ./perfilLibro.php?idLibro=$idLibro");

