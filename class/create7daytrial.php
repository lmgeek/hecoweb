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
/**************************     CREA EL CLON DE 7 DAY TRIAL PACK   ******************************/
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



      //VIDEO ESPAÑOL RD CO
      if (isset($_POST['idvideo3']) && isset($_POST['idvideo3']) && 
          isset($_POST['video3']) && isset($_POST['video3'])) {
        $idvideo3 = $_POST['idvideo3'];
        $video3 = $_POST['video3'];
      }else{
        $idvideo3 = '200234804';
        $video3 = 'v-';
      }



/******************************************************************************************************/
/**************************      CREA EL CLON DE LA WEB DE Colombia      ******************************/
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
  <title>Paquete de prueba de 7 dias | Home</title>
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
     <dic class="col-md-6">
      <div class="form-part wow fadeInDown">
        <h2 id="goform">¡Empieza ahora!</h2>
        <p>Rellena este formulario para empezar ahora!</p>
    <form method="post" action="http://planhbl.com/hecoweb/email/email01.php">
          <input type="hidden" name="message_group_admin_id" value="55">
          <input name="web" value="7daytrial" type="hidden">
          <input type="hidden" name="activity_id" value="15">
          <input type="hidden" name="id_coach" value="'.$id_coach.'">
          <input type="hidden" name="subject" value="Paquete de Prueba de 7 dias">
          <div class="form-group">
            <input type="name" name="firstname" class="form-control" placeholder="Nombre" required></div>
          <div class="form-group">
            <input type="lastname" name="lastname" class="form-control" placeholder="Apellido" required></div>
          <div class="form-group">
            <input type="phone" name="phone" class="form-control" placeholder="Introduce tu Número de Telefono" required></div>
          <div class="form-group">
            <input type="email" name="email" class="form-control" placeholder="Introduce tu Email" required></div>
          <div class="form-group">
            <select class="form-control" name="meta">
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
    <h2>Los bonos que obtendrá con el <br><strong>Programa de Prueba de 7 Días</strong></h2>
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
                <h4>Grupo de Apoyo y Soporte</h4>
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
        <h2>¿Qué hay en el <br><strong>Programa de Prueba de 7 días?</strong></h2>
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
          <img src="../assets/images/Formula1.png" class="img-responsive" alt="Formula 1"></span>
        </div>
        <div class="col-sm-7">
          <h3>Fórmula 1 Comida Saludable Mezcla</h3>
          <p>Deliciosa comida saludable que proporciona un excelente equilibrio 
          de proteínas de alta calidad procedentes de la soja y la leche, 
          micronutrientes esenciales e ingredientes botánicos y hierbas añadidas.<br><br></p>
          <h3>Principales Beneficios</h3>
          <ul>
            <li>HERBALIFE es la marca número 1* del mundo en sustitutivos de comida. Los batidos F1 han ayudado a gente de todo el mundo a alcanzar sus objetivos de control de peso. ¡Consigue el tuyo ya!</li>
            <li>Avalado por la ciencia: Estudios científicos muestran que el uso diario de batidos sustitutivos de comida como parte de una dieta de calorías controladas, es efectivo para el control del peso, junto con la práctica de ejercicio.</li>
            <li>Calorías controladas: 220 kcal por ración.</li>
            <li>Rico en proteínas de soja y lácteos (18g aprox. por ración). Los batidos de Fórmula 1 son una gran opción si está buscando construir masa muscular, junto con la práctica de ejercicio.</li>
          </ul>
          <span class="note">
            <i class="fa fa-check-square-o"></i>
             7 días de alimentación incluida</span>
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
              <font size="5em"><i class="fa fa-phone">
              </i>' . $phone . '</a></font>
            <h4>Seré su Asesor de Bienestar para los próximos 7 días ...</h4>
            <p>Cuando usted toma mi Desafío salud de pruebas de 7 días, le ayudaré a desarrollar un plan
              de nutrición personal! Sus objetivos son únicos y su plan de nutrición debe ser así! Yo
              personalmente uso de estos productos y puedo decir que trabajo! Empiece hoy. Mire hacia adelante voy a ayudarle!</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!--Facebook Proof-->
<section class="facecook-proof"><!--
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
        <div class="col-sm-6 wow slideInLeft" data-wow-duration="2s"><img src="../assets/images/post-5.png" class="img-responsive"></div>--
        <div class="col-sm-6 wow slideInRight" data-wow-duration="2s"><img src="../assets/images/post-8-2.png" class="img-responsive" width="100%"></div>
      </div>
      <span class="request-btn"> <a href="#goform" class="page-scroll">Solicite su Programa de 7 días de Prueba Hoy <i class="fa fa-chevron-circle-right"></i></a> </span>
    </div>
  </div>-->
</section>
<!--Customer-->
<section class="customers">
  <div class="container">
    <span class="main-heading">
    <h2> Resultados sorprendentes de clientes que continuaron el pasado la prueba de 7 días</h2>
    <p> Muchas personas experimentan esos resultados sorprendentes en sólo 7 días quieren seguir
      entrenando con nosotros. Echa un vistazo a algunos de estos resultados. </p>
    </span>
    <div class="customer-photo">
          <div class="col-sm-4">
            <img src="../assets/images/customer-1.jpg" class="img-responsive">
            <h4>Vincent y Neyla</h4>
          </div>
          <div class="col-sm-4">
            <img src="../assets/images/customer-2.jpg" class="img-responsive" width="98%">
            <h4>Yomara</h4>
          </div>
          <div class="col-sm-4">
            <img src="../assets/images/customer-3.jpg" class="img-responsive" width="92%">
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
            <img src="../assets/images/customer-4.jpg" class="img-responsive" style="height: 340px!important">
            <h4>Juan</h4>
          </div>
          <div class="col-sm-4">
            <img src="../assets/images/customer-5.jpg" class="img-responsive" >
            <h4>Jhosselin</h4>
          </div>
          <div class="col-sm-4">
            <img src="../assets/images/customer-6.jpg" class="img-responsive" style="height: 340px!important">
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
      <span class="request-btn"> <a href="#goform" class="page-scroll" style="background-color: #FFF!important; color: #5ec03c!important">Solicite su Programa de 7 días de Prueba Hoy <i class="fa fa-chevron-circle-right"></i></a> </span>
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
  <title>Paquete de prueba de 7 dias | Home</title>
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
     <dic class="col-md-6">
      <div class="form-part wow fadeInDown">
        <h2 id="goform">¡Empieza ahora!</h2>
        <p>Rellena este formulario para empezar ahora!</p>
    <form method="post" action="http://planhbl.com/hecoweb/email/email01.php">
          <input type="hidden" name="message_group_admin_id" value="55">
          <input name="web" value="7daytrial" type="hidden">
          <input type="hidden" name="activity_id" value="15">
          <input type="hidden" name="id_coach" value="'.$id_coach.'">
          <input type="hidden" name="subject" value="Paquete de Prueba de 7 dias">
          <div class="form-group">
            <input type="name" name="firstname" class="form-control" placeholder="Nombre" required></div>
          <div class="form-group">
            <input type="lastname" name="lastname" class="form-control" placeholder="Apellido" required></div>
          <div class="form-group">
            <input type="phone" name="phone" class="form-control" placeholder="Introduce tu Número de Telefono" required></div>
          <div class="form-group">
            <input type="email" name="email" class="form-control" placeholder="Introduce tu Email" required></div>
          <div class="form-group">
            <select class="form-control" name="meta">
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
      <strong>Programa de Prueba de 7 Días</strong></h2>
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
                <h4>Grupo de Apoyo y Soporte</h4>
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
        <h2>¿Qué hay en el <br><strong>Programa de Prueba de 7 días?</strong></h2>
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
          <img src="../../assets/images/Formula1.png" class="img-responsive" alt="Formula 1"></span>
        </div>
        <div class="col-sm-7">
          <h3>Fórmula 1 Comida Saludable Mezcla</h3>
          <p>Deliciosa comida saludable que proporciona un excelente equilibrio 
          de proteínas de alta calidad procedentes de la soja y la leche, 
          micronutrientes esenciales e ingredientes botánicos y hierbas añadidas.<br><br></p>
          <h3>Principales Beneficios</h3>
          <ul>
            <li>HERBALIFE es la marca número 1* del mundo en sustitutivos de comida. Los batidos F1 han ayudado a gente de todo el mundo a alcanzar sus objetivos de control de peso. ¡Consigue el tuyo ya!</li>
            <li>Avalado por la ciencia: Estudios científicos muestran que el uso diario de batidos sustitutivos de comida como parte de una dieta de calorías controladas, es efectivo para el control del peso, junto con la práctica de ejercicio.</li>
            <li>Calorías controladas: 220 kcal por ración.</li>
            <li>Rico en proteínas de soja y lácteos (18g aprox. por ración). Los batidos de Fórmula 1 son una gran opción si está buscando construir masa muscular, junto con la práctica de ejercicio.</li>
          </ul>
          <span class="note">
            <i class="fa fa-check-square-o"></i>
             7 días de alimentación incluida</span>
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
              <font size="5em"><i class="fa fa-phone">
              </i>' . $phone . '</a></font>
            <h4>Seré su Asesor de Bienestar para los próximos 7 días ...</h4>
            <p>Cuando usted toma mi Desafío salud de pruebas de 7 días, le ayudaré a desarrollar un plan
              de nutrición personal! Sus objetivos son únicos y su plan de nutrición debe ser así! Yo
              personalmente uso de estos productos y puedo decir que trabajo! Empiece hoy. Mire hacia adelante voy a ayudarle!</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!--Facebook Proof-->
<section class="facecook-proof"><!--
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
        <div class="col-sm-6 wow slideInLeft" data-wow-duration="2s"><img src="../../assets/images/post-5.png" class="img-responsive"></div>--
        <div class="col-sm-6 wow slideInRight" data-wow-duration="2s"><img src="../../assets/images/post-8-2.png" class="img-responsive" width="100%"></div>
      </div>
      <span class="request-btn"> <a href="#goform" class="page-scroll">Solicite su Programa de 7 días de Prueba Hoy <i class="fa fa-chevron-circle-right"></i></a> </span>
    </div>
  </div>-->
</section>
<!--Customer-->
<section class="customers">
  <div class="container">
    <span class="main-heading">
    <h2> Resultados sorprendentes de clientes que continuaron el pasado la prueba de 7 días</h2>
    <p> Muchas personas experimentan esos resultados sorprendentes en sólo 7 días quieren seguir
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
            <img src="../../assets/images/customer-4.jpg" class="img-responsive" style="height: 340px!important">
            <h4 align="center">Juan</h4>
          </div>
          <div class="col-sm-4">
            <img src="../../assets/images/customer-5.jpg" class="img-responsive" >
            <h4 align="center">Jhosselin</h4>
          </div>
          <div class="col-sm-4">
            <img src="../../assets/images/customer-6.jpg" class="img-responsive" style="height: 340px!important">
            <h4 align="center">Marcos</h4>
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
      <span class="request-btn"> <a href="#goform" class="page-scroll" style="background-color: #FFF!important; color: #5ec03c!important">Solicite su Programa de Prueba de 7 días <i class="fa fa-chevron-circle-right"></i></a> </span>
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



echo '<div class="container">';
               echo ' <div class="row">';
                    echo '<div class="inner-addon left-addon">';

echo "<h4>Se ha creado la Capturadora correctamente en: </h4>";
      
                $estructura2 = "../../7diastrial/".$folder;
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
            
              $insert = "INSERT INTO webcoach(coach,web,dir_name,folder,country) VALUES('$id_coach','7diastrial','$estructura2','$folder','$value')";
              if ($conexion->query($insert) == TRUE) {
              }else{
              }           
             echo "<script> 
                alert('Se ha creado Satisfactoriamente en Latinoamerica')
                </script>";
                echo "<h3>Se ha creado la Capturadora para Latinoamerica</h3>";
            echo "<a href=".$estructura2." target='_blank' class='btn btn-success  '><span class='glyphicon glyphicon-thumbs-up'></span> Mostrar Web ''".$folder."''</a>";
            echo "<br/>";
            echo "<br/>";
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
        <form action="create7daytrial.php" method="POST">
             <!--<h3>Create Web 3daytrial Challenge</h3>-->
            <h3>Creación del WebSite Reto del Programa de 7 días</h3>
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
        <form action="create7daytrial.php" method="POST">
             <!--<h3>Create Web 3daytrial Challenge</h3>-->
            <h3>Creación del WebSite Reto del Programa de 7 días</h3>
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
        <form action="create7daytrial.php" method="POST">
             <!--<h3>Create Web 3daytrial Challenge</h3>-->
            <h3>Creación del WebSite Reto del Programa de 7 días</h3>
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