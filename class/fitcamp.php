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
/**************************     CREA EL CLON DE FITNESS CAMP   ******************************/
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


    //VIDEO ESPAÑOL CO
      if (isset($_POST['idvideo1']) && isset($_POST['idvideo1']) && 
          isset($_POST['video1']) && isset($_POST['video1'])) {
        $idvideo1 = $_POST['idvideo1'];
        $video1 = $_POST['video1'];
      }else{
        $idvideo1 = '190022578';
        $video1 = 'v-';
      }


      //VIDEO ESPAÑOL RD
      if (isset($_POST['idvideo2']) && isset($_POST['idvideo2']) && 
          isset($_POST['video2']) && isset($_POST['video2'])) {
        $idvideo2 = $_POST['idvideo2'];
        $video2 = $_POST['video2'];
      }else{
        $idvideo2 = '191874335';
        $video2 = 'v-';
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
    <strong>Bienvenidos a nuestro Fit Camp, Coach: <b>' .  $name . '</b></strong>

  </div>
</div>

<img src="../assets/images/banner.jpg" width="100%" height="auto">

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
        <form method="post" action="http://planhbl.com/hecoweb/email/email01.php">
          <input name="web" value="Fitcampco" type="hidden">
          <input type="hidden" name="id_coach" value="'.$id_coach.'">
          <input type="hidden" name="subject" value="Fitness Camp">
          <div class="form-group">
            <input type="name" name="firstname" class="form-control" placeholder="Nombre"></div>
          <div class="form-group">
            <input type="lastname" name="lastname" class="form-control" placeholder="Apellido"></div>
          <div class="form-group">
            <input type="phone" name="phone" class="form-control" placeholder="Introduce tu Número de Telefono"></div>
          <div class="form-group">
            <input type="email" name="email" class="form-control" placeholder="Introduce tu Email"></div>
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
    <h2>Los Beneficios que obtendrás al suscribirte  <br><strong>FitCamp</strong></h2>
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
                <h4>Plan de Ejercicios Compeletamente personalizados </h4>
                <p>Plan de Ejercicios especialmente diseñados para acelerar el metabolismo y no dejar que tu resultado se estanque! 
                Están diseñados para ser rápido (para que pueda encajar incluso en el horario de mayor actividad) sino también intensa 
                para que pueda construir ese músculo magro que va a quemar la grasa y darle la forma a tu cuerpo que tu estas buscando. 
                Únete a cualquiera de nuestras sesiones de entrenamiento aprovechando esta promocion.</p>
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
                <h4>Plan de alimentación balanceada y Completamente Gratis</h4>
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

      <div class="grid3 cs-style-3">
        <figure>
          <div class="mobile-bonus visible-xs">
            <img src="../assets/images/bonus-3m.jpg" class="img-responsive">
          </div>
          <div class="bonus-main group wow fadeInDown">
            <img src="../assets/images/bonus-3.jpg" class="img-responsive">
            <figcaption>
              <div class="bonus-data"> <span class="count">3</span>
                <h4>Grupos de Apoyo y Soporte</h4>
                <p>Grupo de Apoyo y soporte
                  Tenemos grupos online formados por nuestros Fit Campers y nuestros coaches 
                  donde podras tener un soporte las 24 horas del dia 7 dias de la semana en los 
                  cuales podras participar mientras seas parte de este programa, 
                  Aquí es el momento de la verdad! ¿Se queda cuentas?</p>
              </div>
            </figcaption>
          </div>
        </figure>
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
            <h4>Seré su Entrenador para las próximos 4 semanas ...</h4>
            <p>Tendrás un plan de ejercicios completamente personalizado y un plan de alimentación balanceada</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!--Herbalife Products--
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
          <p>Total de tabletas Control® contienen una mezcla patentada de extractos
            de té y cafeína, que estimula el metabolismo de forma rápida y proporciona
            una sensación de energía y alerta. *</p>
          <ul>
            <li>Estimula el metabolismo rápidamente *</li>
            <li>Aumenta el estado de alerta *</li>
            <li>Proporciona una sensación enérgica *</li>
          </ul>
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


<!--Facebook Proof-->
<section class="facecook-proof">
  <div class="container">
    <span class="main-heading">
     <h2> Resultados sorprendentes del Fit Camp durante 4 semanas</h2>
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
        </div><!--
        <div class="customer-text">
          <p style="color: #212121">*Los consumidores que usan la Fórmula 1 de Herbalife dos veces por día como parte
            de un estilo de vida saludable en general, puede esperar perder alrededor de
            0,5 a 1 libra por semana. Los participantes en unas 12 semanas, utilizaron la
            Fórmula 1 dos veces al día (una vez como una comida y una
            vez como un aperitivo) con una dieta reducida en calorías y un objetivo de
            30 minutos de ejercicio por día. Los participantes siguieron una dieta alta
            en proteínas o una dieta rica en proteínas estándar. Los participantes en
            ambos grupos perdieron alrededor de 8,5 libras.</p>
        </div>-->

      <span class="request-btn"> <a href="#goform" class="page-scroll">Iniciate Hoy <i class="fa fa-chevron-circle-right"></i></a> </span>
    </div>
  </div>
</section>
<!--Customer-->
<section class="customers">
  <div class="container">
    <span class="main-heading">
    <h2> Resultados sorprendentes del Fit Camp durante 4 semanas</h2>
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
        </div><!--
        <div class="customer-text">
          <p>*Los consumidores que usan la Fórmula 1 de Herbalife dos veces por día como parte
            de un estilo de vida saludable en general, puede esperar perder alrededor de
            0,5 a 1 libra por semana. Los participantes en unas 12 semanas, utilizaron la
            Fórmula 1 dos veces al día (una vez como una comida y una
            vez como un aperitivo) con una dieta reducida en calorías y un objetivo de
            30 minutos de ejercicio por día. Los participantes siguieron una dieta alta
            en proteínas o una dieta rica en proteínas estándar. Los participantes en
            ambos grupos perdieron alrededor de 8,5 libras.</p>
        </div>-->

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
    <strong>Bienvenidos a nuestro Fit Camp, Coach: <b> ' .  $name . '</b></strong>

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
<form method="post" action="http://planhbl.com/hecoweb/email/email01.php">
          <input name="web" value="Fitcampco" type="hidden">
          <input type="hidden" name="id_coach" value="'.$id_coach.'">
          <input type="hidden" name="subject" value="Fitness Camp">
          <div class="form-group">
            <input type="name" name="firstname" class="form-control" placeholder="Nombre"></div>
          <div class="form-group">
            <input type="lastname" name="lastname" class="form-control" placeholder="Apellido"></div>
          <div class="form-group">
            <input type="phone" name="phone" class="form-control" placeholder="Introduce tu Número de Telefono"></div>
          <div class="form-group">
            <input type="email" name="email" class="form-control" placeholder="Introduce tu Email"></div>
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
            <img src="../../assets/images/bonus-2m.jpg" class="img-responsive">
          </div>
          <div class="bonus-main food wow fadeInDown">
            <img src="../../assets/images/bonus.jpg" class="img-responsive">
              <div class="bonus-data"> <span class="count">1</span>
                <h4>Plan de Ejercicios Compeletamente personalizados </h4>
                <p>Plan de Ejercicios especialmente diseñados para acelerar el metabolismo y no dejar que tu resultado se estanque! 
                Están diseñados para ser rápido (para que pueda encajar incluso en el horario de mayor actividad) sino también intensa 
                para que pueda construir ese músculo magro que va a quemar la grasa y darle la forma a tu cuerpo que tu estas buscando. 
                Únete a cualquiera de nuestras sesiones de entrenamiento aprovechando esta promocion.</p>
              </div>
          </div>



          <div class="mobile-bonus visible-xs">
            <img src="../../assets/images/bonus-1m.jpg" class="img-responsive">
          </div>
          <div class="bonus-main workout wow fadeInDown">
            <img src="../../assets/images/bonus-1.jpg" class="img-responsive">
              <div class="bonus-data bonus-right"> <span class="count">2</span>
                 <h4>Plan de alimentación balanceada y Completamente Gratis</h4>
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
            <img src="../../assets/images/bonus-3m.jpg" class="img-responsive">
          </div>
          <div class="bonus-main group wow fadeInDown">
            <img src="../../assets/images/bonus-3.jpg" class="img-responsive">
              <div class="bonus-data"> <span class="count">3</span>
                <h4>Grupos de Apoyo y Soporte</h4>
                <p>Grupo de Apoyo y soporte
                  Tenemos grupos online formados por nuestros Fit Campers y nuestros coaches 
                  donde podras tener un soporte las 24 horas del dia 7 dias de la semana en los 
                  cuales podras participar mientras seas parte de este programa, 
                  Aquí es el momento de la verdad! ¿Se queda cuentas?</p>
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
              <h3><i class="fa fa-phone"></i>' . $phone . '</a></h3>
            <h4>Seré su Entrenador para las próximos 4 semanas ...</h4>
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
     <h2> Resultados sorprendentes del Fit Camp durante 4 semanas</h2>
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
    <h2> Resultados sorprendentes del Fit Camp durante 4 semanas</h2>
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
        </div><!--
        <div class="customer-text">
          <p>*Los consumidores que usan la Fórmula 1 de Herbalife dos veces por día como parte
            de un estilo de vida saludable en general, puede esperar perder alrededor de
            0,5 a 1 libra por semana. Los participantes en unas 12 semanas, utilizaron la
            Fórmula 1 dos veces al día (una vez como una comida y una
            vez como un aperitivo) con una dieta reducida en calorías y un objetivo de
            30 minutos de ejercicio por día. Los participantes siguieron una dieta alta
            en proteínas o una dieta rica en proteínas estándar. Los participantes en
            ambos grupos perdieron alrededor de 8,5 libras.</p>
        </div>-->

         <span class="request-btn"> <a href="#goform" class="page-scroll">Iniciate Hoy <i class="fa fa-chevron-circle-right"></i></a> </span>
      </div>
      </div>
    </div>
</section>

<!--End Home Page-->
</body>
</html>';



/******************************************************************************************************/
/************************      CREA EL CLON DE LA WEB DE Republica Dominicana     *********************/
/******************************************************************************************************/





    $mensaje3 = '
<?php
  $conexion = new mysqli("localhost", "thrdaytr_webapp", "pRf_&lue#LU7", "thrdaytr_planhbl");
  $search = $conexion->query(\'SELECT * FROM coachleads WHERE id ="'.$id_coach_lead.'"\');
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
    <strong>Bienvenidos a nuestro Fit Camp, Coach: <b>' .  $name . '</b></strong>

  </div>
</div>

<img src="../assets/images/banner.jpg" width="100%" height="auto">

<!-- Video Wrap & Form -->
<div class="container">
  <div class="row">
    <div class="col-md-6" style="margin-top:60px;">

      <span class="video-link" data-video-id="'.$video2.$idvideo2.'">
        <img src="../assets/images/video-fake.jpg" width="100%" height="auto">
      </span>

      <span class="video-link" data-video-id="'.$video2.$idvideo2.'" data-video-width="1280px" data-video-height="720px" data-video-autoplay="1" ></span>
    </div>

    <dic class="col-md-6">
      <div class="form-part wow fadeInDown">
        <h2 id="goform">¡Empieza ahora!</h2>
        <p>Rellena este formulario para empezar ahora!</p>
        <form method="post" action="http://planhbl.com/hecoweb/email/email01.php">
          <input name="web" value="rdfitcamp" type="hidden">
          <input type="hidden" name="id_coach" value="'.$id_coach.'">
          <input type="hidden" name="subject" value="Fitness Camp">
          <div class="form-group">
            <input type="name" name="firstname" class="form-control" placeholder="Nombre"></div>
          <div class="form-group">
            <input type="lastname" name="lastname" class="form-control" placeholder="Apellido"></div>
          <div class="form-group">
            <input type="phone" name="phone" class="form-control" placeholder="Introduce tu Número de Telefono"></div>
          <div class="form-group">
            <input type="email" name="email" class="form-control" placeholder="Introduce tu Email"></div>
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
    <h2>Los Beneficios que obtendrás al suscribirte  <br><strong>FitCamp</strong></h2>
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
                <h4>Plan de Ejercicios Compeletamente personalizados </h4>
                <p>Plan de Ejercicios especialmente diseñados para acelerar el metabolismo y no dejar que tu resultado se estanque! 
                Están diseñados para ser rápido (para que pueda encajar incluso en el horario de mayor actividad) sino también intensa 
                para que pueda construir ese músculo magro que va a quemar la grasa y darle la forma a tu cuerpo que tu estas buscando. 
                Únete a cualquiera de nuestras sesiones de entrenamiento aprovechando esta promocion.</p>
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
                <h4>Plan de alimentación balanceada y Completamente Gratis</h4>
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

      <div class="grid3 cs-style-3">
        <figure>
          <div class="mobile-bonus visible-xs">
            <img src="../assets/images/bonus-3m.jpg" class="img-responsive">
          </div>
          <div class="bonus-main group wow fadeInDown">
            <img src="../assets/images/bonus-3.jpg" class="img-responsive">
            <figcaption>
              <div class="bonus-data"> <span class="count">3</span>
                <h4>Grupos de Apoyo y Soporte</h4>
                <p>Grupo de Apoyo y soporte
                  Tenemos grupos online formados por nuestros Fit Campers y nuestros coaches 
                  donde podras tener un soporte las 24 horas del dia 7 dias de la semana en los 
                  cuales podras participar mientras seas parte de este programa, 
                  Aquí es el momento de la verdad! ¿Se queda cuentas?</p>
              </div>
            </figcaption>
          </div>
        </figure>
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
            <h4>Seré su Entrenador para las próximos 4 semanas ...</h4>
            <p>Tendrás un plan de ejercicios completamente personalizado y un plan de alimentación balanceada</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!--Herbalife Products--
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
          <p>Total de tabletas Control® contienen una mezcla patentada de extractos
            de té y cafeína, que estimula el metabolismo de forma rápida y proporciona
            una sensación de energía y alerta. *</p>
          <ul>
            <li>Estimula el metabolismo rápidamente *</li>
            <li>Aumenta el estado de alerta *</li>
            <li>Proporciona una sensación enérgica *</li>
          </ul>
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


<!--Facebook Proof-->
<section class="facecook-proof">
  <div class="container">
    <span class="main-heading">
     <h2> Resultados sorprendentes del Fit Camp durante 4 semanas</h2>
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
        </div><!--
        <div class="customer-text">
          <p style="color: #212121">*Los consumidores que usan la Fórmula 1 de Herbalife dos veces por día como parte
            de un estilo de vida saludable en general, puede esperar perder alrededor de
            0,5 a 1 libra por semana. Los participantes en unas 12 semanas, utilizaron la
            Fórmula 1 dos veces al día (una vez como una comida y una
            vez como un aperitivo) con una dieta reducida en calorías y un objetivo de
            30 minutos de ejercicio por día. Los participantes siguieron una dieta alta
            en proteínas o una dieta rica en proteínas estándar. Los participantes en
            ambos grupos perdieron alrededor de 8,5 libras.</p>
        </div>-->

      <span class="request-btn"> <a href="#goform" class="page-scroll">Iniciate Hoy <i class="fa fa-chevron-circle-right"></i></a> </span>
    </div>
  </div>
</section>
<!--Customer-->
<section class="customers">
  <div class="container">
    <span class="main-heading">
    <h2> Resultados sorprendentes del Fit Camp durante 4 semanas</h2>
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
        </div><!--
        <div class="customer-text">
          <p>*Los consumidores que usan la Fórmula 1 de Herbalife dos veces por día como parte
            de un estilo de vida saludable en general, puede esperar perder alrededor de
            0,5 a 1 libra por semana. Los participantes en unas 12 semanas, utilizaron la
            Fórmula 1 dos veces al día (una vez como una comida y una
            vez como un aperitivo) con una dieta reducida en calorías y un objetivo de
            30 minutos de ejercicio por día. Los participantes siguieron una dieta alta
            en proteínas o una dieta rica en proteínas estándar. Los participantes en
            ambos grupos perdieron alrededor de 8,5 libras.</p>
        </div>-->

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

$mensaje4 ='
<?php
  $conexion = new mysqli("localhost", "thrdaytr_webapp", "pRf_&lue#LU7", "thrdaytr_planhbl");
  $search = $conexion->query(\'SELECT * FROM coachleads WHERE id ="'.$id_coach_lead.'"\');
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
    <strong>Bienvenidos a nuestro Fit Camp, Coach: <b> ' .  $name . '</b></strong>

  </div>
</div>

<img src="../../assets/images/banner.jpg" width="100%" height="auto">


<!-- Video Wrap & Form -->
<div class="container">
  <div class="row">
    <div class="col-md-6" style="margin-top:60px;">


      <div class="video-responsive">
        <iframe src="https://player.vimeo.com/video/'.$idvideo2.'" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
      </div>



    </div>
<form method="post" action="http://planhbl.com/hecoweb/email/email01.php">
          <input name="web" value="rdfitcamp" type="hidden">
          <input type="hidden" name="id_coach" value="'.$id_coach.'">
          <input type="hidden" name="subject" value="Fitness Camp">
          <div class="form-group">
            <input type="name" name="firstname" class="form-control" placeholder="Nombre"></div>
          <div class="form-group">
            <input type="lastname" name="lastname" class="form-control" placeholder="Apellido"></div>
          <div class="form-group">
            <input type="phone" name="phone" class="form-control" placeholder="Introduce tu Número de Telefono"></div>
          <div class="form-group">
            <input type="email" name="email" class="form-control" placeholder="Introduce tu Email"></div>
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
     <h2>Los Beneficios que obtendrás al suscribirte  <br><strong>FitCamp</strong></h2>
    </span>
    <div class="bonus-wrap">
          <div class="mobile-bonus visible-xs">
            <img src="../../assets/images/bonus-2m.jpg" class="img-responsive">
          </div>
          <div class="bonus-main food wow fadeInDown">
            <img src="../../assets/images/bonus.jpg" class="img-responsive">
              <div class="bonus-data"> <span class="count">1</span>
                <h4>Plan de Ejercicios Compeletamente personalizados </h4>
                <p>Plan de Ejercicios especialmente diseñados para acelerar el metabolismo y no dejar que tu resultado se estanque! 
                Están diseñados para ser rápido (para que pueda encajar incluso en el horario de mayor actividad) sino también intensa 
                para que pueda construir ese músculo magro que va a quemar la grasa y darle la forma a tu cuerpo que tu estas buscando. 
                Únete a cualquiera de nuestras sesiones de entrenamiento aprovechando esta promocion.</p>
              </div>
          </div>



          <div class="mobile-bonus visible-xs">
            <img src="../../assets/images/bonus-1m.jpg" class="img-responsive">
          </div>
          <div class="bonus-main workout wow fadeInDown">
            <img src="../../assets/images/bonus-1.jpg" class="img-responsive">
              <div class="bonus-data bonus-right"> <span class="count">2</span>
                 <h4>Plan de alimentación balanceada y Completamente Gratis</h4>
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
            <img src="../../assets/images/bonus-3m.jpg" class="img-responsive">
          </div>
          <div class="bonus-main group wow fadeInDown">
            <img src="../../assets/images/bonus-3.jpg" class="img-responsive">
              <div class="bonus-data"> <span class="count">3</span>
                <h4>Grupos de Apoyo y Soporte</h4>
                <p>Grupo de Apoyo y soporte
                  Tenemos grupos online formados por nuestros Fit Campers y nuestros coaches 
                  donde podras tener un soporte las 24 horas del dia 7 dias de la semana en los 
                  cuales podras participar mientras seas parte de este programa, 
                  Aquí es el momento de la verdad! ¿Se queda cuentas?</p>
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
              <h3><i class="fa fa-phone"></i>' . $phone . '</a></h3>
            <h4>Seré su Entrenador para las próximos 4 semanas ...</h4>
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
     <h2> Resultados sorprendentes del Fit Camp durante 4 semanas</h2>
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
    <h2> Resultados sorprendentes del Fit Camp durante 4 semanas</h2>
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
        </div><!--
        <div class="customer-text">
          <p>*Los consumidores que usan la Fórmula 1 de Herbalife dos veces por día como parte
            de un estilo de vida saludable en general, puede esperar perder alrededor de
            0,5 a 1 libra por semana. Los participantes en unas 12 semanas, utilizaron la
            Fórmula 1 dos veces al día (una vez como una comida y una
            vez como un aperitivo) con una dieta reducida en calorías y un objetivo de
            30 minutos de ejercicio por día. Los participantes siguieron una dieta alta
            en proteínas o una dieta rica en proteínas estándar. Los participantes en
            ambos grupos perdieron alrededor de 8,5 libras.</p>
        </div>-->

         <span class="request-btn"> <a href="#goform" class="page-scroll">Iniciate Hoy <i class="fa fa-chevron-circle-right"></i></a> </span>
      </div>
      </div>
    </div>
</section>

<!--End Home Page-->
</body>
</html>';



/******************************************************************************************************/
/************************                CREA EL CLON DE LA WEB DE USA            *********************/
/******************************************************************************************************/





    $mensaje5 = '
<?php
  $conexion = new mysqli("localhost", "thrdaytr_webapp", "pRf_&lue#LU7", "thrdaytr_planhbl");
  $search = $conexion->query(\'SELECT * FROM coachleads WHERE id ="'.$id_coach_lead.'"\');
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
    <strong>Bienvenidos a nuestro Fit Camp, Coach: <b>' .  $name . '</b></strong>

  </div>
</div>

<img src="../assets/images/banner.jpg" width="100%" height="auto">

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
        <form method="post" action="http://planhbl.com/hecoweb/email/email01.php">
          <input name="web" value="FitCamp" type="hidden">
          <input type="hidden" name="id_coach" value="'.$id_coach.'">
          <input type="hidden" name="subject" value="Fitness Camp">
          <div class="form-group">
            <input type="name" name="firstname" class="form-control" placeholder="Nombre"></div>
          <div class="form-group">
            <input type="lastname" name="lastname" class="form-control" placeholder="Apellido"></div>
          <div class="form-group">
            <input type="phone" name="phone" class="form-control" placeholder="Introduce tu Número de Telefono"></div>
          <div class="form-group">
            <input type="email" name="email" class="form-control" placeholder="Introduce tu Email"></div>
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
    <h2>Los Beneficios que obtendrás al suscribirte  <br><strong>FitCamp</strong></h2>
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
                <h4>Plan de Ejercicios Compeletamente personalizados </h4>
                <p>Plan de Ejercicios especialmente diseñados para acelerar el metabolismo y no dejar que tu resultado se estanque! 
                Están diseñados para ser rápido (para que pueda encajar incluso en el horario de mayor actividad) sino también intensa 
                para que pueda construir ese músculo magro que va a quemar la grasa y darle la forma a tu cuerpo que tu estas buscando. 
                Únete a cualquiera de nuestras sesiones de entrenamiento aprovechando esta promocion.</p>
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
                <h4>Plan de alimentación balanceada y Completamente Gratis</h4>
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

      <div class="grid3 cs-style-3">
        <figure>
          <div class="mobile-bonus visible-xs">
            <img src="../assets/images/bonus-3m.jpg" class="img-responsive">
          </div>
          <div class="bonus-main group wow fadeInDown">
            <img src="../assets/images/bonus-3.jpg" class="img-responsive">
            <figcaption>
              <div class="bonus-data"> <span class="count">3</span>
                <h4>Grupos de Apoyo y Soporte</h4>
                <p>Grupo de Apoyo y soporte
                  Tenemos grupos online formados por nuestros Fit Campers y nuestros coaches 
                  donde podras tener un soporte las 24 horas del dia 7 dias de la semana en los 
                  cuales podras participar mientras seas parte de este programa, 
                  Aquí es el momento de la verdad! ¿Se queda cuentas?</p>
              </div>
            </figcaption>
          </div>
        </figure>
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
            <h4>Seré su Entrenador para las próximos 4 semanas ...</h4>
            <p>Tendrás un plan de ejercicios completamente personalizado y un plan de alimentación balanceada</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!--Herbalife Products--
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
          <p>Total de tabletas Control® contienen una mezcla patentada de extractos
            de té y cafeína, que estimula el metabolismo de forma rápida y proporciona
            una sensación de energía y alerta. *</p>
          <ul>
            <li>Estimula el metabolismo rápidamente *</li>
            <li>Aumenta el estado de alerta *</li>
            <li>Proporciona una sensación enérgica *</li>
          </ul>
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


<!--Facebook Proof-->
<section class="facecook-proof">
  <div class="container">
    <span class="main-heading">
     <h2> Resultados sorprendentes del Fit Camp durante 4 semanas</h2>
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
        </div><!--
        <div class="customer-text">
          <p style="color: #212121">*Los consumidores que usan la Fórmula 1 de Herbalife dos veces por día como parte
            de un estilo de vida saludable en general, puede esperar perder alrededor de
            0,5 a 1 libra por semana. Los participantes en unas 12 semanas, utilizaron la
            Fórmula 1 dos veces al día (una vez como una comida y una
            vez como un aperitivo) con una dieta reducida en calorías y un objetivo de
            30 minutos de ejercicio por día. Los participantes siguieron una dieta alta
            en proteínas o una dieta rica en proteínas estándar. Los participantes en
            ambos grupos perdieron alrededor de 8,5 libras.</p>
        </div>-->

      <span class="request-btn"> <a href="#goform" class="page-scroll">Iniciate Hoy <i class="fa fa-chevron-circle-right"></i></a> </span>
    </div>
  </div>
</section>
<!--Customer-->
<section class="customers">
  <div class="container">
    <span class="main-heading">
    <h2> Resultados sorprendentes del Fit Camp durante 4 semanas</h2>
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
        </div><!--
        <div class="customer-text">
          <p>*Los consumidores que usan la Fórmula 1 de Herbalife dos veces por día como parte
            de un estilo de vida saludable en general, puede esperar perder alrededor de
            0,5 a 1 libra por semana. Los participantes en unas 12 semanas, utilizaron la
            Fórmula 1 dos veces al día (una vez como una comida y una
            vez como un aperitivo) con una dieta reducida en calorías y un objetivo de
            30 minutos de ejercicio por día. Los participantes siguieron una dieta alta
            en proteínas o una dieta rica en proteínas estándar. Los participantes en
            ambos grupos perdieron alrededor de 8,5 libras.</p>
        </div>-->

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

$mensaje6 ='
<?php
  $conexion = new mysqli("localhost", "thrdaytr_webapp", "pRf_&lue#LU7", "thrdaytr_planhbl");
  $search = $conexion->query(\'SELECT * FROM coachleads WHERE id ="'.$id_coach_lead.'"\');
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
    <strong>Bienvenidos a nuestro Fit Camp, Coach: <b> ' .  $name . '</b></strong>

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
<form method="post" action="http://planhbl.com/hecoweb/email/email01.php">
          <input name="web" value="FitCamp" type="hidden">
          <input type="hidden" name="id_coach" value="'.$id_coach.'">
          <input type="hidden" name="subject" value="Fitness Camp">
          <div class="form-group">
            <input type="name" name="firstname" class="form-control" placeholder="Nombre"></div>
          <div class="form-group">
            <input type="lastname" name="lastname" class="form-control" placeholder="Apellido"></div>
          <div class="form-group">
            <input type="phone" name="phone" class="form-control" placeholder="Introduce tu Número de Telefono"></div>
          <div class="form-group">
            <input type="email" name="email" class="form-control" placeholder="Introduce tu Email"></div>
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
     <h2>Los Beneficios que obtendrás al suscribirte  <br><strong>FitCamp</strong></h2>
    </span>
    <div class="bonus-wrap">
          <div class="mobile-bonus visible-xs">
            <img src="../../assets/images/bonus-2m.jpg" class="img-responsive">
          </div>
          <div class="bonus-main food wow fadeInDown">
            <img src="../../assets/images/bonus.jpg" class="img-responsive">
              <div class="bonus-data"> <span class="count">1</span>
                <h4>Plan de Ejercicios Compeletamente personalizados </h4>
                <p>Plan de Ejercicios especialmente diseñados para acelerar el metabolismo y no dejar que tu resultado se estanque! 
                Están diseñados para ser rápido (para que pueda encajar incluso en el horario de mayor actividad) sino también intensa 
                para que pueda construir ese músculo magro que va a quemar la grasa y darle la forma a tu cuerpo que tu estas buscando. 
                Únete a cualquiera de nuestras sesiones de entrenamiento aprovechando esta promocion.</p>
              </div>
          </div>



          <div class="mobile-bonus visible-xs">
            <img src="../../assets/images/bonus-1m.jpg" class="img-responsive">
          </div>
          <div class="bonus-main workout wow fadeInDown">
            <img src="../../assets/images/bonus-1.jpg" class="img-responsive">
              <div class="bonus-data bonus-right"> <span class="count">2</span>
                 <h4>Plan de alimentación balanceada y Completamente Gratis</h4>
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
            <img src="../../assets/images/bonus-3m.jpg" class="img-responsive">
          </div>
          <div class="bonus-main group wow fadeInDown">
            <img src="../../assets/images/bonus-3.jpg" class="img-responsive">
              <div class="bonus-data"> <span class="count">3</span>
                <h4>Grupos de Apoyo y Soporte</h4>
                <p>Grupo de Apoyo y soporte
                  Tenemos grupos online formados por nuestros Fit Campers y nuestros coaches 
                  donde podras tener un soporte las 24 horas del dia 7 dias de la semana en los 
                  cuales podras participar mientras seas parte de este programa, 
                  Aquí es el momento de la verdad! ¿Se queda cuentas?</p>
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
              <h3><i class="fa fa-phone"></i>' . $phone . '</a></h3>
            <h4>Seré su Entrenador para las próximos 4 semanas ...</h4>
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
     <h2> Resultados sorprendentes del Fit Camp durante 4 semanas</h2>
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
    <h2> Resultados sorprendentes del Fit Camp durante 4 semanas</h2>
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
        </div><!--
        <div class="customer-text">
          <p>*Los consumidores que usan la Fórmula 1 de Herbalife dos veces por día como parte
            de un estilo de vida saludable en general, puede esperar perder alrededor de
            0,5 a 1 libra por semana. Los participantes en unas 12 semanas, utilizaron la
            Fórmula 1 dos veces al día (una vez como una comida y una
            vez como un aperitivo) con una dieta reducida en calorías y un objetivo de
            30 minutos de ejercicio por día. Los participantes siguieron una dieta alta
            en proteínas o una dieta rica en proteínas estándar. Los participantes en
            ambos grupos perdieron alrededor de 8,5 libras.</p>
        </div>-->

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
                $estructura1 = "../../FitCamp/".$folder;

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
            $aa = file_put_contents($rout1, $mensaje5);
            $bb = file_put_contents($rout2, $mensaje6);
 
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

              $insert = "INSERT INTO webcoach(coach,web,dir_name,folder,country) VALUES('$id_coach','FitCamp','$estructura1','$folder','$value')";
              if ($conexion->query($insert) == TRUE) {
              }else{

              }
    }


            }
            if ($value == 'Colombia') {
                $estructura2 = "../../Fitcamp/".$folder;

                 //creamos directorio para Colombia
        if(file_exists($estructura2)){
            ?>
            <div class="container">
                <div class="row">
                    <div class="inner-addon left-addon">

            <?php 

            echo "<script> 
                alert('El nombre de la Carpeta existe en Colombia')
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

            
              $insert = "INSERT INTO webcoach(coach,web,dir_name,folder,country) VALUES('$id_coach','Fitcamp','$estructura2','$folder','$value')";
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
                $estructura3 = "../../rdfitcamp/".$folder;

                 //creamos directorio para Colombia
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
            $a = file_put_contents($ruta, $mensaje3);
            $b = file_put_contents($ruta2, $mensaje4);
 
            if(!$a){echo "ERROR al insertar el fichero<br>";}   
            if(!$b){echo "ERROR al insertar el fichero<br>";}  

            
              $insert = "INSERT INTO webcoach(coach,web,dir_name,folder,country) VALUES('$id_coach','rdfitcamp','$estructura3','$folder','$value')";
              if ($conexion->query($insert) == TRUE) {
              }else{

              }           




             echo "<script> 
                alert('Creado Satisfactoriamente en Republica Dominicana')
                </script>";

            echo "<a href=".$estructura3." target='_blank' class='btn btn-success  '><span class='glyphicon glyphicon-thumbs-up'></span> Mostrar Web ''".$folder."''</a>";
            echo "<br/>";
            echo "<br/>";

        }


            }

        }
    }
    else {
        $selected = 'Seleccione una Web para crear la  url, USA, Colombia or Dominican Republic';
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

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js" type="text/javascript"></script>
<script language="javascript">
$(document).ready(function(){
   $("#coach").change(function () {
           $("#coach option:selected").each(function () {
            id = $(this).val();
            $.post("coachleadsearch.php", { id: id }, function(data){
                $("#coach_leads").html(data);
            });            
        });
   })
});
</script>

<script type="text/javascript">
    function showContent() {
        element = document.getElementById("content");
        check = document.getElementById("Dominicana");
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
        <form action="fitcamp.php" method="POST">
            <h3>Crear Capturadora Fit Camp</h3>
<br>
          <div class="form-group col-xs-8">
          <label for="name">Seleccione un Entrenador</label>
            <div class="inner-addon left-addon">
              <select name="id_coach" id="coach" class="form-control" required>
                <option value="">>-----------------Selecionar Entrenador--------------<</option>
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

            <label for="folder">Nombre Carpeta</label>
            <div class="inner-addon left-addon">
              <i class="glyphicon glyphicon-folder-open"></i>
              <input type="text" class="form-control" placeholder="Example: luismarin"  id="folder" name="folder" required/>
            </div>

            <label for="">Crear web en</label>
            <div class="inner-addon left-addon">
            <input type="checkbox" name="web[]" value="USA"/> U.S.A <br/>
            <input type="checkbox" name="web[]" value="Colombia"/> Colombia <br/>
            <input type="checkbox" name="web[]" id="Dominicana" value="Dominicana" onchange="javascript:showContent()"/> República Dominicana <br/>
            </div>

            <h3 align="center">Change Video from Capturing</h3>
              <br>
              <h4>Video para Capturadoras Colombia </h4>
              <div class="col-xs-5">
                <label for="video">Select origen Video</label><br>
                <input type="radio" name="video1" value="y-"> YouTube&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <input type="radio" name="video1" value="v-"> Vimeo
              </div>
              <div class="col-xs-6">
                <input type="text" name="idvideo1" id="video" class="form-control" placeholder="ID Vimeo or YouTube ">
              </div>
            <br><br>
            <div id="content" style="display: none;">
              <br>
                <h4>Video para Capturadoras Rep&uacuteblica Dominicana</h4>
                <div class="col-xs-5">
                <label for="video">Select origen Video</label><br>
                <input type="radio" name="video2" value="y-"> YouTube&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <input type="radio" name="video2" value="v-"> Vimeo
              </div>
              <div class="col-xs-6">
                <input type="text" name="idvideo2" id="video" class="form-control" placeholder="ID Vimeo or YouTube ">
              </div>
              <br><br><br>
              </div><br>
            <div class="row">
              <h3 align="center">How to change a Video</h3>
              <div class="col-xs-4">
                <div class="bonus-data"> <span class="count"><font color="black" size="9">1</font></span><br><br><br></div>
                Select a ID from video url Vimeo or Youtube https://vimeo.com/<strong><i>182629472</i></strong> or https://www.youtube.com/watch?v=<strong><i>UUqzPRClA4o</i></strong>
              </div>
              <div class="col-xs-4">
                <div class="bonus-data"> <span class="count"><font color="black" size="9">2</font></span><br><br><br></div>
                Select a Origin Video, Insert de ID in text form, if is Vimeo is: <strong><i>182629472</i></strong>, if is YouTube is: <strong><i>UUqzPRClA4o</i></strong>
              </div>
              <div class="col-xs-4">
                <div class="bonus-data"> <span class="count"><font color="black" size="9">3</font></span><br><br><br></div>
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
        <form action="fitcamp.php" method="POST">
            <h3>Crear Capturadora Fit Camp</h3>
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

              ?>

            <label for="folder">Nombre Carpeta</label>
            <div class="inner-addon left-addon">
              <i class="glyphicon glyphicon-folder-open"></i>
              <input type="text" class="form-control" placeholder="Example: luismarin"  id="folder" name="folder" required/>
            </div>

            <label for="">Crear web en</label>
            <div class="inner-addon left-addon">
            <input type="checkbox" name="web[]" value="USA"/> U.S.A <br/>
            <input type="checkbox" name="web[]" value="Colombia"/> Colombia <br/>
            <input type="checkbox" name="web[]" id="Dominicana" value="Dominicana" onchange="javascript:showContent()"/> República Dominicana <br/>
            </div>

            <h3 align="center">Change Video from Capturing</h3>
              <br>
              <h4>Video para Capturadoras Colombia </h4>
              <div class="col-xs-5">
                <label for="video">Select origen Video</label><br>
                <input type="radio" name="video1" value="y-"> YouTube&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <input type="radio" name="video1" value="v-"> Vimeo
              </div>
              <div class="col-xs-6">
                <input type="text" name="idvideo1" id="video" class="form-control" placeholder="ID Vimeo or YouTube ">
              </div>
              <br><br>

            <br><br>
            <div id="content" style="display: none;">
              <br>
                <h4>Video para Capturadoras Rep&uacuteblica Dominicana</h4>
                <div class="col-xs-5">
                <label for="video">Select origen Video</label><br>
                <input type="radio" name="video2" value="y-"> YouTube&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <input type="radio" name="video2" value="v-"> Vimeo
              </div>
              <div class="col-xs-6">
                <input type="text" name="idvideo2" id="video" class="form-control" placeholder="ID Vimeo or YouTube ">
              </div>
              <br><br><br>
              </div><br>
            <div class="row">
              <h3 align="center">How to change a Video</h3>
              <div class="col-xs-4">
                <div class="bonus-data"> <span class="count"><font color="black" size="9">1</font></span><br><br><br></div>
                Select a ID from video url Vimeo or Youtube https://vimeo.com/<strong><i>182629472</i></strong> or https://www.youtube.com/watch?v=<strong><i>UUqzPRClA4o</i></strong>
              </div>
              <div class="col-xs-4">
                <div class="bonus-data"> <span class="count"><font color="black" size="9">2</font></span><br><br><br></div>
                Select a Origin Video, Insert de ID in text form, if is Vimeo is: <strong><i>182629472</i></strong>, if is YouTube is: <strong><i>UUqzPRClA4o</i></strong>
              </div>
              <div class="col-xs-4">
                <div class="bonus-data"> <span class="count"><font color="black" size="9">3</font></span><br><br><br></div>
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
        <form action="fitcamp2.php" method="POST">
            <!--<h3>Create Web Collagen</h3>-->
            <h3>Crear Capturadora Fit Camp</h3>
<br>
          <div class="form-group col-xs-8">

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


            <label for="folder">Nombre Carpeta Capturadora</label>
            <div class="inner-addon left-addon">
              <i class="glyphicon glyphicon-folder-open"></i>
              <input type="text" class="form-control" placeholder="Example: luismarin"  id="folder" name="folder" required/>
            </div>

            
            <label for="">Crear web en</label>
            <div class="inner-addon left-addon">
            <input type="checkbox" name="web[]" value="USA"/> U.S.A <br/>
            <input type="checkbox" name="web[]" value="Colombia"/> Colombia <br/>
            <input type="checkbox" name="web[]" id="Dominicana" value="Dominicana" onchange="javascript:showContent()"/> República Dominicana <br/>
            </div>

            <h3 align="center">Change Video from Capturing</h3>
              <br>
              <h4>Video para Capturadoras </h4>
              <div class="col-xs-5">
                <label for="video">Select origen Video</label><br>
                <input type="radio" name="video1" value="y-"> YouTube&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <input type="radio" name="video1" value="v-"> Vimeo
              </div>
              <div class="col-xs-6">
                <input type="text" name="idvideo1" id="video" class="form-control" placeholder="ID Vimeo or YouTube ">
              </div>
              <br><br>
              <div id="content" style="display: none;">
              <br>
                <h4>Video para Capturadoras Rep&uacuteblica Dominicana</h4>
                <div class="col-xs-5">
                <label for="video">Select origen Video</label><br>
                <input type="radio" name="video2" value="y-"> YouTube&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <input type="radio" name="video2" value="v-"> Vimeo
              </div>
              <div class="col-xs-6">
                <input type="text" name="idvideo2" id="video" class="form-control" placeholder="ID Vimeo or YouTube ">
              </div>
              <br><br><br>
              </div><br>
            <div class="row">
              <h3 align="center">How to change a Video</h3>
              <div class="col-xs-4">
                <div class="bonus-data"> <span class="count"><font color="black" size="9">1</font></span><br><br><br></div>
                Select a ID from video url Vimeo or Youtube https://vimeo.com/<strong><i>182629472</i></strong> or https://www.youtube.com/watch?v=<strong><i>UUqzPRClA4o</i></strong>
              </div>
              <div class="col-xs-4">
                <div class="bonus-data"> <span class="count"><font color="black" size="9">2</font></span><br><br><br></div>
                Select a Origin Video, Insert de ID in text form, if is Vimeo is: <strong><i>182629472</i></strong>, if is YouTube is: <strong><i>UUqzPRClA4o</i></strong>
              </div>
              <div class="col-xs-4">
                <div class="bonus-data"> <span class="count"><font color="black" size="9">3</font></span><br><br><br></div>
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