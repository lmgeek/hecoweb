<?php

require('../conexion.php');

if (isset($_POST['name']) && isset($_POST['phone']) && isset($_POST['email']) && isset($_POST['id_coach']) && isset($_POST['message']) && isset($_POST['id_coach_leads'])
	&& !empty($_POST['name']) && !empty($_POST['phone']) && !empty($_POST['email']) && !empty($_POST['id_coach']) && !empty($_POST['message']) && !empty($_POST['id_coach_leads'])){

//aqui resivimos los valores

$name = $_POST['name'];
$phone = $_POST['phone'];
$email = $_POST['email'];
$message = $_POST['message'];
$id_coach = $_POST['id_coach'];
$id_coach_leads = $_POST['id_coach_leads'];



	$search=mysql_query("SELECT * FROM emails WHERE email ='".$email."'",$conexion) or die(mysql_error());
		if (mysql_num_rows($search)>0) {
			echo "<script>
			alert('This email all really exist, please retry!');
			history.back();
			</script>";
		} else {


		$insert="INSERT INTO emails(id_coach,id_coach_leads,name,email,phone,message) VALUES('". $id_coach."','". $id_coach_leads."','". $name."','". $email."','". $phone."','". $message."')";
		$result=mysql_query($insert,$conexion) or die(mysql_error());

		if ($result == true) {



		echo" <script>alert('Message was sent successfully!');
			history.back();</script>";

			} else{
		?>
				<script>
					alert('Error to Register!');	
					history.back();
				</script>


		<?php
		}
	}
} else {
	echo "
	<script> 
	history.back()
	</script>";


}
?>