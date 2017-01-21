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
if (isset($_POST['id_coach']) && isset($_POST['folder']) &&
    !empty($_POST['id_coach']) && !empty($_POST['folder'])) {
    $id_coach = $_POST['id_coach'];
    $folder = $_POST['folder'];
    $result1 = $conexion->query("SELECT * FROM coach
                                WHERE id = ".$id_coach);
    if ($result1->num_rows > 0) {
        $row1 = $result1->fetch_assoc();
        $name = $row1['name'];
        $email = $row1['email'];
        $phone = $row1['phone'];
    }else {
        echo "no data";}


     //VIDEO ESPAÑOL USA
      if (isset($_POST['idvideo1']) && isset($_POST['idvideo1']) && 
          isset($_POST['video1']) && isset($_POST['video1'])) {
        $idvideo1 = $_POST['idvideo1'];
        $video1 = $_POST['video1'];
      }else{
        $idvideo1 = '181632470';
        $video1 = 'v-';
      }

        //VIDEO INGLES USA
      if (isset($_POST['idvideo2']) && isset($_POST['idvideo2']) && 
          isset($_POST['video2']) && isset($_POST['video2'])) {
        $idvideo2 = $_POST['idvideo2'];
        $video2 = $_POST['video2'];
      }else{
        $idvideo2 = '181627976';
        $video2 = 'v-';
      }

      //VIDEO ESPAÑOL RD CO
      if (isset($_POST['idvideo3']) && isset($_POST['idvideo3']) && 
          isset($_POST['video3']) && isset($_POST['video3'])) {
        $idvideo3 = $_POST['idvideo3'];
        $video3 = $_POST['video3'];
      }else{
        $idvideo3 = '182629578';
        $video3 = 'v-';
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
  $search = $conexion->query(\'SELECT * FROM coach WHERE id ="'.$id_coach.'"\');
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
  if (!event.target.matches(".dropbtn")) {
    var dropdowns = document.getElementsByClassName("dropdown-content");
    var i;
    for (i = 0; i < dropdowns.length; i++) {
      var openDropdown = dropdowns[i];
      if (openDropdown.classList.contains("show")) {
        openDropdown.classList.remove("show");
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
    <strong>Distribuidor Independiente Herbalife: <b>' .  $name . '</b></strong>
    
  </div>
</div>
<img src="../assets/images/banner-es.jpg" width="100%" height="auto">
<!-- Video Wrap & Form -->
<div class="container">
  <div class="row">
    <div class="col-md-6" style="margin-top:60px;">
      <span class="video-link" data-video-id="'.$video3.$idvideo3.'">
        <img src="../assets/images/video-fake1.jpg" width="100%" height="auto">
      </span>
      <span class="video-link" data-video-id="'.$video3.$idvideo3.'" data-video-width="1280px" data-video-height="720px" data-video-autoplay="1" ></span>
    </div>
    <?php set_time_limit(0);
if($_POST["Continue"]){
  //EMAIL DEL DESTINATARIO
  $FromName = $_POST["firstname"]." ".$_POST["lastname"];
  $FromMail = $mail_coach;
  $Phone = $_POST["phone"];
  $firstname = $_POST["firstname"];
  $lastname = $_POST["lastname"];
  $meta = $_POST["custom_1"];
  //ASUNTO DEL EMAIL
  $asunto = "3daytrial Captura";
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
    <td>Meta: " . $meta . "</td>
   </tr>
   <tr>
     <td style=\'padding: 20px 0 30px 0;color: #153643; font-family: Arial, sans-serif; font-size: 16px; line-height: 20px;\'>
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
<td style=\'padding: 30px 30px 30px 30px;\'>
  <table border=\'0\' cellpadding=\'0\' cellspacing=\'0\' width=\'100%\'>
      <tr align=\'center\' >
        <td width=\'75%\' style=\'color: #153643; font-family: Arial, sans-serif; font-size: 16px; line-height: 20px;\'>
          
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
                  echo " <font color=green face=verdana size=4>Message Sending Successfully.!</font><br>
                  <font color=green face=verdana><b>".$mail."<b><br>Check the Spam Folder<br>if you have not yet reached<br>the message</font>";
                  $i++;
                  $insert = "INSERT INTO emails(id_coach,firstname,lastname,email,phone,web) VALUES(\'".$id_coach."\',\'".$firstname."\',\'".$lastname."\',\'".$arquivo."\',\'".$Phone."\',\'3daytrial\')";
                  if ($conexion->query($insert) == TRUE) {
                    echo" <script>alert(\'Message Send Successfully!\');
                    </script>";
                  }else{
                    echo "<script>
                        history.back();
                      </script>";
                  }
                } else {
                  echo $mail[$i]." <font color=red>Don´t Send Message</font><br><hr>";
                  
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
            <input type="name" name="firstname" class="form-control" placeholder="Nombre" required></div>
          <div class="form-group">
            <input type="lastname" name="lastname" class="form-control" placeholder="Apellido" required></div>
          <div class="form-group">
            <input type="phone" name="phone" class="form-control" placeholder="Introduce tu Número de Telefono" required></div>
          <div class="form-group">
            <input type="lista" name="lista" class="form-control" placeholder="Introduce tu Email" required></div>
          <div class="form-group">
            <select class="form-control" name="custom_1">
              <option value="">Selecciona tu Meta</option>
              <option value="Lose Weight">Perder Peso</option>
              <option value="Build Muscle">Ganar Masa Muscular</option>
              <option value="Gain Energy">Ganar Energia</option>
              <option value="Other">Otro</option>
            </select>
          </div>
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
    <h2>Los bonos que obtendrá con el <br><strong>Paquete de Prueba de 3 Días</strong></h2>
    </span>
    <div class="bonus-wrap">
      <div class=" grid1 cs-style-1">
        <figure>
          <div class="mobile-bonus visible-xs">
            <img src="../assets/images/bonus-1m.jpg" class="img-responsive">
          </div>
          <div class="bonus-main food wow fadeInDown">
            <img src="../assets/images/bonus-1.jpg" class="img-responsive">
            <figcaption>
              <div class="bonus-data"> <span class="count">1</span>
                <h4>Planes de comidas gratuitas
                  y deliciosas recetas saludables </h4>
                <p>Nuestra guía de programación contiene deliciosas
                  recetas saludables e ideas de comidas que son rápidas,
                  fáciles de hacer y absolutamente delicioso. Nuestros
                  planes de comidas se basan sólo en las porciones
                  correctas para el tamaño de tu cuerpo. Nuestra base de datos de
                  recetas siempre está creciendo por lo que este no es
                  uno de esos programas en los que se queda atascado al
                  comer los mismos alimentos para el resto de su vida!</p>
              </div>
            </figcaption>
          </div>
    </figure>
      </div>
      <div class="grid2 cs-style-2">
        <figure>
          <div class="mobile-bonus visible-xs">
            <img src="../assets/images/bonus-2m.jpg" class="img-responsive">
          </div>
          <div class="bonus-main workout wow fadeInDown">
            <img src="../assets/images/bonus-2.jpg" class="img-responsive">
            <figcaption>
              <div class="bonus-data bonus-right"> <span class="count">2</span>
                <h4>Entrenamientos libres de aumentar el metabolismo</h4>
                <p>Nuestros entrenamientos son un desafío para el núcleo!
                  Están diseñados para ser rápido (para que pueda encajar
                  incluso en el horario de mayor actividad) sino también
                  intensa para que pueda construir ese músculo magro
                  para que se vea mejor. Únete a cualquiera de nuestras
                   sesiones de entrenamiento GRATUITAS en las ciudades de
                  todo el país, o hacer los entrenamientos en casa. ¡Es tu elección!</p>
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
                <h4>Responsabilidades de la libre y Grupo de Apoyo</h4>
                <p>Aquí es el momento de la verdad! ¿Se queda cuentas?
                   Nuestros Distribuidores le ayudarán a mantener sus pies
                   en el fuego a través del uno-a-uno y la rendición de
                   cuentas de grupo. Estar motivados por ver los
                   resultados de otras personas de todo el país, así
                   como convertirse en motivación para otros compartiendo
                   su historia!</p>
              </div>
            </figcaption>
          </div>
        </figure>
        </div>
      </div>
</section>
<!--Trial Pack-->
<section class="pack-bg"><div class="container">
    <div class="pack-wrap wow fadeInDown">
      <div class="pack-main"> <span class="left-arrow"><img src="../assets/images/down-arrow.png"></span> <span class="main-heading">
        <h2>¿Qué hay en el <br><strong>Paquete de Prueba de 3 días?</strong></h2>
      </span> <span class="package-img"> <img src="../assets/images/package.png" class="img-responsive" alt="Package"></span> </div>
    </div>
  </div>
</section>
<!--Herbalife Products-->
<section class="herbalife-product">
  <div class="container">
    <div class="herbalife-wrap">
      <div class="main-product wow fadeInDown">
        <div class="col-sm-5"> <span class="product-img">
          <img src="../assets/images/meal-mix.png" class="img-responsive" alt="Meal Mix"></span>
        </div>
        <div class="col-sm-7">
          <h3>Fórmula 1 Comida Saludable Mezcla</h3>
          <p>Trata a tu cuerpo a una comida sana y equilibrada en
            poco tiempo! No sólo son estos batidos fáciles de hacer,
            también son deliciosos. Con hasta 21 vitaminas y minerales
            esenciales - y disponible en una variedad de sabores
            - Gestión de peso nunca supo tan bien!</p>
          <span class="note">
            <i class="fa fa-check-square-o"></i>
             3 días de alimentación incluida</span>
           </div>
      </div>
      <div class="main-product wow fadeInDown">
        <div class="col-sm-5">
          <span class="product-img">
            <img src="../assets/images/total-control.png" class="img-responsive" alt="Total Contraol"></span>
          </div>
        <div class="col-sm-7">
          <h3> Control total </h3>
          <p>Quema grasa rápidamente y de forma 100 % natural con esta poderosa mezcla de hierbas orientales.*</p>
          <p>Contiene 21 energizantes y factores botánicos saludables. Su composición es principalmente té verde y antioxidantes poderosos  que combaten los efectos de los radicales libres en el cuerpo.*</p>
          <p>Eficaz para quemar grasa corporal. Totalmente libre de calorías, su dulce es natural (contiene fructosa). Aporta micronutrientes y hierbas que potencian las células del cuerpo y así recibe el beneficio máximo de las comidas.*</p>
          <span class="note">
            <i class="fa fa-check-square-o"></i>
             3 días de alimentación incluida</span>
          <p><span class="imp">*</span> Estas declaraciones no han sido evaluadas por
            la Administración de Alimentos y Drogas. Este producto no está destinado
            a diagnosticar, tratar, curar o prevenir ninguna enfermedad.</p>
        </div>
      </div>
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
              <i class="fa fa-phone">
              </i><font size"5em">' . $phone . '</a></font>
            <h4>Seré su Distribuidor Nutrición para los próximos 3 días ...</h4>
            <p>Cuando usted toma mi Desafío salud de pruebas de 3 días, le ayudaré a desarrollar un plan
              de nutrición personal! Sus objetivos son únicos y su plan de nutrición debe ser así! Yo
              personalmente uso de estos productos y puedo decir que trabajo! Empiece hoy. Mire hacia adelante voy a ayudarle!</p>
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
    <h2> Mira a toda esa personas que toman la <br><strong>#3daytrial</strong></h2>
  </span> <span class="facebook-slogan"><img src="../assets/images/facebook.png"></span>
    <div class="proof-wrap">
      <div class="row">
        <div class="col-sm-6 wow slideInLeft" data-wow-duration="2s"><img src="../assets/images/post-1.png" class="img-responsive"></div>
        <div class="col-sm-6 wow slideInRight" data-wow-duration="2s"><img src="../assets/images/post-2.png" class="img-responsive"></div>
        <div class="col-sm-6 wow slideInLeft" data-wow-duration="2s"><img src="../assets/images/post-3.png" class="img-responsive"></div><!--
        <div class="col-sm-6 wow slideInRight" data-wow-duration="2s"><img src="../assets/images/post-4.png" class="img-responsive"></div>
        <div class="col-sm-6 wow slideInLeft" data-wow-duration="2s"><img src="../assets/images/post-5.png" class="img-responsive"></div>-->
        <div class="col-sm-6 wow slideInRight" data-wow-duration="2s"><img src="../assets/images/post-8-2.png" class="img-responsive" width="100%"></div>
      </div>
      <span class="request-btn"> <a href="#goform" class="page-scroll">Solicite su Paquete de 3 días de Prueba Hoy <i class="fa fa-chevron-circle-right"></i></a> </span>
    </div>
  </div>
</section>
<!--Customer-->
<section class="customers">
  <div class="container">
    <span class="main-heading">
    <h2> Resultados sorprendentes de clientes que continuaron el pasado la prueba de 3 días</h2>
    <p> Muchas personas experimentan esos resultados sorprendentes en sólo 3 días quieren seguir
      entrenando con nosotros. Echa un vistazo a algunos de estos resultados. </p>
    </span>
    <div class="customer-photo">
          <div class="col-sm-4">
            <img src="../assets/images/customer-1.jpg" class="img-responsive">
            <h4>Vincent y Neyla</h4>
          </div>
          <div class="col-sm-4">
            <img src="../assets/images/customer-2.jpg" class="img-responsive">
            <h4>Yomara</h4>
          </div>
          <div class="col-sm-4">
            <img src="../assets/images/customer-3.jpg" class="img-responsive">
            <h4>Lucy</h4>
          </div>
        </div>
        <div class="customer-text">
          <p>*Los consumidores que usan la Fórmula 1 de Herbalife dos veces por día como parte
            de un estilo de vida saludable en general, puede esperar perder alrededor de
            0,5 a 1 libra por semana. Los participantes en unas 12 semanas, utilizaron la
            Fórmula 1 dos veces al día (una vez como una comida y una
            vez como un aperitivo) con una dieta reducida en calorías y un objetivo de
            30 minutos de ejercicio por día. Los participantes siguieron una dieta alta
            en proteínas o una dieta rica en proteínas estándar. Los participantes en
            ambos grupos perdieron alrededor de 8,5 libras.</p>
        </div>
        <br>
        <div class="customer-photo">
          <div class="col-sm-4">
            <img src="../assets/images/customer-4.jpg" class="img-responsive">
            <h4>Juan</h4>
          </div>
          <div class="col-sm-4">
            <img src="../assets/images/customer-5.jpg" class="img-responsive">
            <h4>Jhosselin</h4>
          </div>
          <div class="col-sm-4">
            <img src="../assets/images/customer-6.jpg" class="img-responsive">
            <h4>Marcos</h4>
          </div>
        </div>
        <div class="customer-text">
          <p>*Los consumidores que usan la Fórmula 1 de Herbalife dos veces por día como parte
            de un estilo de vida saludable en general, puede esperar perder alrededor de
            0,5 a 1 libra por semana. Los participantes en unas 12 semanas, utilizaron la
            Fórmula 1 dos veces al día (una vez como una comida y una
            vez como un aperitivo) con una dieta reducida en calorías y un objetivo de
            30 minutos de ejercicio por día. Los participantes siguieron una dieta alta
            en proteínas o una dieta rica en proteínas estándar. Los participantes en
            ambos grupos perdieron alrededor de 8,5 libras.</p>
        </div>
      </div>
      </div>
    </div>
</section>
<!--Footer
<footer>
  <div class="container">
    <span class="hbl-pro">
      <p>Powered by <a href="#">HBL Pro </a></p>
      </span>
  </div>
</footer>
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
$mensaje2 = '
<?php
  $conexion = new mysqli("localhost", "thrdaytr_webapp", "pRf_&lue#LU7", "thrdaytr_planhbl");
  $search = $conexion->query(\'SELECT * FROM coach WHERE id ="'.$id_coach.'"\');
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
  if (!event.target.matches(".dropbtn")) {
    var dropdowns = document.getElementsByClassName("dropdown-content");
    var i;
    for (i = 0; i < dropdowns.length; i++) {
      var openDropdown = dropdowns[i];
      if (openDropdown.classList.contains("show")) {
        openDropdown.classList.remove("show");
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
</head>
<body class="magic">
<!--Start Home Page-->
<!--Top-Script-->
<div class="black-stip">
  <div class="container">
    <strong>Distribuidor Independiente Herbalife: <b>' . $name . '</b></strong>
     </div>
</div>
<img src="../../assets/images/banner-es.jpg" width="100%" height="auto">
<!-- Video Wrap & Form -->
<div class="container">
  <div class="row">
    <div class="col-md-6" style="margin-top:10px;">
      <div class="video-responsive">
        <iframe src="https://player.vimeo.com/video/'.$idvideo3.'" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
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
  $meta = $_POST["custom_1"];
  //ASUNTO DEL EMAIL
  $asunto = "3daytrial Captura";
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
    <td>Meta: " . $meta . "</td>
   </tr>
   <tr>
     <td style=\'padding: 20px 0 30px 0;color: #153643; font-family: Arial, sans-serif; font-size: 16px; line-height: 20px;\'>
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
<td style=\'padding: 30px 30px 30px 30px;\'>
  <table border=\'0\' cellpadding=\'0\' cellspacing=\'0\' width=\'100%\'>
      <tr align=\'center\' >
        <td width=\'75%\' style=\'color: #153643; font-family: Arial, sans-serif; font-size: 16px; line-height: 20px;\'>
          
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
                  echo " <font color=green face=verdana size=4>Message Sending Successfully.!</font><br>
                  <font color=green face=verdana><b>".$mail."<b><br>Check the Spam Folder<br>if you have not yet reached<br>the message</font>";
                  $i++;
                  $insert = "INSERT INTO emails(id_coach,firstname,lastname,email,phone,web) VALUES(\'".$id_coach."\',\'".$firstname."\',\'".$lastname."\',\'".$arquivo."\',\'".$Phone."\',\'3daytrial\')";
                  if ($conexion->query($insert) == TRUE) {
                    echo" <script>alert(\'Message Send Successfully!\');
                    </script>";
                  }else{
                    echo "<script>
                        history.back();
                      </script>";
                  }
                } else {
                  echo $mail[$i]." <font color=red>Don´t Send Message</font><br><hr>";
                  
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
            <input type="name" name="firstname" class="form-control" placeholder="Nombre" required></div>
          <div class="form-group">
            <input type="lastname" name="lastname" class="form-control" placeholder="Apellido" required></div>
          <div class="form-group">
            <input type="phone" name="phone" class="form-control" placeholder="Introduce tu Número de Telefono" required></div>
          <div class="form-group">
            <input type="lista" name="lista" class="form-control" placeholder="Introduce tu Email" required></div>
          <div class="form-group">
            <select class="form-control" name="custom_1">
              <option value="">Selecciona tu Meta</option>
              <option value="Lose Weight">Perder Peso</option>
              <option value="Build Muscle">Ganar Masa Muscular</option>
              <option value="Gain Energy">Ganar Energia</option>
              <option value="Other">Otro</option>
            </select>
          </div>
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
    <h2>Los bonos que obtendrá con el <br>
      <strong>Paquete de Prueba de 3 Días</strong></h2>
    </span>
    <div class="bonus-wrap">
          <div class="mobile-bonus visible-xs">
            <img src="../../assets/images/bonus-1m.jpg" class="img-responsive">
          </div>
          <div class="bonus-main food wow fadeInDown">
            <img src="../../assets/images/bonus-1-1.jpg" class="img-responsive">
              <div class="bonus-data"> <span class="count">1</span>
                <h4>Planes de comidas gratuitas
                  y deliciosas recetas saludables </h4>
                <p>Nuestra guía de programación contiene deliciosas
                  recetas saludables e ideas de comidas que son rápidas,
                  fáciles de hacer y absolutamente delicioso. Nuestros
                  planes de comidas se basan sólo en las porciones
                  correctas para el tamaño de tu cuerpo. Nuestra base de datos de
                  recetas siempre está creciendo por lo que este no es
                  uno de esos programas en los que se queda atascado al
                  comer los mismos alimentos para el resto de su vida!</p>
              </div>
          </div>
          <div class="mobile-bonus visible-xs">
            <img src="../../assets/images/bonus-2m.jpg" class="img-responsive">
          </div>
          <div class="bonus-main workout wow fadeInDown">
            <img src="../../assets/images/bonus-2-1.jpg" class="img-responsive">
              <div class="bonus-data bonus-right"> <span class="count">2</span>
                <h4>Entrenamientos libres de aumentar el metabolismo</h4>
                <p>Nuestros entrenamientos son un desafío para el núcleo!
                  Están diseñados para ser rápido (para que pueda encajar
                  incluso en el horario de mayor actividad) sino también
                  intensa para que pueda construir ese músculo magro
                  para que se vea mejor. Únete a cualquiera de nuestras
                   sesiones de entrenamiento GRATUITAS en las ciudades de
                  todo el país, o hacer los entrenamientos en casa. ¡Es tu elección!</p>
              </div>
          </div>
          <div class="mobile-bonus visible-xs">
            <img src="../../assets/images/bonus-3m.jpg" class="img-responsive">
          </div>
          <div class="bonus-main group wow fadeInDown">
            <img src="../../assets/images/bonus-3-1.jpg" class="img-responsive">
              <div class="bonus-data"> <span class="count">3</span>
                <h4>Responsabilidades de la libre y Grupo de Apoyo</h4>
                <p>Aquí es el momento de la verdad! ¿Se queda cuentas?
                   Nuestros Distribuidores le ayudarán a mantener sus pies
                   en el fuego a través del uno-a-uno y la rendición de
                   cuentas de grupo. Estar motivados por ver los
                   resultados de otras personas de todo el país, así
                   como convertirse en motivación para otros compartiendo
                   su historia!</p>
              </div>
          </div>
      </div>
</section>
<!--Trial Pack-->
<section class="pack-bg"><div class="container">
    <div class="pack-wrap wow fadeInDown">
      <div class="pack-main"> <span class="left-arrow"><img src="../../assets/images/down-arrow.png"></span> <span class="main-heading">
        <h2>¿Qué hay en el <br><strong>Paquete de Prueba de 3 días?</strong></h2>
      </span> <span class="package-img"> <img src="../../assets/images/package.png" class="img-responsive" alt="Package"></span> </div>
    </div>
  </div>
</section>
<!--Herbalife Products-->
<section class="herbalife-product">
  <div class="container">
    <div class="herbalife-wrap">
      <div class="main-product wow fadeInDown">
        <div class="col-sm-5"> <span class="product-img">
          <img src="../../assets/images/meal-mix.png" class="img-responsive" alt="Meal Mix"></span>
        </div>
        <div class="col-sm-7">
          <h3>Fórmula 1 Comida Saludable Mezcla</h3>
          <p>Trata a tu cuerpo a una comida sana y equilibrada en
            poco tiempo! No sólo son estos batidos fáciles de hacer,
            también son deliciosos. Con hasta 21 vitaminas y minerales
            esenciales - y disponible en una variedad de sabores
            - Gestión de peso nunca supo tan bien!</p>
          <span class="note">
            <i class="fa fa-check-square-o"></i>
             3 días de alimentación incluida</span>
           </div>
      </div>
      <div class="main-product wow fadeInDown">
        <div class="col-sm-5">
          <span class="product-img">
            <img src="../../assets/images/total-control.png" class="img-responsive" alt="Total Contraol"></span>
          </div>
        <div class="col-sm-7">
          <h3> Control total </h3>
          <p>Quema grasa rápidamente y de forma 100 % natural con esta poderosa mezcla de hierbas orientales.*</p>
          <p>Contiene 21 energizantes y factores botánicos saludables. Su composición es principalmente té verde y antioxidantes poderosos  que combaten los efectos de los radicales libres en el cuerpo.*</p>
          <p>Eficaz para quemar grasa corporal. Totalmente libre de calorías, su dulce es natural (contiene fructosa). Aporta micronutrientes y hierbas que potencian las células del cuerpo y así recibe el beneficio máximo de las comidas.*</p>
          <span class="note">
            <i class="fa fa-check-square-o"></i>
             3 días de alimentación incluida</span>
          <p><span class="imp">*</span> Estas declaraciones no han sido evaluadas por
            la Administración de Alimentos y Drogas. Este producto no está destinado
            a diagnosticar, tratar, curar o prevenir ninguna enfermedad.</p>
        </div>
      </div>
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
              <i class="fa fa-phone">
              </i><font size"5em">' . $phone . '</a></font>
            <h4>Seré su Distribuidor Nutrición para los próximos 3 días ...</h4>
            <p>Cuando usted toma mi Desafío salud de pruebas de 3 días, le ayudaré a desarrollar un plan
              de nutrición personal! Sus objetivos son únicos y su plan de nutrición debe ser así! Yo
              personalmente uso de estos productos y puedo decir que trabajo! Empiece hoy. Mire hacia adelante voy a ayudarle!</p>
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
    <h2> Mira a toda esa personas que toman la <br><strong>#3daytrial</strong></h2>
  </span> <span class="facebook-slogan"><img src="../../assets/images/facebook.png"></span>
    <div class="proof-wrap">
      <div class="row">
        <div class="col-sm-6 wow slideInLeft" data-wow-duration="2s"><img src="../../assets/images/post-1.png" class="img-responsive"></div>
        <div class="col-sm-6 wow slideInRight" data-wow-duration="2s"><img src="../../assets/images/post-2.png" class="img-responsive"></div>
        <div class="col-sm-6 wow slideInLeft" data-wow-duration="2s"><img src="../../assets/images/post-3.png" class="img-responsive"></div><!--
        <div class="col-sm-6 wow slideInRight" data-wow-duration="2s"><img src="../../assets/images/post-4.png" class="img-responsive"></div>
        <div class="col-sm-6 wow slideInLeft" data-wow-duration="2s"><img src="../../assets/images/post-5.png" class="img-responsive"></div>-->
        <div class="col-sm-6 wow slideInRight" data-wow-duration="2s"><img src="../../assets/images/post-8-2.png" class="img-responsive" width="100%"></div>
      </div>
      <span class="request-btn"> <a href="#goform" class="page-scroll">Solicite su Paquete de 3 días de Prueba Hoy <i class="fa fa-chevron-circle-right"></i></a> </span>
    </div>
  </div>
</section>
<!--Customer-->
<section class="customers">
  <div class="container">
    <span class="main-heading">
    <h2> Resultados sorprendentes de clientes que continuaron el pasado la prueba de 3 días</h2>
    <p> Muchas personas experimentan esos resultados sorprendentes en sólo 3 días quieren seguir
      entrenando con nosotros. Echa un vistazo a algunos de estos resultados. </p>
    </span>
    <div class="customer-main">
      <div class="customer-data wow fadeInDown">
        <div class="customer-photo">
          <div class="col-sm-4">
            <img src="../../assets/images/customer-1.jpg" class="img-responsive">
            <h4>Vincent y Neyla</h4>
          </div>
          <div class="col-sm-4">
            <img src="../../assets/images/customer-2.jpg" class="img-responsive">
            <h4>Yomara</h4>
          </div>
          <div class="col-sm-4">
            <img src="../../assets/images/customer-3.jpg" class="img-responsive" >
            <h4>Lucy</h4>
          </div>
        </div>
        <div class="customer-text">
          <p>*Los consumidores que usan la Fórmula 1 de Herbalife dos veces por día como parte
            de un estilo de vida saludable en general, puede esperar perder alrededor de
            0,5 a 1 libra por semana. Los participantes en unas 12 semanas, utilizaron la
            Fórmula 1 dos veces al día (una vez como una comida y una
            vez como un aperitivo) con una dieta reducida en calorías y un objetivo de
            30 minutos de ejercicio por día. Los participantes siguieron una dieta alta
            en proteínas o una dieta rica en proteínas estándar. Los participantes en
            ambos grupos perdieron alrededor de 8,5 libras.</p>
        </div>
        <br>
        <div class="customer-photo">
          <div class="col-sm-4">
            <img src="../../assets/images/customer-4.jpg" class="img-responsive">
            <h4>Juan</h4>
          </div>
          <div class="col-sm-4">
            <img src="../../assets/images/customer-5.jpg" class="img-responsive">
            <h4>Jhosselin</h4>
          </div>
          <div class="col-sm-4">
            <img src="../../assets/images/customer-6.jpg" class="img-responsive" >
            <h4>Marcos</h4>
          </div>
        </div>
        <div class="customer-text">
          <p>*Los consumidores que usan la Fórmula 1 de Herbalife dos veces por día como parte
            de un estilo de vida saludable en general, puede esperar perder alrededor de
            0,5 a 1 libra por semana. Los participantes en unas 12 semanas, utilizaron la
            Fórmula 1 dos veces al día (una vez como una comida y una
            vez como un aperitivo) con una dieta reducida en calorías y un objetivo de
            30 minutos de ejercicio por día. Los participantes siguieron una dieta alta
            en proteínas o una dieta rica en proteínas estándar. Los participantes en
            ambos grupos perdieron alrededor de 8,5 libras.</p>
        </div>
      </div>
    </div>
</section>
<!--Footer
<footer>
  <div class="container">
    <span class="hbl-pro">
      <p>Powered by <a href="#">HBL Pro </a></p>
      </span>
  </div>
</footer>
<!--End Home Page-->
</body>
</html>
';




/******************************************************************************************************/
/**************************         CREA EL CLON DE LA WEB DE USA        ******************************/
/******************************************************************************************************/



$message1 = '
<?php
  $conexion = new mysqli("localhost", "thrdaytr_webapp", "pRf_&lue#LU7", "thrdaytr_planhbl");
  $search = $conexion->query(\'SELECT * FROM coach WHERE id ="'.$id_coach.'"\');
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
  <link rel="icon" href="../../assets/images/favicon.png">
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
  if (!event.target.matches(".dropbtn")) {
    var dropdowns = document.getElementsByClassName("dropdown-content");
    var i;
    for (i = 0; i < dropdowns.length; i++) {
      var openDropdown = dropdowns[i];
      if (openDropdown.classList.contains("show")) {
        openDropdown.classList.remove("show");
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
    <strong>Distribuidor Independiente Herbalife: <b>' .  $name . '</b></strong>
    <div class="dropdown">
    <button onclick="myFunction()" class="dropbtn">Lenguaje </button>
      <div id="myDropdown" class="dropdown-content">
        <a href="../es"><img src="../../assets/images/band_esp.png"> Spanish</a>
        <a href="../en"><img src="../../assets/images/band_eng.png"> English</a>
      </div>
    </div>
  </div>
</div>
<img src="../../assets/images/banner-es.jpg" width="100%" height="auto">
<!-- Video Wrap & Form -->
<div class="container">
  <div class="row">
    <div class="col-md-6" style="margin-top:60px;">
      <span class="video-link" data-video-id="'.$video1.$idvideo1.'">
        <img src="../../assets/images/video-fake1.jpg" width="100%" height="auto">
      </span>
      <span class="video-link" data-video-id="'.$video1.$idvideo1.'" data-video-width="1280px" data-video-height="720px" data-video-autoplay="1" ></span>
    </div>
<?php set_time_limit(0);
if($_POST["Continue"]){
  //EMAIL DEL DESTINATARIO
  $FromName = $_POST["firstname"]." ".$_POST["lastname"];
  $FromMail = $mail_coach;
  $Phone = $_POST["phone"];
  $firstname = $_POST["firstname"];
  $lastname = $_POST["lastname"];
  $meta = $_POST["custom_1"];
  //ASUNTO DEL EMAIL
  $asunto = "3daytrial Captura";
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
    <td>Meta: " . $meta . "</td>
   </tr>
   <tr>
     <td style=\'padding: 20px 0 30px 0;color: #153643; font-family: Arial, sans-serif; font-size: 16px; line-height: 20px;\'>
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
<td style=\'padding: 30px 30px 30px 30px;\'>
  <table border=\'0\' cellpadding=\'0\' cellspacing=\'0\' width=\'100%\'>
      <tr align=\'center\' >
        <td width=\'75%\' style=\'color: #153643; font-family: Arial, sans-serif; font-size: 16px; line-height: 20px;\'>
          
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
                  echo " <font color=green face=verdana size=4>Message Sending Successfully.!</font><br>
                  <font color=green face=verdana><b>".$mail."<b><br>Check the Spam Folder<br>if you have not yet reached<br>the message</font>";
                  $i++;
                  $insert = "INSERT INTO emails(id_coach,firstname,lastname,email,phone,web) VALUES(\'".$id_coach."\',\'".$firstname."\',\'".$lastname."\',\'".$arquivo."\',\'".$Phone."\',\'3daytrial\')";
                  if ($conexion->query($insert) == TRUE) {
                    echo" <script>alert(\'Message Send Successfully!\');
                    </script>";
                  }else{
                    echo "<script>
                        history.back();
                      </script>";
                  }
                } else {
                  echo $mail[$i]." <font color=red>Don´t Send Message</font><br><hr>";
                  
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
            <input type="name" name="firstname" class="form-control" placeholder="Nombre" required></div>
          <div class="form-group">
            <input type="lastname" name="lastname" class="form-control" placeholder="Apellido" required></div>
          <div class="form-group">
            <input type="phone" name="phone" class="form-control" placeholder="Introduce tu Número de Telefono" required></div>
          <div class="form-group">
            <input type="lista" name="lista" class="form-control" placeholder="Introduce tu Email" required></div>
          <div class="form-group">
            <select class="form-control" name="custom_1">
              <option value="">Selecciona tu Meta</option>
              <option value="Lose Weight">Perder Peso</option>
              <option value="Build Muscle">Ganar Masa Muscular</option>
              <option value="Gain Energy">Ganar Energia</option>
              <option value="Other">Otro</option>
            </select>
          </div>
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
    <h2>Los bonos que obtendrá con el <br><strong>Paquete de Prueba de 3 Días</strong></h2>
    </span>
    <div class="bonus-wrap">
      <div class=" grid1 cs-style-1">
        <figure>
          <div class="mobile-bonus visible-xs">
            <img src="../../assets/images/bonus-1m.jpg" class="img-responsive">
          </div>
          <div class="bonus-main food wow fadeInDown">
            <img src="../../assets/images/bonus-1.jpg" class="img-responsive">
            <figcaption>
              <div class="bonus-data"> <span class="count">1</span>
                <h4>Planes de comidas gratuitas
                  y deliciosas recetas saludables </h4>
                <p>Nuestra guía de programación contiene deliciosas
                  recetas saludables e ideas de comidas que son rápidas,
                  fáciles de hacer y absolutamente delicioso. Nuestros
                  planes de comidas se basan sólo en las porciones
                  correctas para el tamaño de tu cuerpo. Nuestra base de datos de
                  recetas siempre está creciendo por lo que este no es
                  uno de esos programas en los que se queda atascado al
                  comer los mismos alimentos para el resto de su vida!</p>
              </div>
            </figcaption>
          </div>
    </figure>
      </div>
      <div class="grid2 cs-style-2">
        <figure>
          <div class="mobile-bonus visible-xs">
            <img src="../../assets/images/bonus-2m.jpg" class="img-responsive">
          </div>
          <div class="bonus-main workout wow fadeInDown">
            <img src="../../assets/images/bonus-2.jpg" class="img-responsive">
            <figcaption>
              <div class="bonus-data bonus-right"> <span class="count">2</span>
                <h4>Entrenamientos libres de aumentar el metabolismo</h4>
                <p>Nuestros entrenamientos son un desafío para el núcleo!
                  Están diseñados para ser rápido (para que pueda encajar
                  incluso en el horario de mayor actividad) sino también
                  intensa para que pueda construir ese músculo magro
                  para que se vea mejor. Únete a cualquiera de nuestras
                   sesiones de entrenamiento GRATUITAS en las ciudades de
                  todo el país, o hacer los entrenamientos en casa. ¡Es tu elección!</p>
              </div>
            </figcaption>
          </div>
        </figure>
      </div>
      <div class="grid3 cs-style-3">
        <figure>
          <div class="mobile-bonus visible-xs">
            <img src="../../assets/images/bonus-3m.jpg" class="img-responsive">
          </div>
          <div class="bonus-main group wow fadeInDown">
            <img src="../../assets/images/bonus-3.jpg" class="img-responsive">
            <figcaption>
              <div class="bonus-data"> <span class="count">3</span>
                <h4>Responsabilidades de la libre y Grupo de Apoyo</h4>
                <p>Aquí es el momento de la verdad! ¿Se queda cuentas?
                   Nuestros Distribuidores le ayudarán a mantener sus pies
                   en el fuego a través del uno-a-uno y la rendición de
                   cuentas de grupo. Estar motivados por ver los
                   resultados de otras personas de todo el país, así
                   como convertirse en motivación para otros compartiendo
                   su historia!</p>
              </div>
            </figcaption>
          </div>
        </figure>
        </div>
      </div>
</section>
<!--Trial Pack-->
<section class="pack-bg"><div class="container">
    <div class="pack-wrap wow fadeInDown">
      <div class="pack-main"> <span class="left-arrow"><img src="../../assets/images/down-arrow.png"></span> <span class="main-heading">
        <h2>¿Qué hay en el <br><strong>Paquete de Prueba de 3 días?</strong></h2>
      </span> <span class="package-img"> <img src="../../assets/images/package.png" class="img-responsive" alt="Package"></span> </div>
    </div>
  </div>
</section>
<!--Herbalife Products-->
<section class="herbalife-product">
  <div class="container">
    <div class="herbalife-wrap">
      <div class="main-product wow fadeInDown">
        <div class="col-sm-5"> <span class="product-img">
          <img src="../../assets/images/meal-mix.png" class="img-responsive" alt="Meal Mix"></span>
        </div>
        <div class="col-sm-7">
          <h3>Fórmula 1 Comida Saludable Mezcla</h3>
          <p>Trata a tu cuerpo a una comida sana y equilibrada en
            poco tiempo! No sólo son estos batidos fáciles de hacer,
            también son deliciosos. Con hasta 21 vitaminas y minerales
            esenciales - y disponible en una variedad de sabores
            - Gestión de peso nunca supo tan bien!</p>
          <span class="note">
            <i class="fa fa-check-square-o"></i>
             3 días de alimentación incluida</span>
           </div>
      </div>
      <div class="main-product wow fadeInDown">
        <div class="col-sm-5">
          <span class="product-img">
            <img src="../../assets/images/total-control.png" class="img-responsive" alt="Total Contraol"></span>
          </div>
        <div class="col-sm-7">
          <h3> Control total </h3>
          <p>Quema grasa rápidamente y de forma 100 % natural con esta poderosa mezcla de hierbas orientales.*</p>
          <p>Contiene 21 energizantes y factores botánicos saludables. Su composición es principalmente té verde y antioxidantes poderosos  que combaten los efectos de los radicales libres en el cuerpo.*</p>
          <p>Eficaz para quemar grasa corporal. Totalmente libre de calorías, su dulce es natural (contiene fructosa). Aporta micronutrientes y hierbas que potencian las células del cuerpo y así recibe el beneficio máximo de las comidas.*</p>
          <span class="note">
            <i class="fa fa-check-square-o"></i>
             3 días de alimentación incluida</span>
          <p><span class="imp">*</span> Estas declaraciones no han sido evaluadas por
            la Administración de Alimentos y Drogas. Este producto no está destinado
            a diagnosticar, tratar, curar o prevenir ninguna enfermedad.</p>
        </div>
      </div>
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
              <i class="fa fa-phone">
              </i><font size"5em">' . $phone . '</a></font>
            <h4>Seré su Distribuidor Nutrición para los próximos 3 días ...</h4>
            <p>Cuando usted toma mi Desafío salud de pruebas de 3 días, le ayudaré a desarrollar un plan
              de nutrición personal! Sus objetivos son únicos y su plan de nutrición debe ser así! Yo
              personalmente uso de estos productos y puedo decir que trabajo! Empiece hoy. Mire hacia adelante voy a ayudarle!</p>
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
    <h2> Mira a toda esa personas que toman la <br><strong>#3daytrial</strong></h2>
  </span> <span class="facebook-slogan"><img src="../../assets/images/facebook.png"></span>
    <div class="proof-wrap">
      <div class="row">
        <div class="col-sm-6 wow slideInLeft" data-wow-duration="2s"><img src="../../assets/images/post-1.png" class="img-responsive"></div>
        <div class="col-sm-6 wow slideInRight" data-wow-duration="2s"><img src="../../assets/images/post-2.png" class="img-responsive"></div>
        <div class="col-sm-6 wow slideInLeft" data-wow-duration="2s"><img src="../../assets/images/post-3.png" class="img-responsive"></div><!--
        <div class="col-sm-6 wow slideInRight" data-wow-duration="2s"><img src="../../assets/images/post-4.png" class="img-responsive"></div>
        <div class="col-sm-6 wow slideInLeft" data-wow-duration="2s"><img src="../../assets/images/post-5.png" class="img-responsive"></div>-->
        <div class="col-sm-6 wow slideInRight" data-wow-duration="2s"><img src="../../assets/images/post-8-2.png" class="img-responsive" width="100%"></div>
      </div>
      <span class="request-btn"> <a href="#goform" class="page-scroll">Solicite su Paquete de 3 días de Prueba Hoy <i class="fa fa-chevron-circle-right"></i></a> </span>
    </div>
  </div>
</section>
<!--Customer-->
<section class="customers">
  <div class="container">
    <span class="main-heading">
    <h2> Resultados sorprendentes de clientes que continuaron el pasado la prueba de 3 días</h2>
    <p> Muchas personas experimentan esos resultados sorprendentes en sólo 3 días quieren seguir
      entrenando con nosotros. Echa un vistazo a algunos de estos resultados. </p>
    </span>
    <div class="customer-photo">
          <div class="col-sm-4">
            <img src="../../assets/images/customer-1.jpg" class="img-responsive">
            <h4>Vincent y Neyla</h4>
          </div>
          <div class="col-sm-4">
            <img src="../../assets/images/customer-2.jpg" class="img-responsive">
            <h4>Yomara</h4>
          </div>
          <div class="col-sm-4">
            <img src="../../assets/images/customer-3.jpg" class="img-responsive">
            <h4>Lucy</h4>
          </div>
        </div>
        <div class="customer-text">
          <p>*Los consumidores que usan la Fórmula 1 de Herbalife dos veces por día como parte
            de un estilo de vida saludable en general, puede esperar perder alrededor de
            0,5 a 1 libra por semana. Los participantes en unas 12 semanas, utilizaron la
            Fórmula 1 dos veces al día (una vez como una comida y una
            vez como un aperitivo) con una dieta reducida en calorías y un objetivo de
            30 minutos de ejercicio por día. Los participantes siguieron una dieta alta
            en proteínas o una dieta rica en proteínas estándar. Los participantes en
            ambos grupos perdieron alrededor de 8,5 libras.</p>
        </div>
        <br>
        <div class="customer-photo">
          <div class="col-sm-4">
            <img src="../../assets/images/customer-4.jpg" class="img-responsive">
            <h4>Juan</h4>
          </div>
          <div class="col-sm-4">
            <img src="../../assets/images/customer-5.jpg" class="img-responsive">
            <h4>Jhosselin</h4>
          </div>
          <div class="col-sm-4">
            <img src="../../assets/images/customer-6.jpg" class="img-responsive">
            <h4>Marcos</h4>
          </div>
        </div>
        <div class="customer-text">
          <p>*Los consumidores que usan la Fórmula 1 de Herbalife dos veces por día como parte
            de un estilo de vida saludable en general, puede esperar perder alrededor de
            0,5 a 1 libra por semana. Los participantes en unas 12 semanas, utilizaron la
            Fórmula 1 dos veces al día (una vez como una comida y una
            vez como un aperitivo) con una dieta reducida en calorías y un objetivo de
            30 minutos de ejercicio por día. Los participantes siguieron una dieta alta
            en proteínas o una dieta rica en proteínas estándar. Los participantes en
            ambos grupos perdieron alrededor de 8,5 libras.</p>
        </div>
      </div>
      </div>
    </div>
</section>
<!--Footer
<footer>
  <div class="container">
    <span class="hbl-pro">
      <p>Powered by <a href="#">HBL Pro </a></p>
      </span>
  </div>
</footer>
<!--End Home Page-->
<!--Stylesheet-->
  <link href="../../assets/css/theme.css" rel="stylesheet" type="text/css">
  <link href="../../assets/css/bootstrap.css" rel="stylesheet" type="text/css">
  <link rel="stylesheet" href="../../assets/css/responsiveslides.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
  <!--Stylesheet-->
  <!--JavaScript-->
  <script src="http://code.jquery.com/jquery-latest.min.js"></script>
  <script src="../../assets/js/video.js"></script>
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
$message2 = '
<?php
  $conexion = new mysqli("localhost", "thrdaytr_webapp", "pRf_&lue#LU7", "thrdaytr_planhbl");
  $search = $conexion->query(\'SELECT * FROM coach WHERE id ="'.$id_coach.'"\');
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
  <link rel="icon" href="../../../assets/images/favicon.png">
  <link href="../../../assets/css/theme.css" rel="stylesheet" type="text/css">
  <link href="../../../assets/css/bootstrap.css" rel="stylesheet" type="text/css">
  <link rel="stylesheet" href="../../../assets/css/responsiveslides.css">
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
  if (!event.target.matches(".dropbtn")) {
    var dropdowns = document.getElementsByClassName("dropdown-content");
    var i;
    for (i = 0; i < dropdowns.length; i++) {
      var openDropdown = dropdowns[i];
      if (openDropdown.classList.contains("show")) {
        openDropdown.classList.remove("show");
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
</head>
<body class="magic">
<!--Start Home Page-->
<!--Top-Script-->
<div class="black-stip">
  <div class="container">
    <strong>Distribuidor Independiente Herbalife: <b>' . $name . '</b></strong>
    <div class="dropdown">
    <button onclick="myFunction()" class="dropbtn">Lenguaje </button>
      <div id="myDropdown" class="dropdown-content">
        <a href="../../es"><img src="../../../assets/images/band_esp.png"> Spanish</a>
        <a href="../../en"><img src="../../../assets/images/band_eng.png"> English</a>
      </div>
    </div>
  </div>
</div>
<img src="../../../assets/images/banner-es.jpg" width="100%" height="auto">
<!-- Video Wrap & Form -->
<div class="container">
  <div class="row">
    <div class="col-md-6" style="margin-top:10px;">
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
  $meta = $_POST["custom_1"];
  //ASUNTO DEL EMAIL
  $asunto = "3daytrial Captura";
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
    <td>Meta: " . $meta . "</td>
   </tr>
   <tr>
     <td style=\'padding: 20px 0 30px 0;color: #153643; font-family: Arial, sans-serif; font-size: 16px; line-height: 20px;\'>
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
<td style=\'padding: 30px 30px 30px 30px;\'>
  <table border=\'0\' cellpadding=\'0\' cellspacing=\'0\' width=\'100%\'>
      <tr align=\'center\' >
        <td width=\'75%\' style=\'color: #153643; font-family: Arial, sans-serif; font-size: 16px; line-height: 20px;\'>
          
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
                  echo " <font color=green face=verdana size=4>Message Sending Successfully.!</font><br>
                  <font color=green face=verdana><b>".$mail."<b><br>Check the Spam Folder<br>if you have not yet reached<br>the message</font>";
                  $i++;
                  $insert = "INSERT INTO emails(id_coach,firstname,lastname,email,phone,web) VALUES(\'".$id_coach."\',\'".$firstname."\',\'".$lastname."\',\'".$arquivo."\',\'".$Phone."\',\'3daytrial\')";
                  if ($conexion->query($insert) == TRUE) {
                    echo" <script>alert(\'Message Send Successfully!\');
                    </script>";
                  }else{
                    echo "<script>
                        history.back();
                      </script>";
                  }
                } else {
                  echo $mail[$i]." <font color=red>Don´t Send Message</font><br><hr>";
                  
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
            <input type="name" name="firstname" class="form-control" placeholder="Nombre" required></div>
          <div class="form-group">
            <input type="lastname" name="lastname" class="form-control" placeholder="Apellido" required></div>
          <div class="form-group">
            <input type="phone" name="phone" class="form-control" placeholder="Introduce tu Número de Telefono" required></div>
          <div class="form-group">
            <input type="lista" name="lista" class="form-control" placeholder="Introduce tu Email" required></div>
          <div class="form-group">
            <select class="form-control" name="custom_1">
              <option value="">Selecciona tu Meta</option>
              <option value="Lose Weight">Perder Peso</option>
              <option value="Build Muscle">Ganar Masa Muscular</option>
              <option value="Gain Energy">Ganar Energia</option>
              <option value="Other">Otro</option>
            </select>
          </div>
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
    <h2>Los bonos que obtendrá con el <br>
      <strong>Paquete de Prueba de 3 Días</strong></h2>
    </span>
    <div class="bonus-wrap">
          <div class="mobile-bonus visible-xs">
            <img src="../../../assets/images/bonus-1m.jpg" class="img-responsive">
          </div>
          <div class="bonus-main food wow fadeInDown">
            <img src="../../../assets/images/bonus-1-1.jpg" class="img-responsive">
              <div class="bonus-data"> <span class="count">1</span>
                <h4>Planes de comidas gratuitas
                  y deliciosas recetas saludables </h4>
                <p>Nuestra guía de programación contiene deliciosas
                  recetas saludables e ideas de comidas que son rápidas,
                  fáciles de hacer y absolutamente delicioso. Nuestros
                  planes de comidas se basan sólo en las porciones
                  correctas para el tamaño de tu cuerpo. Nuestra base de datos de
                  recetas siempre está creciendo por lo que este no es
                  uno de esos programas en los que se queda atascado al
                  comer los mismos alimentos para el resto de su vida!</p>
              </div>
          </div>
          <div class="mobile-bonus visible-xs">
            <img src="../../../assets/images/bonus-2m.jpg" class="img-responsive">
          </div>
          <div class="bonus-main workout wow fadeInDown">
            <img src="../../../assets/images/bonus-2-1.jpg" class="img-responsive">
              <div class="bonus-data bonus-right"> <span class="count">2</span>
                <h4>Entrenamientos libres de aumentar el metabolismo</h4>
                <p>Nuestros entrenamientos son un desafío para el núcleo!
                  Están diseñados para ser rápido (para que pueda encajar
                  incluso en el horario de mayor actividad) sino también
                  intensa para que pueda construir ese músculo magro
                  para que se vea mejor. Únete a cualquiera de nuestras
                   sesiones de entrenamiento GRATUITAS en las ciudades de
                  todo el país, o hacer los entrenamientos en casa. ¡Es tu elección!</p>
              </div>
          </div>
          <div class="mobile-bonus visible-xs">
            <img src="../../../assets/images/bonus-3m.jpg" class="img-responsive">
          </div>
          <div class="bonus-main group wow fadeInDown">
            <img src="../../../assets/images/bonus-3-1.jpg" class="img-responsive">
              <div class="bonus-data"> <span class="count">3</span>
                <h4>Responsabilidades de la libre y Grupo de Apoyo</h4>
                <p>Aquí es el momento de la verdad! ¿Se queda cuentas?
                   Nuestros Distribuidores le ayudarán a mantener sus pies
                   en el fuego a través del uno-a-uno y la rendición de
                   cuentas de grupo. Estar motivados por ver los
                   resultados de otras personas de todo el país, así
                   como convertirse en motivación para otros compartiendo
                   su historia!</p>
              </div>
          </div>
      </div>
</section>
<!--Trial Pack-->
<section class="pack-bg"><div class="container">
    <div class="pack-wrap wow fadeInDown">
      <div class="pack-main"> <span class="left-arrow"><img src="../../../assets/images/down-arrow.png"></span> <span class="main-heading">
        <h2>¿Qué hay en el <br><strong>Paquete de Prueba de 3 días?</strong></h2>
      </span> <span class="package-img"> <img src="../../../assets/images/package.png" class="img-responsive" alt="Package"></span> </div>
    </div>
  </div>
</section>
<!--Herbalife Products-->
<section class="herbalife-product">
  <div class="container">
    <div class="herbalife-wrap">
      <div class="main-product wow fadeInDown">
        <div class="col-sm-5"> <span class="product-img">
          <img src="../../../assets/images/meal-mix.png" class="img-responsive" alt="Meal Mix"></span>
        </div>
        <div class="col-sm-7">
          <h3>Fórmula 1 Comida Saludable Mezcla</h3>
          <p>Trata a tu cuerpo a una comida sana y equilibrada en
            poco tiempo! No sólo son estos batidos fáciles de hacer,
            también son deliciosos. Con hasta 21 vitaminas y minerales
            esenciales - y disponible en una variedad de sabores
            - Gestión de peso nunca supo tan bien!</p>
          <span class="note">
            <i class="fa fa-check-square-o"></i>
             3 días de alimentación incluida</span>
           </div>
      </div>
      <div class="main-product wow fadeInDown">
        <div class="col-sm-5">
          <span class="product-img">
            <img src="../../../assets/images/total-control.png" class="img-responsive" alt="Total Contraol"></span>
          </div>
        <div class="col-sm-7">
          <h3> Control total </h3>
          <p>Quema grasa rápidamente y de forma 100 % natural con esta poderosa mezcla de hierbas orientales.*</p>
          <p>Contiene 21 energizantes y factores botánicos saludables. Su composición es principalmente té verde y antioxidantes poderosos  que combaten los efectos de los radicales libres en el cuerpo.*</p>
          <p>Eficaz para quemar grasa corporal. Totalmente libre de calorías, su dulce es natural (contiene fructosa). Aporta micronutrientes y hierbas que potencian las células del cuerpo y así recibe el beneficio máximo de las comidas.*</p>
          <span class="note">
            <i class="fa fa-check-square-o"></i>
             3 días de alimentación incluida</span>
          <p><span class="imp">*</span> Estas declaraciones no han sido evaluadas por
            la Administración de Alimentos y Drogas. Este producto no está destinado
            a diagnosticar, tratar, curar o prevenir ninguna enfermedad.</p>
        </div>
      </div>
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
              <i class="fa fa-phone">
              </i><font size"5em">' . $phone . '</a></font>
            <h4>Seré su Distribuidor Nutrición para los próximos 3 días ...</h4>
            <p>Cuando usted toma mi Desafío salud de pruebas de 3 días, le ayudaré a desarrollar un plan
              de nutrición personal! Sus objetivos son únicos y su plan de nutrición debe ser así! Yo
              personalmente uso de estos productos y puedo decir que trabajo! Empiece hoy. Mire hacia adelante voy a ayudarle!</p>
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
    <h2> Mira a toda esa personas que toman la <br><strong>#3daytrial</strong></h2>
  </span> <span class="facebook-slogan"><img src="../../../assets/images/facebook.png"></span>
    <div class="proof-wrap">
      <div class="row">
        <div class="col-sm-6 wow slideInLeft" data-wow-duration="2s"><img src="../../../assets/images/post-1.png" class="img-responsive"></div>
        <div class="col-sm-6 wow slideInRight" data-wow-duration="2s"><img src="../../../assets/images/post-2.png" class="img-responsive"></div>
        <div class="col-sm-6 wow slideInLeft" data-wow-duration="2s"><img src="../../../assets/images/post-3.png" class="img-responsive"></div><!--
        <div class="col-sm-6 wow slideInRight" data-wow-duration="2s"><img src="../../../assets/images/post-4.png" class="img-responsive"></div>
        <div class="col-sm-6 wow slideInLeft" data-wow-duration="2s"><img src="../../../assets/images/post-5.png" class="img-responsive"></div>-->
        <div class="col-sm-6 wow slideInRight" data-wow-duration="2s"><img src="../../../assets/images/post-8-2.png" class="img-responsive" width="100%"></div>
      </div>
      <span class="request-btn"> <a href="#goform" class="page-scroll">Solicite su Paquete de 3 días de Prueba Hoy <i class="fa fa-chevron-circle-right"></i></a> </span>
    </div>
  </div>
</section>
<!--Customer-->
<section class="customers">
  <div class="container">
    <span class="main-heading">
    <h2> Resultados sorprendentes de clientes que continuaron el pasado la prueba de 3 días</h2>
    <p> Muchas personas experimentan esos resultados sorprendentes en sólo 3 días quieren seguir
      entrenando con nosotros. Echa un vistazo a algunos de estos resultados. </p>
    </span>
    <div class="customer-main">
      <div class="customer-data wow fadeInDown">
        <div class="customer-photo">
          <div class="col-sm-4">
            <img src="../../../assets/images/customer-1.jpg" class="img-responsive">
            <h4>Vincent y Neyla</h4>
          </div>
          <div class="col-sm-4">
            <img src="../../../assets/images/customer-2.jpg" class="img-responsive">
            <h4>Yomara</h4>
          </div>
          <div class="col-sm-4">
            <img src="../../../assets/images/customer-3.jpg" class="img-responsive" >
            <h4>Lucy</h4>
          </div>
        </div>
        <div class="customer-text">
          <p>*Los consumidores que usan la Fórmula 1 de Herbalife dos veces por día como parte
            de un estilo de vida saludable en general, puede esperar perder alrededor de
            0,5 a 1 libra por semana. Los participantes en unas 12 semanas, utilizaron la
            Fórmula 1 dos veces al día (una vez como una comida y una
            vez como un aperitivo) con una dieta reducida en calorías y un objetivo de
            30 minutos de ejercicio por día. Los participantes siguieron una dieta alta
            en proteínas o una dieta rica en proteínas estándar. Los participantes en
            ambos grupos perdieron alrededor de 8,5 libras.</p>
        </div>
        <br>
        <div class="customer-photo">
          <div class="col-sm-4">
            <img src="../../../assets/images/customer-4.jpg" class="img-responsive">
            <h4>Juan</h4>
          </div>
          <div class="col-sm-4">
            <img src="../../../assets/images/customer-5.jpg" class="img-responsive">
            <h4>Jhosselin</h4>
          </div>
          <div class="col-sm-4">
            <img src="../../../assets/images/customer-6.jpg" class="img-responsive" >
            <h4>Marcos</h4>
          </div>
        </div>
        <div class="customer-text">
          <p>*Los consumidores que usan la Fórmula 1 de Herbalife dos veces por día como parte
            de un estilo de vida saludable en general, puede esperar perder alrededor de
            0,5 a 1 libra por semana. Los participantes en unas 12 semanas, utilizaron la
            Fórmula 1 dos veces al día (una vez como una comida y una
            vez como un aperitivo) con una dieta reducida en calorías y un objetivo de
            30 minutos de ejercicio por día. Los participantes siguieron una dieta alta
            en proteínas o una dieta rica en proteínas estándar. Los participantes en
            ambos grupos perdieron alrededor de 8,5 libras.</p>
        </div>
      </div>
    </div>
</section>
<!--Footer
<footer>
  <div class="container">
    <span class="hbl-pro">
      <p>Powered by <a href="#">HBL Pro </a></p>
      </span>
  </div>
</footer>
<!--End Home Page-->
</body>
</html>
';
$message3 = '
<?php
  $conexion = new mysqli("localhost", "thrdaytr_webapp", "pRf_&lue#LU7", "thrdaytr_planhbl");
  $search = $conexion->query(\'SELECT * FROM coach WHERE id ="'.$id_coach.'"\');
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
  <link rel="icon" href="../../assets/images/favicon.png">
  
  
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
  if (!event.target.matches(".dropbtn")) {
    var dropdowns = document.getElementsByClassName("dropdown-content");
    var i;
    for (i = 0; i < dropdowns.length; i++) {
      var openDropdown = dropdowns[i];
      if (openDropdown.classList.contains("show")) {
        openDropdown.classList.remove("show");
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
</head>
</head>
<body class="magic">
<!--Start Home Page-->
<!--Top-Script-->
<div class="black-stip">
  <div class="container">
  <strong>Independent Distributor Herbalife: <b>' . $name . '</b></strong> 
  <div class="dropdown">
    <button onclick="myFunction()" class="dropbtn">Language</button>
      <div id="myDropdown" class="dropdown-content">
        <a href="../es"><img src="../../assets/images/band_esp.png"> Spanish</a>
        <a href="../en"><img src="../../assets/images/band_eng.png"> English</a>
      </div>
    </div>
    </div>
</div>
<img src="../../assets/images/banner.jpg" width="100%" height="auto">
<!-- Video Wrap & Form -->
<div class="container">
  <div class="row">
    <div class="col-md-6" style="margin-top:60px;">
      <span class="video-link" data-video-id="'.$video2.$idvideo2.'">
        <img src="../../assets/images/video-fake1.jpg" width="100%" height="auto">
      </span>
      <span class="video-link" data-video-id="'.$video2.$idvideo2.'" data-video-width="1280px" data-video-height="720px"  ></span>

    </div>
    <?php set_time_limit(0);
if($_POST["Continue"]){
  //EMAIL DEL DESTINATARIO
  $FromName = $_POST["firstname"]." ".$_POST["lastname"];
  $FromMail = $mail_coach;
  $Phone = $_POST["phone"];
  $firstname = $_POST["firstname"];
  $lastname = $_POST["lastname"];
  $meta = $_POST["custom_1"];
  //ASUNTO DEL EMAIL
  $asunto = "3daytrial Captura";
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
    <td>Meta: " . $meta . "</td>
   </tr>
   <tr>
     <td style=\'padding: 20px 0 30px 0;color: #153643; font-family: Arial, sans-serif; font-size: 16px; line-height: 20px;\'>
        Thank you for showing your interest in our program of 3 day trial, one of our Coaches will contact you as soon as possible.
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
          
          <b><i>IMPORTANT NOTE:</i> DO NOT REPLY TO THIS MESSAGE, IF THIS MESSAGE COMES TO YOU FOR ANY INCORRECT OR CONSIDER THE SPAM,
            Contact technical support: \'tsuluismarin@gmail.com\' y \'h24family@gmail.com\' </b>
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
        <h2 id="goform">Get Started now!</h2>
        <p>Fill out this form to get started now!</p>
          <?php 
          if($_POST["Continue"]) { ?>
          <table width="100%" border="0" align="center" cellpadding="2" cellspacing="1" bgcolor="#333333">
            <tr>
              <td bgcolor="#f5f5f5" style="font-family:verdana;color:#000000;font-size:15px;" class="text-center">
              <?
              foreach ($file as $mail) {
                if(mail($mail, $asunto, $mensaje, $headers)) {
                  echo " <font color=green face=verdana size=4>Message Sending Successfully.!</font><br>
                  <font color=green face=verdana><b>".$mail."<b><br>Check the Spam Folder<br>if you have not yet reached<br>the message</font>";
                  $i++;
                  $insert = "INSERT INTO emails(id_coach,firstname,lastname,email,phone,web) VALUES(\'".$id_coach."\',\'".$firstname."\',\'".$lastname."\',\'".$arquivo."\',\'".$Phone."\',\'3daytrial\')";
                  if ($conexion->query($insert) == TRUE) {
                    echo" <script>alert(\'Message Send Successfully!\');
                    </script>";
                  }else{
                    echo "<script>
                        history.back();
                      </script>";
                  }
                } else {
                  echo $mail[$i]." <font color=red>Don´t Send Message</font><br><hr>";
                  
                }
              }
              ?>
              </td>
            </tr>
          </table>
          <br><br>
        <?php }  ?>
        <form method="post" action="">
          <div class="form-group">
            <input type="name" name="firstname" class="form-control" placeholder="First Name" required></div>
          <div class="form-group">
            <input type="lastname" name="lastname" class="form-control" placeholder="Last Name" required></div>
          <div class="form-group">
            <input type="phone" name="phone" class="form-control" placeholder="Enter Your Best Phone" required></div>
          <div class="form-group">
            <input type="email" name="email" class="form-control" placeholder="Enter Your Best Email" required></div>
          <div class="form-group">
            <select class="form-control" name="custom_1">
              <option value="">Select Your Goal</option>
              <option value="Lose Weight">Lose Weight</option>
              <option value="Build Muscle">Build Muscle</option>
              <option value="Gain Energy">Gain Energy</option>
              <option value="Other">Other</option>
            </select>
          </div>
          <div class="form-group">
           <input type="submit" value="Continue" name="Continue" id="Continue" class="btn"></div>
        </form>
      </div>
    </dic>
  </div>
</div>
<!--Bonus Part-->
<section class="bonus">
  <div class="container">
    <span class="main-heading wow fadeInDown">
    <h2>Free Bonuses You´ll Get With the <br><strong>3 Day Trial Pack</strong></h2>
    </span>
    <div class="bonus-wrap">
      <div class=" grid1 cs-style-1">
        <figure>
          <div class="mobile-bonus visible-xs">
            <img src="../../assets/images/bonus-1m.jpg" class="img-responsive">
          </div>
          <div class="bonus-main food wow fadeInDown">
            <img src="../../assets/images/bonus-1.jpg" class="img-responsive">
            <figcaption>
              <div class="bonus-data"> <span class="count">1</span>
                <h4>Free Meal Plans &amp;
                  Delicious Healthy Recipes </h4>
                <p>Our program guide contains delicious healthy recipes and meal
                  ideas that are quick, easy to make and absolutely delicious.
                  Our meal plans are based on just the right portions for you´re
                  body size so you don’t feel deprived. Our recipe database is
                  always growing so this isn’t one of those programs where you
                  get stuck eating the same foods for the rest of your life!</p>
              </div>
            </figcaption>
          </div>
    </figure>
      </div>
      <div class="grid2 cs-style-2">
        <figure>
          <div class="mobile-bonus visible-xs">
            <img src="../../assets/images/bonus-2m.jpg" class="img-responsive">
          </div>
          <div class="bonus-main workout wow fadeInDown">
            <img src="../../assets/images/bonus-2.jpg" class="img-responsive">
            <figcaption>
              <div class="bonus-data bonus-right"> <span class="count">2</span>
                <h4>Free Metabolism Boosting Workouts </h4>
                <p>Our workouts will challenge you to the core! They´re designed to be quick (so you can fit
                  them into even the busiest schedule) but also intense so you can build that lean muscle so
                  you look amazing. Join any of our FREE in person workout sessions in cities all over the
                  country, or do the workouts at home. It’s your choice! </p>
              </div>
            </figcaption>
          </div>
        </figure>
      </div>
      <div class="grid3 cs-style-3">
        <figure>
          <div class="mobile-bonus visible-xs">
            <img src="../../assets/images/bonus-3m.jpg" class="img-responsive">
          </div>
          <div class="bonus-main group wow fadeInDown">
            <img src="../../assets/images/bonus-3.jpg" class="img-responsive">
            <figcaption>
              <div class="bonus-data"> <span class="count">3</span>
                <h4>Free Accountability &amp;
                  Support Group </h4>
                <p>This is were the rubber meets the road! Are you staying accountable? Our coaches will help you hold your
                  feet to the fire through one-on-one and group accountability. Get motivated by seeing other people´s results
                  from around the country as well as become motivation for others by sharing your story!</p>
              </div>
            </figcaption>
          </div>
        </figure>
        </div>
      </div>
</section>
<!--Trial Pack-->
<section class="pack-bg"><div class="container">
    <div class="pack-wrap wow fadeInDown">
      <div class="pack-main"> <span class="left-arrow"><img src="../../assets/images/down-arrow.png"></span> <span class="main-heading">
        <h2>What´s in the <br><strong>3 Day Trial Pack?</strong></h2>
      </span> <span class="package-img"> <img src="../../assets/images/package.png" class="img-responsive" alt="Package"></span> </div>
    </div>
  </div>
</section>
<!--Herbalife Products-->
<section class="herbalife-product">
  <div class="container">
    <div class="herbalife-wrap">
      <div class="main-product wow fadeInDown">
        <div class="col-sm-5"> <span class="product-img">
          <img src="../../assets/images/meal-mix.png" class="img-responsive" alt="Meal Mix"></span>
        </div>
        <div class="col-sm-7">
          <h3>Formula 1 Healthy Meal Mix</h3>
          <p>Treat your body to a healthy, balanced meal in no time! Not only are these
            shakes easy to make, they´re also delicious. With up to 21 essential vitamins
             and minerals – and available in a variety of flavors – weight management
              never tasted so good!</p>
          <span class="note">
            <i class="fa fa-check-square-o"></i>
             3 Day Supply Included</span>
           </div>
      </div>
      <div class="main-product wow fadeInDown">
        <div class="col-sm-5">
          <span class="product-img">
            <img src="../../assets/images/total-control.png" class="img-responsive" alt="Total Contraol"></span>
          </div>
        <div class="col-sm-7">
          <h3>Total Control</h3>
          <p>Total Control® tablets contain a proprietary blend of tea extracts and
            caffeine which quickly stimulates metabolism and provides an energetic
            and alert feeling.*</p>
          <ul><li>Quickly stimulates metabolism*</li>
            <li>Increases alertness*</li>
            <li>Provides an energetic sensation*</li>
          </ul><span class="note"><i class="fa fa-check-square-o"></i> 3 Day Supply Included</span>
          <p><span class="imp">*</span> These statements have not been evaluated by
            the Food and Drug Administration. This product is not intended to diagnose,
            treat, cure or prevent any disease.</p>
        </div>
      </div>
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
              <i class="fa fa-phone">
              </i><font size"5em">' . $phone . '</a></font>
            <h4>I´ll Be Your Nutrition Coach
              for the Next 3 Days… </h4>
            <p>When you take my 3 day trial health challenge I´ll help you develop a personal nutrition plan!
               Your goals are unique and your nutrition plan should be as well! I personally use these
                products and can tell you they work! Get started today. I look forward to helping you! </p>
          </div>
        </div>
      </div>
    </div>
  </div>
</section><!--Facebook Proof--><section class="facecook-proof"><div class="container"> <span class="main-heading">
    <h2>Look At All These People Taking the<br><strong>#3daytrial</strong></h2>
  </span> <span class="facebook-slogan"><img src="../../assets/images/facebook.png"></span>
    <div class="proof-wrap">
      <div class="row">
        <div class="col-sm-6 wow slideInLeft" data-wow-duration="2s"><img src="../../assets/images/post-1.png" class="img-responsive"></div>
        <div class="col-sm-6 wow slideInRight" data-wow-duration="2s"><img src="../../assets/images/post-2.png" class="img-responsive"></div>
        <div class="col-sm-6 wow slideInLeft" data-wow-duration="2s"><img src="../../assets/images/post-3.png" class="img-responsive"></div><!--
        <div class="col-sm-6 wow slideInRight" data-wow-duration="2s"><img src="../../assets/images/post-4.png" class="img-responsive"></div>
        <div class="col-sm-6 wow slideInLeft" data-wow-duration="2s"><img src="../../assets/images/post-5.png" class="img-responsive"></div>-->
        <div class="col-sm-6 wow slideInRight" data-wow-duration="2s"><img src="../../assets/images/post-8.png" class="img-responsive" width="100%"></div>
      </div>
      <span class="request-btn"> <a href="#goform" class="page-scroll">Request Your 3 Day Trial Pack Today <i class="fa fa-chevron-circle-right"></i></a> </span>
    </div>
  </div>
</section><!--Customer--><section class="customers"><div class="container"> <span class="main-heading">
    <h2>Amazing Results from Clients Who Continued on Past the 3 Day Trial</h2>
    <p>Many people experience such amazing results in just 3 days they want to continue coaching with us. Check out some of these results.</p>
    </span>
    <div class="customer-main">
      <div class="customer-data wow fadeInDown">
        <div class="customer-photo">
          <div class="col-sm-4">
            <img src="../../assets/images/customer-1.jpg" class="img-responsive">
            <h4>Vincent y Neyla</h4>
          </div>
          <div class="col-sm-4">
            <img src="../../assets/images/customer-2.jpg" class="img-responsive">
            <h4>Yomara</h4>
          </div>
          <div class="col-sm-4">
            <img src="../../assets/images/customer-3.jpg" class="img-responsive">
            <h4>Lucy</h4>
          </div>
        </div>
        <div class="customer-text">
          <p>*Consumers who use Herbalife® Formula 1 twice per day as part of a healthy lifestyle can generally expect to lose around 0.5 to 1 pound per week. Participants in a 12-week, single-blind study used Formula 1 twice per day (once as a meal and once as a snack) with a reduced calorie diet and a goal of 30 minutes of exercise per day. Participants followed either a high protein diet or a standard protein diet. Participants in both groups lost about 8.5 pounds.</p>
        </div>
        <br>
        <div class="customer-photo">
          <div class="col-sm-4">
            <img src="../../assets/images/customer-4.jpg" class="img-responsive">
            <h4>Juan</h4>
          </div>
          <div class="col-sm-4">
            <img src="../../assets/images/customer-5.jpg" class="img-responsive">
            <h4>Jhosselin</h4>
          </div>
          <div class="col-sm-4">
            <img src="../../assets/images/customer-6.jpg" class="img-responsive">
            <h4>Marcos</h4>
          </div>
        </div>
        <div class="customer-text">
          <p>*Consumers who use Herbalife® Formula 1 twice per day as part of a healthy lifestyle can generally expect to lose around 0.5 to 1 pound per week. Participants in a 12-week, single-blind study used Formula 1 twice per day (once as a meal and once as a snack) with a reduced calorie diet and a goal of 30 minutes of exercise per day. Participants followed either a high protein diet or a standard protein diet. Participants in both groups lost about 8.5 pounds.</p>
        </div>
      </div>
    </div>
</section>
<!--Footer
<footer><div class="container">
  <span class="hbl-pro">
    <p>Powered by <a href="#">HBL Pro </a></p>
    </span>
    <ul><a href="site/disclaimers/privacy_policy.html" target="_blank">Privacy Policy </a> | <a href="site/disclaimers/weightloss_disclaimer.html" target="_blank">
 Weight Loss Disclaimer</a> | <a href="site/disclaimers/earnings_disclaimer.html" target="_blank">Earnings Disclaimer</a>
    </ul></div>
</footer><!--End Home Page-->
</body>
  <!--Stylesheet-->
  <link rel="icon" href="../../assets/images/favicon.png">
  <link href="../../assets/css/theme.css" rel="stylesheet" type="text/css">
  <link href="../../assets/css/bootstrap.css" rel="stylesheet" type="text/css">
  <link rel="stylesheet" href="../../assets/css/responsiveslides.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
  <!--Stylesheet-->
 <!--JavaScript-->
  <script src="http://code.jquery.com/jquery-latest.min.js"></script>
  <script src="../../assets/js/video.js"></script>
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
</html>
';
$message4 = '
<?php
  $conexion = new mysqli("localhost", "thrdaytr_webapp", "pRf_&lue#LU7", "thrdaytr_planhbl");
  $search = $conexion->query(\'SELECT * FROM coach WHERE id ="'.$id_coach.'"\');
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
  <link rel="icon" href="../../../assets/images/favicon.png">
  <link href="../../../assets/css/theme.css" rel="stylesheet" type="text/css">
  <link href="../../../assets/css/bootstrap.css" rel="stylesheet" type="text/css">
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
  if (!event.target.matches(".dropbtn")) {
    var dropdowns = document.getElementsByClassName("dropdown-content");
    var i;
    for (i = 0; i < dropdowns.length; i++) {
      var openDropdown = dropdowns[i];
      if (openDropdown.classList.contains("show")) {
        openDropdown.classList.remove("show");
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
</head>
</head>
<body class="magic">
<!--Start Home Page-->
<!--Top-Script-->
<div class="black-stip">
  <div class="container">
  <strong>Independent Distributor Herbalife: <b>' . $name . '</b></strong>
  <div class="dropdown">
    <button onclick="myFunction()" class="dropbtn">Language </button>
      <div id="myDropdown" class="dropdown-content">
        <a href="../../es"><img src="../../../assets/images/band_esp.png"> Spanish</a>
        <a href="../../en"><img src="../../../assets/images/band_eng.png"> English</a>
      </div>
    </div>
     </div>
</div>
<img src="../../../assets/images/banner.jpg" width="100%" height="auto">
<!-- Video Wrap & Form -->
<div class="container">
  <div class="row">
    <div class="col-md-6" style="margin-top:10px;">

      <div class="video-responsive">
        <iframe src="https://player.vimeo.com/video/'.$idvideo2.'" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
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
  $meta = $_POST["custom_1"];
  //ASUNTO DEL EMAIL
  $asunto = "3daytrial Captura";
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
    <td>Meta: " . $meta . "</td>
   </tr>
   <tr>
     <td style=\'padding: 20px 0 30px 0;color: #153643; font-family: Arial, sans-serif; font-size: 16px; line-height: 20px;\'>
        Thank you for showing your interest in our program of 3 day trial, one of our Coaches will contact you as soon as possible.
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
          
          <b><i>IMPORTANT NOTE:</i> DO NOT REPLY TO THIS MESSAGE, IF THIS MESSAGE COMES TO YOU FOR ANY INCORRECT OR CONSIDER THE SPAM,
            Contact technical support: \'tsuluismarin@gmail.com\' y \'h24family@gmail.com\' </b>
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
        <h2 id="goform">Get Started now!</h2>
        <p>Fill out this form to get started now!</p>
          <?php 
          if($_POST["Continue"]) { ?>
          <table width="100%" border="0" align="center" cellpadding="2" cellspacing="1" bgcolor="#333333">
            <tr>
              <td bgcolor="#f5f5f5" style="font-family:verdana;color:#000000;font-size:15px;" class="text-center">
              <?
              foreach ($file as $mail) {
                if(mail($mail, $asunto, $mensaje, $headers)) {
                  echo " <font color=green face=verdana size=4>Message Sending Successfully.!</font><br>
                  <font color=green face=verdana><b>".$mail."<b><br>Check the Spam Folder<br>if you have not yet reached<br>the message</font>";
                  $i++;
                  $insert = "INSERT INTO emails(id_coach,firstname,lastname,email,phone,web) VALUES(\'".$id_coach."\',\'".$firstname."\',\'".$lastname."\',\'".$arquivo."\',\'".$Phone."\',\'3daytrial\')";
                  if ($conexion->query($insert) == TRUE) {
                    echo" <script>alert(\'Message Send Successfully!\');
                    </script>";
                  }else{
                    echo "<script>
                        history.back();
                      </script>";
                  }
                } else {
                  echo $mail[$i]." <font color=red>Don´t Send Message</font><br><hr>";
                  
                }
              }
              ?>
              </td>
            </tr>
          </table>
          <br><br>
        <?php }  ?>
        <form method="post" action="">
          <div class="form-group">
            <input type="name" name="firstname" class="form-control" placeholder="First Name" required></div>
          <div class="form-group">
            <input type="lastname" name="lastname" class="form-control" placeholder="Last Name" required></div>
          <div class="form-group">
            <input type="phone" name="phone" class="form-control" placeholder="Enter Your Best Phone" required></div>
          <div class="form-group">
            <input type="email" name="email" class="form-control" placeholder="Enter Your Best Email" required></div>
          <div class="form-group">
            <select class="form-control" name="custom_1">
              <option value="">Select Your Goal</option>
              <option value="Lose Weight">Lose Weight</option>
              <option value="Build Muscle">Build Muscle</option>
              <option value="Gain Energy">Gain Energy</option>
              <option value="Other">Other</option>
            </select>
          </div>
          <div class="form-group">
           <input type="submit" value="Continue" name="Continue" id="Continue" class="btn"></div>
        </form>
      </div>
    </dic>
  </div>
</div>
<!--Bonus Part-->
<section class="bonus">
  <div class="container">
    <span class="main-heading wow fadeInDown">
    <h2>Free Bonuses Youll Get With the <br><strong>3 Day Trial Pack</strong></h2>
    </span>
    <div class="bonus-wrap">
          <div class="mobile-bonus visible-xs">
            <img src="../../../assets/images/bonus-1m.jpg" class="img-responsive">
          </div>
          <div class="bonus-main food wow fadeInDown">
            <img src="../../../assets/images/bonus-1-1.jpg" class="img-responsive">
              <div class="bonus-data"> <span class="count">1</span>
                <h4>Free Meal Plans &amp;
                  Delicious Healthy Recipes </h4>
                <p>Our program guide contains delicious healthy recipes and meal
                  ideas that are quick, easy to make and absolutely delicious.
                  Our meal plans are based on just the right portions for you´´re
                  body size so you don’t feel deprived. Our recipe database is
                  always growing so this isn’t one of those programs where you
                  get stuck eating the same foods for the rest of your life!</p>
              </div>
          </div>
          <div class="mobile-bonus visible-xs">
            <img src="../../../assets/images/bonus-2m.jpg" class="img-responsive">
          </div>
          <div class="bonus-main workout wow fadeInDown">
            <img src="../../../assets/images/bonus-2-1.jpg" class="img-responsive">
              <div class="bonus-data bonus-right"> <span class="count">2</span>
                <h4>Free Metabolism Boosting Workouts </h4>
                <p>Our workouts will challenge you to the core! Theyre designed to be quick (so you can fit
                  them into even the busiest schedule) but also intense so you can build that lean muscle so
                  you look amazing. Join any of our FREE in person workout sessions in cities all over the
                  country, or do the workouts at home. It’s your choice! </p>
              </div>
          </div>
          <div class="mobile-bonus visible-xs">
            <img src="../../../assets/images/bonus-3m.jpg" class="img-responsive">
          </div>
          <div class="bonus-main group wow fadeInDown">
            <img src="../../../assets/images/bonus-3-1.jpg" class="img-responsive">
              <div class="bonus-data"> <span class="count">3</span>
                <h4>Free Accountability &amp;
                  Support Group </h4>
                <p>This is were the rubber meets the road! Are you staying accountable? Our coaches will help you hold your
                  feet to the fire through one-on-one and group accountability. Get motivated by seeing other people´´s results
                  from around the country as well as become motivation for others by sharing your story!</p>
              </div>
          </div>
      </div>
</section>
<!--Trial Pack-->
<section class="pack-bg"><div class="container">
    <div class="pack-wrap wow fadeInDown">
      <div class="pack-main"> <span class="left-arrow"><img src="../../../assets/images/down-arrow.png"></span> <span class="main-heading">
        <h2>What´s in the <br><strong>3 Day Trial Pack?</strong></h2>
      </span> <span class="package-img"> <img src="../../../assets/images/package.png" class="img-responsive" alt="Package"></span> </div>
    </div>
  </div>
</section>
<!--Herbalife Products-->
<section class="herbalife-product">
  <div class="container">
    <div class="herbalife-wrap">
      <div class="main-product wow fadeInDown">
        <div class="col-sm-5"> <span class="product-img">
          <img src="../../../assets/images/meal-mix.png" class="img-responsive" alt="Meal Mix"></span>
        </div>
        <div class="col-sm-7">
          <h3>Formula 1 Healthy Meal Mix</h3>
          <p>Treat your body to a healthy, balanced meal in no time! Not only are these
            shakes easy to make, they´re also delicious. With up to 21 essential vitamins
             and minerals – and available in a variety of flavors – weight management
              never tasted so good!</p>
          <span class="note">
            <i class="fa fa-check-square-o"></i>
             3 Day Supply Included</span>
           </div>
      </div>
      <div class="main-product wow fadeInDown">
        <div class="col-sm-5">
          <span class="product-img">
            <img src="../../../assets/images/total-control.png" class="img-responsive" alt="Total Contraol"></span>
          </div>
        <div class="col-sm-7">
          <h3>Total Control</h3>
          <p>Total Control® tablets contain a proprietary blend of tea extracts and
            caffeine which quickly stimulates metabolism and provides an energetic
            and alert feeling.*</p>
          <ul><li>Quickly stimulates metabolism*</li>
            <li>Increases alertness*</li>
            <li>Provides an energetic sensation*</li>
          </ul><span class="note"><i class="fa fa-check-square-o"></i> 3 Day Supply Included</span>
          <p><span class="imp">*</span> These statements have not been evaluated by
            the Food and Drug Administration. This product is not intended to diagnose,
            treat, cure or prevent any disease.</p>
        </div>
      </div>
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
              <i class="fa fa-phone">
              </i><font size"5em">' . $phone . '</a></font>
            <h4>I´ll Be Your Nutrition Coach
              for the Next 3 Days… </h4>
            <p>When you take my 3 day trial health challenge I´ll help you develop a personal nutrition plan!
               Your goals are unique and your nutrition plan should be as well! I personally use these
                products and can tell you they work! Get started today. I look forward to helping you! </p>
          </div>
        </div>
      </div>
    </div>
  </div>
</section><!--Facebook Proof--><section class="facecook-proof"><div class="container"> <span class="main-heading">
    <h2>Look At All These People Taking the<br><strong>#3daytrial</strong></h2>
  </span> <span class="facebook-slogan"><img src="../../../assets/images/facebook.png"></span>
    <div class="proof-wrap">
      <div class="row">
        <div class="col-sm-6 wow slideInLeft" data-wow-duration="2s"><img src="../../../assets/images/post-1.png" class="img-responsive"></div>
        <div class="col-sm-6 wow slideInRight" data-wow-duration="2s"><img src="../../../assets/images/post-2.png" class="img-responsive"></div>
        <div class="col-sm-6 wow slideInLeft" data-wow-duration="2s"><img src="../../../assets/images/post-3.png" class="img-responsive"></div><!--
        <div class="col-sm-6 wow slideInRight" data-wow-duration="2s"><img src="../../../assets/images/post-4.png" class="img-responsive"></div>
        <div class="col-sm-6 wow slideInLeft" data-wow-duration="2s"><img src="../../../assets/images/post-5.png" class="img-responsive"></div>-->
        <div class="col-sm-6 wow slideInRight" data-wow-duration="2s"><img src="../../../assets/images/post-8.png" class="img-responsive" width="100%"></div>
      </div>
      <span class="request-btn"> <a href="#goform" class="page-scroll">Request Your 3 Day Trial Pack Today <i class="fa fa-chevron-circle-right"></i></a> </span>
    </div>
  </div>
</section><!--Customer--><section class="customers"><div class="container"> <span class="main-heading">
    <h2>Amazing Results from Clients Who Continued on Past the 3 Day Trial</h2>
    <p>Many people experience such amazing results in just 3 days they want to continue coaching with us. Check out some of these results.</p>
    </span>
    <div class="customer-main">
      <div class="customer-data wow fadeInDown">
        <div class="customer-photo">
          <div class="col-sm-4">
            <img src="../../../assets/images/customer-1.jpg" class="img-responsive">
            <h4>Vincent y Neyla</h4>
          </div>
          <div class="col-sm-4">
            <img src="../../../assets/images/customer-2.jpg" class="img-responsive">
            <h4>Yomara</h4>
          </div>
          <div class="col-sm-4">
            <img src="../../../assets/images/customer-3.jpg" class="img-responsive">
            <h4>Lucy</h4>
          </div>
        </div>
        <div class="customer-text">
          <p>*Consumers who use Herbalife® Formula 1 twice per day as part of a healthy lifestyle can generally expect to lose around 0.5 to 1 pound per week. Participants in a 12-week, single-blind study used Formula 1 twice per day (once as a meal and once as a snack) with a reduced calorie diet and a goal of 30 minutes of exercise per day. Participants followed either a high protein diet or a standard protein diet. Participants in both groups lost about 8.5 pounds.</p>
        </div>
        <br>
        <div class="customer-photo">
          <div class="col-sm-4">
            <img src="../../../assets/images/customer-4.jpg" class="img-responsive">
            <h4>Juan</h4>
          </div>
          <div class="col-sm-4">
            <img src="../../../assets/images/customer-5.jpg" class="img-responsive">
            <h4>Jhosselin</h4>
          </div>
          <div class="col-sm-4">
            <img src="../../../assets/images/customer-6.jpg" class="img-responsive">
            <h4>Marcos</h4>
          </div>
        </div>
        <div class="customer-text">
          <p>*Consumers who use Herbalife® Formula 1 twice per day as part of a healthy lifestyle can generally expect to lose around 0.5 to 1 pound per week. Participants in a 12-week, single-blind study used Formula 1 twice per day (once as a meal and once as a snack) with a reduced calorie diet and a goal of 30 minutes of exercise per day. Participants followed either a high protein diet or a standard protein diet. Participants in both groups lost about 8.5 pounds.</p>
        </div>
      </div>
    </div>
</section>
<!--Footer
<footer><div class="container">
  <span class="hbl-pro">
    <p>Powered by <a href="#">HBL Pro </a></p>
    </span>
    <ul><a href="site/disclaimers/privacy_policy.html" target="_blank">Privacy Policy </a> | <a href="site/disclaimers/weightloss_disclaimer.html" target="_blank">
 Weight Loss Disclaimer</a> | <a href="site/disclaimers/earnings_disclaimer.html" target="_blank">Earnings Disclaimer</a>
    </ul></div>
</footer><!--End Home Page-->
</body>
</html>
';
$message5 ='
<?php
//Creamos una función que detecte el idioma del navegador del cliente.
function getUserLanguage() {
   $idioma =substr($_SERVER["HTTP_ACCEPT_LANGUAGE"],0,2);
   return $idioma;
}
//Almacenamos dicho idioma en una variable
$user_language=getUserLanguage();
//De acuerdo al idioma hacemos una o varias redirecciones.
if($user_language=="es"){
     header( "Location: es/" );
}elseif($user_language=="en"){
     header( "Location: en/" );
}
 ?>';
echo '<div class="container">';
               echo ' <div class="row">';
                    echo '<div class="inner-addon left-addon">';
echo "<h4>Ha Seleccionado Capturadoras a crear en: " . $selected . "</h4>";
            if ($value == 'USA') {
                $estructura1 = "../../3daytrial/".$folder;
                //creamos directorio para USA
 
         if(file_exists($estructura1)){
            ?>
            

            <?php 
            echo "<script> 
                alert('El nombre de la carpeta para la web de Colombia existe Verifique y vuelva a intentar en USA')
                </script>";
             echo("<h3>Capturadora Web en Estados Unidos</h3><br>");
            echo("El nombre de la carpeta para la web de Colombia existe Verifique y vuelva a intentar<br><br>");
            echo "<a href=".$estructura1." target='_blank' class='btn btn-success  '><span class='glyphicon glyphicon-thumbs-up'></span> Mostrar Web ''".$folder."''</a>";
            echo "<br><br>";
            echo "<input type='button' class='btn btn-danger' value='volver atrás' name='volver atrás2' onclick='history.back()' /><br><br><br><br>";
                    echo '</div>';
                echo '</div>';
            echo '</div>';
            //echo $mensaje;
        }else{
            mkdir($estructura1, 0777);
            mkdir($estructura1."/es", 0777);
            mkdir($estructura1."/es/movil", 0777);
            mkdir($estructura1."/en", 0777);
            mkdir($estructura1."/en/movil", 0777);
 
            //indicamos la ruta del fichero index.php
  
            $rout1 = $estructura1."/es/index.php";
            $rout2 = $estructura1."/es/movil/index.php";    
            $rout3 = $estructura1."/en/index.php";
            $rout4 = $estructura1."/en/movil/index.php";
            $rout5 = $estructura1."/index.php";
 
            //Creamos el fichero index.php e introducimos el contenido del TextArea 
            $aa = file_put_contents($rout1, $message1);
            $bb = file_put_contents($rout2, $message2);
            $cc = file_put_contents($rout3, $message3);
            $dd = file_put_contents($rout4, $message4);
            $ee = file_put_contents($rout5, $message5);
 
            if(!$aa){echo "ERROR al insertar el fichero";}   
            if(!$bb){echo "ERROR al insertar el fichero";}  
            if(!$cc){echo "ERROR al insertar el fichero";}   
            if(!$dd){echo "ERROR al insertar el fichero";} 
            if(!$ee){echo "ERROR al insertar el fichero";} 
            echo "<script> 
                alert('It has been created successfully on USA')
                </script>";
            echo "<a href=".$estructura1." target='_blank' class='btn btn-success  '><span class='glyphicon glyphicon-thumbs-up'></span> Show Web ''".$folder."''</a>";
            echo "<br/>";
            echo "<br/>";
            /*echo $estructura1; 
            echo "<br/>";
            $host= $_SERVER["HTTP_HOST"];
            echo "<input type='text' class='form-control' value='http://" . $estructura1 . "'>";
            echo "<br>";*/
              $insert = "INSERT INTO webcoach(coach,web,dir_name,folder,country) VALUES('$id_coach','3daytrial','$estructura1','$folder','$value')";
              if ($conexion->query($insert) == TRUE) {
              }else{
              }
    }
            }
            if ($value == 'Colombia') {
                $estructura2 = "../../3dt/".$folder;
                 //creamos directorio para Colombia
        if(file_exists($estructura2)){
            ?>
            <div class="container">
                <div class="row">
                    <div class="inner-addon left-addon">

            <?php 
            echo "<script> 
                alert('El nombre de la carpeta para la web de Colombia existe Verifique y vuelva a intentar')
                </script>";
            echo("<h3>Capturadora en Colombia:</h3><br>");
            echo("El nombre de la carpeta para la web de Colombia existe Verifique y vuelva a intentar<br><br>");
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
            $b = file_put_contents($ruta2, $mensaje2);
 
            if(!$a){echo "ERROR al insertar el fichero";}   
            if(!$b){echo "ERROR al insertar el fichero";}  
            
              $insert = "INSERT INTO webcoach(coach,web,dir_name,folder,country) VALUES('$id_coach','3dt','$estructura2','$folder','$value')";
              if ($conexion->query($insert) == TRUE) {
              }else{
              }           
             echo "<script> 
                alert('Se ha creado Satisfactoriamente en Colombia')
                </script>";
            echo "<a href=".$estructura2." target='_blank' class='btn btn-success  '><span class='glyphicon glyphicon-thumbs-up'></span> Mostrar Web ''".$folder."''</a>";
            echo "<br/>";
            echo "<br/>";
        }
            }

            if ($value == 'Dominicana') {
                $estructura3 = "../../rd3dt/".$folder;
                 //creamos directorio para Colombia
        if(file_exists($estructura3)){
            ?>
            <div class="container">
                <div class="row">
                    <div class="inner-addon left-addon">

            <?php 
            echo "<script> 
                alert('El nombre de la carpeta para la web de Colombia existe Verifique y vuelva a intentar')
                </script>";
            echo("<h3>Capturadora en Colombia:</h3><br>");
            echo("El nombre de la carpeta para la web de Colombia existe Verifique y vuelva a intentar<br><br>");
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
            $b = file_put_contents($ruta2, $mensaje2);
 
            if(!$a){echo "ERROR al insertar el fichero";}   
            if(!$b){echo "ERROR al insertar el fichero";}  
            
              $insert = "INSERT INTO webcoach(coach,web,dir_name,folder,country) VALUES('$id_coach','rd3dt','$estructura3','$folder','$value')";
              if ($conexion->query($insert) == TRUE) {
              }else{
              }           
             echo "<script> 
                alert('Se ha creado Satisfactoriamente en Republica Dominicana')
                </script>";
            echo "<a href=".$estructura3." target='_blank' class='btn btn-success  '><span class='glyphicon glyphicon-thumbs-up'></span> Mostrar Web ''".$folder."''</a>";
            echo "<br/>";
            echo "<br/>";
        }
            }
        }
    }
    else {
        $selected = 'Seleccione una web a crear, Estados Unidos, Colombia o Rep&uacuteblica Dominicana';
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
        <form action="create3daytrial.php" method="POST">
             <!--<h3>Create Web 3daytrial Challenge</h3>-->
            <h3>Creación del WebSite Reto del Paquete de 3 días</h3>
<br>
          <div class="form-group col-xs-8">
          <!--<label for="name">Select a Coach to see your list</label>-->
          <label for="name">Selecione un Entrenador Asociado</label>
            <div class="inner-addon left-addon">
              <select name="id_coach" id="coach" class="form-control" required>
                <option value="">>-----------------Select a Coach--------------<</option>
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

            <!--<label for="folder">Folder name</label>-->
            <label for="folder">Nombre de Carpeta a crear</label>
            <div class="inner-addon left-addon">
              <i class="glyphicon glyphicon-folder-open"></i>
              <input type="text" class="form-control" placeholder="Example: luismarin"  id="folder" name="folder" required/>
            </div>

            <!--<label for="">Create web on:</label>-->
            <label for="">Crear website en:</label>
            <div class="inner-addon left-addon">
            <input type="checkbox" name="web[]" id="USA" value="USA" onchange="javascript:showContent()"/> Estados Unidos <br/>
            <input type="checkbox" name="web[]" value="Colombia"/> Colombia <br/>
            <!--<input type="checkbox" name="web[]" value="Dominicana"/> Rep&uacuteblica Dominicana <br/>-->
            </div>

            <h3 align="center">Change Video from Capturing</h3>
              <br>
              <h4>Video para Capturadoras Colombia</h4>
              <div class="col-xs-5">
                <label for="video">Select origen Video</label><br>
                <input type="radio" name="video3" value="y-"> YouTube&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <input type="radio" name="video3" value="v-"> Vimeo
              </div>
              <div class="col-xs-6">
                <input type="text" name="idvideo3" id="video" class="form-control" placeholder="ID Vimeo or YouTube ">
              </div>
              <br><br>
              <div id="content" style="display: none;">
              <br>
                <h4>Video para Capturadoras U.S.A (Ver. Español)</h4>
                <div class="col-xs-5">
                <label for="video">Select origen Video</label><br>
                <input type="radio" name="video1" value="y-"> YouTube&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <input type="radio" name="video1" value="v-"> Vimeo
              </div>
              <div class="col-xs-6">
                <input type="text" name="idvideo1" id="video" class="form-control" placeholder="ID Vimeo or YouTube ">
              </div>

              <br>
              <br>
              <br>
                <h4>Video para Capturadoras U.S.A (Ver. Ingles)</h4>
                <div class="col-xs-5">
                <label for="video">Select origen Video</label><br>
                <input type="radio" name="video2" value="y-"> YouTube&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <input type="radio" name="video2" value="v-"> Vimeo
              </div>
              <div class="col-xs-6">
                <input type="text" name="idvideo2" id="video" class="form-control" placeholder="ID Vimeo or YouTube ">
              </div>
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
} elseif ($tipo_usu == "Lider") {
  ?>


<div class="container">
    <div class="row">
        <form action="create3daytrial.php" method="POST">
             <!--<h3>Create Web 3daytrial Challenge</h3>-->
            <h3>Creación del WebSite Reto del Paquete de 3 días</h3>
<br>
          <div class="form-group col-xs-8">
          <!--<label for="name">Select a Coach to see your list</label>-->
          <label for="name">Entrenador :</label>
            <div class="inner-addon left-addon">
            <?php 
              $user2 = $conexion->query("SELECT * FROM coach WHERE id = ".$id_name);
              $row2 = $user2->fetch_assoc();
              $name_user = $row2['name'];
              echo $name_user;
              echo '<input type="hidden" class="form-control"  name="id_coach" id="coach" value="'.$id_name.'" readonly/>';
            ?>
            </div>

            <!--<label for="folder">Folder name</label>-->
            <label for="folder">Nombre de Carpeta a crear</label>
            <div class="inner-addon left-addon">
              <i class="glyphicon glyphicon-folder-open"></i>
              <input type="text" class="form-control" placeholder="Example: luismarin"  id="folder" name="folder" required/>
            </div>

            <!--<label for="">Create web on:</label>-->
            <label for="">Crear website en:</label>
            <div class="inner-addon left-addon">
            <input type="checkbox" name="web[]" id="USA" value="USA" onchange="javascript:showContent()"/> Estados Unidos <br/>
            <input type="checkbox" name="web[]" value="Colombia"/> Colombia <br/>
            <!--<input type="checkbox" name="web[]" value="Dominicana"/> Rep&uacuteblica Dominicana <br/>-->
            </div>

            <h3 align="center">Change Video from Capturing</h3>
              <br>
              <h4>Video para Capturadoras Colombia</h4>
              <div class="col-xs-5">
                <label for="video">Select origen Video</label><br>
                <input type="radio" name="video3" value="y-"> YouTube&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <input type="radio" name="video3" value="v-"> Vimeo
              </div>
              <div class="col-xs-6">
                <input type="text" name="idvideo3" id="video" class="form-control" placeholder="ID Vimeo or YouTube ">
              </div>
              <br><br>
              <div id="content" style="display: none;">
              <br>
                <h4>Video para Capturadoras U.S.A (Ver. Español)</h4>
                <div class="col-xs-5">
                <label for="video">Select origen Video</label><br>
                <input type="radio" name="video1" value="y-"> YouTube&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <input type="radio" name="video1" value="v-"> Vimeo
              </div>
              <div class="col-xs-6">
                <input type="text" name="idvideo1" id="video" class="form-control" placeholder="ID Vimeo or YouTube ">
              </div>

              <br>
              <br>
              <br>
                <h4>Video para Capturadoras U.S.A (Ver. Ingles)</h4>
                <div class="col-xs-5">
                <label for="video">Select origen Video</label><br>
                <input type="radio" name="video2" value="y-"> YouTube&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <input type="radio" name="video2" value="v-"> Vimeo
              </div>
              <div class="col-xs-6">
                <input type="text" name="idvideo2" id="video" class="form-control" placeholder="ID Vimeo or YouTube ">
              </div>
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
  } elseif ($tipo_usu == "Usuario") {
  ?>


<div class="container">
    <div class="row">
        <form action="create3daytrial.php" method="POST">
             <!--<h3>Create Web 3daytrial Challenge</h3>-->
            <h3>Creación del WebSite Reto del Paquete de 3 días</h3>
<br>
          <div class="form-group col-xs-8">
          <!--<label for="name">Select a Coach to see your list</label>-->
          <label for="name">Entrenador :</label>
            <div class="inner-addon left-addon">
            <?php 
              $user2 = $conexion->query("SELECT * FROM coachleads WHERE id = ".$id_name);
              $row2 = $user2->fetch_assoc();
              $name_user = $row2['name'];
              echo $name_user;
              echo '<input type="hidden" class="form-control"  name="id_coach" id="coach" value="'.$id_name.'" readonly/>';
            ?>
            </div>

            <!--<label for="folder">Folder name</label>-->
            <label for="folder">Nombre de Carpeta a crear</label>
            <div class="inner-addon left-addon">
              <i class="glyphicon glyphicon-folder-open"></i>
              <input type="text" class="form-control" placeholder="Example: luismarin"  id="folder" name="folder" required/>
            </div>

            <!--<label for="">Create web on:</label>-->
            <label for="">Crear website en:</label>
            <div class="inner-addon left-addon">
            <input type="checkbox" name="web[]" id="USA" value="USA" onchange="javascript:showContent()"/> Estados Unidos <br/>
            <input type="checkbox" name="web[]" value="Colombia"/> Colombia <br/>
            <!--<input type="checkbox" name="web[]" value="Dominicana"/> Rep&uacuteblica Dominicana <br/>-->
            </div>

            <h3 align="center">Change Video from Capturing</h3>
              <br>
              <h4>Video para Capturadoras Colombia</h4>
              <div class="col-xs-5">
                <label for="video">Select origen Video</label><br>
                <input type="radio" name="video3" value="y-"> YouTube&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <input type="radio" name="video3" value="v-"> Vimeo
              </div>
              <div class="col-xs-6">
                <input type="text" name="idvideo3" id="video" class="form-control" placeholder="ID Vimeo or YouTube ">
              </div>
              <br><br>
              <div id="content" style="display: none;">
              <br>
                <h4>Video para Capturadoras U.S.A (Ver. Español)</h4>
                <div class="col-xs-5">
                <label for="video">Select origen Video</label><br>
                <input type="radio" name="video1" value="y-"> YouTube&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <input type="radio" name="video1" value="v-"> Vimeo
              </div>
              <div class="col-xs-6">
                <input type="text" name="idvideo1" id="video" class="form-control" placeholder="ID Vimeo or YouTube ">
              </div>

              <br>
              <br>
              <br>
                <h4>Video para Capturadoras U.S.A (Ver. Ingles)</h4>
                <div class="col-xs-5">
                <label for="video">Select origen Video</label><br>
                <input type="radio" name="video2" value="y-"> YouTube&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <input type="radio" name="video2" value="v-"> Vimeo
              </div>
              <div class="col-xs-6">
                <input type="text" name="idvideo2" id="video" class="form-control" placeholder="ID Vimeo or YouTube ">
              </div>
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