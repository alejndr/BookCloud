<?php

// Google books API key 
const KEY = "&key=AIzaSyBI3Dd0Jeat2oKv31iANc7IqmDBtWxZspI";

// Conexion a la BBDD
$mysqli = new mysqli("sql204.epizy.com","epiz_23035390","Iuzm6TjYz84L2L", "epiz_23035390_bookcloud") or die("**Error de conexión: $mysqli->connection_errno : $mysqli->connection_error") ;
$mysqli->select_db("bookcloud") ;

// Consulta a la API de google books por genero: ficcion, restringido a libros en español y
// maximo 30 resultados (por defecto da 10, maximo 40) 

//Fiction
//$librosAPI = "https://www.googleapis.com/books/v1/volumes?q=subject:fiction&langRestrict=es&maxResults=30".KEY;

//Dune
//$librosAPI = "https://www.googleapis.com/books/v1/volumes?q=intitle:dune&langRestrict=es".KEY;

// Mundodisco
$librosAPI = "https://www.googleapis.com/books/v1/volumes?q=inauthor:pratchett&langRestrict=es&maxResults=10&orderBy=relevance".KEY;





$libros = json_decode(file_get_contents($librosAPI)) ;


foreach ($libros->items as $item) {

  // TABLA LIBROS
  $titulo = $item->volumeInfo->title;
  $fecha = $item->volumeInfo->publishedDate;
  $isbn = $item->volumeInfo->industryIdentifiers[1]->identifier;
  $sinopsis = $item->volumeInfo->description;
  $portada = $item->volumeInfo->imageLinks->thumbnail;
  $paginas = $item->volumeInfo->pageCount;
  $compra = $item->saleInfo->buyLink;

  // TABLA AUTOR
  $autor = $item->volumeInfo->authors[0];

  // TABLA GENERO
  $genero = $item->volumeInfo->categories[0];

  // inserción LIBRO
  $res = $mysqli->query("SELECT idLibro FROM libro WHERE isbn='$isbn'");

  //print_r($res);

  if ($res->num_rows > 0) {
    $id = $mysqli->query("SELECT idLibro FROM libro WHERE titulo='$titulo'");
    $res = $id->fetch_object();
    
    $ultimoLibro = $res->idLibro ;
  } else {
    
    $mysqli->query("INSERT INTO libro (titulo,fecha,isbn,sinopsis,portada,paginas,compra) 
    VALUES ('$titulo','$fecha','$isbn','$sinopsis','$portada','$paginas','$compra')");

    $ultimoLibro = $mysqli->insert_id ;
  }

  


  // Inserción AUTOR
  $res = $mysqli->query("SELECT * FROM autor WHERE autor ='$autor'");

  if ($res->num_rows > 0) {
    $id = $mysqli->query("SELECT idAutor FROM autor WHERE autor ='$autor' ") ;
    $res = $id->fetch_object();

    $ultimoAutor = $res->idAutor ;
  } else {
    $mysqli->query("INSERT INTO autor (autor) VALUES ('$autor')");
    $ultimoAutor = $mysqli->insert_id ;
  }

  // Inserción GENERO
  $res = $mysqli->query("SELECT * FROM genero WHERE genero ='$genero'");

  if ($res->num_rows > 0) {
    $id = $mysqli->query("SELECT idGenero FROM genero WHERE genero ='$genero' ") ;
    $res = $id->fetch_object();

    $ultimoGenero = $res->idGenero ;
  } else {
    $mysqli->query("INSERT INTO genero (genero) VALUES ('$genero')");
    $ultimoGenero = $mysqli->insert_id ;
  }


  $mysqli->query("INSERT INTO libro_autor VALUES ('$ultimoLibro','$ultimoAutor')");
  $mysqli->query("INSERT INTO libro_genero VALUES ('$ultimoLibro','$ultimoGenero')");

  
  
  echo "insertado $titulo, con id de libro $ultimoLibro , id de autor $ultimoAutor y id de genero $ultimoGenero <br>";

}

