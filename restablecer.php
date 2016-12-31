<?php 
	$token = $_GET['token'];
	$idusuario = $_GET['idusuario'];
	
	include("conetion.php");

	$sql = "SELECT * FROM tblreseteopass WHERE token = '$token'";
	$resultado = $conexion->query($sql);
	
	if( $resultado->num_rows > 0 ){
		$usuario = $resultado->fetch_assoc();

		if( sha1($usuario['idusuario']) == $idusuario ){
?>
<!DOCTYPE html>
<html >
  <head>
    <meta charset="UTF-8">
    <title>Herbalife Coach WebApp</title>
    <link href='http://fonts.googleapis.com/css?family=Titillium+Web:400,300,600' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="css/normalize.css">
        <link rel="stylesheet" href="css/style.css">
    <style>
      .forgot {
        text-align: right;
      }
    </style>

  </head>

  <body>

    <div class="form">
      <h1>Cambiar Contraseña</h1>
        <form action="cambiarpassword.php" method="post">
        <div class="field-wrap">
          <label>
            Nueva contraseña <span class="req">*</span>
          </label>
          <input type="password" name="password1" required  autocomplete="off">
        </div>
        <div class="field-wrap">
          <label>
            Confirmar contraseña <span class="req">*</span>
          </label>
          <input type="password" name="password2" required  autocomplete="off">
        </div>
        <input type="hidden" name="token" value="<?php echo $token; ?>">
        <input type="hidden" name="idusuario" value="<?php echo $idusuario; ?>">

        <input type="submit" class="button button-block" value="Cambiar contraseña" >
        </form>
    </div>
  </body>
</html>
<script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
        <script src="js/index.js"></script>
<?php
		}
		else{
			header('Location:index.php');
		}
	}
	else{
    echo '<script> alert("Token ha expirado.");
        history.back(); </script>';
		header('Location:index.php');
	}
?>