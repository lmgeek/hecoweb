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


<?php 


if (isset($_POST['name'])  && isset($_POST['phone'])  && isset($_POST['email'])
  && !empty($_POST['name'])  && !empty($_POST['phone'])  && !empty($_POST['email'])){

//aqui resivimos los valores
$name = $_POST['name'];
$phone = $_POST['phone'];

if (isset($_POST['phone2']) && !empty($_POST['phone2'])) {
  $phone2 = $_POST['phone2'];
}else{
  $phone2 = "";
}

if (isset($_POST['phone3']) && !empty($_POST['phone3'])) {
  $phone3 = $_POST['phone3'];
}else{
  $phone3 = "";
}

$email = $_POST['email'];

if (isset($_POST['facebook']) && !empty($_POST['facebook'])) {
	$facebook = $_POST['facebook'];
}else{
	$facebook = "";
}

if (isset($_POST['twitter']) && !empty($_POST['twitter'])) {
	$twitter = $_POST['twitter'];
}else{
	$twitter = "";
}

if (isset($_POST['gplus']) && !empty($_POgplusST['gplus'])) {
	$gplus = $_POST['gplus'];
}else{
	$gplus = "";
}


   if ($tipo_usu == "Administrador") {
	   	if ($conexion->query("UPDATE `coach` SET `name` = '".$name."',`phone` = '".$phone."',`phone2` = '".$phone2."',`phone3` = '".$phone3."',`email` = '".$email."',`facebook` = '".$facebook."',`twitter` = '".$twitter."',`gplus` = '".$gplus."' WHERE `id` = ".$id_name) == TRUE) {
	      echo '<script>alert("Entrenador Actualizado Satisfactoriamente!");
	      window.location="../panel/panel.php";
	      </script>';
	    }else{
	      echo '<script>
	          alert("Error al Actualizar!"); 
	          history.back();
	        </script>';
	    }
   


   }  elseif ($tipo_usu == "Lider") {
   			if ($conexion->query("UPDATE `coach` SET `name` = '".$name."',`phone` = '".$phone."',`phone2` = '".$phone2."',`phone3` = '".$phone3."',`email` = '".$email."',`facebook` = '".$facebook."',`twitter` = '".$twitter."',`gplus` = '".$gplus."' WHERE `id` = ".$id_name) == TRUE) {
	      echo '<script>alert("Entrenador Actualizado Satisfactoriamente!");
	      window.location="../panel/panel.php";
	      </script>';
	    }else{
	      echo '<script>
	          alert("Error al Actualizar!"); 
	          history.back();
	        </script>';
	    }
	    

   }  elseif ($tipo_usu == "Usuario") {
	   	if ($conexion->query("UPDATE `coachleads` SET `name` = '".$name."',`phone` = '".$phone."',`phone2` = '".$phone2."',`phone3` = '".$phone3."',`email` = '".$email."',`facebook` = '".$facebook."',`twitter` = '".$twitter."',`gplus` = '".$gplus."' WHERE `id` = ".$id_name) == TRUE) {
	      echo '<script>alert("Entrenador Actualizado Satisfactoriamente!");
	      window.location="../panel/panel.php";
	      </script>';
	    }else{
	      echo '<script>
	          alert("Error al Actualizar!"); 
	          history.back();
	        </script>';
	    }
   }



}else{

	if ($tipo_usu == "Administrador") {
		$search = $conexion->query("SELECT * FROM coach WHERE id = ".$id_name);
	}  elseif ($tipo_usu == "Lider") {
		$search = $conexion->query("SELECT * FROM coach WHERE id = ".$id_name);
	}  elseif ($tipo_usu == "Usuario") {
		$search = $conexion->query("SELECT * FROM coachleads WHERE id = ".$id_name);
	}


//$search = $conexion->query("SELECT * FROM coachleads WHERE id = ".$id_name);
if ($search->num_rows>0) {
	$row = $search->fetch_assoc();
		$name = $row['name'];
		$email = $row['email'];
		$phone1 = $row['phone'];
		$phone2 = $row['phone2'];
		$phone3 = $row['phone3'];
		$facebook = $row['facebook'];
		$twitter = $row['twitter'];
		$gplus = $row['gplus'];


?>


<div class="container" style="margin-top: 20px;">
	<h3 align="center"><i class="fa fa-user"></i> Mi Perfil</h3>
	<h2><?php echo $name; ?></h2>

			<div class="row">
				<div class="col-md-12" style="background-color: #ffffff; margin-bottom: 20px;border-radius: 5px">
					<div class="col-md-3 " style="padding: 5px 0">
						<img src="../images/profile.jpg" alt="" width="100%">
					</div>
					<div class="col-md-9 " style="padding-right: 0px;">
					  <form method="post" action="" >
					  <br>
						<div class="col-md-4">
							<div class="input-group">
							  <span class="input-group-addon shared-email" id="sizing-addon2"><i class="fa fa-user" style="color: #FFF!important"></i></span>
							  <input type="text" name="name" class="form-control" placeholder="Name" aria-describedby="sizing-addon2" value="<?php echo $name; ?>">
							</div><br>

							<div class="input-group">
							  <span class="input-group-addon shared-email" id="sizing-addon2"><i class="fa fa-envelope" style="color: #FFF!important"></i></span>
							  <input type="text" name="email" class="form-control" placeholder="Email" aria-describedby="sizing-addon2" value="<?php echo $email; ?>">
							</div><br>

							<div class="input-group">
							  <span class="input-group-addon shared-email" id="sizing-addon2"><i class="fa fa-phone" style="color: #FFF!important"></i></span>
							  <input type="text" name="phone" class="form-control" placeholder="Phone 1" aria-describedby="sizing-addon2" value="<?php echo $phone1; ?>">
							</div><br>

							<div class="input-group">
							  <span class="input-group-addon shared-email" id="sizing-addon2"><i class="fa fa-phone" style="color: #FFF!important"></i></span>
							  <input type="text" name="phone2" class="form-control" placeholder="Phone 2" aria-describedby="sizing-addon2" value="<?php echo $phone2; ?>">
							</div><br>

							<div class="input-group">
							  <span class="input-group-addon shared-email" id="sizing-addon2"><i class="fa fa-phone" style="color: #FFF!important"></i></span>
							  <input type="text" name="phone3" class="form-control" placeholder="Phone 3" aria-describedby="sizing-addon2" value="<?php echo $phone3; ?>">
							</div><br>
						</div>


						<div class="col-md-8">
							<div class="input-group">
							  <span class="input-group-addon shared-facebook" id="sizing-addon2"><i class="fa fa-facebook" style="color: #FFF!important"></i></span>
							  <input type="text" name="facebook" class="form-control" placeholder="/TuCuentaFacebook" aria-describedby="sizing-addon2" value="<?php echo $facebook; ?>">
							</div><br>

							<div class="input-group">
							  <span class="input-group-addon shared-twitter" id="sizing-addon2"><i class="fa fa-twitter" style="color: #FFF!important"></i></span>
							  <input type="text" name="twitter" class="form-control" placeholder="@TuCuentaTweeter" aria-describedby="sizing-addon2" value="<?php echo $twitter; ?>">
							</div><br>

							<div class="input-group">
							  <span class="input-group-addon shared-google" id="sizing-addon2"><i class="fa fa-google-plus" style="color: #FFF!important"></i></span>
							  <input type="text" name="gplus" class="form-control" placeholder="URLGooglePlus" aria-describedby="sizing-addon2" value="<?php echo $gplus; ?>">
							</div><br>

							<button type="submit" class="btn btn-info"  style="color:#fff!important;>
								<i class="fa fa-pencil"></i><b>Actualizar Datos</b>
							</button>

						</div>
						<br><br>
						
					  </form>
						
					</div>
				</div>
			</div>
		<?php
		
	
	  

   }else{
    header("location:panel.php");
   }

}

  ?>