<?php
	function generarLinkTemporal($idusuario, $username){

		$cadena = $idusuario.$username.rand(1,9999999).date('Y-m-d');
		$token = sha1($cadena);
		
		include("conetion.php");

		$sql = "INSERT INTO tblreseteopass (idusuario, username, token, creado) VALUES($idusuario,'$username','$token',NOW());";

		$resultado = $conexion->query($sql);
		if($resultado){
			$enlace = $_SERVER["SERVER_NAME"].'/hecoweb/restablecer.php?idusuario='.sha1($idusuario).'&token='.$token;
			return $enlace;
		}
		else
			return FALSE;
	}

	function enviarEmail( $email, $link ){

  //MENSAJE DEL EMAIL
  $mensaje = "
        Recibimos una solicitud de reestablecimiento de contraseña a HERBALIFE COACH WEBAPP. ¿La enviaste tu?<br><br>
        Si has pedido esto, puedes cambiar la contraseña mediante el enlace:

           ".$link."   

           Si no fuiste tu quien la solicitó puedes desactivar este mensaje iniciando sesión con tu cuenta


        Gracias,
        NOTA: EL TIEMPO DE VALIDACION DEL CODIGO DE REESTABLECIMIENTO DE CONTRASEÑA SERÁ DE 24 HORAS.";
  $mensaje = stripslashes($mensaje);

		$cabeceras .= "MIME-Version: 1.0\n";
		  $cabeceras .= "Content-type: text/html; charset=iso-8859-1\n";
		  $cabeceras .= "X-Priority: 1\n";
		  $cabeceras .= "X-MSMail-Priority: High\n";
		  $cabeceras .= "X-Mailer: Widgets.com Server";
		  $cabeceras  = 'MIME-Version: 1.0' . "\r\n";
		$cabeceras .= 'From: HECOWEB <soporte@planhbl.com>' . "\r\n";
		
		mail($email, "Recuperar contraseña", $mensaje, $cabeceras);
	}
	


	$email = $_POST['email'];
	$respuesta = new stdClass();

	if( $email != "" ){   
   		include("conetion.php");

   		$sql = "SELECT * FROM coach WHERE email = '".$email."'";
   		$search = $conexion->query($sql);
   		if($search->num_rows > 0){
	   		$row = $search->fetch_assoc();
	   		$result = $row['id'];
	   		echo $result;

	   		$sql1 = "SELECT * FROM users WHERE idname = '".$result."'";
	   		$resultado = $conexion->query($sql1);

	   		if($resultado->num_rows > 0){
	      		$usuario = $resultado->fetch_assoc();
				$linkTemporal = generarLinkTemporal( $usuario['id'], $usuario['user'] );
	      		if($linkTemporal){
	        		enviarEmail( $email, $linkTemporal );
	        		echo '<script>
	        		 alert("Un correo ha sido enviado a su cuenta de email con las instrucciones para restablecer la contraseña");
	        		 history.back(); </script>';
	      		}
	   		}
	   		else{
	   			echo '<script> alert("No existe una cuenta asociada a ese correo.");
	   			history.back(); </script>';
	   		}


	   	}else{


	   		$sql2 = "SELECT * FROM coachleads WHERE email = '".$email."'";
	   		$search2 = $conexion->query($sql2);
	   		if($search2->num_rows > 0){
		   		$row = $search2->fetch_assoc();
		   		$result = $row['id'];
		   		echo $result;

		   		$sql1 = "SELECT * FROM users WHERE idname = '".$result."'";
		   		$resultado = $conexion->query($sql1);

		   		if($resultado->num_rows > 0){
		      		$usuario = $resultado->fetch_assoc();
					$linkTemporal = generarLinkTemporal( $usuario['id'], $usuario['user'] );
		      		if($linkTemporal){
		        		enviarEmail( $email, $linkTemporal );
		        		echo '<script>
		        		 alert("Un correo ha sido enviado a su cuenta de email con las instrucciones para restablecer la contraseña");
		        		 history.back(); </script>';
		      		}
		   		}
		   		else{
		   			echo '<script> alert("No existe una cuenta asociada a ese correo.");
		   			history.back(); </script>';
		   		}


		   	}else{
	   			echo '<script> alert("Correo No existe.");
	   			history.back(); </script>';
	   		}


   		}

   		
	}
	else{
   		echo '<script> alert("Debes introducir el email de la cuenta");
   		history.back(); </script>';
   	}
 	echo json_encode( $respuesta );



 	?>