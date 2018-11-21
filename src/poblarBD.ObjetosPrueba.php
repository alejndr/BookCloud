<?php

// Google books API key 
const KEY = "&key=AIzaSyBI3Dd0Jeat2oKv31iANc7IqmDBtWxZspI";

// Conexion a la BBDD
require_once "./Database.php" ;

$db = Database::getInstancia() ;


// Consulta a la API de google books por genero: ficcion, restringido a libros en español y
// maximo 30 resultados (por defecto da 10, maximo 40) 

//Fiction
//$librosAPI = "https://www.googleapis.com/books/v1/volumes?q=subject:fiction&langRestrict=es&maxResults=30".KEY;

//Dune
$librosAPI = "https://www.googleapis.com/books/v1/volumes?q=intitle:dune&langRestrict=es".KEY;

// Mundodisco
//$librosAPI = "https://www.googleapis.com/books/v1/volumes?q=inauthor:pratchett&langRestrict=es&maxResults=30".KEY;





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

  // inserción en la BD
  $db->consulta("INSERT INTO libro (titulo,fecha,isbn,sinopsis,portada,paginas,compra) 
  VALUES ('$titulo','$fecha','$isbn','$sinopsis','$portada','$paginas','$compra')");
  $ultimoLibro = $db->ultimoID() ; //insert_id

  
    if ($db->consulta("SELECT * FROM autor WHERE autor ='$autor'")) {
      $db->consulta("SELECT idAutor FROM autor WHERE autor ='$autor' ") ;
      $datos = $db->getObjeto();

      $ultimoAutor = $datos->idAutor;
    } else {

      $db->consulta("INSERT INTO autor (autor) VALUES ('$autor')");
      $ultimoAutor = $db->ultimoID() ; //insert_id
    }
  

  

    if ($db->consulta("SELECT * FROM genero WHERE genero ='$genero'")) {
      $db->consulta("SELECT idGenero FROM genero WHERE genero ='$genero' ") ;
      $datos = $db->getObjeto();

      $ultimoGenero = $datos->idGenero;
    } else {

      $db->consulta("INSERT INTO genero (genero) VALUES ('$genero')");
      $ultimoGenero = $db->ultimoID() ; //insert_id
    }

  
  $db->consulta("INSERT INTO libro_autor VALUES ('$ultimoLibro','$ultimoAutor')");
  $db->consulta("INSERT INTO libro_genero VALUES ('$ultimoLibro','$ultimoGenero')");

  
  echo "insertado $titulo <br>";

}

