<?php 
        session_start();
        //validamos de que alla una sesion active
        if (isset($_SESSION['login']) && $_SESSION['login']==true) {
        	$id_name = $_SESSION['idname'];
        	$tipo_usu = $_SESSION['nivel'];
            }
            else{
                echo "<script> 
                alert('no puedes acceder')
                window.location='../'
                </script>";
                exit;
            }
            
include("../conetion.php");



header("Content-type: text/html; charset=utf8"); ?>


<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
	<title>Panel</title>
	<link rel="stylesheet" href="../css/style2.css">
	<link href="../css/bootstrap.css" rel="stylesheet">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<style>
		h1{
			text-align: center;
			margin-top: 100px;
		}
		body {
			background: none;
		}
		p {
			text-align: center;
		}
	</style>


                      
</head>
<body style="width: 95%!important">

<?php 

if ($tipo_usu == "Administrador") {

	$user = $conexion->query("SELECT * FROM coach WHERE id = ".$id_name);
	$row = $user->fetch_assoc();
	$name_user = $row['name'];

?>
	<div class="alert alert-success" role="alert">
	  <h1>Bienvenid@ de vuelta <strong><i><?php echo $name_user; ?></i></strong></h1>
	  <p style="font-size: 14px;" align="center"><b>Beta v1.3.4</b></p>
	  <p style="font-size: 14px;"><?php echo $tipo_usu; ?></p>

	</div>

<?php 

} elseif ($tipo_usu == "Lider") {


	$user2 = $conexion->query("SELECT * FROM coach WHERE id = ".$id_name);
	$row2 = $user2->fetch_assoc();
	$name_user = $row2['name'];
	$id_coach = $row2['id_coach'];

?>
	<div class="alert alert-success" role="alert">
	  <h1>Bienvenid@ de vuelta <strong><i><?php echo $name_user; ?></i></strong></h1>
	  <p align="center"><b>Beta v1.3.4</b></p>
	  <p><?php echo $tipo_usu; ?></p>

	</div>

<?php 

}  elseif ($tipo_usu == "Usuario") {


	$user2 = $conexion->query("SELECT * FROM coachleads WHERE id = ".$id_name);
	$row2 = $user2->fetch_assoc();
	$name_user = $row2['name'];
	$id_coach = $row2['id_coach'];

	$refer = $conexion->query("SELECT * FROM coach WHERE id = ".$id_coach);
	$row3 = $refer->fetch_assoc();
	$name_coach = $row3['name'];

?>
	<div class="alert alert-success" role="alert">
	  <h1>Bienvenid@ de vuelta <strong><i><?php echo $name_user; ?></i></strong></h1>
	  <p align="center"><b>Beta v1.3.4</b></p>
	  <p><?php echo $tipo_usu; ?></p>

	  <h3>Referred to: <strong><?php echo $name_coach; ?></strong></h3>

	</div>

<?php 

}

 ?>


<div class="row" style="margin-left: 0px!important">
	<div class="col-md-3">
		<table align="center">
			<tr>
				<td class="downline text-center">
					<i class="fa fa-users" aria-hidden="true"></i>
					Bajo Linea &nbsp;&nbsp;&nbsp;&nbsp;
					<?php 
						$search1 = $conexion->query("SELECT * FROM coachleads WHERE id_coach = ".$id_name);
						$downline = $search1->num_rows;

						echo "<font size='5'>" . $downline . "</font>";
				 	?>
				</td>
			</tr>
			<tr>
				<td>
					&nbsp;&nbsp;&nbsp;&nbsp;
				</td>
			</tr>
			<tr>
				<td class="downline text-center">
					<i class="fa fa-desktop" aria-hidden="true"></i>
					Capturadoras &nbsp;&nbsp;&nbsp;&nbsp;
					<?php 
						$search1 = $conexion->query("SELECT * FROM webcoach WHERE coach = ".$id_name);
						$downline = $search1->num_rows;

						echo "<font size='5'>" . $downline . "</font>";
				 	?>
				</td>
			</tr>
		</table>
	</div>
	<div class="col-md-6">
		<h3 align="center"><b><i>Frase Motivacional del día</i></b></h3><br>
		<h4 style="margin-top:0px;">
			<?php 
			
			$search = $conexion->query("SELECT * FROM phrases ORDER BY rand()");
			$row = $search->fetch_assoc();
			$phrase = $row['phrase'];

			echo utf8_encode($phrase);

			?>
		</h4>
	</div>
	<div class="col-md-2 ipv4">
		<div class="panel-title text-center">
			<i class="fa fa-desktop" aria-hidden="true"></i> Últimas Conexiones
		</div>
		<div class="connections text-center">
			<?php

			$lastconex = $conexion->query("SELECT * FROM auditoria WHERE user = ".$id_name." ORDER BY `fecha` DESC");
			$row4 = $lastconex->fetch_assoc();
			$last_conex = $row4['ipv4'];
			$fecha = $row4['fecha'];


			echo "Su última conexión: <br>IP:<b>" . $last_conex . "<br>";
			echo $fecha;



			 ?>
		</div>
	</div>
</div>













	
	<div class="alert alert-danger text-center" role="alert">
	  <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
	  <span class="sr-only">Error:</span>
	  No actuailice o refresque <span class="glyphicon glyphicon-refresh" aria-hidden="true"></span> las páginas, utilice la barra de Navegación.
	</div>
	<br><br><br>
	




</body>
</html>