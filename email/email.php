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
		

if (isset($_POST['name']) && isset($_POST['email']) && isset($_POST['subject']) && isset($_POST['message']) &&
 !empty($_POST['name']) && !empty($_POST['email']) && !empty($_POST['subject']) && !empty($_POST['message'])) {
	# code...

	$name = $_POST['name'];
	$email = $_POST['email'];
	$subject = $_POST['subject'];
	$message = $_POST['message'];

		$result2 = $conexion->query("SELECT * FROM coach WHERE id_coach = '".$id_name."'");
		if ($result2->num_rows > 0) {
			$row2 = $result2->fetch_assoc();
			$nameto = $row2['name'];
			$reply = $row2['email'];
		}else{
			$result3 = $conexion->query("SELECT * FROM coachlead WHERE id_coach = '".$id_name."'");
			if ($result3->num_rows > 0) {
				$row3 = $result3->fetch_assoc();
				$nameto = $row3['name'];
				$reply = $row3['email'];
			}
		}

	include 'Mailin.php';
	$mailin = new Mailin('allsafesolutionsca@gmail.com', 'I2JBpYScPn3bvmhK');
	$mailin->
		addTo($email, $name)->
		setFrom($reply, $nameto)->
		setReplyTo($reply,$nameto)->
		setSubject($subject)->
		/*setText('Hola')->*/
		setHtml($message);
	if ($res = $mailin->send()) {


		$sql = "INSERT INTO messagesend (id_coach, fecha, send_to, message) VALUES($id_name,NOW(),'$email','$message');";

		$resultado = $conexion->query($sql);
		if($resultado){
			echo "<script>
				alert('Envio Exitoso');
				location='index.php';
			</script>";
		}
		else
			return FALSE;


	} else {
		echo "<script>
				alert('Error al Enviar el Mensaje');
			</script>";
	}


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