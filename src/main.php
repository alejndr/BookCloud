<?php

require_once "./Database.php" ;
require_once "./Sesion.php" ;
require_once "./Usuario.php" ;

$sesion = Sesion::iniciarSesion() ;



// comprobamos que haya una sesion activa, si no redirigimos a index
if (!$sesion->checkActiveSession()) {

  header("location:../index.php?SesionCaducada") ;

}

//print_r($_SESSION);

// cerramos la sesion activa y redirigimos a index
if($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['logout'])){
  
  $sesion->close();
  header("location:../index.php") ;

}

?>


<!doctype html>
<html lang="es">
  <head>
    <title>BookCloud</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/css/bootstrap.min.css" integrity="sha384-Smlep5jCw/wG7hdkwQ/Z5nLIefveQRIY9nfy6xoR1uRYBtpZgI6339F5dgvm/e9B" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/3-col.css" />
    
    
  </head>
  <body>
      
  <!-- Barra de navegación -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
      <a class="navbar-brand" href="#">Bookcloud</a>
      <a class="navbar-brand" href="#">Hola, <?= $_SESSION["nombre"]?>! </a>
  
      <div class="collapse navbar-collapse" id="navbarText">
          <ul class="navbar-nav mr-auto">
          </ul>
          <ul class="navbar-nav mr-sm-2" >
              <li class="nav-item active">
              <form method="post">
                  <!-- Poblar solo activo para admin, usuarios con tipo: 1 -->
                  <?php
                    if ($_SESSION["tipo"]=="1") {
                  ?>
                    <a class="btn btn-info" href="./poblarBD.php" role="button">poblar</a>
                  <?php
                  }
                  ?>
                  
                  <a class="btn btn-info" href="./perfilUsuario.php" role="button">Perfil</a>
                  <button type="submit" name="logout" class="btn btn-danger">Logout</button>
                  </form>
              </li>
          </ul>
      </div>
    </nav>
      

    <!-- Contenido -->
    <div class="container">

      <!-- Heading -->
      <h1 class="my-4">Libros
        <!-- <small>Secondary Text</small> -->
      </h1>

      <div class="row">

      <!-- El bucle crea tantas cards como entradas encuentre -->
      <?php
      $mysqli = new mysqli("sql204.epizy.com","epiz_23035390","Iuzm6TjYz84L2L", "epiz_23035390_bookcloud") or	die("**Error de conexión: $mysqli->connection_errno : $mysqli->connection_error") ;
      $mysqli->select_db("bookcloud") ;

      $res = $mysqli->query("SELECT * FROM libro ;") or die("**Error consulta libros: $mysqli->errno : $mysqli->error") ;

      while ($row=$res->fetch_object()) {
        
      ?>
        <div class="col-lg-4 col-sm-6 portfolio-item" style=" height: 482px ">
          <div class="card h-100" >
            <img class="card-img" src="<?= $row->portada ?>" alt="" style=" height: 482px ">
            <div class="card-img-overlay" style="background-color: rgba(0, 0, 0, 0.678) ">
              <h4 class="card-title">
                <a href="./perfilLibro.php?idLibro=<?= "$row->idLibro" ?>"> <?= "$row->titulo" ?> </a>
              </h4>
              <p class="card-text" style="color: azure"><?= "$row->sinopsis" ?></p>
            </div>
          </div>
        </div>
      <?php
      }
      ?>

      </div>
      <!-- /.row -->
      

      <!-- Paginación -->
      <ul class="pagination justify-content-center">
        <li class="page-item">
          <a class="page-link" href="#" aria-label="Previous">
            <span aria-hidden="true">&laquo;</span>
            <span class="sr-only">Previous</span>
          </a>
        </li>
        <li class="page-item">
          <a class="page-link" href="#">1</a>
        </li>
        <li class="page-item">
          <a class="page-link" href="#">2</a>
        </li>
        <li class="page-item">
          <a class="page-link" href="#">3</a>
        </li>
        <li class="page-item">
          <a class="page-link" href="#" aria-label="Next">
            <span aria-hidden="true">&raquo;</span>
            <span class="sr-only">Next</span>
          </a>
        </li>
      </ul>

    </div>
    <!-- /.container -->

    <!-- Footer -->
    <footer class="py-5 bg-dark">
      <div class="container">
        <p class="m-0 text-center text-white">Copyleft &copy; BookCloud 2018</p>
      </div>
      <!-- /.container -->
    </footer>



    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/js/bootstrap.min.js" integrity="sha384-o+RDsa0aLu++PJvFqy8fFScvbHFLtbvScb8AjopnFD+iEQ7wo/CG0xlczd+2O/em" crossorigin="anonymous"></script>
  </body>
</html>



<?php $mysqli->close(); ?>