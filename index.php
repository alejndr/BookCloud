
<?php 

  //print_r($_POST);
  
  require_once "src/Database.php" ;
  require_once "src/Sesion.php" ;
  
  $sesion = Sesion::iniciarSesion() ;

  if (!empty($_POST)){

		$usr = $_POST["usuario"] ;
		$pwd = $_POST["pass"] ;

		// Intentamos hacer un login
		$log = $sesion->doLogin($usr, $pwd) ;

		// Comprobamos si hemos accedido a nuestra cuenta
		if (!$log){
      header("location:http://localhost/php/BookCloud?FalloLogin") ;
    } 
  }

  if ($sesion->checkActiveSession()) {

    $sesion->redirect("./src/main.php");

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
    
    <link rel="stylesheet" type="text/css" href="src/css/main.css" />

  </head>

  <body>
  <div class="titulo">
    BookCloud
  </div>

  <!-- Formulario de login -->
  <div class="login">

    <form method="post">
      <div class="form-group">
        <label for="">Usuario</label>
        <input type="text" class="form-control" name="usuario" aria-describedby="helpId">
      </div>
      <div class="form-group">
        <label for="">Contraseña</label>
        <input type="password" class="form-control" name="pass" aria-describedby="helpId">
      </div>
      <button type="submit" class="btn btn-dark">Login</button> 
      <!-- Llamada al formulario de registro -->
      <a class="btn btn-secondary" href="src\forms\registro.php" role="button">Registro</a>
    </form>
      

    <!-- Mensajes de error o exito -->
    <?php
      if (isset($_GET["exitoRegistro"])){
        echo "<div class=\"alert alert-success\" role=\"alert\">
        Registro completado con exito!</div>" ;
      }

      if (isset($_GET["FalloLogin"])){
        echo "<div class=\"alert alert-danger\" role=\"alert\">
        Usuario o contraseña incorrectos</div>" ;
      }

      if (isset($_GET["SesionCaducada"])){
        echo "<div class=\"alert alert-danger\" role=\"alert\">
        Tu sesión a caducado</div>" ;
      }



		?>
    
    
    
  </div>
      


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/js/bootstrap.min.js" integrity="sha384-o+RDsa0aLu++PJvFqy8fFScvbHFLtbvScb8AjopnFD+iEQ7wo/CG0xlczd+2O/em" crossorigin="anonymous"></script>
  </body>
</html>