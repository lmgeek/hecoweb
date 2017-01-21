<?php 
include('conetion.php');

session_start();

if (isset($_POST['user']) && !empty($_POST['user']) && isset($_POST['password']) && !empty($_POST['password'])) {
	
	$user = $_POST['user'];
	$password = md5($_POST['password']);


	$result = $conexion->query("SELECT * FROM users WHERE user = '".$user."' AND pass = '".$password."'");

	if ($result->num_rows > 0) {

		$row = $result->fetch_assoc();

		$_SESSION['login'] = true;

		$_SESSION['iduser'] = $row['id'];
		$_SESSION['user'] = $row['user'];
		$_SESSION['idname'] = $row['idname'];

		$my_ip = $_SERVER["REMOTE_ADDR"]; 

		//echo $my_ip;

		$result1 = $conexion->query("INSERT INTO auditoria(user,ipv4) VALUES('".$row['idname']."','".$my_ip."')");

		if ($row['nivel'] == 1) {

			$_SESSION['nivel'] = "Administrador";
			header("location:panel/");

		}

		if ($row['nivel'] == 2) {

			$_SESSION['nivel'] = "Lider";
			header("location:panel/");

		}

		if ($row['nivel'] == 3) {

			$_SESSION['nivel'] = "Usuario";
			header("location:panel/");

		}



	} else {
		echo "<script>
		alert('User or Password Incorrect');
		window.location = 'index.php';
		</script>";
	}

} else {
	echo "<script>
	alert('Sorry this site is resticted, please Login in for use this App.');
	window.location = 'index.php';
	</script>";
}


 ?>