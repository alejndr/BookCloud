<!doctype html>
<html lang="en">
  <head>
    <title>BookCloud</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/css/bootstrap.min.css" integrity="sha384-Smlep5jCw/wG7hdkwQ/Z5nLIefveQRIY9nfy6xoR1uRYBtpZgI6339F5dgvm/e9B" crossorigin="anonymous">
    
    <link rel="stylesheet" type="text/css" href="BookCloud\src\css\main.css" />

    <style>
      body{
      margin: 0 auto;      
      }

      .login{
      position:absolute;
      left: 40%;
      top: 25%;
      width: 300px;
      height: 210px;
      text-align: center;
      }

      .titulo{
      position: absolute;
      left: 40%;
      font-size: 4em;
      font-weight: bold;
      }

      .alert{
        position: absolute;
        margin: 5%;
        
      }

    </style>

    <script>
		
    // Al cambiar el ultimo campo del formulario cambia el flag a true
    // para indicar que ya puede hacerse el registro
		function registrado() {
			document.getElementById("flag").value = "true" ;
		}

	  </script>


</head>
  <body>
  <div class="titulo">
    BookCloud
  </div>

    

  <div class="login">
    <form method="post">

      <input type="hidden" id="flag" name="flag" value="false" />

            
      <div class="form-group">
        <label for="">Usuario</label>
        <input type="text" class="form-control" value="<?= $usuario ?>" name="usuario" maxlength="100"  required aria-describedby="helpId">
      </div>

      <div class="form-group">
        <label for="">Contraseña</label>
        <input type="password" class="form-control" name="pass" maxlength="100" required aria-describedby="helpId">
      </div>

      <div class="form-group">
        <label for="">Nombre</label>
        <input type="text" class="form-control" value="<?= $nombre ?>" name="nombre" maxlength="100" required aria-describedby="helpId">
      </div>

      <div class="form-group">
        <label for="">Apellido</label>
        <input type="text" class="form-control" value="<?= $apellido ?>" name="apellido" maxlength="100" required aria-describedby="helpId">
      </div>

      <div class="form-group">
        <label for="">Email</label>
        <input type="email" class="form-control" value="<?= $email ?>" onchange="registrado()" name="email" maxlength="100" required aria-describedby="helpId">
      </div>

      <button type="submit"  class="btn btn-dark">Registrarse</button>
      <a class="btn btn-danger" href="../../" role="button">Volver</a>
      
      <div class="error" >
			<?= isset($err)?"<div class=\"alert alert-danger\" role=\"alert\">$err</div>":"" ?>
		</div>

    </form>

    
    
    
  </div>
      


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/js/bootstrap.min.js" integrity="sha384-o+RDsa0aLu++PJvFqy8fFScvbHFLtbvScb8AjopnFD+iEQ7wo/CG0xlczd+2O/em" crossorigin="anonymous"></script>
  </body>
</html>