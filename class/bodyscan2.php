<link href="../css/bootstrap.css" rel="stylesheet">

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

/******************************************************************************************************/
/**************************     CREA EL CLON DE 3 DAY TRIAL PACK   ******************************/
/******************************************************************************************************/





if (isset($_POST['id_coach_lead']) && isset($_POST['folder']) &&
    !empty($_POST['id_coach_lead']) && !empty($_POST['folder'])) {


    $id_coach_lead = $_POST['id_coach_lead'];
    $folder = $_POST['folder'];

    $result1 = $conexion->query("SELECT * FROM coachleads
                                WHERE id = ".$id_coach_lead);

    if ($result1->num_rows > 0) {
        $row1 = $result1->fetch_assoc();
        $name = $row1['name'];
        $email = $row1['email'];
        $phone = $row1['phone'];
    }else {
        echo "no data";}


       //VIDEO ESPAÑOL 
      if (isset($_POST['idvideo1']) && isset($_POST['idvideo1']) && 
          isset($_POST['video1']) && isset($_POST['video1'])) {
        $idvideo1 = $_POST['idvideo1'];
        $video1 = $_POST['video1'];
      }else{
        $idvideo1 = '190022578';
        $video1 = 'v-';
      }



       if (is_array($_POST['web'])) {
        $selected = '';
        $num_web = count($_POST['web']);
        $current = 0;
        foreach ($_POST['web'] as $key => $value) {
            if ($current != $num_web-1)
                $selected .= $value.', ';
            else
                $selected .= $value.'.';
            $current++;


/******************************************************************************************************/
/**************************      CREA EL CLON DE KA WEB DE Colombia      ******************************/
/******************************************************************************************************/





    $mensaje = '
<?php
  $conexion = new mysqli("localhost", "thrdaytr_webapp", "pRf_&lue#LU7", "thrdaytr_planhbl");
  $search = $conexion->query(\'SELECT * FROM coach WHERE id ="'.$id_coach_lead.'"\');
  if ($search->num_rows > 0) {
  $row = $search->fetch_assoc();
  $mail_coach = $row["email"];
  $id_coach = $row["id"];
}else{
  $id_coach="";
}
?>

<!DOCTYPE HTML>
<html>
<head>
<script src="http://planhbl.com/hecoweb/panel/visitas.php"></script>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8"><meta name="viewport" content="width=device-width, initial-scale=1">
  <title>3Day Trial Pack | Home</title>
  <link rel="icon" href="../assets/images/favicon.png">
  <!-- en html5 no necesitas indicar el cierre de la etiqueta 
<meta http-equiv="refresh" content="3">
  

  <!--Script para ver el dispositivo -->
  <script type="text/javascript">
    var device = navigator.userAgent

    if (device.match(/Iphone/i) ||
        device.match(/Ipod/i)||
        device.match(/Android/i)||
        device.match(/J2ME/i)||
        device.match(/BlackBerry/i)||
        device.match(/iPhone|iPad|iPod/i)||
        device.match(/Opera Mini/i)||
        device.match(/IEMobile/i)||
        device.match(/Mobile/i)||
        device.match(/Windows Phone/i)||
        device.match(/windows mobile/i)||
        device.match(/windows ce/i)||
        device.match(/webOS/i)||
        device.match(/palm/i)||
        device.match(/bada/i)||
        device.match(/series60/i)||
        device.match(/nokia/i)||
        device.match(/symbian/i)||
        device.match(/HTC/i))
    {
    window.location = "movil/";

    }
    else
    {
      
    }
  </script>

  <script>
/* When the user clicks on the button, 
toggle between hiding and showing the dropdown content */
function myFunction() {
    document.getElementById("myDropdown").classList.toggle("show");
}

// Close the dropdown if the user clicks outside of it
window.onclick = function(event) {
  if (!event.target.matches(\'.dropbtn\')) {

    var dropdowns = document.getElementsByClassName("dropdown-content");
    var i;
    for (i = 0; i < dropdowns.length; i++) {
      var openDropdown = dropdowns[i];
      if (openDropdown.classList.contains(\'show\')) {
        openDropdown.classList.remove(\'show\');
      }
    }
  }
}
</script>

<style>
.dropbtn {
    background-color: #4CAF50;
    color: white;
    padding: 4px;
    font-size: 16px;
    border: none;
    cursor: pointer;
}

.dropbtn:hover, .dropbtn:focus {
    background-color: #3e8e41;
}

.dropdown {
    float: right;
    position: relative;
    display: inline-block;
    
}

.dropdown-content {
    display: none;
    position: absolute;
    background-color: #f9f9f9;
    min-width: 160px;
    overflow: auto;
    box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
    right: 0;
}

.dropdown-content a {
    color: black;
    padding: 12px 16px;
    text-decoration: none;
    display: block;
}

.dropdown a:hover {background-color: #f1f1f1}

.show {display:block;}
</style>

<body class="magic">

<!--Start Home Page-->

<!--Top-Script-->
<div class="black-stip">
  <div class="container">
    <strong>Bienvenidos a nuestro Perfil de Bienestar, Coach: <b>' .  $name . '</b></strong>

  </div>
</div>

<img src="../assets/images/banner.jpg" width="100%" height="auto">

<?php set_time_limit(0);


if($_POST["Continue"]){


  //EMAIL DEL DESTINATARIO
  $FromName = $_POST["firstname"]." ".$_POST["lastname"];
  $FromMail = $mail_coach;
  $Phone = $_POST["phone"];
  $firstname = $_POST["firstname"];
  $lastname = $_POST["lastname"];

  //ASUNTO DEL EMAIL
  $asunto = "Body Scan Capturadora";


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
     Estimado Miembro: <b><i>" . $FromName ." <br>Phone: ". $Phone . "</i></b> 
    </td>
   </tr>
   <tr>
     <td style=\'padding: 20px 0 30px 0;color: #153643; font-family: Arial, sans-serif; font-size: 16px; line-height: 20px;\'>
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

 ?>


<!-- Video Wrap & Form -->
<div class="container">
  <div class="row">
    <div class="col-md-6" style="margin-top:60px;">

      <span class="video-link" data-video-id="'.$video1.$idvideo1.'">
        <img src="../assets/images/video-fake.jpg" width="100%" height="auto">
      </span>

      <span class="video-link" data-video-id="'.$video1.$idvideo1.'" data-video-width="1280px" data-video-height="720px" data-video-autoplay="1" ></span>


    </div>

    <dic class="col-md-6">
      <div class="form-part wow fadeInDown">
        <h2 id="goform">¡Empieza ahora!</h2>
        <p>Rellena este formulario para empezar ahora!</p>
         <?php 
          if($_POST["Continue"]) { ?>
          <table width="100%" border="0" align="center" cellpadding="2" cellspacing="1" bgcolor="#333333">
            <tr>
              <td bgcolor="#f5f5f5" style="font-family:verdana;color:#000000;font-size:15px;" class="text-center">
              <?
              foreach ($file as $mail) {
                if(mail($mail, $asunto, $mensaje, $headers)) {
                  echo "<font color=green face=verdana>".$mail." Verifica en la Carpeta Spam si aún no ha llegado el mensaje</font><br>
                  <font color=green face=verdana size=5>Mensaje Enviado Exitosamente.!</font><br>";
                  $i++;
                  $insert = "INSERT INTO emails(id_coach,firstname,lastname,email,phone) VALUES(\'".$id_coach."\',\'".$firstname."\',\'".$lastname."\',\'".$arquivo."\',\'".$Phone."\')";
                  if ($conexion->query($insert) == TRUE) {
                    echo" <script>alert(\'Mensaje Enviado Esitosamente!\')</script>";
                  }else{
                    echo "<script>
                        history.back();
                      </script>";
                  }
                } else {
                  echo $mail[$i]." <font color=red>Mensaje No Enviado</font><br><hr>";
                  
                }
              }
              ?>
              </td>
            </tr>
          </table>
          <br><br>
        <?php }  ?>
        <form method="post" action="">
          <input type="hidden" name="message_group_admin_id" value="55">
          <input name="revisit" value="1" type="hidden">
          <input type="hidden" name="activity_id" value="15">
          <input type="hidden" name="score_id" value="4">
          <div class="form-group">
            <input type="name" name="firstname" class="form-control" placeholder="Nombre"></div>
          <div class="form-group">
            <input type="lastname" name="lastname" class="form-control" placeholder="Apellido"></div>
          <div class="form-group">
            <input type="phone" name="phone" class="form-control" placeholder="Introduce tu Número de Telefono"></div>
          <div class="form-group">
            <input type="lista" name="lista" class="form-control" placeholder="Introduce tu Email"></div>
          <div class="form-group">
           <input type="submit" value="Continue" id="Continue" name="Continue" class="btn"></div>
        </form>
      </div>
     
    </dic>
  </div>
</div>




<!--Bonus Part-->

<section class="bonus">
  <div class="container">
    <span class="main-heading wow fadeInDown">
    <h2>A traves de este <strong>Perfil de Bienestar</strong><br>vas a llevarte uns informacion que te llenara de...</h2>
    </span>
    <div class="bonus-wrap">
      <div class=" grid1 cs-style-1">
        <figure>
          <div class="mobile-bonus visible-xs">
            <img src="../assets/images/bonus-2m.jpg" class="img-responsive">
          </div>
          <div class="bonus-main food wow fadeInDown">
            <img src="../assets/images/bonus.jpg" class="img-responsive">
            <figcaption>
              <div class="bonus-data"> <span class="count">1</span>
                <h4>Porcentaje de Grasa y Masa Muscular</h4>
                <p>A traves de estas dos lecturas pordras saber que porcentaje de tu cuerpo esta rodeado de grasa y cual es masa muscular, para poder saber cuanta grasa debes de bajar y cuanta masa muscular te hace falta subir para ponerte en forma.</p>
                <p>La importancia es ponerte en forma para que lo hagamos en una manera saludable, estos dos indicadores reopresentan una parte esencial</p>
              </div>
            </figcaption>
          </div>
    </figure>
      </div>

      <div class="grid2 cs-style-2">
        <figure>
          <div class="mobile-bonus visible-xs">
            <img src="../assets/images/bonus-1m.jpg" class="img-responsive">
          </div>
          <div class="bonus-main workout wow fadeInDown">
            <img src="../assets/images/bonus-1.jpg" class="img-responsive">
            <figcaption>
              <div class="bonus-data bonus-right"> <span class="count">2</span>
                <h4>BMR (Basal metabolic rate o Regulador de Metabolismo Basal)</h4>
                <p style="font-size: 25px!important">Este indicador te informara de cuantas calorias tu cuerpo quema en modo de reposo, a traves de este numero podras saber que puedes comer para obtener un resultado mas optimo </p>
              </div>
            </figcaption>
          </div>
        </figure>
      </div>

      <div class="grid3 cs-style-3">
        <figure>
          <div class="mobile-bonus visible-xs">
            <img src="../assets/images/bonus-3m.jpg" class="img-responsive">
          </div>
          <div class="bonus-main group wow fadeInDown">
            <img src="../assets/images/bonus-3.jpg" class="img-responsive">
            <figcaption>
              <div class="bonus-data"> <span class="count">3</span>
                <h4>Plan opcional de resultados</h4>
                <p style="font-size: 25px!important">Tu Coach a traves de todos estos indicadores te dara las recomendaciones necesarias personalizadas a tus necesidades para que puedas comenzar a tener un resultado mas optimo segun tu tipo de cuerpo </p>
              </div>
            </figcaption>
          </div>
        </figure>
        </div>

        <div class="text-center" style="font-size: 25px;">
          <p>Este scanner corporal te dar&aacute un reporte muy completo acerca de diferentes &aacutereas importantes y entender cualquier programa de ejercicios y nutricion para controlar tu peso, Aprovecha, actua ya y se una de las 20 personas que se ganen este scanner corporal completamente <strong>GRATIS</strong> y asi no tendr&aacutes que pagar por una evaluaci&oacuten como &eacutesta.</p>
        </div>
      </div>

</section>

<!--About Author-->
<section class="about-author">
  <div class="container">
    <div class="coach-info wow fadeInDown">
      <div class="row">

        <div class="col-md-12 col-sm-7">
          <div class="author-info-content text-center">
            <h4>' . $name . '</h4>
            <a href="tel:' . $phone . '">
              <h3><i class="fa fa-phone"></i>' . $phone . '</a></h3>
           <h4>Para cualquier informaci&oacute o cambios de su cita concretadas nuestra informaci&oacuten est&aacute disponible...</h4>
            <p>Tendrás un plan de ejercicios completamente personalizado y un plan de alimentación balanceada</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>


<!--Facebook Proof-->
<section class="facecook-proof">
  <div class="container">
    <span class="main-heading">
    <h2> Resultados sorprendentes de personas que despues de realizarce el Scanner Corporal pusieron en pr&aacutectica el plan que les dimos</h2>
    <div class="customer-text">
    <p style="color: #212121"> Muchas personas experimentan esos resultados sorprendentes en sólo 4 semanas y quieren seguir
      entrenando con nosotros. Echa un vistazo a algunos de estos resultados. Se uno de los 20 afortunados.<br><br> </p>
      </div>
      <div class="customer-photo">
          <div class="col-sm-4">
            <img src="../assets/images/customer-1.jpg" class="img-responsive">
          </div>
          <div class="col-sm-4">
            <img src="../assets/images/customer-2.jpg" class="img-responsive">
          </div>
          <div class="col-sm-4">
            <img src="../assets/images/customer-3.jpg" class="img-responsive">
          </div>
        </div>

      <span class="request-btn"> <a href="#goform" class="page-scroll">Iniciate Hoy <i class="fa fa-chevron-circle-right"></i></a> </span>
    </div>
  </div>
</section>
<!--Customer-->
<section class="customers">
  <div class="container">
    <span class="main-heading">
    <h2> Resultados sorprendentes de personas que despues de realizarce el Scanner Corporal pusieron en pr&aacutectica el plan que les dimos</h2>
    <div class="customer-text">
    <p> Muchas personas experimentan esos resultados sorprendentes en sólo 4 semanas y quieren seguir
      entrenando con nosotros. Echa un vistazo a algunos de estos resultados. Se uno de los 20 afortunados.<br><br> </p>
      </div>
    </span>
    <div class="customer-photo">
        <div class="customer-photo">
          <div class="col-sm-4">
            <img src="../assets/images/customer-4.jpg" class="img-responsive">
          </div>
          <div class="col-sm-4">
            <img src="../assets/images/customer-5.jpg" class="img-responsive">
          </div>
          <div class="col-sm-4">
            <img src="../assets/images/customer-6.jpg" class="img-responsive">
          </div>
        </div>

         <span class="request-btn"> <a href="#goform" class="page-scroll">Iniciate Hoy <i class="fa fa-chevron-circle-right"></i></a> </span>
      </div>
      </div>
    </div>
</section>


<!--End Home Page-->



<!--Stylesheet-->
  
  <link href="../assets/css/theme.css" rel="stylesheet" type="text/css">
  <link href="../assets/css/bootstrap.css" rel="stylesheet" type="text/css">
  <link rel="stylesheet" href="../assets/css/responsiveslides.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
  <!--Stylesheet-->

  <!--JavaScript-->
  <script src="http://code.jquery.com/jquery-latest.min.js"></script>
  <script src="../assets/js/video.js"></script>
  <script>
  $(function() {
  $(".video-link").jqueryVideoLightning({
  autoplay: 1,
  backdrop_color: "#ddd",
  backdrop_opacity: 0.6,
  glow: 20,
  glow_color: "#000"
  });
  });
  </script>




<style type="text/css">
    .video-target {
    cursor: pointer;
}

.video-wrapper {
    display: none;
    position: fixed;
    min-width: 100%;
    min-height: 100%;
    top: 0;
    right: 0;
    bottom: 0;
    left: 0;
    background: #000;
    z-index: 21000;
}

.video-frame {
    position: absolute;
    top: 50%;
    left: 50%;
}

.video-close{
    float:right;
    margin-top:-30px;
    margin-right:-30px;
    cursor:pointer;
    color: #fff;
    border: 1px solid #AEAEAE;
    border-radius: 30px;
    background: #605F61;
    font-size: 31px;
    font-weight: bold;
    display: inline-block;
    line-height: 0px;
    padding: 11px 3px;
}

.video-close:before {
    content: "×";
}
</style>
  
</body>
</html>
';

$mensaje1 ='
<?php
  $conexion = new mysqli("localhost", "thrdaytr_webapp", "pRf_&lue#LU7", "thrdaytr_planhbl");
  $search = $conexion->query(\'SELECT * FROM coach WHERE id ="'.$id_coach_lead.'"\');
  if ($search->num_rows > 0) {
  $row = $search->fetch_assoc();
  $mail_coach = $row["email"];
  $id_coach = $row["id"];
}else{
  $id_coach="";
}
?>

<!DOCTYPE HTML>
<html>
<head>
<script src="http://planhbl.com/hecoweb/panel/visitas.php"></script>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8"><meta name="viewport" content="width=device-width, initial-scale=1">
  <title>3Day Trial Pack | Home</title>
  <!--Stylesheet-->
  <link rel="icon" href="../../assets/images/favicon.png">
  <link href="../../assets/css/theme.css" rel="stylesheet" type="text/css">
  <link href="../../assets/css/bootstrap.css" rel="stylesheet" type="text/css">
  <link rel="stylesheet" href="../../assets/css/responsiveslides.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
  <!--Stylesheet-->


  <!--Script para ver el dispositivo -->
  <script type="text/javascript">
    var device = navigator.userAgent

    if (device.match(/Iphone/i) ||
        device.match(/Ipod/i)||
        device.match(/Android/i)||
        device.match(/J2ME/i)||
        device.match(/BlackBerry/i)||
        device.match(/iPhone|iPad|iPod/i)||
        device.match(/Opera Mini/i)||
        device.match(/IEMobile/i)||
        device.match(/Mobile/i)||
        device.match(/Windows Phone/i)||
        device.match(/windows mobile/i)||
        device.match(/windows ce/i)||
        device.match(/webOS/i)||
        device.match(/palm/i)||
        device.match(/bada/i)||
        device.match(/series60/i)||
        device.match(/nokia/i)||
        device.match(/symbian/i)||
        device.match(/HTC/i))
    {

    }
    else
    {
      window.location = "../";
    }
  </script>



<style type="text/css">
    .video-responsive {
    position: relative;
    margin-bottom: 20px;
    padding-top: 56.25%;
}
.video-responsive iframe {
    position: absolute;
    top: 0;
    padding-right: 10px;
    width: 100%;
    height: 100%;
}
</style>

<script>
/* When the user clicks on the button, 
toggle between hiding and showing the dropdown content */
function myFunction() {
    document.getElementById("myDropdown").classList.toggle("show");
}

// Close the dropdown if the user clicks outside of it
window.onclick = function(event) {
  if (!event.target.matches(\'.dropbtn\')) {

    var dropdowns = document.getElementsByClassName("dropdown-content");
    var i;
    for (i = 0; i < dropdowns.length; i++) {
      var openDropdown = dropdowns[i];
      if (openDropdown.classList.contains(\'show\')) {
        openDropdown.classList.remove(\'show\');
      }
    }
  }
}
</script>

<style type="text/css">
    .video-responsive {
    position: relative;
    margin-bottom: 20px;
    padding-top: 56.25%;
}
.video-responsive iframe {
    position: absolute;
    top: 0;
    padding-right: 10px;
    width: 100%;
    height: 100%;
}
</style>

<style>
.dropbtn {
    background-color: #4CAF50;
    color: white;
    padding: 4px;
    font-size: 16px;
    border: none;
    cursor: pointer;
}

.dropbtn:hover, .dropbtn:focus {
    background-color: #3e8e41;
}

.dropdown {
    float: right;
    position: relative;
    display: inline-block;
    
}

.dropdown-content {
    display: none;
    position: absolute;
    background-color: #f9f9f9;
    min-width: 160px;
    overflow: auto;
    box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
    right: 0;
}

.dropdown-content a {
    color: black;
    padding: 12px 16px;
    text-decoration: none;
    display: block;
}

.dropdown a:hover {background-color: #f1f1f1}

.show {display:block;}
</style>

</head>

<body class="magic">

<!--Start Home Page-->

<!--Top-Script-->
<div class="black-stip">
  <div class="container">
    <strong>Bienvenidos a nuestro Perfil de Bienestar, Coach: <b> ' .  $name . '</b></strong>

  </div>
</div>

<img src="../../assets/images/banner.jpg" width="100%" height="auto">


<!-- Video Wrap & Form -->
<div class="container">
  <div class="row">
    <div class="col-md-6" style="margin-top:60px;">


      <div class="video-responsive">
        <iframe src="https://player.vimeo.com/video/'.$idvideo1.'" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
      </div>



    </div>
<?php set_time_limit(0);


if($_POST["Continue"]){


  //EMAIL DEL DESTINATARIO
  $FromName = $_POST["firstname"]." ".$_POST["lastname"];
  $FromMail = $mail_coach;
  $Phone = $_POST["phone"];
  $firstname = $_POST["firstname"];
  $lastname = $_POST["lastname"];

  //ASUNTO DEL EMAIL
  $asunto = "Body Scan Capturadora";


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
     Estimado Miembro: <b><i>" . $FromName ." <br>Phone: ". $Phone . "</i></b> 
    </td>
   </tr>
   <tr>
     <td style=\'padding: 20px 0 30px 0;color: #153643; font-family: Arial, sans-serif; font-size: 16px; line-height: 20px;\'>
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

 ?>
    <dic class="col-md-6">
      <div class="form-part wow fadeInDown">
        <h2 id="goform">¡Empieza ahora!</h2>
        <p>Rellena este formulario para empezar ahora!</p>
         <?php 
          if($_POST["Continue"]) { ?>
          <table width="100%" border="0" align="center" cellpadding="2" cellspacing="1" bgcolor="#333333">
            <tr>
              <td bgcolor="#f5f5f5" style="font-family:verdana;color:#000000;font-size:15px;" class="text-center">
              <?
              foreach ($file as $mail) {
                if(mail($mail, $asunto, $mensaje, $headers)) {
                  echo "<font color=green face=verdana>".$mail." Verifica en la Carpeta Spam si aún no ha llegado el mensaje</font><br>
                  <font color=green face=verdana size=5>Mensaje Enviado Exitosamente.!</font><br>";
                  $i++;
                  $insert = "INSERT INTO emails(id_coach,firstname,lastname,email,phone) VALUES(\'".$id_coach."\',\'".$firstname."\',\'".$lastname."\',\'".$arquivo."\',\'".$Phone."\')";
                  if ($conexion->query($insert) == TRUE) {
                    echo" <script>alert(\'Mensaje Enviado Esitosamente!\')</script>";
                  }else{
                    echo "<script>
                        history.back();
                      </script>";
                  }
                } else {
                  echo $mail[$i]." <font color=red>Mensaje No Enviado</font><br><hr>";
                  
                }
              }
              ?>
              </td>
            </tr>
          </table>
          <br><br>
        <?php }  ?>
        <form method="post" action="">
          <input type="hidden" name="message_group_admin_id" value="55">
          <input name="revisit" value="1" type="hidden">
          <input type="hidden" name="activity_id" value="15">
          <input type="hidden" name="score_id" value="4">
          <div class="form-group">
            <input type="name" name="firstname" class="form-control" placeholder="Nombre"></div>
          <div class="form-group">
            <input type="lastname" name="lastname" class="form-control" placeholder="Apellido"></div>
          <div class="form-group">
            <input type="phone" name="phone" class="form-control" placeholder="Introduce tu Número de Telefono"></div>
          <div class="form-group">
            <input type="lista" name="lista" class="form-control" placeholder="Introduce tu Email"></div>

          <div class="form-group">
           <input type="submit" value="Continue" id="Continue" name="Continue" class="btn"></div>
        </form>
      </div>
     
    </dic>
  </div>
</div>




<!--Bonus Part-->
<section class="bonus">
  <div class="container">
    <span class="main-heading wow fadeInDown">
    <h2>A traves de este <strong>Perfil de Bienestar</strong><br>vas a llevarte uns informacion que te llenara de...</h2>
    <div class="bonus-wrap">
          <div class="mobile-bonus visible-xs">
            <img src="../../assets/images/bonus-2m.jpg" class="img-responsive">
          </div>
          <div class="bonus-main food wow fadeInDown">
            <img src="../../assets/images/bonus.jpg" class="img-responsive">
             <div class="bonus-data"> <span class="count">1</span>
               <h4>Porcentaje de Grasa y Masa Muscular</h4>
                <p>A traves de estas dos lecturas pordras saber que porcentaje de tu cuerpo esta rodeado de grasa y cual es masa muscular, para poder saber cuanta grasa debes de bajar y cuanta masa muscular te hace falta subir para ponerte en forma.</p>
                <p>La importancia es ponerte en forma para que lo hagamos en una manera saludable, estos dos indicadores reopresentan una parte esencial</p>
              </div>
          </div>



          <div class="mobile-bonus visible-xs">
            <img src="../../assets/images/bonus-1m.jpg" class="img-responsive">
          </div>
          <div class="bonus-main workout wow fadeInDown">
            <img src="../../assets/images/bonus-1.jpg" class="img-responsive">
              <div class="bonus-data bonus-right"> <span class="count">2</span>
                <h4>BMR (Basal metabolic rate o Regulador de Metabolismo Basal)</h4>
                <p style="font-size: 20px;">Este indicador te informara de cuantas calorias tu cuerpo quema en modo de reposo, a traves de este numero podras saber que puedes comer para obtener un resultado mas optimo.</p>
              </div>
          </div>

          <div class="mobile-bonus visible-xs">
            <img src="../../assets/images/bonus-3m.jpg" class="img-responsive">
          </div>
          <div class="bonus-main group wow fadeInDown">
            <img src="../../assets/images/bonus-3.jpg" class="img-responsive">
              <div class="bonus-data"> <span class="count">3</span>
                <h4>Plan opcional de resultados</h4>
                <p style="font-size: 20px;">Tu Coach a traves de todos estos indicadores te dara las recomendaciones necesarias personalizadas a tus necesidades para que puedas comenzar a tener un resultado mas optimo segun tu tipo de cuerpo.</p>
              </div>
          </div>
          <div class="text-center" style="font-size: 15px;">
          <p>Este scanner corporal te dar&aacute un reporte muy completo acerca de diferentes &aacutereas importantes y entender cualquier programa de ejercicios y nutricion para controlar tu peso, Aprovecha, actua ya y se una de las 20 personas que se ganen este scanner corporal completamente <strong>GRATIS</strong> y asi no tendr&aacutes que pagar por una evaluaci&oacuten como &eacutesta.</p>
        </div>
      </div>

</section>
<!--About Author-->
<section class="about-author">
  <div class="container">
    <div class="coach-info wow fadeInDown">
      <div class="row">

        <div class="col-md-12 col-sm-7">
          <div class="author-info-content text-center">
            <h4>' . $name . '</h4>
            <a href="tel:' . $phone . '">
              <h3><i class="fa fa-phone"></i>' . $phone . '</a></h3>
            <h4>Para cualquier informaci&oacute o cambios de su cita concretadas nuestra informaci&oacuten est&aacute disponible...</h4>
            <p>Tendrás un plan de ejercicios completamente personalizado y un plan de alimentación balanceada</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>


<!--Facebook Proof-->
<section class="facecook-proof">
  <div class="container">
    <span class="main-heading">
    <h2> Resultados sorprendentes de personas que despues de realizarce el Scanner Corporal pusieron en pr&aacutectica el plan que les dimos</h2>
    <div class="customer-text">
    <p style="color: #212121"> Muchas personas experimentan esos resultados sorprendentes en sólo 4 semanas y quieren seguir
      entrenando con nosotros. Echa un vistazo a algunos de estos resultados. Se uno de los 20 afortunados.<br><br> </p>
      </div>
      <div class="customer-photo">
          <div class="col-sm-4">
            <img src="../../assets/images/customer-1.jpg" class="img-responsive">
          </div>
          <div class="col-sm-4">
            <img src="../../assets/images/customer-2.jpg" class="img-responsive">
          </div>
          <div class="col-sm-4">
            <img src="../../assets/images/customer-3.jpg" class="img-responsive">
          </div>
        </div>

      <span class="request-btn"> <a href="#goform" class="page-scroll">Iniciate Hoy <i class="fa fa-chevron-circle-right"></i></a> </span>
    </div>
  </div>
</section>
<!--Customer-->
<section class="customers">
  <div class="container">
    <span class="main-heading">
    <h2> Resultados sorprendentes de personas que despues de realizarce el Scanner Corporal pusieron en pr&aacutectica el plan que les dimos</h2>
    <div class="customer-text">
    <p> Muchas personas experimentan esos resultados sorprendentes en sólo 4 semanas y quieren seguir
      entrenando con nosotros. Echa un vistazo a algunos de estos resultados. Se uno de los 20 afortunados.<br><br> </p>
      </div>
    </span>
    <div class="customer-photo">
        <div class="customer-photo">
          <div class="col-sm-4">
            <img src="../../assets/images/customer-4.jpg" class="img-responsive">
          </div>
          <div class="col-sm-4">
            <img src="../../assets/images/customer-5.jpg" class="img-responsive">
          </div>
          <div class="col-sm-4">
            <img src="../../assets/images/customer-6.jpg" class="img-responsive">
          </div>
        </div>

         <span class="request-btn"> <a href="#goform" class="page-scroll">Iniciate Hoy <i class="fa fa-chevron-circle-right"></i></a> </span>
      </div>
      </div>
    </div>
</section>

<!--End Home Page-->
</body>
</html>';



echo '<div class="container">';
               echo ' <div class="row">';
                    echo '<div class="inner-addon left-addon">';


echo "<h4>Has Seleccionado: " . $selected . "</h4>";



            if ($value == 'USA') {
                $estructura1 = "../../BodyScan/".$folder;

                //creamos directorio para USA
 
         if(file_exists($estructura1)){
            ?>
            

            <?php 

            echo "<script> 
                alert('El nombre de la Carpeta existe en USA')
                </script>";

            echo("<h3>Capturadora en Estados Unidos</h3><br>");
            echo("El nombre de la Carpeta existe<br><br>");
            echo "<a href=".$estructura1." target='_blank' class='btn btn-success  '><span class='glyphicon glyphicon-thumbs-up'></span> Mostrar Web ''".$folder."''</a>";

            echo "<br><br>";

            echo "<input type='button' class='btn btn-danger' value='volver atrás' name='volver atrás2' onclick='history.back()' /><br><br><br><br>";
                    echo '</div>';
                echo '</div>';
            echo '</div>';
            //echo $mensaje;
        }else{
            mkdir($estructura1, 0777);
            mkdir($estructura1."/movil", 0777);
 
            //indicamos la ruta del fichero index.php
  
            $rout1 = $estructura1."/index.php";
            $rout2 = $estructura1."/movil/index.php";    
 
            //Creamos el fichero index.php e introducimos el contenido del TextArea 
            $aa = file_put_contents($rout1, $mensaje);
            $bb = file_put_contents($rout2, $mensaje1);
 
            if(!$aa){echo "ERROR al insertar el fichero";}   
            if(!$bb){echo "ERROR al insertar el fichero";}  

            echo "<script> 
                alert('Se ha creado Satisfactoriamente en USA')
                </script>";


            echo "<a href=".$estructura1." target='_blank' class='btn btn-success  '><span class='glyphicon glyphicon-thumbs-up'></span> Show Web ''".$folder."''</a>";
            echo "<br/>";
            echo "<br/>";
            /*echo $estructura1; 
            echo "<br/>";
            $host= $_SERVER["HTTP_HOST"];
            echo "<input type='text' class='form-control' value='http://" . $estructura1 . "'>";
            echo "<br>";*/

            $insert = "INSERT INTO webcoach(coach,web,dir_name,folder,country) VALUES('$id_coach_lead','BodyScan','$estructura1','$folder','$value')";
              if ($conexion->query($insert) == TRUE) {
              }else{

              }
    }


            }
            if ($value == 'Colombia') {
                $estructura2 = "../../bodyscan/".$folder;

                 //creamos directorio para Colombia
        if(file_exists($estructura2)){
            ?>
            <div class="container">
                <div class="row">
                    <div class="inner-addon left-addon">

            <?php 

            echo "<script> 
                alert('El nombre de la Carpeta existe e on Colombia')
                </script>";

            echo("<h3>Capturadora Creada Satisfactoriamente en Colombia</h3><br>");
            echo("El nombre de la Carpeta existe e<br><br>");
            echo "<a href=".$estructura2." target='_blank' class='btn btn-success  '><span class='glyphicon glyphicon-thumbs-up'></span> Show Web ''".$folder."''</a>";

            echo "<br><br>";

            echo "<input type='button' class='btn btn-danger' value='volver atrás' name='volver atrás2' onclick='history.back()' />";


                     echo '</div>';
                echo '</div>';
            echo '</div>';
            //echo $mensaje;
        }else{
            mkdir($estructura2, 0777);
            mkdir($estructura2."/movil", 0777);
 
            //indicamos la ruta del fichero index.php
 
            $ruta = $estructura2."/index.php";
            $ruta2 = $estructura2."/movil/index.php";
 
            //Creamos el fichero index.php e introducimos el contenido del TextArea 
            $a = file_put_contents($ruta, $mensaje);
            $b = file_put_contents($ruta2, $mensaje1);
 
            if(!$a){echo "ERROR al insertar el fichero<br>";}   
            if(!$b){echo "ERROR al insertar el fichero<br>";}  

            
            $insert = "INSERT INTO webcoach(coach,web,dir_name,folder,country) VALUES('$id_coach_lead','bodyscan','$estructura2','$folder','$value')";
              if ($conexion->query($insert) == TRUE) {
              }else{

              }           




             echo "<script> 
                alert('Creado Satisfactoriamente en Colombia')
                </script>";

            echo "<a href=".$estructura2." target='_blank' class='btn btn-success  '><span class='glyphicon glyphicon-thumbs-up'></span> Mostrar Web ''".$folder."''</a>";
            echo "<br/>";
            echo "<br/>";

        }


            }

            if ($value == 'Dominicana') {
                $estructura3 = "../../rdBodyscan/".$folder;

                 //creamos directorio para Republica Dominicana
        if(file_exists($estructura3)){
            ?>
            <div class="container">
                <div class="row">
                    <div class="inner-addon left-addon">

            <?php 

            echo "<script> 
                alert('El nombre de la Carpeta existe en Republica Dominicana')
                </script>";

            echo("<h3>Capturadora Creada Satisfactoriamente en Republica Dominicana</h3><br>");
            echo("El nombre de la Carpeta existe e<br><br>");
            echo "<a href=".$estructura3." target='_blank' class='btn btn-success  '><span class='glyphicon glyphicon-thumbs-up'></span> Show Web ''".$folder."''</a>";

            echo "<br><br>";

            echo "<input type='button' class='btn btn-danger' value='volver atrás' name='volver atrás2' onclick='history.back()' />";


                     echo '</div>';
                echo '</div>';
            echo '</div>';
            //echo $mensaje;
        }else{
            mkdir($estructura3, 0777);
            mkdir($estructura3."/movil", 0777);
 
            //indicamos la ruta del fichero index.php
 
            $ruta = $estructura3."/index.php";
            $ruta2 = $estructura3."/movil/index.php";
 
            //Creamos el fichero index.php e introducimos el contenido del TextArea 
            $a = file_put_contents($ruta, $mensaje);
            $b = file_put_contents($ruta2, $mensaje1);
 
            if(!$a){echo "ERROR al insertar el fichero<br>";}   
            if(!$b){echo "ERROR al insertar el fichero<br>";}  

            
            $insert = "INSERT INTO webcoach(coach,web,dir_name,folder,country) VALUES('$id_coach_lead','rdBodyscan','$estructura3','$folder','$value')";
              if ($conexion->query($insert) == TRUE) {
              }else{

              }           




             echo "<script> 
                alert('Creado Satisfactoriamente en Colombia')
                </script>";

            echo "<a href=".$estructura3." target='_blank' class='btn btn-success  '><span class='glyphicon glyphicon-thumbs-up'></span> Mostrar Web ''".$folder."''</a>";
            echo "<br/>";
            echo "<br/>";

        }


            }

        }
    }
    else {
        $selected = 'Seleccione una Web para crear la  url, USA or Colombia';
    }



   

} else{

?>

<link href="../css/bootstrap.css" rel="stylesheet" type='text/css' />
<link href="../css/style2.css" rel="stylesheet" type='text/css' />
<style>
    /* enable absolute positioning */
.inner-addon {
  position: relative;
  margin-bottom: 10px;
}

/* style glyph */
.inner-addon .glyphicon {
  position: absolute;
  padding: 10px;
  pointer-events: none;
}

/* align glyph */
.left-addon .glyphicon  { left:  0px;}
.right-addon .glyphicon { right: 0px;}

/* add padding  */
.left-addon input  { padding-left:  30px; }
.right-addon input { padding-right: 30px; }



body {
  margin: 10px;
}

</style>

<script type="text/javascript">
    function showContent() {
        element = document.getElementById("content");
        check = document.getElementById("USA");
        if (check.checked) {
            element.style.display='block';
        }
        else {
            element.style.display='none';
        }
    }
</script>

<?php 
if ($tipo_usu == "Administrador") {
 ?>

<div class="container">
    <div class="row">
        <form action="bodyscan2.php" method="POST">
            <h3>Crear Capturadora Fit Camp</h3>
<br>
          <div class="form-group col-xs-8">
          <label for="name">Seleccione un Entrenador</label>
            <div class="inner-addon left-addon">
               <select name="coach" id="coach" class="form-control" required>
                <option value="">>-----------------Seleccionar Entrenador--------------<</option>
                  <?php
                  $result = $conexion->query("SELECT * FROM coach");
                  if ($result->num_rows > 0) {
                      while ($row = $result->fetch_assoc()) {  

                          echo '<option value="'.$row['id'].'">'.$row['name'].'</option>';
                      }
                  }
                  ?>
              </select>
            </div>

            <div class="inner-addon left-addon" id="coach_leads">            </div>

            <label for="folder">Nombre Carpeta</label>
            <div class="inner-addon left-addon">
              <i class="glyphicon glyphicon-folder-open"></i>
              <input type="text" class="form-control" placeholder="Example: luismarin"  id="folder" name="folder" required/>
            </div>

            <label for="">Crear web en</label>
            <div class="inner-addon left-addon">
              <!--<input type="checkbox" name="web[]" id="USA" value="USA" onchange="javascript:showContent()"/> U.S.A <br/>-->
              <input type="checkbox" name="web[]" value="Colombia"/> Colombia <br/>
              <input type="checkbox" name="web[]" value="Dominicana"/> Rep&uacuteblica Dominicana <br/>
            </div>

            <h3 align="center">Change Video from Capturing</h3>
              <br>
              <h4>Video para Capturadoras Colombia y Rep. Dominicana</h4>
              <div class="col-xs-5">
                <label for="video">Select origen Video</label><br>
                <input type="radio" name="video1" value="y-"> YouTube&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <input type="radio" name="video1" value="v-"> Vimeo
              </div>
              <div class="col-xs-6">
                <input type="text" name="idvideo1" id="video" class="form-control" placeholder="ID Vimeo or YouTube ">
              </div>
              <br><br>
              <!--<div id="content" style="display: none;">
              <br>
                <h4>Video para Capturadoras U.S.A</h4>
                <div class="col-xs-5">
                <label for="video">Select origen Video</label><br>
                <input type="radio" name="video2" value="y-"> YouTube&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <input type="radio" name="video2" value="v-"> Vimeo
              </div>
              <div class="col-xs-6">
                <input type="text" name="idvideo2" id="video" class="form-control" placeholder="ID Vimeo or YouTube ">
              </div>
              </div>-->
            <br><br><br>
            <div class="row">
              <h3 align="center">How to change a Video</h3>
              <div class="col-xs-4">
                <div class="bonus-data"> <span class="count"><font color="black">1</font></span><br><br><br></div>
                Select a ID from video url Vimeo or Youtube https://vimeo.com/<strong><i>182629472</i></strong> or https://www.youtube.com/watch?v=<strong><i>UUqzPRClA4o</i></strong>
              </div>
              <div class="col-xs-4">
                <div class="bonus-data"> <span class="count"><font color="black">2</font></span><br><br><br></div>
                Select a Origin Video, Insert de ID in text form, if is Vimeo is: <strong><i>182629472</i></strong>, if is YouTube is: <strong><i>UUqzPRClA4o</i></strong>
              </div>
              <div class="col-xs-4">
                <div class="bonus-data"> <span class="count"><font color="black">3</font></span><br><br><br></div>
                Press the Button "Change Video" and update you Capturing for see the new Video
              </div>
            </div>
            <br><br>
            <input type="submit" class="btn btn-success" value="Create  >">
                
          </div>
                
          </div>
            

        </form>
    </div>
</div>


<?php 
} elseif ($tipo_usu == "Lider") {
  ?>

<div class="container">
    <div class="row">
        <form action="bodyscan2.php" method="POST">
            <h3>Crear Capturadora Body Scan (Perfil de Bienestar)</h3>
<br>
          <div class="form-group col-xs-8">
          <label for="name">Entrenador :</label>
            <div class="inner-addon left-addon">
            <?php 
              $user2 = $conexion->query("SELECT * FROM coach WHERE id = ".$id_name);
              $row2 = $user2->fetch_assoc();
              $name_user = $row2['name'];
              echo $name_user;
              echo '<input type="hidden" class="form-control"  name="id_coach" id="coach" value="'.$id_name.'" readonly/>';
            
            echo "</div>";

           
            $result = $conexion->query("SELECT * FROM coachleads WHERE id_coach = ".$id_name);
            if ($result->num_rows > 0) {
              echo '<label for="name">Select Coach Leads</label>
              <select name="id_coach_lead" id="coach_lead" class="form-control" required>
                            <option value="">>-----------------Select a Downline--------------<</option>';
                while ($row = $result->fetch_assoc()) {               
                    echo '<option value="'.$row['id'].'">'.$row['name'].'</option>';
                }
                echo "</select>";
              ?>

            <label for="folder">Nombre Carpeta</label>
            <div class="inner-addon left-addon">
              <i class="glyphicon glyphicon-folder-open"></i>
              <input type="text" class="form-control" placeholder="Example: luismarin"  id="folder" name="folder" required/>
            </div>

            <label for="">Crear web en</label>
            <div class="inner-addon left-addon">
              <!--<input type="checkbox" name="web[]" id="USA" value="USA" onchange="javascript:showContent()"/> U.S.A <br/>-->
              <input type="checkbox" name="web[]" value="Colombia"/> Colombia <br/>
              <input type="checkbox" name="web[]" value="Dominicana"/> Rep&uacuteblica Dominicana <br/>
            </div>

            <h3 align="center">Change Video from Capturing</h3>
              <br>
              <h4>Video para Capturadoras Colombia y Rep. Dominicana</h4>
              <div class="col-xs-5">
                <label for="video">Select origen Video</label><br>
                <input type="radio" name="video1" value="y-"> YouTube&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <input type="radio" name="video1" value="v-"> Vimeo
              </div>
              <div class="col-xs-6">
                <input type="text" name="idvideo1" id="video" class="form-control" placeholder="ID Vimeo or YouTube ">
              </div>
              <br><br>
            <div class="row">
              <h3 align="center">How to change a Video</h3>
              <div class="col-xs-4">
                <div class="bonus-data"> <span class="count"><font color="black">1</font></span><br><br><br></div>
                Select a ID from video url Vimeo or Youtube https://vimeo.com/<strong><i>182629472</i></strong> or https://www.youtube.com/watch?v=<strong><i>UUqzPRClA4o</i></strong>
              </div>
              <div class="col-xs-4">
                <div class="bonus-data"> <span class="count"><font color="black">2</font></span><br><br><br></div>
                Select a Origin Video, Insert de ID in text form, if is Vimeo is: <strong><i>182629472</i></strong>, if is YouTube is: <strong><i>UUqzPRClA4o</i></strong>
              </div>
              <div class="col-xs-4">
                <div class="bonus-data"> <span class="count"><font color="black">3</font></span><br><br><br></div>
                Press the Button "Change Video" and update you Capturing for see the new Video
              </div>
            </div>
            <br><br>
            <input type="submit" class="btn btn-success" value="Create  >">
                
          </div>
            <?php 

            }else {
              echo 'Register a new coach Leads for continues<br>
                  <a href="../panel/new-coach-leads.php" class="btn btn-success">Create  ></a>';
              
            }  ?>

        </form>
    </div>
</div>



<?php 
  } elseif ($tipo_usu == "Usuario") {

    ?>

<div class="container">
    <div class="row">
        <form action="bodyscan2.php" method="POST">
            <!--<h3>Create Web Collagen</h3>-->
            <h3>Crear Capturadora Body Scan (Perfil de Bienestar)</h3>
<br>
          <div class="form-group col-xs-8">

          <label for="name">Entrenador :</label>
            <div class="inner-addon left-addon">
            <?php 
              $user2 = $conexion->query("SELECT * FROM coachleads WHERE id = ".$id_name);
              $row2 = $user2->fetch_assoc();
              $name_user = $row2['name'];
              echo $name_user;
              echo '<input type="hidden" class="form-control"  name="id_coach_lead" id="coach" value="'.$id_name.'" readonly/>';
            ?>
            </div>


            <label for="folder">Nombre Carpeta Capturadora</label>
            <div class="inner-addon left-addon">
              <i class="glyphicon glyphicon-folder-open"></i>
              <input type="text" class="form-control" placeholder="Example: luismarin"  id="folder" name="folder" required/>
            </div>

            
            <label for="">Crear web en</label>
            <div class="inner-addon left-addon">
            <input type="checkbox" name="web[]" value="Colombia"/> Colombia <br/>
            <input type="checkbox" name="web[]" value="Dominicana"/> República Dominicana <br/>
            </div>


            <h3 align="center">Change Video from Capturing</h3>
              <br>
              <h4>Video para Capturadoras U.S.A</h4>
              <div class="col-xs-5">
                <label for="video">Select origen Video</label><br>
                <input type="radio" name="video1" value="y-"> YouTube&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <input type="radio" name="video1" value="v-"> Vimeo
              </div>
              <div class="col-xs-6">
                <input type="text" name="idvideo1" id="video" class="form-control" placeholder="ID Vimeo or YouTube ">
              </div>
              <br><br><br>
            <div class="row">
              <h3 align="center">How to change a Video</h3>
              <div class="col-xs-4">
                <div class="bonus-data"> <span class="count"><font color="black">1</font></span><br><br><br></div>
                Select a ID from video url Vimeo or Youtube https://vimeo.com/<strong><i>182629472</i></strong> or https://www.youtube.com/watch?v=<strong><i>UUqzPRClA4o</i></strong>
              </div>
              <div class="col-xs-4">
                <div class="bonus-data"> <span class="count"><font color="black">2</font></span><br><br><br></div>
                Select a Origin Video, Insert de ID in text form, if is Vimeo is: <strong><i>182629472</i></strong>, if is YouTube is: <strong><i>UUqzPRClA4o</i></strong>
              </div>
              <div class="col-xs-4">
                <div class="bonus-data"> <span class="count"><font color="black">3</font></span><br><br><br></div>
                Press the Button "Change Video" and update you Capturing for see the new Video
              </div>
            </div>
            <br><br>
            <input type="submit" class="btn btn-success" value="Create  >">
                
          </div>
            

        </form>
    </div>
</div>

<?php 
  } 

}

 
         ?>