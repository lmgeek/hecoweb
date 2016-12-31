<?php
session_start();
        //validamos de que alla una sesion active
        if (isset($_SESSION['login']) && $_SESSION['login']==true) {
        	$name_user = $_SESSION['name'];
            }
            else{
                echo "<script> 
                alert('no puedes acceder')
                window.location='../'
                </script>";
                exit;
            }


require('../conexion.php');
include("../conetion.php");


if (isset($_POST['name']) && isset($_POST['phone']) && isset($_POST['email']) && isset($_POST['coach'])
	&& !empty($_POST['name']) && !empty($_POST['phone']) && !empty($_POST['email'])){

//aqui resivimos los valores

$name = $_POST['name'];
$phone = $_POST['phone'];
$email = $_POST['email'];
$coach = $_POST['coach'];

/*
echo $name. "<br>";
echo $phone. "<br>";
echo $email. "<br>";
echo $password. "<br>";
*/

	$search = $conexion->query("SELECT * FROM coachleads WHERE email ='".$email."'");
		if ($search->num_rows > 0) {
			echo "<script>
			alert('This coach all really exist, please retry!');
			history.back();
			</script>";
		} else {


$rand = rand(0,99999999);
$result = $conexion->query("SELECT * FROM coach WHERE id = ".$rand);

if ($result->num_rows == 0) {

	$result2 = $conexion->query("SELECT * FROM coachleads WHERE id = ".$rand);

	if ($result2->num_rows == 0) {
		$insert = "INSERT INTO coachleads(id,id_coach,name,phone,email) VALUES('". $rand ."','". $coach."','". $name."','".$phone."','". $email."')";
		if ($conexion->query($insert) == TRUE) {
			echo" <script>alert('Entrenador Bajo Linea creado Satisfactoriamente!');
			history.back();</script>";
		}else{
			echo "<script>
					alert('Error al Registrar!');	
					history.back();
				</script>";
		}


	}else{
		$rand2 = rand(0,99999999);
		$insert2 = "INSERT INTO coachleads(id,id_coach,name,phone,email) VALUES('". $rand2 ."','". $coach."','". $name."','".$phone."','". $email."')";
		if ($conexion->query($insert2) == TRUE) {
			echo" <script>alert('Entrenador Bajo Linea creado Satisfactoriamente!');
			history.back();</script>";
		}else{
			echo "<script>
					alert('Error al Registrar!');	
					history.back();
				</script>";
		}
	}


}else{
	$rand3 = rand(0,99999999);
	$insert3 = ("INSERT INTO coachleads(id,id_coach,name,phone,email) VALUES('". $rand3 ."','". $coach."','". $name."','".$phone."','". $email."')");
	if ($conexion->query($insert3) == TRUE) {
		echo" <script>alert('Entrenador Bajo Linea creado Satisfactoriamente!');
			history.back();</script>";
	}else{
		echo "<script>
					alert('Error al Registrar!');	
					history.back();
				</script>";
	}
}



	}
} else {
	echo "
	<script> 
	alert('Ha ocurrido un error grave, No se han recibido datos!')
	history.back()
	</script>";


}
?>