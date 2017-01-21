<?php
		session_start();
		//validamos de que alla una sesion active
		if (isset($_SESSION['login']) && $_SESSION['login']==true) {

			unset($_SESSION["login"]); 
			unset($_SESSION["user"]);
			unset($_SESSION["name"]);
			session_destroy();
			header("Location: ../");
			exit;
			
		}	else{
				echo "<script> 
				alert('no puedes acceder')
				window.location='../'
				</script>";
				exit;
			}
		
	
  
?>