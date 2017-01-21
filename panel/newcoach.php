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


require('../conetion.php');

if (isset($_POST['name']) && isset($_POST['phone']) && isset($_POST['email'])
	&& !empty($_POST['name']) && !empty($_POST['phone']) && !empty($_POST['email'])){

//aqui resivimos los valores

$name = $_POST['name'];
$phone = $_POST['phone'];
$email = $_POST['email'];

if (isset($_POST['phone2'])) {
	$phone2 = $_POST['phone2'];
}else{
	$phone2 = "";
}

if (isset($_POST['phone3'])) {
	$phone3 = $_POST['phone3'];
}else{
	$phone3 = "";
}

/*
echo $name. "<br>";
echo $phone. "<br>";
echo $email. "<br>";
echo $password. "<br>";
*/


$search = $conexion->query("SELECT * FROM coach WHERE email ='".$email."'");
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
		$insert = "INSERT INTO coach(id,name,phone,phone2,phone3,email) VALUES('". $rand."','". $name."','".$phone."','".$phone2."','".$phone2."','". $email."')";
		if ($conexion->query($insert) == TRUE) {
			echo" <script>alert('User registered Successfully!');
			history.back();</script>";
		}else{
			echo "<script>
					alert('Error to Register!');	
					history.back();
				</script>";
		}


	}else{
		$rand2 = rand(0,99999999);
		$insert2 = "INSERT INTO coach(id,name,phone,phone2,phone3,email) VALUES('". $rand2."','". $name."','".$phone."','".$phone2."','".$phone2."','". $email."')";
		if ($conexion->query($insert2) == TRUE) {
			echo" <script>alert('User registered Successfully!');
			history.back();</script>";
		}else{
			echo "<script>
					alert('Error to Register!');	
					history.back();
				</script>";
		}
	}


}else{
	$rand3 = rand(0,99999999);
	$insert3 = ("INSERT INTO coach(id,name,phone,phone2,phone3,email) VALUES('". $rand3."','". $name."','".$phone."','".$phone2."','".$phone2."','". $email."')");
	if ($conexion->query($insert3) == TRUE) {
		echo" <script>alert('User registered Successfully!');
			history.back();</script>";
	}else{
		echo "<script>
					alert('Error to Register!');	
					history.back();
				</script>";
	}
}




	}
} else {
	echo "
	<script> 
	alert('An error occurred, it has not received data!')
	history.back()
	</script>";


}
?>