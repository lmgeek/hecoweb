<?php 

            
include("../conetion.php");
    

if (isset($_POST['firstname']) && isset($_POST['lastname']) && isset($_POST['phone']) && isset($_POST['email']) && 
  isset($_POST['subject'])  && isset($_POST['id_coach']) && 
  !empty($_POST['firstname']) && !empty($_POST['lastname']) && !empty($_POST['phone']) && !empty($_POST['email']) && 
  !empty($_POST['subject'])  && !empty($_POST['id_coach'])) {
  # code...

  $name = $_POST['firstname']." ".$_POST['lastname'];
  $phone = $_POST['phone'];
  $email = $_POST['email'];
  $subject = $_POST['subject'];
  $meta = $_POST['meta'];
  $id_coach = $_POST['id_coach'];
  $web = $_POST['web'];


   $result2 = $conexion->query("SELECT * FROM coach WHERE id = ".$id_coach);
    if ($result2->num_rows > 0) {
      $row2 = $result2->fetch_assoc();
      $nameto = $row2['name'];
      $reply = $row2['email'];
    }else{
      $result3 = $conexion->query("SELECT * FROM coachleads WHERE id = ".$id_coach);
      if ($result3->num_rows > 0) {
        $row3 = $result3->fetch_assoc();
        $nameto = $row3['name'];
        $reply = $row3['email'];
      }
    }


  if ($web == '3daytrial') {
    $message = "
  <!DOCTYPE html PUBLIC '-//W3C//DTD XHTML 1.0 Transitional//EN' 'http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd'>
<html xmlns='http://www.w3.org/1999/xhtml'>
 <head>
<meta http-equiv='Content-Type' content='text/html; charset=UTF-8' />
<title>Herbalife Email</title>
<meta name='viewport' content='width=device-width, initial-scale=1.0'/>
</head>
<body style='margin: 20px; padding: 0;'>
<table align='center' border='0' cellpadding='0' cellspacing='0' width='600'>
 <tr>
   <td align='center'  style='padding: 40px 0 30px 0;'>
    <img src='http://3daytrialonline.com/herbalife.png' alt='Creating Email Magic' width='100%' height='100%' style='display: block;' />
   </td>
 </tr>
 <tr>
   <td bgcolor='#ffffff' style='padding: 40px 30px 40px 30px;'>
    <table border='0' cellpadding='0' cellspacing='0' width='100%'>
   <tr>
    <td style='color: #153643; font-family: Arial, sans-serif; font-size: 24px;'>
     Estimado Miembro: <b><i>" . $name ." <br>Phone: ". $phone . "</i></b> 
    </td>
    <td>Meta: " . $meta . "</td>
   </tr>
   <tr>
     <td style='padding: 20px 0 30px 0;color: #153643; font-family: Arial, sans-serif; font-size: 16px; line-height: 20px;'>
        Gracias por mostrar tu interés en nuestro programa de 3 días de prueba, uno de nuestros Coaches se pondrá en contacto contigo lo antes posible.
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
<td style='padding: 30px 30px 30px 30px;'>
  <table border='0' cellpadding='0' cellspacing='0' width='100%'>
      <tr align='center' >
        <td width='75%' style='color: #153643; font-family: Arial, sans-serif; font-size: 16px; line-height: 20px;'>
          
          <b><i>IMPORTANT NOTE:</i> No responda a este mensaje, si este mensaje llega a usted PARA incorrectos y considerar el SPAM,<BR>
          Contacta con Soporte Técnico: 'soporte@iwhisper.net' </b>
         </td>
      </tr>
  </table>
</td>
 </tr>
</table>
</body>
</html>";
  }


  if ($web == '7daytrial') {

    $message = "
  <!DOCTYPE html PUBLIC '-//W3C//DTD XHTML 1.0 Transitional//EN' 'http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd'>
<html xmlns='http://www.w3.org/1999/xhtml'>
 <head>
<meta http-equiv='Content-Type' content='text/html; charset=UTF-8' />
<title>Herbalife Email</title>
<meta name='viewport' content='width=device-width, initial-scale=1.0'/>
</head>
<body style='margin: 20px; padding: 0;'>
<table align='center' border='0' cellpadding='0' cellspacing='0' width='600'>
 <tr>
   <td align='center'  style='padding: 40px 0 30px 0;'>
    <img src='http://3daytrialonline.com/herbalife.png' alt='Creating Email Magic' width='100%' height='100%' style='display: block;' />
   </td>
 </tr>
 <tr>
   <td bgcolor='#ffffff' style='padding: 40px 30px 40px 30px;'>
    <table border='0' cellpadding='0' cellspacing='0' width='100%'>
   <tr>
    <td style='color: #153643; font-family: Arial, sans-serif; font-size: 24px;'>
     Estimado Miembro: <b><i>" . $name ." <br>Phone: ". $phone . "</i></b> 
    </td>
    <td>Meta: " . $meta . "</td>
   </tr>
   <tr>
     <td style='padding: 20px 0 30px 0;color: #153643; font-family: Arial, sans-serif; font-size: 16px; line-height: 20px;'>
        Gracias por mostrar tu interés en nuestro programa de 7 días de prueba, uno de nuestros Coaches se pondrá en contacto contigo lo antes posible.
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
<td style='padding: 30px 30px 30px 30px;'>
  <table border='0' cellpadding='0' cellspacing='0' width='100%'>
      <tr align='center' >
        <td width='75%' style='color: #153643; font-family: Arial, sans-serif; font-size: 16px; line-height: 20px;'>
          
          <b><i>IMPORTANT NOTE:</i> No responda a este mensaje, si este mensaje llega a usted PARA incorrectos y considerar el SPAM,<BR>
          Contacta con Soporte Técnico: 'soporte@iwhisper.net' </b>
         </td>
      </tr>
  </table>
</td>
 </tr>
</table>
</body>
</html>";
  }

  if ($web == 'BodyScan') {
    $message = "
  <!DOCTYPE html PUBLIC '-//W3C//DTD XHTML 1.0 Transitional//EN' 'http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd'>
<html xmlns='http://www.w3.org/1999/xhtml'>
 <head>
<meta http-equiv='Content-Type' content='text/html; charset=UTF-8' />
<title>Herbalife Email</title>
<meta name='viewport' content='width=device-width, initial-scale=1.0'/>
</head>
<body style='margin: 20px; padding: 0;'>


<table align='center' border='0' cellpadding='0' cellspacing='0' width='600'>
 <tr>
   <td align='center'  style='padding: 40px 0 30px 0;'>
    <img src='http://3daytrialonline.com/herbalife.png' alt='Creating Email Magic' width='100%' height='100%' style='display: block;' />
   </td>
 </tr>
 <tr>
   <td bgcolor='#ffffff' style='padding: 40px 30px 40px 30px;'>
    <table border='0' cellpadding='0' cellspacing='0' width='100%'>
   <tr>
    <td style='color: #153643; font-family: Arial, sans-serif; font-size: 24px;'>
     Estimado Miembro: <b><i>" . $name ." <br>Phone: ". $phone . "</i></b> 
    </td>
    <td>Meta: " . $meta . "</td>
   </tr>
   <tr>
     <td style='padding: 20px 0 30px 0;color: #153643; font-family: Arial, sans-serif; font-size: 16px; line-height: 20px;'>
        Gracias por mostrar tu interés en nuestro Programa de Bienestar, eres uno de nuestas 20 personas, uno de nuestros Coaches se pondrá en contacto contigo lo antes posible.
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
<td style='padding: 30px 30px 30px 30px;'>
  <table border='0' cellpadding='0' cellspacing='0' width='100%'>
      <tr align='center' >
        <td width='75%' style='color: #153643; font-family: Arial, sans-serif; font-size: 16px; line-height: 20px;'>
                    
          <b><i>IMPORTANT NOTE:</i> No responda a este mensaje, si este mensaje llega a usted PARA incorrectos y considerar el SPAM,<BR>
          Contacta con Soporte Técnico: 'soporte@iwhisper.net' </b>
         </td>
      </tr>
  </table>
</td>
 </tr>
</table>


</body>
</html>";
  }


  if ($web == 'bodyscanco') {
    $message = "
  <!DOCTYPE html PUBLIC '-//W3C//DTD XHTML 1.0 Transitional//EN' 'http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd'>
<html xmlns='http://www.w3.org/1999/xhtml'>
 <head>
<meta http-equiv='Content-Type' content='text/html; charset=UTF-8' />
<title>Herbalife Email</title>
<meta name='viewport' content='width=device-width, initial-scale=1.0'/>
</head>
<body style='margin: 20px; padding: 0;'>


<table align='center' border='0' cellpadding='0' cellspacing='0' width='600'>
 <tr>
   <td align='center'  style='padding: 40px 0 30px 0;'>
    <img src='http://3daytrialonline.com/herbalife.png' alt='Creating Email Magic' width='100%' height='100%' style='display: block;' />
   </td>
 </tr>
 <tr>
   <td bgcolor='#ffffff' style='padding: 40px 30px 40px 30px;'>
    <table border='0' cellpadding='0' cellspacing='0' width='100%'>
   <tr>
    <td style='color: #153643; font-family: Arial, sans-serif; font-size: 24px;'>
     Estimado Miembro: <b><i>" . $name ." <br>Phone: ". $phone . "</i></b> 
    </td>
    <td>Meta: " . $meta . "</td>
   </tr>
   <tr>
     <td style='padding: 20px 0 30px 0;color: #153643; font-family: Arial, sans-serif; font-size: 16px; line-height: 20px;'>
        Gracias por mostrar tu interés en nuestro Programa de Bienestar, eres uno de nuestas 20 personas, uno de nuestros Coaches se pondrá en contacto contigo lo antes posible.
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
<td style='padding: 30px 30px 30px 30px;'>
  <table border='0' cellpadding='0' cellspacing='0' width='100%'>
      <tr align='center' >
        <td width='75%' style='color: #153643; font-family: Arial, sans-serif; font-size: 16px; line-height: 20px;'>
                    
          <b><i>IMPORTANT NOTE:</i> No responda a este mensaje, si este mensaje llega a usted PARA incorrectos y considerar el SPAM,<BR>
          Contacta con Soporte Técnico: 'soporte@iwhisper.net' </b>
         </td>
      </tr>
  </table>
</td>
 </tr>
</table>


</body>
</html>";
  }


  if ($web == 'rdBodyscan') {
    $message = "
  <!DOCTYPE html PUBLIC '-//W3C//DTD XHTML 1.0 Transitional//EN' 'http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd'>
<html xmlns='http://www.w3.org/1999/xhtml'>
 <head>
<meta http-equiv='Content-Type' content='text/html; charset=UTF-8' />
<title>Herbalife Email</title>
<meta name='viewport' content='width=device-width, initial-scale=1.0'/>
</head>
<body style='margin: 20px; padding: 0;'>


<table align='center' border='0' cellpadding='0' cellspacing='0' width='600'>
 <tr>
   <td align='center'  style='padding: 40px 0 30px 0;'>
    <img src='http://3daytrialonline.com/herbalife.png' alt='Creating Email Magic' width='100%' height='100%' style='display: block;' />
   </td>
 </tr>
 <tr>
   <td bgcolor='#ffffff' style='padding: 40px 30px 40px 30px;'>
    <table border='0' cellpadding='0' cellspacing='0' width='100%'>
   <tr>
    <td style='color: #153643; font-family: Arial, sans-serif; font-size: 24px;'>
     Estimado Miembro: <b><i>" . $name ." <br>Phone: ". $phone . "</i></b> 
    </td>
    <td>Meta: " . $meta . "</td>
   </tr>
   <tr>
     <td style='padding: 20px 0 30px 0;color: #153643; font-family: Arial, sans-serif; font-size: 16px; line-height: 20px;'>
        Gracias por mostrar tu interés en nuestro Programa de Bienestar, eres uno de nuestas 20 personas, uno de nuestros Coaches se pondrá en contacto contigo lo antes posible.
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
<td style='padding: 30px 30px 30px 30px;'>
  <table border='0' cellpadding='0' cellspacing='0' width='100%'>
      <tr align='center' >
        <td width='75%' style='color: #153643; font-family: Arial, sans-serif; font-size: 16px; line-height: 20px;'>
                    
          <b><i>IMPORTANT NOTE:</i> No responda a este mensaje, si este mensaje llega a usted PARA incorrectos y considerar el SPAM,<BR>
          Contacta con Soporte Técnico: 'soporte@iwhisper.net' </b>
         </td>
      </tr>
  </table>
</td>
 </tr>
</table>


</body>
</html>";
  }


  if ($web == 'FitCamp') {
    $message = "
  <!DOCTYPE html PUBLIC '-//W3C//DTD XHTML 1.0 Transitional//EN' 'http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd'>
<html xmlns='http://www.w3.org/1999/xhtml'>
 <head>
<meta http-equiv='Content-Type' content='text/html; charset=UTF-8' />
<title>Herbalife Email</title>
<meta name='viewport' content='width=device-width, initial-scale=1.0'/>
</head>
<body style='margin: 20px; padding: 0;'>


<table align='center' border='0' cellpadding='0' cellspacing='0' width='600'>
 <tr>
   <td align='center'  style='padding: 40px 0 30px 0;'>
    <img src='http://3daytrialonline.com/herbalife.png' alt='Creating Email Magic' width='100%' height='100%' style='display: block;' />
   </td>
 </tr>
 <tr>
   <td bgcolor='#ffffff' style='padding: 40px 30px 40px 30px;'>
    <table border='0' cellpadding='0' cellspacing='0' width='100%'>
   <tr>
    <td style='color: #153643; font-family: Arial, sans-serif; font-size: 24px;'>
     Estimado Miembro: <b><i>" . $name ." <br>Phone: ". $phone . "</i></b> 
    </td>
    <td>Meta: " . $meta . "</td>
   </tr>
   <tr>
     <td style='padding: 20px 0 30px 0;color: #153643; font-family: Arial, sans-serif; font-size: 16px; line-height: 20px;'>
        Gracias por mostrar tu interés en nuestro programa FITCAMP, eres uno de nuestas 20 personas, uno de nuestros Coaches se pondrá en contacto contigo lo antes posible.
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
<td style='padding: 30px 30px 30px 30px;'>
  <table border='0' cellpadding='0' cellspacing='0' width='100%'>
      <tr align='center' >
        <td width='75%' style='color: #153643; font-family: Arial, sans-serif; font-size: 16px; line-height: 20px;'>
                    
          <b><i>IMPORTANT NOTE:</i> No responda a este mensaje, si este mensaje llega a usted PARA incorrectos y considerar el SPAM,<BR>
          Contacta con Soporte Técnico: 'soporte@iwhisper.net' </b>
         </td>
      </tr>
  </table>
</td>
 </tr>
</table>


</body>
</html>";
  }

  if ($web == 'Fitcamp') {
    $message = "
  <!DOCTYPE html PUBLIC '-//W3C//DTD XHTML 1.0 Transitional//EN' 'http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd'>
<html xmlns='http://www.w3.org/1999/xhtml'>
 <head>
<meta http-equiv='Content-Type' content='text/html; charset=UTF-8' />
<title>Herbalife Email</title>
<meta name='viewport' content='width=device-width, initial-scale=1.0'/>
</head>
<body style='margin: 20px; padding: 0;'>


<table align='center' border='0' cellpadding='0' cellspacing='0' width='600'>
 <tr>
   <td align='center'  style='padding: 40px 0 30px 0;'>
    <img src='http://3daytrialonline.com/herbalife.png' alt='Creating Email Magic' width='100%' height='100%' style='display: block;' />
   </td>
 </tr>
 <tr>
   <td bgcolor='#ffffff' style='padding: 40px 30px 40px 30px;'>
    <table border='0' cellpadding='0' cellspacing='0' width='100%'>
   <tr>
    <td style='color: #153643; font-family: Arial, sans-serif; font-size: 24px;'>
     Estimado Miembro: <b><i>" . $name ." <br>Phone: ". $phone . "</i></b> 
    </td>
    <td>Meta: " . $meta . "</td>
   </tr>
   <tr>
     <td style='padding: 20px 0 30px 0;color: #153643; font-family: Arial, sans-serif; font-size: 16px; line-height: 20px;'>
        Gracias por mostrar tu interés en nuestro programa FITCAMP, eres uno de nuestas 20 personas, uno de nuestros Coaches se pondrá en contacto contigo lo antes posible.
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
<td style='padding: 30px 30px 30px 30px;'>
  <table border='0' cellpadding='0' cellspacing='0' width='100%'>
      <tr align='center' >
        <td width='75%' style='color: #153643; font-family: Arial, sans-serif; font-size: 16px; line-height: 20px;'>
                    
          <b><i>IMPORTANT NOTE:</i> No responda a este mensaje, si este mensaje llega a usted PARA incorrectos y considerar el SPAM,<BR>
          Contacta con Soporte Técnico: 'soporte@iwhisper.net' </b>
         </td>
      </tr>
  </table>
</td>
 </tr>
</table>


</body>
</html>";
  }

if ($web == 'rdfitcamp') {
    $message = "
  <!DOCTYPE html PUBLIC '-//W3C//DTD XHTML 1.0 Transitional//EN' 'http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd'>
<html xmlns='http://www.w3.org/1999/xhtml'>
 <head>
<meta http-equiv='Content-Type' content='text/html; charset=UTF-8' />
<title>Herbalife Email</title>
<meta name='viewport' content='width=device-width, initial-scale=1.0'/>
</head>
<body style='margin: 20px; padding: 0;'>


<table align='center' border='0' cellpadding='0' cellspacing='0' width='600'>
 <tr>
   <td align='center'  style='padding: 40px 0 30px 0;'>
    <img src='http://3daytrialonline.com/herbalife.png' alt='Creating Email Magic' width='100%' height='100%' style='display: block;' />
   </td>
 </tr>
 <tr>
   <td bgcolor='#ffffff' style='padding: 40px 30px 40px 30px;'>
    <table border='0' cellpadding='0' cellspacing='0' width='100%'>
   <tr>
    <td style='color: #153643; font-family: Arial, sans-serif; font-size: 24px;'>
     Estimado Miembro: <b><i>" . $name ." <br>Phone: ". $phone . "</i></b> 
    </td>
    <td>Meta: " . $meta . "</td>
   </tr>
   <tr>
     <td style='padding: 20px 0 30px 0;color: #153643; font-family: Arial, sans-serif; font-size: 16px; line-height: 20px;'>
        Gracias por mostrar tu interés en nuestro programa FITCAMP, eres uno de nuestas 20 personas, uno de nuestros Coaches se pondrá en contacto contigo lo antes posible.
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
<td style='padding: 30px 30px 30px 30px;'>
  <table border='0' cellpadding='0' cellspacing='0' width='100%'>
      <tr align='center' >
        <td width='75%' style='color: #153643; font-family: Arial, sans-serif; font-size: 16px; line-height: 20px;'>
                    
          <b><i>IMPORTANT NOTE:</i> No responda a este mensaje, si este mensaje llega a usted PARA incorrectos y considerar el SPAM,<BR>
          Contacta con Soporte Técnico: 'soporte@iwhisper.net' </b>
         </td>
      </tr>
  </table>
</td>
 </tr>
</table>


</body>
</html>";
  }


  if ($web == 'Collagen') {
    $message = "
  <!DOCTYPE html PUBLIC '-//W3C//DTD XHTML 1.0 Transitional//EN' 'http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd'>
<html xmlns='http://www.w3.org/1999/xhtml'>
 <head>
<meta http-equiv='Content-Type' content='text/html; charset=UTF-8' />
<title>Herbalife Email</title>
<meta name='viewport' content='width=device-width, initial-scale=1.0'/>
</head>
<body style='margin: 20px; padding: 0;'>


<table align='center' border='0' cellpadding='0' cellspacing='0' width='600'>
 <tr>
   <td align='center'  style='padding: 40px 0 30px 0;'>
    <img src='http://3daytrialonline.com/herbalife.png' alt='Creating Email Magic' width='100%' height='100%' style='display: block;' />
   </td>
 </tr>
 <tr>
   <td bgcolor='#ffffff' style='padding: 40px 30px 40px 30px;'>
    <table border='0' cellpadding='0' cellspacing='0' width='100%'>
   <tr>
    <td style='color: #153643; font-family: Arial, sans-serif; font-size: 24px;'>
     Estimado Miembro: <b><i>" . $name ." <br>Phone: ". $phone . "</i></b> 
    </td>
    <td>Meta: " . $meta . "</td>
   </tr>
   <tr>
     <td style='padding: 20px 0 30px 0;color: #153643; font-family: Arial, sans-serif; font-size: 16px; line-height: 20px;'>
        Thank you for showing your interest in our program of <font color='#339400' size=3><b>Collagen Beauty Booster</b></font>, one of our Coaches will contact you as soon as possible.
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
<td style='padding: 30px 30px 30px 30px;'>
  <table border='0' cellpadding='0' cellspacing='0' width='100%'>
      <tr align='center' >
        <td width='75%' style='color: #153643; font-family: Arial, sans-serif; font-size: 16px; line-height: 20px;'>
          
          <b><i>IMPORTANT NOTE:</i>IF THIS MESSAGE COMES TO YOU FOR ANY INCORRECT OR CONSIDER THE SPAM,
            Contact technical support: 'soporte@iwhisper.net' </b>
         </td>
      </tr>
  </table>
</td>
 </tr>
</table>


</body>
</html>";
  }

   
    


  include 'Mailin.php';
  $mailin = new Mailin('allsafesolutionsca@gmail.com', 'I2JBpYScPn3bvmhK');
  $mailin->
    addTo($email, $name)->
    setFrom($reply, $nameto)->
    setReplyTo($reply,$nameto)->
    setSubject($subject)->
    setHtml($message);
  

  $result4 = $conexion->query("SELECT * FROM emails WHERE email = '".$email."' AND web ='".$web."'");
    if ($result4->num_rows > 0) {
      echo "<script>
        alert('Ya se encuentra registrado, coloque otro correo electronico');
        history.back();
      </script><br><br>";
    }else{

      if ($res = $mailin->send()) {
        
          $insert = "INSERT INTO emails(id_coach,firstname,lastname,email,phone,web) VALUES('".$id_coach."','".$_POST['firstname']."','".$_POST['lastname']."','".$email."','".$phone."','".$web."')";
                      $conexion->query($insert) == TRUE;
        
        echo "<script>
            alert('Envio Exitoso');
            history.back();
          </script><br><br>";


      } else {
        echo "<script>
            alert('Error al Enviar el Mensaje');
            history.back();
          </script>";
      }

}

}else {
  echo "<script>
        history.back();
      </script>";
      echo $web;
}






/*
include 'Mailin.php';
$mailin = new Mailin('allsafesolutionsca@gmail.com', 'I2JBpYScPn3bvmhK');
$mailin->
  addTo('soporte@iwhisper.net', 'Luis Marin')->
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