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

 include 'V2.0/Mailin.php';
			$mailin = new Mailin('https://api.sendinblue.com/v2.0','I2JBpYScPn3bvmhK');

		
if (isset($_POST['name']) && isset($_POST['lista']) && isset($_POST['subject']) && isset($_POST['message']) &&
 !empty($_POST['name']) && !empty($_POST['lista']) && !empty($_POST['subject']) && !empty($_POST['message'])) {
	# code...
	$name = $_POST['name'];
	$lista_web = $_POST['lista'];
	$subject = $_POST['subject'];
	$message = $_POST['message'];

	$result = $conexion->query("SELECT email FROM emails WHERE id_coach = '".$id_name."' AND web = '".$lista_web."'");
	if ($result->num_rows > 0) {

		$result2 = $conexion->query("SELECT * FROM coach WHERE id = '".$id_name."'");
		if ($result2->num_rows > 0) {
			$row2 = $result2->fetch_assoc();
			$nameto = $row2['name'];
			$reply = $row2['email'];
		}else{
			$result3 = $conexion->query("SELECT * FROM coachlead WHERE id = '".$id_name."'");
			if ($result3->num_rows > 0) {
				$row3 = $result3->fetch_assoc();
				$nameto = $row3['name'];
				$reply = $row3['email'];
			}
		}



		while ($row = $result->fetch_assoc()) {

			$email = $row['email'];
			echo "<br>".$email;

			

			$data = array(
				"to" => array($email=>"Hecoweb"),
				"from" => array($reply,$nameto),
				"replyto" => array($reply,$nameto),
				"subject" => $subject,
				"html" => $message,
				"headers" => array("Content-Type"=> "text/html; charset=iso-8859-1","X-param1"=> "value1", "X-param2"=> "value2","X-Mailin-custom"=>"my custom value", "X-Mailin-IP"=> "102.102.1.2", "X-Mailin-Tag" => "My tag")
			);
var_dump($mailin->send_email($data));
			/*if ($res = $mailin->send()) {

				$fecha = date('Y-m-d');

				$sql = "INSERT INTO messagesend (id_coach, fecha, send_to, message) VALUES('$id_name','$fecha','$email','$message')";

				$resultado = $conexion->query($sql);
				if($resultado){
					echo "<br>enviado<br>";
				}
				else
					return FALSE;

			}*/
		} 
		echo "<script>
				alert('Envio Exitoso');
				history.back();
			</script>";
	}else{
		echo "<script>
			history.back();
		</script>";
	}
}



/*
}else {
	echo "<script>
		history.back();
	</script>";
}



/*
include 'Mailin.php';
$mailin = new Mailin('allsafesolutionsca@gmail.com', 'I2JBpYScPn3bvmhK');
$mailin->
	addTo('tsuluismarin@gmail.com', 'Luis Marin')->
	addTo('berdugo666@gmail.com', 'Luis Marin')->
	setFrom('planhbl.com@gmail.com', 'Plan HBL')->
	setReplyTo('allsafesolutionsca@gmail.com','AllSafe')->
	setSubject('Escriba el asunto aquí')->
	setText('Hola')->
	setHtml('<strong>Hola</strong>');
$res = $mailin->send();
/**
El mensaje de éxito será enviado de esta forma:
{'result' => true, 'message' => 'E-mail enviado'}
*/



 ?>