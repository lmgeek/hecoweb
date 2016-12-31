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
 
		/*session_start();
		//validamos de que alla una sesion active
		if (isset($_SESSION['login']) && $_SESSION['login']==true) {
			}
			else{
				echo "<script> 
				alert('Sorry this site is resticted, please Login in for use this App')
				window.location='login.php'
				</script>";
				exit;
			}
			
			$now=time();

			if ($now>$_SESSION['expire']) {
				session_destroy();

				echo "
	<script> 
	alert('su sesion a terminado')
	window.location='login.php'
	</script>";
				
			}
		
	?>
<?php
*/
require('conexion.php');

if (isset($_POST['id_coach']) && isset($_POST['user']) && isset($_POST['password']) && isset($_POST['tipo_usu'])
	&& !empty($_POST['id_coach']) && !empty($_POST['user']) && !empty($_POST['password']) && !empty($_POST['tipo_usu'])){

//aqui resivimos los valores

$id_coach = $_POST['id_coach'];
$user = $_POST['user'];
$password = md5($_POST['password']);
$tipo_usu = $_POST['tipo_usu'];

/*
echo $firstname. "<br>";
echo $lastname. "<br>";
echo $email. "<br>";
echo $password. "<br>";
*/

	$search=mysql_query("SELECT * FROM users WHERE user ='".$user."'",$conexion) or die(mysql_error());
		if (mysql_num_rows($search)>0) {
			echo "<script>
			alert('This user all really exist, please retry!');
			history.back();
			</script>";
		} else {


		$insert="INSERT INTO users(idname,user,pass,nivel,registration_date) VALUES('". $id_coach."','".$user."','".$password."','".$tipo_usu."',NOW())";
		$result=mysql_query($insert,$conexion) or die(mysql_error());

		if ($result == true) {



		echo" <script>alert('User registered Successfully!');
			window.location='panel/panel.php';</script>";

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
	alert('A Ocurrido un Error En la BD Contacte a su Programador!')
	history.back()
	</script>";


}
?>