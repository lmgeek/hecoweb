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

	video-target {
    cursor: pointer;
}
.video-wrapper {
    display: none;
    position: fixed;
    min-width: 100%;
    min-height: 100%;
    top: 0;
    right: 0;
    bottom: 0;
    left: 0;
    background: #000;
    z-index: 21000;
}
.video-frame {
    position: absolute;
    top: 50%;
    left: 50%;
}
.video-close{
    float:right;
    margin-top:-30px;
    margin-right:-30px;
    cursor:pointer;
    color: #fff;
    border: 1px solid #AEAEAE;
    border-radius: 30px;
    background: #605F61;
    font-size: 31px;
    font-weight: bold;
    display: inline-block;
    line-height: 0px;
    padding: 11px 3px;
}
.video-close:before {
    content: "×";
}
</style>
  <script src="http://code.jquery.com/jquery-latest.min.js"></script>
  <script src="http://planhbl.com/3dt/assets/js/video.js"></script>
  <script>
  $(function() {
  $(".video-link").jqueryVideoLightning({
  autoplay: 1,
  backdrop_color: "#ddd",
  backdrop_opacity: 0.6,
  glow: 20,
  glow_color: "#000"
  });
  });
  </script>
</head>
<body style="width: 95%!important;">


<div class="container" style="margin-top: 20px;">
	<h3 align="center"><i class="fa fa-user"></i> Como funciona Hecoweb</h3>

		<div class="row">
			<div class="col-md-12 text-center" style="background-color: #ffffff; margin-bottom: 20px;border-radius: 5px">
				<h3>Registro de Entrenadores Lideres</h3>
				<iframe src="https://player.vimeo.com/video/199477650" width="640" height="360" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
				<div class="col-md-9 " style="padding-right: 0px;">
				  
					
				</div>
			</div>

			<div class="col-md-12 text-center" style="background-color: #ffffff; margin-bottom: 20px;border-radius: 5px">
				<h3>Registro de Entrenadores Bajo Linea</h3>
				<iframe src="https://player.vimeo.com/video/199479098" width="640" height="280" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
				<div class="col-md-9 " style="padding-right: 0px;">
				  
					
				</div>
			</div>

			<div class="col-md-12 text-center" style="background-color: #ffffff; margin-bottom: 20px;border-radius: 5px">
				<h3>Creaci&oacuten y uso de Capturadoras</h3>
				<iframe src="https://player.vimeo.com/video/199490529" width="640" height="360" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
				<div class="col-md-9 " style="padding-right: 0px;">
				  
					
				</div>
			</div>

			<div class="col-md-12 text-center" style="background-color: #ffffff; margin-bottom: 20px;border-radius: 5px">
				<h3>Mis sitios y como compartirlos</h3>
				<iframe src="https://player.vimeo.com/video/199491953" width="640" height="360" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
				<div class="col-md-9 " style="padding-right: 0px;">
				  
					
				</div>
			</div>

			<div class="col-md-12 text-center" style="background-color: #ffffff; margin-bottom: 20px;border-radius: 5px">
				<h3>Lista de Prospectos Capturados</h3>
				<iframe src="https://player.vimeo.com/video/136232257" width="640" height="360" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
				<div class="col-md-9 " style="padding-right: 0px;">
				  
					
				</div>
			</div>

<span class="video-link" data-video-id="v-136232257">
        <img src="../assets/images/video-fake1.jpg" width="100%" height="auto">
      </span>
      <span class="video-link" data-video-id="v-136232257" data-video-width="1280px" data-video-height="720px" data-video-autoplay="1" ></span>



		</div>
		
	
	  

