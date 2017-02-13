<?php 

$password1 = $_POST['password1'];
$password2 = $_POST['password2'];
$idusuario = $_POST['idusuario'];
$token = $_POST['token'];

if( $password1 != "" && $password2 != "" && $idusuario != "" && $token != "" ){
?>
<!DOCTYPE html>
<html lang="es">
  <head>
    <meta name="author" content="denker">
    <title> Restablecer contraseña </title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/bootstrap-theme.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
  </head>

  <body>
    <div class="container" role="main">
      <div class="col-md-2"></div>
      <div class="col-md-8">
<?php

	
	include("conetion.php");
	$consulta = "SELECT * FROM tblreseteopass WHERE token = '$token'";

	$resultado = $conexion->query($consulta);
	if( $resultado->num_rows > 0 ){
		$usuario = $resultado->fetch_assoc();
		if( sha1( $usuario['idusuario'] === $idusuario ) ){
			if( $password1 === $password2 ){
				$sql = "UPDATE users SET pass = '".md5($password1)."' WHERE id = ".$usuario['idusuario'];
				$resultado = $conexion->query($sql);
				if($resultado){
					$sql = "DELETE FROM tblreseteopass WHERE token = '$token';";
					$resultado = $conexion->query( $sql );
				?>
					<p> <script>alert("La contraseña se actualizó con exito.")</script> </p>
				<?php
				header('Location:index.php');
				}else{
				?>
					<p> <script>alert("Ocurrió un error al actualizar la contraseña, intentalo más tarde")</script> </p>
				<?php
				header('Location:index.php');
				}
			}
			else{
			?>
			<p> <script>alert("Las contraseñas no coinciden")</script> </p>
			<?php
			header('Location:index.php');
			}

		}else{
			?>
			<p> <script>alert("El token no es válido")</script> </p>
			<?php
			header('Location:index.php');
		}	
	}else{
		?>
		<p> <script>alert("El token no es válido")</script> </p>
		<?php
		header('Location:index.php');
	}
	?>
	</div>
	<div class="col-md-2"></div>
		</div> <!-- /container -->
	<script src="js/jquery-1.11.1.js"></script>
	<script src="js/jquery.min.js"></script>
	    <script src="js/bootstrap.min.js"></script>
	  </body>
	</html>
<?php
}
else{
	header('Location:index.php');
}
?>