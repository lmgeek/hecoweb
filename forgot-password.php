<?php 
/*
	if (isset($_POST['email']) && !empty($_POST['email'])) {

		$email = $_POST['email'];

		include("conetion.php");

		$result = $conexion->query("SELECT * FROM users WHERE email = '$email'");
		if ($result->num_rows > 0) {

			$row = $result->fetch_assoc();
			$firstname = $row['firstname'];
			$lastname = $row['lastname'];
			$user = $row['user'];



			set_time_limit(0);


if($_POST["Continue"]){


  //EMAIL DEL DESTINATARIO
  $FromName = $_POST["firstname"]." ".$_POST["lastname"];
  $FromMail = $mail_coach;
  $Phone = $_POST["phone"];
  $firstname = $_POST["firstname"];
  $lastname = $_POST["lastname"];

  //ASUNTO DEL EMAIL
  $asunto = "3daytrialonline";


  //MENSAJE DEL EMAIL
  $mensaje = "
  <!DOCTYPE html PUBLIC \'-//W3C//DTD XHTML 1.0 Transitional//EN\' \'http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd\'>
<html xmlns=\'http://www.w3.org/1999/xhtml\'>
 <head>
<meta http-equiv=\'Content-Type\' content=\'text/html; charset=UTF-8\' />
<title>Herbalife Email</title>
<meta name=\'viewport\' content=\'width=device-width, initial-scale=1.0\'/>
</head>
<body style=\'margin: 20px; padding: 0;\'>


<table align=\'center\' border=\'0\' cellpadding=\'0\' cellspacing=\'0\' width=\'600\'>
 <tr>
   <td align=\'center\'  style=\'padding: 40px 0 30px 0;\'>
    <img src=\'http://3daytrialonline.com/herbalife.png\' alt=\'Creating Email Magic\' width=\'100%\' height=\'100%\' style=\'display: block;\' />
   </td>
 </tr>
 <tr>
   <td bgcolor=\'#ffffff\' style=\'padding: 40px 30px 40px 30px;\'>
    <table border=\'0\' cellpadding=\'0\' cellspacing=\'0\' width=\'100%\'>
   <tr>
    <td style=\'color: #153643; font-family: Arial, sans-serif; font-size: 24px;\'>
     Estimado Miembro: <b><i>" . $FromName ."</i></b> 
    </td>
   </tr>
   <tr>
     <td style=\'padding: 20px 0 30px 0;color: #153643; font-family: Arial, sans-serif; font-size: 16px; line-height: 20px;\'>
        Recibimos una solicitud de reestablecimiento de contraseña a HERBALIFE COACH WEBAPP. ¿La enviaste tu?<br><br>
        Si has pedido esto, puedes cambiar la contraseña mediante el enlace:<br><br>
        ".$url."<br><br>
        Si no fuiste tu quien la solicitó puedes desactivar este mensaje iniciando sesión con tu cuenta<br><br>
        Gracias,<br>
        NOTA: EL TIEMPO DE VALIDACION DEL CODIGO DE REESTABLECIMIENTO DE CONTRASEÑA SERÁ DE 24 HORAS.
    </td>
   </tr>
   <tr>
    <td>
      
    </td>
   </tr>
    </table>
   </td>
 </tr>
 <tr>
<td style=\'padding: 30px 30px 30px 30px;\'>
  <table border=\'0\' cellpadding=\'0\' cellspacing=\'0\' width=\'100%\'>
      <tr align=\'center\' >
        <td width=\'75%\' style=\'color: #153643; font-family: Arial, sans-serif; font-size: 16px; line-height: 20px;\'>
          &reg; Herbalife<br/>
          
          <b><i>IMPORTANT NOTE:</i> No responda a este mensaje, si este mensaje llega a usted PARA incorrectos y considerar el SPAM,<BR>
          Contacta con Soporte Técnico: \'tsuluismarin@gmail.com\' y \'h24family@gmail.com\' </b>
         </td>
      </tr>
  </table>
</td>
 </tr>
</table>


</body>
</html>";
  $mensaje = stripslashes($mensaje);
  //CABECERA DEL EMAIL
  $headers .= "MIME-Version: 1.0\n";
  $headers .= "Content-type: text/html; charset=iso-8859-1\n";
  $headers .= "From: ".$FromName . " <" . $FromMail . ">\n";
  $headers .= "To: ".$FromName . " <" . $FromMail . ">\n";
  $headers .= "Reply-To: " . $FromMail . "\n";
  $headers .= "X-Priority: 1\n";
  $headers .= "X-MSMail-Priority: High\n";
  $headers .= "X-Mailer: Widgets.com Server";


  //ARQUIVO CON LOS EMAILS

  $arquivo = $_POST["lista"];


  //GENERANDO UN ARRAY CON A LISTA

  $file = explode("\n", $arquivo);

  $i = 1;

}


		}
		
	}else{
		echo "<script> history.back(); </script>";
	}



*/
 ?>



<?php
    session_start();
    //validamos de que alla una sesion active
    if (isset($_SESSION['login']) && $_SESSION['login']==true) {
      header("location:panel/");
      }else{
  ?>
<!DOCTYPE html>
<html >
  <head>
    <meta charset="UTF-8">
    <title>Herbalife Coach WebApp</title>
    <link href='http://fonts.googleapis.com/css?family=Titillium+Web:400,300,600' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="css/normalize.css">
        <link rel="stylesheet" href="css/style.css">
    <style>
      .forgot {
        text-align: right;
      }
    </style>

  </head>

  <body>
   <div class="form">
    <div class="tab-content">
      <h1>Recuperar Contraseña</h1>
      <form action="validaremail.php" method="post">
        <div class="field-wrap">
         <label>
           Correo Electrónico<span class="req">*</span>
         </label>
         <input type="email" id="email" name="email" required autocomplete="off">
        </div>
        <p class="tab forgot"><a href="#login">Login</a></p>
        <input type="submit" class="btn btn-primary" value="Recuperar contraseña" >
    </div>
      </form>
    </div>

    </div> <!-- /container -->

  </body>
</html>

<?php } ?>