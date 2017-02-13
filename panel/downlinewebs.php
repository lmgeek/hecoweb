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
	h4 {
		font-weight: bold;
	}
	a {
		color: #3498db!important;
		font-size: 14px;
	}
</style>

</head>
<body style="width: 95%!important;">

<div class="container" style="margin-top: 20px;">
	<h3 align="center"><i class="fa fa-globe"></i> Sitios Bajo Linea</h3>
	<br>
	<center>
		<input type="button" value="VOLVER ATRÁS" name="Back2" onclick="history.back()"  class="btn btn-success" />
	</center>
<br>

<?php 

if (isset($_GET['downline']) && !empty($_GET['downline'])) {

	$id_downline = $_GET['downline'];


	$search1 = $conexion->query("SELECT * FROM coachleads WHERE id = ".$id_downline);
	$row1 = $search1->fetch_assoc();
	$name = $row1['name'];

	echo "<center><h2>" . $name . "</h2>";
	echo '<a href="perfildownline.php?id='.$coach_id.'"  class="btn btn-success" style="color:#fff!important;"><i class="fa fa-search-plus"></i>&nbsp;&nbsp;&nbsp; Perfil</a></center><br><br>';


	$search = $conexion->query("SELECT * FROM webcoach WHERE coach = '".$id_downline."' ORDER BY web ASC");

	if ($search->num_rows>0) {
		while ($row = $search->fetch_assoc()) { 

			$sites = $row['web'];
			$url = $row['folder'];
			$dirname =$row['dir_name'];
			$coach_id = $row['id'];

			if ($sites == "3daytrial") {
			?>
			<div class="row">
				<div class="col-md-12" style="background-color: #ffffff; margin-bottom: 20px;border-radius: 5px">
					<div class="col-md-3 " style="padding: 5px 0">
						<img src="../images/3daytrial-2.png" alt="" width="100%">
					</div>
					<div class="col-md-9 " style="padding-right: 0px;">
						<h4>Reto de 3 días (Version USA - United States)</h4>
						<?php 
						$host= $_SERVER["HTTP_HOST"];
						//$url= $_SERVER["REQUEST_URI"];
						$web = 'http://' . $host . "/3daytrial/" . $url . "/";
						$search1 = $conexion->query("SELECT * FROM emails WHERE id_coach = ".$id_downline." AND web='3daytrial'");
						$captures = $search1->num_rows;
						$search2 = $conexion->query("SELECT * FROM visitas WHERE enlace LIKE '%".$web."%'");
						if ($search2->num_rows>0) {
							while ($visita = $search2->fetch_assoc()){
								$visitas = $visita['visitas'] + $visitas;
							}
						}else{
							$visitas = "0";
						}
						?>
						<a href="<?php echo $web; ?>" target="_blank"><?php echo $web; ?></a>
						<h4>Comparte esta Capturadora en:</h4>
						<div>
							<a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo $web; ?>" target="_blank">
								<button type="button" class="btn btn-info shared-facebook" >
							       <span class="fa fa-facebook"></span> 
							    </button>
						    </a>
						    <a href="https://twitter.com/?status=Me gusta esta página <?php echo $web; ?> " target="_blank">
							    <button type="button" class="btn btn-info shared-twitter" >
							       <span class="fa fa-twitter"></span> 
							    </button>
						    </a>
						    <a href="https://plus.google.com/share?url=<?php echo $web; ?>" target="_blank">
							    <button type="button" class="btn btn-info shared-google" >
							       <span class="fa fa-google-plus"></span> 
							    </button>
						    </a>
						    <a href="http://www.linkedin.com/shareArticle?url=<?php echo $web; ?>" target="_blank">
							    <button type="button" class="btn btn-info shared-link" >
							       <span class="fa fa-linkedin"></span> 
							    </button>
						    </a>
						    <a href="mailto:?subject=Check%20Out%20My%20Link&amp;body=Check%20Out%20My%20Link%20at%20<?php echo $web; ?>" target="_blank">
							    <button type="button" class="btn btn-info shared-email" >
							       <span class="fa fa-envelope"></span> 
							    </button>
						    </a>
						</div>
						<br><br>
						<div>
							<button class="btn btn-success" style="font-weight: bold;">Visitas:&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $visitas; ?>&nbsp;&nbsp;+</button>
							<button class="btn btn-success" style="font-weight: bold;">Prospectos:&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $captures; ?>&nbsp;&nbsp;+</button>
							<?php 
							echo '<a href="../class/deletewebsite.php?id='.$coach_id.'&dirname='.$id_downline.'" onclick="return confirmar(\'¿Are you sure to delete the registry?\')" class="btn btn-danger" style="color:#fff!important;"><i class="glyphicon glyphicon-trash"></i> Delete Web</a>&nbsp;&nbsp;';
							echo '<a href="../email/export_csv2.php?web=3daytrial&id_name='.$id_downline.'" class="btn btn-info" style="color: #fff!important;"><i class="fa fa-download"></i> Descargar Mail list</a>';
							 ?>
							
						</div>
					</div>
				</div>
			</div>
		<?php
		}
		if ($sites == "3dt") {
			?>
			<div class="row">
				<div class="col-md-12" style="background-color: #ffffff; margin-bottom: 20px;border-radius: 5px">
					<div class="col-md-3 " style="padding: 5px 0">
						<img src="../images/3daytrial-2.png" alt="" width="100%">
					</div>
					<div class="col-md-9 " style="padding-right: 0px;">
						<h4>Reto de 3 días (Version Colómbia)</h4>
						<?php 
						$host= $_SERVER["HTTP_HOST"];
						//$url= $_SERVER["REQUEST_URI"];
						$web = 'http://' . $host . "/3dt/" . $url . "/";
						$search1 = $conexion->query("SELECT * FROM emails WHERE id_coach = ".$id_downline." AND web='3dt'");
						$captures = $search1->num_rows;
						$search2 = $conexion->query("SELECT * FROM visitas WHERE enlace LIKE '%".$web."%'");
						if ($search2->num_rows>0) {
							while ($visita = $search2->fetch_assoc()){
								$visitas = $visita['visitas'] + $visitas;
							}
						}else{
							$visitas = "0";
						}
						?>
						<a href="<?php echo $web; ?>" target="_blank"><?php echo $web; ?></a>
						<h4>Comparte esta Capturadora en:</h4>
						<div>
							<a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo $web; ?>" target="_blank">
								<button type="button" class="btn btn-info shared-facebook" >
							       <span class="fa fa-facebook"></span> 
							    </button>
						    </a>
						    <a href="https://twitter.com/?status=Me gusta esta página <?php echo $web; ?> " target="_blank">
							    <button type="button" class="btn btn-info shared-twitter" >
							       <span class="fa fa-twitter"></span> 
							    </button>
						    </a>
						    <a href="https://plus.google.com/share?url=<?php echo $web; ?>" target="_blank">
							    <button type="button" class="btn btn-info shared-google" >
							       <span class="fa fa-google-plus"></span> 
							    </button>
						    </a>
						    <a href="http://www.linkedin.com/shareArticle?url=<?php echo $web; ?>" target="_blank">
							    <button type="button" class="btn btn-info shared-link" >
							       <span class="fa fa-linkedin"></span> 
							    </button>
						    </a>
						    <a href="mailto:?subject=Check%20Out%20My%20Link&amp;body=Check%20Out%20My%20Link%20at%20<?php echo $web; ?>" target="_blank">
							    <button type="button" class="btn btn-info shared-email" >
							       <span class="fa fa-envelope"></span> 
							    </button>
						    </a>
						</div>
						<br><br>
						<div>
							<button class="btn btn-success" style="font-weight: bold;">Visitas:&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $visitas; ?>&nbsp;&nbsp;+</button>
							<button class="btn btn-success" style="font-weight: bold;">Prospectos:&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $captures; ?>&nbsp;&nbsp;+</button>
							<?php 
							echo '<a href="../class/deletewebsite.php?id='.$coach_id.'&dirname='.$id_downline.'" onclick="return confirmar(\'¿Are you sure to delete the registry?\')" class="btn btn-danger" style="color:#fff!important;"><i class="glyphicon glyphicon-trash"></i> Delete Web</a>&nbsp;&nbsp;';
							echo '<a href="../email/export_csv2.php?web=3dt&id_name='.$id_downline.'" class="btn btn-info" style="color: #fff!important;"><i class="fa fa-download"></i> Descargar Mail list</a>';
							 ?>
							
						</div>
					</div>
				</div>
			</div>
		<?php 
		}

		if ($sites == "rd3dt") {
			?>
			<div class="row">
				<div class="col-md-12" style="background-color: #ffffff; margin-bottom: 20px;border-radius: 5px">
					<div class="col-md-3 " style="padding: 5px 0">
						<img src="../images/3daytrial-2.png" alt="" width="100%">
					</div>
					<div class="col-md-9 " style="padding-right: 0px;">
						<h4>Reto de 3 días (Version Rep&uacuteblica Dominicana)</h4>
						<?php 
						$host= $_SERVER["HTTP_HOST"];
						//$url= $_SERVER["REQUEST_URI"];
						$web = 'http://' . $host . "/rf3dt/" . $url . "/";
						$search1 = $conexion->query("SELECT * FROM emails WHERE id_coach = ".$id_downline." AND web='rd3dt'");
						$captures = $search1->num_rows;
						$search2 = $conexion->query("SELECT * FROM visitas WHERE enlace LIKE '%".$web."%'");
						if ($search2->num_rows>0) {
							while ($visita = $search2->fetch_assoc()){
								$visitas = $visita['visitas'] + $visitas;
							}
						}else{
							$visitas = "0";
						}
						?>
						<a href="<?php echo $web; ?>" target="_blank"><?php echo $web; ?></a>
						<h4>Comparte esta Capturadora en:</h4>
						<div>
							<a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo $web; ?>" target="_blank">
								<button type="button" class="btn btn-info shared-facebook" >
							       <span class="fa fa-facebook"></span> 
							    </button>
						    </a>
						    <a href="https://twitter.com/?status=Me gusta esta página <?php echo $web; ?> " target="_blank">
							    <button type="button" class="btn btn-info shared-twitter" >
							       <span class="fa fa-twitter"></span> 
							    </button>
						    </a>
						    <a href="https://plus.google.com/share?url=<?php echo $web; ?>" target="_blank">
							    <button type="button" class="btn btn-info shared-google" >
							       <span class="fa fa-google-plus"></span> 
							    </button>
						    </a>
						    <a href="http://www.linkedin.com/shareArticle?url=<?php echo $web; ?>" target="_blank">
							    <button type="button" class="btn btn-info shared-link" >
							       <span class="fa fa-linkedin"></span> 
							    </button>
						    </a>
						    <a href="mailto:?subject=Check%20Out%20My%20Link&amp;body=Check%20Out%20My%20Link%20at%20<?php echo $web; ?>" target="_blank">
							    <button type="button" class="btn btn-info shared-email" >
							       <span class="fa fa-envelope"></span> 
							    </button>
						    </a>
						</div>
						<br><br>
						<div>
							<button class="btn btn-success" style="font-weight: bold;">Visitas:&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $visitas; ?>&nbsp;&nbsp;+</button>
							<button class="btn btn-success" style="font-weight: bold;">Prospectos:&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $captures; ?>&nbsp;&nbsp;+</button>
							<?php 
							echo '<a href="../class/deletewebsite.php?id='.$coach_id.'&dirname='.$id_downline.'" onclick="return confirmar(\'¿Are you sure to delete the registry?\')" class="btn btn-danger" style="color:#fff!important;"><i class="glyphicon glyphicon-trash"></i> Delete Web</a>&nbsp;&nbsp;';
							echo '<a href="../email/export_csv2.php?web=rd3dt&id_name='.$id_downline.'" class="btn btn-info" style="color: #fff!important;"><i class="fa fa-download"></i> Descargar Mail list</a>';
							 ?>
							
						</div>
					</div>
				</div>
			</div>
		<?php 
		}

		if ($sites == "7diastrial") {
			?>
			<div class="row">
				<div class="col-md-12" style="background-color: #ffffff; margin-bottom: 20px;border-radius: 5px">
					<div class="col-md-3 " style="padding: 5px 0">
						<img src="../images/7daytrial-2.png" alt="" width="100%">
					</div>
					<div class="col-md-9 " style="padding-right: 0px;">
						<h4>Reto de 7 días (Latinoamerica)</h4>
						<?php 
						$host= $_SERVER["HTTP_HOST"];
						//$url= $_SERVER["REQUEST_URI"];
						$web = 'http://' . $host . "/7diastrial/" . $url;
						$search1 = $conexion->query("SELECT * FROM emails WHERE id_coach = '".$id_downline."' AND web='7diastrial'");
						$captures = $search1->num_rows;
						$search2 = $conexion->query("SELECT * FROM visitas WHERE enlace LIKE '%".$web."%'");
						if ($search2->num_rows>0) {
							while ($visita = $search2->fetch_assoc()) {
								$visitas = $visita['visitas']+$visitas;
							}
							
						}else{
							$visitas = "0";
						}
						?>
						<a href="<?php echo $web; ?>" target="_blank"><?php echo $web; ?></a>
						<h4>Comparte esta Capturadora en:</h4>
						<div>
							<a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo $web; ?>" target="_blank">
								<button type="button" class="btn btn-info shared-facebook" >
							       <span class="fa fa-facebook"></span> 
							    </button>
						    </a>
						    <a href="https://twitter.com/?status=Me gusta esta página <?php echo $web; ?> " target="_blank">
							    <button type="button" class="btn btn-info shared-twitter" >
							       <span class="fa fa-twitter"></span> 
							    </button>
						    </a>
						    <a href="https://plus.google.com/share?url=<?php echo $web; ?>" target="_blank">
							    <button type="button" class="btn btn-info shared-google" >
							       <span class="fa fa-google-plus"></span> 
							    </button>
						    </a>
						    <a href="http://www.linkedin.com/shareArticle?url=<?php echo $web; ?>" target="_blank">
							    <button type="button" class="btn btn-info shared-link" >
							       <span class="fa fa-linkedin"></span> 
							    </button>
						    </a>
						    <a href="mailto:?subject=Check%20Out%20My%20Link&amp;body=Check%20Out%20My%20Link%20at%20<?php echo $web; ?>" target="_blank">
							    <button type="button" class="btn btn-info shared-email" >
							       <span class="fa fa-envelope"></span> 
							    </button>
						    </a>
						    <a href="#" target="_blank" data-toggle="popover" data-trigger="hover" data-content="Crear Codigo QR" onClick="alert('en mantenimiento!')">
							    <button type="button" class="btn btn-info shared-twitter" >
							       <span class="fa fa-qrcode"></span> 
							    </button>
						    </a>
						</div>
						<br><br>
						<div>
							<button class="btn btn-success" style="font-weight: bold;">Visitas:&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $visitas; ?>&nbsp;&nbsp;+</button>
							<button class="btn btn-success" style="font-weight: bold;">Prospectos:&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $captures; ?>&nbsp;&nbsp;+</button>
							<?php 
							echo '<a href="../class/deletewebsite.php?id='.$coach_id.'&dirname='.$id_downline.'" onclick="return confirmar(\'¿Are you sure to delete the registry?\')" class="btn btn-danger" style="color:#fff!important;"><i class="glyphicon glyphicon-trash"></i> Delete Web</a>&nbsp;&nbsp;';
							echo '<a href="../email/export_csv2.php?web=7diastrial&id_name='.$id_downline.'" class="btn btn-info" style="color: #fff!important;"><i class="fa fa-download"></i> Descargar Mail list</a>';
							 ?>
							
						</div>
					</div>
				</div>
			</div>
		<?php 
		}

		if ($sites == "rd7dt") {
			?>
			<div class="row">
				<div class="col-md-12" style="background-color: #ffffff; margin-bottom: 20px;border-radius: 5px">
					<div class="col-md-3 " style="padding: 5px 0">
						<img src="../images/7daytrial-2.png" alt="" width="100%">
					</div>
					<div class="col-md-9 " style="padding-right: 0px;">
						<h4>Reto de 7 días (Version Rep&uacuteblica Dominicana)</h4>
						<?php 
						$host= $_SERVER["HTTP_HOST"];
						//$url= $_SERVER["REQUEST_URI"];
						$web = 'http://' . $host . "/rd7dt/" . $url;
						$search1 = $conexion->query("SELECT * FROM emails WHERE id_coach = ".$id_downline." AND web='rd7dt'");
						$captures = $search1->num_rows;
						$search2 = $conexion->query("SELECT * FROM visitas WHERE enlace LIKE '%".$web."%'");
						if ($search2->num_rows>0) {
							while ($visita = $search2->fetch_assoc()){
								$visitas = $visita['visitas'] + $visitas;
							}
						}else{
							$visitas = "0";
						}
						?>
						<a href="<?php echo $web; ?>" target="_blank"><?php echo $web; ?></a>
						<h4>Comparte esta Capturadora en:</h4>
						<div>
							<a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo $web; ?>" target="_blank">
								<button type="button" class="btn btn-info shared-facebook" >
							       <span class="fa fa-facebook"></span> 
							    </button>
						    </a>
						    <a href="https://twitter.com/?status=Me gusta esta página <?php echo $web; ?> " target="_blank">
							    <button type="button" class="btn btn-info shared-twitter" >
							       <span class="fa fa-twitter"></span> 
							    </button>
						    </a>
						    <a href="https://plus.google.com/share?url=<?php echo $web; ?>" target="_blank">
							    <button type="button" class="btn btn-info shared-google" >
							       <span class="fa fa-google-plus"></span> 
							    </button>
						    </a>
						    <a href="http://www.linkedin.com/shareArticle?url=<?php echo $web; ?>" target="_blank">
							    <button type="button" class="btn btn-info shared-link" >
							       <span class="fa fa-linkedin"></span> 
							    </button>
						    </a>
						    <a href="mailto:?subject=Check%20Out%20My%20Link&amp;body=Check%20Out%20My%20Link%20at%20<?php echo $web; ?>" target="_blank">
							    <button type="button" class="btn btn-info shared-email" >
							       <span class="fa fa-envelope"></span> 
							    </button>
						    </a>
						    <a href="#" target="_blank" data-toggle="popover" data-trigger="hover" data-content="Crear Codigo QR" onClick="alert('en mantenimiento!')">
							    <button type="button" class="btn btn-info shared-twitter" >
							       <span class="fa fa-qrcode"></span> 
							    </button>
						    </a>
						</div>
						<br><br>
						<div>
							<button class="btn btn-success" style="font-weight: bold;">Visitas:&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $visitas; ?>&nbsp;&nbsp;+</button>
							<button class="btn btn-success" style="font-weight: bold;">Prospectos:&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $captures; ?>&nbsp;&nbsp;+</button>
							<?php 
							echo '<a href="../class/deletewebsite.php?id='.$coach_id.'&dirname='.$id_downline.'" onclick="return confirmar(\'¿Are you sure to delete the registry?\')" class="btn btn-danger" style="color:#fff!important;"><i class="glyphicon glyphicon-trash"></i> Delete Web</a>&nbsp;&nbsp;';
							echo '<a href="../email/export_csv2.php?web=3daytrial&id_name='.$id_downline.'" class="btn btn-info" style="color: #fff!important;"><i class="fa fa-download"></i> Descargar Mail list</a>';
							 ?>
							<?php 
							echo '<a href="../class/deletewebsite.php?id='.$coach_id.'&dirname='.$id_downline.'" onclick="return confirmar(\'¿Are you sure to delete the registry?\')" class="btn btn-danger" style="color:#fff!important;"><i class="glyphicon glyphicon-trash"></i> Delete Web</a>';
							 
							 echo '<a href="../email/export_csv2.php?web=rd7dt&id_name='.$coach_id.'" class="btn btn-info" style="color: #fff!important;"><i class="fa fa-download"></i> Descargar Mail list</a>';
							 ?>
						</div>
					</div>
				</div>
			</div>
		<?php 
		}


		if ($sites == "FitCamp") {
			?>
			<div class="row">
				<div class="col-md-12" style="background-color: #ffffff; margin-bottom: 20px;border-radius: 5px">
				<div class="col-md-3 " style="padding: 5px 0">
					<img src="../images/fitcamp-3.png" alt="" width="100%">
				</div>
				<div class="col-md-9 " style="padding-right: 0px;">
					<h4>Fitness Camp (Versión USA)</h4>
					<?php 
					$host= $_SERVER["HTTP_HOST"];
					//$url= $_SERVER["REQUEST_URI"];
					$web = 'http://' . $host . "/FitCamp/" . $url . "/";

					$search1 = $conexion->query("SELECT * FROM emails WHERE id_coach = ".$id_downline." AND web='FitCamp'");
					$captures = $search1->num_rows;
					$search2 = $conexion->query("SELECT * FROM visitas WHERE enlace LIKE '%".$web."%'");
						if ($search2->num_rows>0) {
							while ($visita = $search2->fetch_assoc()){
								$visitas = $visita['visitas'] + $visitas;
							}
						}else{
							$visitas = "0";
						}
					?>
							<a href="<?php echo $web; ?>" target="_blank"><?php echo $web; ?></a>

					<h4>Comparte esta Capturadora en:</h4>
					<div>
						<a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo $web; ?>" target="_blank">
							<button type="button" class="btn btn-info shared-facebook" >
						       <span class="fa fa-facebook"></span> 
						    </button>
					    </a>
					    <a href="https://twitter.com/?status=Me gusta esta página <?php echo $web; ?> " target="_blank">
						    <button type="button" class="btn btn-info shared-twitter" >
						       <span class="fa fa-twitter"></span> 
						    </button>
					    </a>
					    <a href="https://plus.google.com/share?url=<?php echo $web; ?>" target="_blank">
						    <button type="button" class="btn btn-info shared-google" >
						       <span class="fa fa-google-plus"></span> 
						    </button>
					    </a>
					    <a href="http://www.linkedin.com/shareArticle?url=<?php echo $web; ?>" target="_blank">
						    <button type="button" class="btn btn-info shared-link" >
						       <span class="fa fa-linkedin"></span> 
						    </button>
					    </a>
					    <a href="mailto:?subject=Check%20Out%20My%20Link&amp;body=Check%20Out%20My%20Link%20at%20<?php echo $web; ?>" target="_blank">
						    <button type="button" class="btn btn-info shared-email" >
						       <span class="fa fa-envelope"></span> 
						    </button>
					    </a>
					</div>
					<br><br>
					<div>
						<button class="btn btn-success" style="font-weight: bold;">Visitas:&nbsp;&nbsp;&nbsp;<?php echo $visitas; ?>&nbsp;&nbsp;+</button>
						<button class="btn btn-success" style="font-weight: bold;">Prospectos:&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $captures; ?>&nbsp;&nbsp;+</button>
						<?php 
							echo '<a href="../class/deletewebsite.php?id='.$coach_id.'&dirname='.$id_downline.'" onclick="return confirmar(\'¿Are you sure to delete the registry?\')" class="btn btn-danger" style="color:#fff!important;"><i class="glyphicon glyphicon-trash"></i> Delete Web</a>&nbsp;&nbsp;';
							echo '<a href="../email/export_csv2.php?web=FitCamp&id_name='.$id_downline.'" class="btn btn-info" style="color: #fff!important;"><i class="fa fa-download"></i> Descargar Mail list</a>';
							 ?>

					</div>
				</div>
			</div>
		</div>
		<?php 
		}
		if ($sites == "Fitcamp") {
			?>
			<div class="row">
				<div class="col-md-12" style="background-color: #ffffff; margin-bottom: 20px;border-radius: 5px">
				<div class="col-md-3 " style="padding: 5px 0">
					<img src="../images/fitcamp-3.png" alt="" width="100%">
				</div>
				<div class="col-md-9 " style="padding-right: 0px;">
					<h4>Fitness Camp (Versión Colombia)</h4>
					<?php 
					$host= $_SERVER["HTTP_HOST"];
					//$url= $_SERVER["REQUEST_URI"];
					$web = 'http://' . $host . "/Fitcamp/" . $url . "/";
					$search1 = $conexion->query("SELECT * FROM emails WHERE id_coach = ".$id_downline." AND web='Fitcampco'");
					$captures = $search1->num_rows;
					$search2 = $conexion->query("SELECT * FROM visitas WHERE enlace LIKE '%".$web."%'");
						if ($search2->num_rows>0) {
							while ($visita = $search2->fetch_assoc()){
								$visitas = $visita['visitas'] + $visitas;
							}
						}else{
							$visitas = "0";
						}
					?>
							<a href="<?php echo $web; ?>" target="_blank"><?php echo $web; ?></a>
					<h4>Comparte esta Capturadora en:</h4>
					<div>
						<a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo $web; ?>" target="_blank">
							<button type="button" class="btn btn-info shared-facebook" >
						       <span class="fa fa-facebook"></span> 
						    </button>
					    </a>
					    <a href="https://twitter.com/?status=Me gusta esta página <?php echo $web; ?> " target="_blank">
						    <button type="button" class="btn btn-info shared-twitter" >
						       <span class="fa fa-twitter"></span> 
						    </button>
					    </a>
					    <a href="https://plus.google.com/share?url=<?php echo $web; ?>" target="_blank">
						    <button type="button" class="btn btn-info shared-google" >
						       <span class="fa fa-google-plus"></span> 
						    </button>
					    </a>
					    <a href="http://www.linkedin.com/shareArticle?url=<?php echo $web; ?>" target="_blank">
						    <button type="button" class="btn btn-info shared-link" >
						       <span class="fa fa-linkedin"></span> 
						    </button>
					    </a>
					    <a href="mailto:?subject=Check%20Out%20My%20Link&amp;body=Check%20Out%20My%20Link%20at%20<?php echo $web; ?>" target="_blank">
						    <button type="button" class="btn btn-info shared-email" >
						       <span class="fa fa-envelope"></span> 
						    </button>
					    </a>
					</div>
					<br><br>
					<div>
						<button class="btn btn-success" style="font-weight: bold;">Visitas:&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $visitas; ?>&nbsp;+</button>
						<button class="btn btn-success" style="font-weight: bold;">Prospectos:&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $captures; ?>&nbsp;&nbsp;+</button>
						<?php 
							echo '<a href="../class/deletewebsite.php?id='.$coach_id.'&dirname='.$id_downline.'" onclick="return confirmar(\'¿Are you sure to delete the registry?\')" class="btn btn-danger" style="color:#fff!important;"><i class="glyphicon glyphicon-trash"></i> Delete Web</a>&nbsp;&nbsp;';
							echo '<a href="../email/export_csv2.php?web=Fitcampco&id_name='.$id_downline.'" class="btn btn-info" style="color: #fff!important;"><i class="fa fa-download"></i> Descargar Mail list</a>';
							 ?>

					</div>
				</div>
			</div>
		</div>
		<?php 
		}
		if ($sites == "rdfitcamp") {
			?>
			<div class="row">
				<div class="col-md-12" style="background-color: #ffffff; margin-bottom: 20px;border-radius: 5px">
				<div class="col-md-3 " style="padding: 5px 0">
					<img src="../images/fitcamp-3.png" alt="" width="100%">
				</div>
				<div class="col-md-9 " style="padding-right: 0px;">
					<h4>Fitness Camp (Versión Rep&uacuteblica Dominicana)</h4>
					<?php 
					$host= $_SERVER["HTTP_HOST"];
					//$url= $_SERVER["REQUEST_URI"];
					$web = 'http://' . $host . "/rdfitcamp/" . $url . "/";
					$search1 = $conexion->query("SELECT * FROM emails WHERE id_coach = ".$id_downline." AND web='rdfitcamp'");
					$captures = $search1->num_rows;
					$search2 = $conexion->query("SELECT * FROM visitas WHERE enlace LIKE '%".$web."%'");
						if ($search2->num_rows>0) {
							while ($visita = $search2->fetch_assoc()){
								$visitas = $visita['visitas'] + $visitas;
							}
						}else{
							$visitas = "0";
						}
					?>
							<a href="<?php echo $web; ?>" target="_blank"><?php echo $web; ?></a>
					<h4>Comparte esta Capturadora en:</h4>
					<div>
						<a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo $web; ?>" target="_blank">
							<button type="button" class="btn btn-info shared-facebook" >
						       <span class="fa fa-facebook"></span> 
						    </button>
					    </a>
					    <a href="https://twitter.com/?status=Me gusta esta página <?php echo $web; ?> " target="_blank">
						    <button type="button" class="btn btn-info shared-twitter" >
						       <span class="fa fa-twitter"></span> 
						    </button>
					    </a>
					    <a href="https://plus.google.com/share?url=<?php echo $web; ?>" target="_blank">
						    <button type="button" class="btn btn-info shared-google" >
						       <span class="fa fa-google-plus"></span> 
						    </button>
					    </a>
					    <a href="http://www.linkedin.com/shareArticle?url=<?php echo $web; ?>" target="_blank">
						    <button type="button" class="btn btn-info shared-link" >
						       <span class="fa fa-linkedin"></span> 
						    </button>
					    </a>
					    <a href="mailto:?subject=Check%20Out%20My%20Link&amp;body=Check%20Out%20My%20Link%20at%20<?php echo $web; ?>" target="_blank">
						    <button type="button" class="btn btn-info shared-email" >
						       <span class="fa fa-envelope"></span> 
						    </button>
					    </a>
					</div>
					<br><br>
					<div>
						<button class="btn btn-success" style="font-weight: bold;">Visitas:&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $visitas; ?>&nbsp;&nbsp;+</button>
						<button class="btn btn-success" style="font-weight: bold;">Prospectos:&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $captures; ?>&nbsp;&nbsp;+</button>
						<?php 
							echo '<a href="../class/deletewebsite.php?id='.$coach_id.'&dirname='.$id_downline.'" onclick="return confirmar(\'¿Are you sure to delete the registry?\')" class="btn btn-danger" style="color:#fff!important;"><i class="glyphicon glyphicon-trash"></i> Delete Web</a>&nbsp;&nbsp;';
							echo '<a href="../email/export_csv2.php?web=rdfitcamp&id_name='.$id_downline.'" class="btn btn-info" style="color: #fff!important;"><i class="fa fa-download"></i> Descargar Mail list</a>';
							 ?>

					</div>
				</div>
			</div>
		</div>
		<?php 
		}
		if ($sites == "Collagen") {
			?>
			<div class="row">
				<div class="col-md-12" style="background-color: #ffffff; margin-bottom: 20px;border-radius: 5px">
				<div class="col-md-3 " style="padding: 5px 0">
					<img src="../images/collagen-2.png" alt="" width="100%">
				</div>
				<div class="col-md-9 " style="padding-right: 0px;">
					<h4>Colageno</h4>
					<?php 
					$host= $_SERVER["HTTP_HOST"];
					//$url= $_SERVER["REQUEST_URI"];
					$web = 'http://' . $host . "/skin/collagen/" . $url . "/";
					$search1 = $conexion->query("SELECT * FROM emails WHERE id_coach = ".$id_downline." AND web='Collagen'");
					$captures = $search1->num_rows;
					$search2 = $conexion->query("SELECT * FROM visitas WHERE enlace LIKE '%".$web."%'");
						if ($search2->num_rows>0) {
							while ($visita = $search2->fetch_assoc()){
								$visitas = $visita['visitas'] + $visitas;
							}
						}else{
							$visitas = "0";
						}
					?>
							<a href="<?php echo $web; ?>" target="_blank"><?php echo $web; ?></a>
					<h4>Comparte esta Capturadora en:</h4>
					<div>
						<a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo $web; ?>" target="_blank">
							<button type="button" class="btn btn-info shared-facebook" >
						       <span class="fa fa-facebook"></span> 
						    </button>
					    </a>
					    <a href="https://twitter.com/?status=Me gusta esta página <?php echo $web; ?> " target="_blank">
						    <button type="button" class="btn btn-info shared-twitter" >
						       <span class="fa fa-twitter"></span> 
						    </button>
					    </a>
					    <a href="https://plus.google.com/share?url=<?php echo $web; ?>" target="_blank">
						    <button type="button" class="btn btn-info shared-google" >
						       <span class="fa fa-google-plus"></span> 
						    </button>
					    </a>
					    <a href="http://www.linkedin.com/shareArticle?url=<?php echo $web; ?>" target="_blank">
						    <button type="button" class="btn btn-info shared-link" >
						       <span class="fa fa-linkedin"></span> 
						    </button>
					    </a>
					    <a href="mailto:?subject=Check%20Out%20My%20Link&amp;body=Check%20Out%20My%20Link%20at%20<?php echo $web; ?>" target="_blank">
						    <button type="button" class="btn btn-info shared-email" >
						       <span class="fa fa-envelope"></span> 
						    </button>
					    </a>
					</div>
					<br><br>
					<div>
						<button class="btn btn-success" style="font-weight: bold;">Visitas:&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $visitas; ?>&nbsp;&nbsp;+</button>
						<button class="btn btn-success" style="font-weight: bold;">Prospectos:&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $captures; ?>&nbsp;&nbsp;+</button>
						<?php 
							echo '<a href="../class/deletewebsite.php?id='.$coach_id.'&dirname='.$id_downline.'" onclick="return confirmar(\'¿Are you sure to delete the registry?\')" class="btn btn-danger" style="color:#fff!important;"><i class="glyphicon glyphicon-trash"></i> Delete Web</a>&nbsp;&nbsp;';
							echo '<a href="../email/export_csv2.php?web=Collagen&id_name='.$id_downline.'" class="btn btn-info" style="color: #fff!important;"><i class="fa fa-download"></i> Descargar Mail list</a>';
							 ?>

					</div>
				</div>
			</div>
		</div>
		<?php 
		}

		if ($sites == "BodyScan") {
			?>
			<div class="row">
				<div class="col-md-12" style="background-color: #ffffff; margin-bottom: 20px;border-radius: 5px">
					<div class="col-md-3 " style="padding: 5px 0">
						<img src="../images/bodyscan-2.jpg" alt="" width="100%">
					</div>
					<div class="col-md-9 " style="padding-right: 0px;">
						<h4>Body Scan (Version USA - United States)</h4>
						<?php 
						$host= $_SERVER["HTTP_HOST"];
						//$url= $_SERVER["REQUEST_URI"];
						$web = 'http://' . $host . "/BodyScan/" . $url . "/";
						$search1 = $conexion->query("SELECT * FROM emails WHERE id_coach = ".$id_downline." AND web='BodyScan'");
						$captures = $search1->num_rows;
						$search2 = $conexion->query("SELECT * FROM visitas WHERE enlace LIKE '%".$web."%'");
						if ($search2->num_rows>0) {
							while ($visita = $search2->fetch_assoc()){
								$visitas = $visita['visitas'] + $visitas;
							}
						}else{
							$visitas = "0";
						}
						?>
						<a href="<?php echo $web; ?>" target="_blank"><?php echo $web; ?></a>
						<h4>Comparte esta Capturadora en:</h4>
						<div>
							<a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo $web; ?>" target="_blank">
								<button type="button" class="btn btn-info shared-facebook" >
							       <span class="fa fa-facebook"></span> 
							    </button>
						    </a>
						    <a href="https://twitter.com/?status=Me gusta esta página <?php echo $web; ?> " target="_blank">
							    <button type="button" class="btn btn-info shared-twitter" >
							       <span class="fa fa-twitter"></span> 
							    </button>
						    </a>
						    <a href="https://plus.google.com/share?url=<?php echo $web; ?>" target="_blank">
							    <button type="button" class="btn btn-info shared-google" >
							       <span class="fa fa-google-plus"></span> 
							    </button>
						    </a>
						    <a href="http://www.linkedin.com/shareArticle?url=<?php echo $web; ?>" target="_blank">
							    <button type="button" class="btn btn-info shared-link" >
							       <span class="fa fa-linkedin"></span> 
							    </button>
						    </a>
						    <a href="mailto:?subject=Check%20Out%20My%20Link&amp;body=Check%20Out%20My%20Link%20at%20<?php echo $web; ?>" target="_blank">
							    <button type="button" class="btn btn-info shared-email" >
							       <span class="fa fa-envelope"></span> 
							    </button>
						    </a>
						</div>
						<br><br>
						<div>
							<button class="btn btn-success" style="font-weight: bold;">Visitas:&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $visitas; ?>&nbsp;&nbsp;+</button>
							<button class="btn btn-success" style="font-weight: bold;">Prospectos:&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $captures; ?>&nbsp;&nbsp;+</button>
							<?php 
							echo '<a href="../class/deletewebsite.php?id='.$coach_id.'&dirname='.$id_downline.'" onclick="return confirmar(\'¿Are you sure to delete the registry?\')" class="btn btn-danger" style="color:#fff!important;"><i class="glyphicon glyphicon-trash"></i> Delete Web</a>&nbsp;&nbsp;';
							echo '<a href="../email/export_csv2.php?web=BodyScan&id_name='.$id_downline.'" class="btn btn-info" style="color: #fff!important;"><i class="fa fa-download"></i> Descargar Mail list</a>';
							 ?>
							
						</div>
					</div>
				</div>
			</div>
		<?php
		}

		if ($sites == "bodyscan") {
			?>
			<div class="row">
				<div class="col-md-12" style="background-color: #ffffff; margin-bottom: 20px;border-radius: 5px">
					<div class="col-md-3 " style="padding: 5px 0">
						<img src="../images/bodyscan-2.jpg" alt="" width="100%">
					</div>
					<div class="col-md-9 " style="padding-right: 0px;">
						<h4>Body Scan (Version Col&oacutembia)</h4>
						<?php 
						$host= $_SERVER["HTTP_HOST"];
						//$url= $_SERVER["REQUEST_URI"];
						$web = 'http://' . $host . "/bodyscan/" . $url . "/";
						$search1 = $conexion->query("SELECT * FROM emails WHERE id_coach = ".$id_downline." AND web='bodyscanco'");
						$captures = $search1->num_rows;
						$search2 = $conexion->query("SELECT * FROM visitas WHERE enlace LIKE '%".$web."%'");
						if ($search2->num_rows>0) {
							while ($visita = $search2->fetch_assoc()){
								$visitas = $visita['visitas'] + $visitas;
							}
						}else{
							$visitas = "0";
						}
						?>
						<a href="<?php echo $web; ?>" target="_blank"><?php echo $web; ?></a>
						<h4>Comparte esta Capturadora en:</h4>
						<div>
							<a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo $web; ?>" target="_blank">
								<button type="button" class="btn btn-info shared-facebook" >
							       <span class="fa fa-facebook"></span> 
							    </button>
						    </a>
						    <a href="https://twitter.com/?status=Me gusta esta página <?php echo $web; ?> " target="_blank">
							    <button type="button" class="btn btn-info shared-twitter" >
							       <span class="fa fa-twitter"></span> 
							    </button>
						    </a>
						    <a href="https://plus.google.com/share?url=<?php echo $web; ?>" target="_blank">
							    <button type="button" class="btn btn-info shared-google" >
							       <span class="fa fa-google-plus"></span> 
							    </button>
						    </a>
						    <a href="http://www.linkedin.com/shareArticle?url=<?php echo $web; ?>" target="_blank">
							    <button type="button" class="btn btn-info shared-link" >
							       <span class="fa fa-linkedin"></span> 
							    </button>
						    </a>
						    <a href="mailto:?subject=Check%20Out%20My%20Link&amp;body=Check%20Out%20My%20Link%20at%20<?php echo $web; ?>" target="_blank">
							    <button type="button" class="btn btn-info shared-email" >
							       <span class="fa fa-envelope"></span> 
							    </button>
						    </a>
						</div>
						<br><br>
						<div>
							<button class="btn btn-success" style="font-weight: bold;">Visitas:&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $visitas; ?>&nbsp;&nbsp;+</button>
							<button class="btn btn-success" style="font-weight: bold;">Prospectos:&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $captures; ?>&nbsp;&nbsp;+</button>
							<?php 
							echo '<a href="../class/deletewebsite.php?id='.$coach_id.'&dirname='.$id_downline.'" onclick="return confirmar(\'¿Are you sure to delete the registry?\')" class="btn btn-danger" style="color:#fff!important;"><i class="glyphicon glyphicon-trash"></i> Delete Web</a>&nbsp;&nbsp;';
							echo '<a href="../email/export_csv2.php?web=bodyscanco&id_name='.$id_downline.'" class="btn btn-info" style="color: #fff!important;"><i class="fa fa-download"></i> Descargar Mail list</a>';
							 ?>
							
						</div>
					</div>
				</div>
			</div>
		<?php
		}

		if ($sites == "rdBodyscan") {
			?>
			<div class="row">
				<div class="col-md-12" style="background-color: #ffffff; margin-bottom: 20px;border-radius: 5px">
					<div class="col-md-3 " style="padding: 5px 0">
						<img src="../images/bodyscan-2.jpg" alt="" width="100%">
					</div>
					<div class="col-md-9 " style="padding-right: 0px;">
						<h4>Body Scan (Version Rep&uacuteblica Dominicana)</h4>
						<?php 
						$host= $_SERVER["HTTP_HOST"];
						//$url= $_SERVER["REQUEST_URI"];
						$web = 'http://' . $host . "/rdBodyscan/" . $url . "/";
						$search1 = $conexion->query("SELECT * FROM emails WHERE id_coach = ".$id_downline." AND web='rdBodyscan'");
						$captures = $search1->num_rows;
						$search2 = $conexion->query("SELECT * FROM visitas WHERE enlace LIKE '%".$web."%'");
						if ($search2->num_rows>0) {
							while ($visita = $search2->fetch_assoc()){
								$visitas = $visita['visitas'] + $visitas;
							}
						}else{
							$visitas = "0";
						}
						?>
						<a href="<?php echo $web; ?>" target="_blank"><?php echo $web; ?></a>
						<h4>Comparte esta Capturadora en:</h4>
						<div>
							<a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo $web; ?>" target="_blank">
								<button type="button" class="btn btn-info shared-facebook" >
							       <span class="fa fa-facebook"></span> 
							    </button>
						    </a>
						    <a href="https://twitter.com/?status=Me gusta esta página <?php echo $web; ?> " target="_blank">
							    <button type="button" class="btn btn-info shared-twitter" >
							       <span class="fa fa-twitter"></span> 
							    </button>
						    </a>
						    <a href="https://plus.google.com/share?url=<?php echo $web; ?>" target="_blank">
							    <button type="button" class="btn btn-info shared-google" >
							       <span class="fa fa-google-plus"></span> 
							    </button>
						    </a>
						    <a href="http://www.linkedin.com/shareArticle?url=<?php echo $web; ?>" target="_blank">
							    <button type="button" class="btn btn-info shared-link" >
							       <span class="fa fa-linkedin"></span> 
							    </button>
						    </a>
						    <a href="mailto:?subject=Check%20Out%20My%20Link&amp;body=Check%20Out%20My%20Link%20at%20<?php echo $web; ?>" target="_blank">
							    <button type="button" class="btn btn-info shared-email" >
							       <span class="fa fa-envelope"></span> 
							    </button>
						    </a>
						</div>
						<br><br>
						<div>
							<button class="btn btn-success" style="font-weight: bold;">Visitas:&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $visitas; ?>&nbsp;&nbsp;+</button>
							<button class="btn btn-success" style="font-weight: bold;">Prospectos:&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $captures; ?>&nbsp;&nbsp;+</button>
							<?php 
							echo '<a href="../class/deletewebsite.php?id='.$coach_id.'&dirname='.$id_downline.'" onclick="return confirmar(\'¿Are you sure to delete the registry?\')" class="btn btn-danger" style="color:#fff!important;"><i class="glyphicon glyphicon-trash"></i> Delete Web</a>&nbsp;&nbsp;';
							echo '<a href="../email/export_csv2.php?web=rdBodyscan&id_name='.$id_downline.'" class="btn btn-info" style="color: #fff!important;"><i class="fa fa-download"></i> Descargar Mail list</a>';
							 ?>
							
						</div>
					</div>
				</div>
			</div>
		<?php
		}

		}

	}else {

	?>

	<script>
		alert("No contiene Capturadoras registradas.");
	</script>
	<h4 align="center">No contiene Capturadoras registradas.</h4>


	<?php
	}

	# code...
}else { 

echo '<script>
	history.back();
</script>';

}

 ?>












	</div>
</div>
