<?php
// Estructura de la carpeta deseada
$estructura = '../nivel1/nivel2/nivel3/';

// Para crear una estructura anidada se debe especificar
// el parámetro $recursive en mkdir().

if(!mkdir($estructura, 0777, true)) {
    die('Fallo al crear las carpetas...');
}else{
	echo "Exito!";
}

// ...
?>





<?php 



$mensaje = "

<?php


if (isset($_POST['firstname']) && isset($_POST['lastname']) && isset($_POST['email']) && isset($_POST['phone']) &&
    !empty($_POST['firstname']) && !empty($_POST['lastname']) && !empty($_POST['email']) && !empty($_POST['phone']) ) {
  


if (isset($_POST['custom_1']) && !empty($_POST['custom_1'])) {
  $meta = $_POST['custom_1'];
}else{
  $meta = 'unknown';
}

  
  date_default_timezone_set('America/Caracas');
  $fecha = date('d/m/Y');
  $hora = date('g:i:s-a', time());
  $nombre = $_POST['firstname'];
  $apellido = $_POST['lastname'];
  $mail = $_POST['email'];
  $phone = $_POST['phone'];
  $destinatario = 'macuellaranzola@gmail.com';
  $asunto = '3daytrialonline';
  $cuerpo = '
  <html>

  <body>
  <h1>Hi</h1>
  <p>
  <b>Quien Suscribe Señor(a): </b><i>'.$nombre.' '.$apellido;
  $cuerpo .='.<i></p>
  <b>Correo: </b>'.$mail;
  $cuerpo .='<br><br>Telefono: </b>'.$phone;
  $cuerpo .='<br><b>Meta que desea obtener:</b>
  <p>'.$meta;
  $cuerpo .='<br><br>
  --------------------------------------------------------------------------------------------------------------------------------------------------------<br>
  <b><i>NOTA IMPORTANTE:</i> NO RESPONDA A ESTE MENSAJE, SI ESTE MENSAJE LLEGA A USTED POR ALGUN ERROR O LO CONSIDERA SPAM,
   COMUNIQUESE CON SOPORTE TECNICO<BR>
  A TRAVES DEL SIGUIENTE CORREO: tsuluismarin@gmail.com y h24family@gmail.com </b><br>
  <p></p>
  Enviado el <b><i>'.$fecha;
  $cuerpo .='</i></b> a las '.$hora;
  $cuerpo .='</i></b>
  </body>
  </html>
  ';

  //para el envío en formato HTML
  $headers = 'MIME-Version: 1.0\r\n';
  $headers .= 'Content-type: text/html; charset=iso-8859-1\r\n';

  //dirección del remitente
  $headers .= 'From:  <' . $mail . '>\r\n';

  mail($destinatario,$asunto,$cuerpo,$headers);


     if (mail==true) {

        ?>
        <script type='text/javascript'>
          alert('Mensaje ha sido enviado Satisfactoriamente');
          history.back();
        </script>
        <?php

      } else {
        ?>
        <script type='text/javascript'>
          alert('Mensaje no ha sido enviado, verifique y vuelva a intentarlo');
          history.back();
        </script>
        <?php
      }

//Creacion y adicion de los usuarios que envian los mails

if (mail==true) {
  $file = fopen('mensajes.csv', 'a');

  fwrite($file, 'Nombre: ' . $nombre . PHP_EOL);
  fwrite($file,$nombre . ' ' . $mail .' ' . $pais . PHP_EOL);

  fclose($file);

  ?>
  <script type='text/javascript'>
    alert('Mensaje ha sido enviado Satisfactoriamente');
    window.location.href='video/';
  </script>
  <?php

} else {
  ?>
  <script type='text/javascript'>
    alert('Mensaje no ha sido enviado, verifique y vuelva a intentarlo');
    history.back();
  </script>
  <?php
}

?>


";

 //creamos directorio

 
            //indicamos la ruta del fichero index.php
 
            $ruta = "./luismarin/message.php";
 
            //Creamos el fichero index.php e introducimos el contenido del TextArea 
            $a = file_put_contents($ruta, $mensaje);
 
            if(!$a){echo "ERROR al insertar el fichero";}   
 
            echo "<a href=".$ruta.">ENLACE</a>";
            echo "<br/>";
            echo "<br/>";
            echo $ruta; 
            echo "<br/>";
            echo "<br/>";
            echo "http://" . $ruta;
            echo "<br>";
 
  ?>
