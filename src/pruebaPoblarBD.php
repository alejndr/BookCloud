<?php


const KEY = "&key=AIzaSyBI3Dd0Jeat2oKv31iANc7IqmDBtWxZspI";

$librosAPI = "https://www.googleapis.com/books/v1/volumes?q=subject:fiction&langRestrict=es&maxResults=30".KEY;

$libros = json_decode(file_get_contents($librosAPI)) ;

foreach ($libros->items as $item) {
        $titulo = $item->volumeInfo->title;
        $fecha = $item->volumeInfo->publishedDate;
        $isbn = $item->volumeInfo->industryIdentifiers[1]->identifier;
        $sinopsis = $item->volumeInfo->description;
        $portada = $item->volumeInfo->imageLinks->thumbnail;
        $paginas = $item->volumeInfo->pageCount;

        echo " $titulo $fecha $isbn $sinopsis $portada $paginas <br>";

}