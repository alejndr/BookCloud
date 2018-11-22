<?php

require_once "./Database.php" ;
require_once "./Sesion.php" ;


$sesion = Sesion::iniciarSesion() ;

// comprobamos que haya una sesion activa, si no redirigimos a index
if (!$sesion->checkActiveSession()) {

  header("location:../index.php?SesionCaducada") ;
  
}

// cerramos la sesion activa y redirigimos a index
if($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['logout'])){
  
  $sesion->close();
  header("location:../index.php") ;
  
}
//print_r($idUsuario);

?>

<!doctype html>
<html lang="es">
  <head>
    <title>Tu Perfil</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="./css/bootstrap.min.css">
  </head>
  <body>

      <!-- Barra de navegación -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="#">Bookcloud</a>
    
      <div class="collapse navbar-collapse" id="navbarText">
        <ul class="navbar-nav mr-auto">
        </ul>
        <ul class="navbar-nav mr-sm-2" >
          <li class="nav-item active">
          <form method="post">
            <a class="btn btn-primary" href="../" role="button">Volver</a>
            
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
                                                <!--  $_SESSION["imagen"]  -->
                                    <img src="<?=$_SESSION["imagen"]?>" id="imgProfile" style="width: 128px; height: 150px" class="img-thumbnail" />
                                    
                                </div>
                                <div class="userData ml-3">
                                    <h2 class="d-block" style="font-size: 1.5rem; font-weight: bold"><?= $_SESSION["usuario"] ?></h2>
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
                                        <a class="nav-link" id="Lista-tab" data-toggle="tab" href="#Lista" role="tab" aria-controls="Lista" aria-selected="false">Leidos</a>
                                    </li>

                                    <li class="nav-item">
                                        <a class="nav-link" id="Editar-tab" data-toggle="tab" href="#Editar" role="tab" aria-controls="Editar" aria-selected="false">Editar</a>
                                    </li>
                                </ul>
                                <div class="tab-content ml-1" id="myTabContent">

                                    <!--Pestaña información del usuario-->
                                    <div class="tab-pane fade show active" id="basicInfo" role="tabpanel" aria-labelledby="basicInfo-tab">
                                        
                                        <div class="row">
                                            <div class="col-sm-3 col-md-2 col-5">
                                                <label style="font-weight:bold;">Nombre y apellidos</label>
                                            </div>
                                            <div class="col-md-8 col-6">
                                                <?=$_SESSION["nombre"]?>  <?=$_SESSION["apellido"]?>
                                            </div>
                                        </div>
                                        <hr />
                                        <div class="row">
                                            <div class="col-sm-3 col-md-2 col-5">
                                                <label style="font-weight:bold;">Email</label>
                                            </div>
                                            <div class="col-md-8 col-6">
                                                <?=$_SESSION["email"]?>
                                            </div>
                                        </div>
                                        <hr />

                                    </div>
                                    
                                    <!--Pestaña lista-->
                                    <div class="tab-pane fade" id="Lista" role="tabpanel" aria-labelledby="Lista-tab">
                                    <?php
                                    $mysqli = new mysqli("sql204.epizy.com","epiz_23035390","Iuzm6TjYz84L2L", "epiz_23035390_bookcloud")	or	die("**Error de conexión: $mysqli->connection_errno : $mysqli->connection_error") ;
                                    $mysqli->select_db("bookcloud") ;
                                    $idUsuario = $_SESSION["idUsuario"];

                                    $res = $mysqli->query("SELECT lista.idLista, libro.idLibro, libro.titulo FROM lista 
                                                            INNER JOIN lista_libro on lista.idLista = lista_libro.idLista
                                                            INNER JOIN libro on libro.idLibro = lista_libro.idLibro
                                                            WHERE idUsuario='$idUsuario' and lista.tipo=1  ;") or die("**Error consulta libros: $mysqli->errno : $mysqli->error") ;

                                    while ($row=$res->fetch_object()) {
                                        
                                    ?>
                                        <div class="row">
                                            <div class="col-md-8 col-6">
                                            <a href="./perfilLibro.php?idLibro=<?= "$row->idLibro" ?>"> <?= "$row->titulo" ?> </a> 
                                            &nbsp;&nbsp;<a style="height: 26px;width: 20px;padding: 0px;" class="btn btn-danger" href="./quitarQL.php?idLibro=<?="$row->idLibro"?>&idLista=<?=$row->idLista?>" role="button">X</a>
                                            </div>
                                            
                                        </div>
                                        <hr />
                                    <?php
                                    }
                                    ?>
                                    </div>

                                    <div class="tab-pane fade" id="Editar" role="tabpanel" aria-labelledby="Editar-tab">
                                        Editar
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