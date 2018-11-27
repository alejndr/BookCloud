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

$idLibro = $_GET["idLibro"];

//print_r($idLibro);


$sql = "SELECT * 
        FROM libro 
        
        WHERE idLibro='$idLibro' " ;

$sql = "SELECT libro.idLibro, libro.titulo, libro.fecha, libro.isbn, libro.puntuacion, libro.sinopsis, libro.portada, libro.paginas, libro.compra, autor.autor, genero.genero from libro 
        INNER JOIN libro_genero on libro_genero.idLibro = libro.idLibro
        INNER JOIN genero on genero.idGenero = libro_genero.idGenero
        INNER JOIN libro_autor on libro_autor.idLibro = libro.idLibro
        INNER JOIN autor on autor.idAutor = libro_autor.idAutor
        where libro.idLibro = '$idLibro'";


if ($db->consulta($sql)) {
 $datos = $db->getObjeto();
}

//print_r($datos);


?>

<!doctype html>
<html lang="es">
  <head>
    <title><?= $datos->titulo ?></title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/css/bootstrap.min.css" integrity="sha384-Smlep5jCw/wG7hdkwQ/Z5nLIefveQRIY9nfy6xoR1uRYBtpZgI6339F5dgvm/e9B" crossorigin="anonymous">
  </head>
  <body>

      <!-- Barra de navegación -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="#">Bookcloud</a>
    <a class="navbar-brand" href="#">¿Que te parece este libro <?= $_SESSION["nombre"]?>? </a>
      <div class="collapse navbar-collapse" id="navbarText">
        <ul class="navbar-nav mr-auto">
        </ul>
        <ul class="navbar-nav mr-sm-2" >
          <li class="nav-item active">
          <form method="post">
            <a class="btn btn-primary" href="../" role="button">Volver</a>
            <a class="btn btn-info" href="./perfilUsuario.php" role="button">Perfil</a>
            <button type="submit" name="logout" class="btn btn-danger">Logout</button>
          </form>
          </li>
        </ul>
      </div>
    </nav>

    

    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="card">

                    <div class="card-body">
                        <div class="card-title mb-4">
                            <div class="d-flex justify-content-start">
                                <div class="image-container">
                                    <img src="<?= $datos->portada ?>" id="imgProfile" style="width: 128px; height: 197px" class="img-thumbnail" />
                                    
                                </div>
                                <div class="userData ml-3">
                                    <h2 class="d-block" style="font-size: 1.5rem; font-weight: bold"><?= $datos->titulo ?></h2>
                                    <h6 class="d-block">Puntuación: <?= $datos->puntuacion; ?></h6>
                                    <h6 class="d-block">ISBN: <?= $datos->isbn; ?></h6>
                                    <a name="" id="" class="btn btn-success" href="./quieroLeer.php?idLibro=<?=$idLibro?>&idUsuario=<?=$_SESSION["idUsuario"]?>" role="button">Quiero leerlo!</a>
                                    
                                </div>
                                
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12">
                                <ul class="nav nav-tabs mb-4" id="myTab" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" id="basicInfo-tab" data-toggle="tab" href="#basicInfo" role="tab" aria-controls="basicInfo" aria-selected="true">Info</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="criticas-tab" data-toggle="tab" href="#criticas" role="tab" aria-controls="criticas" aria-selected="false">Críticas</a>
                                    </li>
                                </ul>
                                <div class="tab-content ml-1" id="myTabContent">
                                    <div class="tab-pane fade show active" id="basicInfo" role="tabpanel" aria-labelledby="basicInfo-tab">
                                        

                                        <div class="row">
                                            <div class="col-sm-3 col-md-2 col-5">
                                                <label style="font-weight:bold;">Autor</label>
                                            </div>
                                            <div class="col-md-8 col-6">
                                                <?=$datos->autor?>
                                            </div>
                                        </div>
                                        <hr />

                                        <div class="row">
                                            <div class="col-sm-3 col-md-2 col-5">
                                                <label style="font-weight:bold;">Género</label>
                                            </div>
                                            <div class="col-md-8 col-6">
                                            <?=$datos->genero?>
                                            </div>
                                        </div>
                                        <hr />
                                        
                                        
                                        <div class="row">
                                            <div class="col-sm-3 col-md-2 col-5">
                                                <label style="font-weight:bold;">Fecha de publicación</label>
                                            </div>
                                            <div class="col-md-8 col-6">
                                                <?=$datos->fecha?>
                                            </div>
                                        </div>
                                        <hr />
                                        <div class="row">
                                            <div class="col-sm-3 col-md-2 col-5">
                                                <label style="font-weight:bold;">Páginas</label>
                                            </div>
                                            <div class="col-md-8 col-6">
                                                <?=$datos->paginas?>
                                            </div>
                                        </div>
                                        <hr />
                                        <div class="row">
                                            <div class="col-sm-3 col-md-2 col-5">
                                                <label style="font-weight:bold;">Sinopsis</label>
                                            </div>
                                            <div class="col-md-8 col-6">
                                                <?=$datos->sinopsis?>
                                            </div>
                                        </div>
                                        <hr />
                                        <div class="row">
                                            <div class="col-sm-3 col-md-2 col-5">
                                                <label style="font-weight:bold;">Comprar</label>
                                            </div>
                                            <div class="col-md-8 col-6">
                                                <a href="<?=$datos->compra?>">Play Store</a> 
                                            </div>
                                        </div>
                                        <hr />

                                    </div>
                                    <div class="tab-pane fade" id="criticas" role="tabpanel" aria-labelledby="criticas-tab">
                                        Criticas
                                    </div>
                                </div>
                            </div>
                        </div>


                    </div>

                </div>
            </div>
        </div>
    </div>

    
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/js/bootstrap.min.js" integrity="sha384-o+RDsa0aLu++PJvFqy8fFScvbHFLtbvScb8AjopnFD+iEQ7wo/CG0xlczd+2O/em" crossorigin="anonymous"></script>
  </body>
</html>