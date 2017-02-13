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
		
	?>


<!DOCTYPE html>
<html>
<head>
	<title>CK Editor</title>
	<!-- Rick Text Editor -->
	<script type="text/javascript" src="ckeditor.js"></script>

	<!-- Bootstrap 3.3.7-->
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/bootstrap-theme.min.css">
	<script type="text/javascript" src="js/bootstrap.min.js"></script>

	<!-- Font Awesome -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<style>
		hr{
			height: 1px;
		    background-color:#c8c8c8;
		    margin-top: 20px;
		    margin-bottom: 20px;
		}
	</style>
</head>
<body>
	<div class="container">
		<h1 align="center">Contactos y envio de Correos</h1>
		<div class="jumbotron">

			<div class="row">
				<div class="col-xs-4">
				<?php 
				$result = $conexion->query("SELECT * FROM emails WHERE id_coach = ".$id_name);
				if ($result->num_rows > 0) {
					$Prospectos = $result->num_rows;
				}else{
					$Prospectos = 0;
				}
				 ?>
					<h3><b>Total Prospectos: <font color="yellowgreen" style="-webkit-text-stroke: 1px black; -webkit-text-stroke-width: 1px; -webkit-text-stroke-color: black;"><?php echo $Prospectos; ?></font></b></h3>
					<hr >

					<div class="form-group">
						<a href="" onClick="alert('en mantenimiento!')" class="btn btn-success"><i class="fa fa-plus"></i> Registrar Nuevo Prospecto</a>
					</div>
					<div class="form-group">
						<a href="" onClick="alert('en mantenimiento!')" class="btn btn-info"><i class="fa fa-upload"></i> Importar Lista de Correo</a>
					</div>
					<div class="form-group">
						<a href="export_csv.php" class="btn btn-info"><i class="fa fa-download"></i> Descargar Lista de Correo</a>
					</div>
				</div>

				<div class="col-xs-4">
					<h3 class="text-center"><b>Enviar Correos a:</b></h3>
					<hr >
					<div class="form-group">
						<a href="form1.php" class="btn btn-success"><i class="fa fa-envelope"></i> Personal Email</a>
					</div>
					
					<div class="form-group">
						<label for="web" class="control-label">Seleccione Lista de Prospectos</label>
						<select name="web" id="web" class="form-control" onchange="location='form2.php?lista='+this.value" required>
						  <option value="">Seleccione una opción</option>
						  <option value="3daytrial">3 day trial - USA</option>
						  <option value="3dt">3 day trial - Colómbia</option>
						  <option value="7diastrial">Paquete de 7 días</option>
						  <option value="FitCamp">Fit Camp - USA</option>
						  <option value="Fitcamp">Fit Camp - Colómbia</option>
						  <option value="rdfitcamp">Fit Camp - República Dominicana</option>
						  <option value="BodyScan">Body Scan - USA</option>
						  <option value="bodyscan">Body Scan - Colómbia</option>
						  <option value="rdBodyscan">Body Scan - República Dominicana</option>
						  <option value="Collagen">Collagen</option>
						  <option value="5">5</option>
						</select>
					</div>
					<div class="form-group">
						<a href="" onClick="alert('en mantenimiento!')" class="btn btn-success"><i class="fa fa-envelope"></i> Enviar a todos</a>
					</div>
					
				</div>

				<div class="col-xs-4">
					<h3><b>Mis Mensajes</b></h3>
					<hr >
					<div class="form-group">
						<a href="" onClick="alert('en mantenimiento!')" class="btn btn-success"><i class="fa fa-plus"></i> Crear Nuevo Mensaje</a>
					</div>
					<div class="form-group">
						<a href="" onClick="alert('en mantenimiento!')" class="btn btn-success"><i class="fa fa-save"></i> Mensajes Guardados</a>
					</div>
					<div class="form-group">
						<a href="" onClick="alert('en mantenimiento!')" class="btn btn-success"><i class="fa fa-eraser"></i> Mensajes en Borrador</a>
					</div>
				</div>
			</div>

		</div>
	</div>
	  
<div class="container text-center">
	<h3>Mensajes Enviados</h3>

	<?php 

	$search = $conexion->query("SELECT * FROM messagesend WHERE id_coach = ".$id_name);
	if ($search->num_rows > 0) {
		?>

		<table class="table table-bordered table-hover">
			<tr>
				<td width="3%"><b>ID</b></td>
				<td width="10%"><b>Fecha</b></td>
				<td><b>Enviardo a</b></td>
				<td style="width: 30%!important"><b>Mensaje</b></td>
				<td width="30%"><b>Acción</b></td>
			</tr>
			<?php $id = 0;
			while ($row = $search->fetch_assoc()) {               
		        $id = $id + 1;

			echo '<tr>';
				echo '<td>' .  $id . '</td>';
				echo '<td>' .  $row['fecha'] . '</td>';
				echo '<td>' .  $row['send_to'] . '</td>';
				echo '<td>' .  $row['message'] . '</td>';
				echo '<td>';
					echo '<a href="" class="btn btn-info"><i class="fa fa-pencil"></i> Editar</a>&nbsp;';
					echo '<a href="" class="btn btn-success"><i class="fa fa-envelope-o"></i> Reenviar</a>&nbsp;';
					echo '<a href="" class="btn btn-danger"><i class="fa fa-trash"></i> Eliminar</a>';
				echo '</td>';
			echo '</tr>';
			}
		    ?>
		</table>

	<?php 

	}else {
		echo '<div class="alert alert-info"><h3>Bandeja de Envios Vacia</h3></div>';
	}

	 ?>
	
</div>


</body>
</html>