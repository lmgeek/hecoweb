<link href="../css/bootstrap.css" rel="stylesheet">
<meta charset="UTF-8">

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
/**************************          CREA EL CLON DE 3 COLLAGEN          ******************************/
/******************************************************************************************************/



if (isset($_POST['id_coach_lead'])  && isset($_POST['folder']) &&
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

    //VIDEO ESPAÑOL USA
      if (isset($_POST['idvideo1']) && !empty($_POST['idvideo1']) && 
          isset($_POST['video1']) && !empty($_POST['video1'])) {
        $idvideo1 = $_POST['idvideo1'];
        $video1 = $_POST['video1'];
      }else{
        $idvideo1 = '195158004';
        $video1 = 'v-';
      }

$web = '
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

<!DOCTYPE html>
<html class="wide smoothscroll wow-animation desktop   landscape rd-navbar-fullwidth-linked" lang="en"><head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
<script src="http://planhbl.com/hecoweb/panel/visitas.php"></script>

    <!-- Site Title -->
    <title>Collagen</title>
    <meta name="format-detection" content="telephone=no">
    <meta name="viewport" content="width=device-width, height=device-height, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">

    <!-- Stylesheets -->
    <link href="../../css/css.css" rel="stylesheet">
    <link rel="stylesheet" href="../../css/style.css">

    <!--[if lt IE 10]>
    <script src="../../js/html5shiv.min.js"></script>
    <![endif]-->
</head>
<!-- The Main Wrapper -->
<style>
    .video-responsive1 {
        position: relative;
        padding-bottom: 56.25%; /* 16/9 ratio */
        padding-top: 30px; /* IE6 workaround*/
        height: 0;
        width: 90%;
        overflow: hidden;
        }

        .video-responsive1 iframe,
        .video-responsive1 object,
        .video-responsive1 embed {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        }
</style>
<div class="page text-center">

    <!--========================================================
                              CONTENT
    =========================================================-->
    <main class="page-content">
        <!-- colagen -->
        <section class="well well-sm well--inset-8 relative text-md-left">
            <div class="container">
                <div class="row">
                    <div class="col-md-5" style="margin-top: -50px">
                        <h2 data-text="Collagen">Herbalife SKIN® <br class="lg-visible">
                             <strong style="color:#339400;font:normal 33px/40px "Open Sans", Arial, Helvetica, sans-serif;">Collagen Beauty Booster</strong></h2>

                        <p class="big">
                            The Herbalife SKIN Collagen Beauty Booster, formulated with Verisol®* Collagen, which tests have shown support for skin elasticity and reduction of fine wrinkles within four to eight weeks.†** The Bioactive Collagen Peptides®§ can also diminish signs of cellulite.**
                        </p>
                        <a href="#Overview" class="btn btn-lg btn-default"><span>Read more</span></a>
                    </div>

                    <div class="col-xs-12 offset-1">
                        <div class="image-wrap-1"><img src="../../images/page-1_img01.jpg" alt=""></div>
                    </div>
                </div>
            </div>
        </section>
        <!-- END colagen-->

         <!-- Contact us -->
        <section>
            <div class="container relative">
                <div class="row flow-offset-2">


                    <div class="col-sm-10 col-sm-preffix-1 offset-2">
                        <div class="box-2 box-md-absolute bg-contrast text-md-left">
                            <h2>Free Consultation</h2>

                            <!-- RD Mailform -->
                            <form class="rd-mailform" method="post" action="http://planhbl.com/hecoweb/email/email01.php">
                                <input name="web" value="Collagen" type="hidden">
                                <input type="hidden" name="id_coach" value="'.$id_coach_lead.'">
                                <input type="hidden" name="subject" value="Collagen Beauty">
                                <!-- RD Mailform Type -->
                                <input name="form-type" value="contact" type="hidden">
                                <!-- END RD Mailform Type -->
                                <fieldset>
                                    <label class="mfInput" data-add-placeholder="">
                                        <input name="firstname" type="text" placeholder="Firstname" required>
                                    <span class="mfValidation"></span><span class="mfPlaceHolder"></span></label>

                                    <label class="mfInput" data-add-placeholder="">
                                        <input name="lastname" type="text" placeholder="Lastname" required>
                                    <span class="mfValidation"></span><span class="mfPlaceHolder"></span></label>

                                    <label class="mfInput" data-add-placeholder="">
                                        <input name="email" type="email" placeholder="E-mail" required>
                                    <span class="mfValidation"></span><span class="mfPlaceHolder"> </span></label>

                                    <label class="mfInput" data-add-placeholder="">
                                        <input name="phone" type="text" placeholder="Number Phone" required>
                                    <span class="mfValidation"></span><span class="mfPlaceHolder"></span></label>

                                    <div class="mfControls btn-group text-center text-md-left">
                                        <button type="submit" value="Continue" id="Continue" name="Continue" class="btn btn-md btn-default"><span>SEND</span></button>
                                    </div>
                                    <div class="mfInfo mfProgress"><span class="cnt"></span><span class="loader"></span><span class="msg"></span></div>
                                </fieldset>
                            </form>
                            <!-- END RD Mailform -->
                        </div>
                    </div>
                </div>

                <div class="row offset-2">
                    <div class="col-md-9">
                        <div class="video-responsive1">
                            <!--<img src="images/page-1_img01-.jpg">-->
                            <iframe src="https://player.vimeo.com/video/'.$idvideo1.'" width="800" height="500" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
                        </div>
                    </div>
                </div>
            </div>

        </section>
        <!-- END Contact us-->



        <div class="divider-1 md-visible"></div>
        <!-- overview -->
        <section class="well well-md text-md-left relative" id="Overview">
            <div class="container">
                <div class="row">
                    <div class="col-md-4 col-md-preffix-1">
                        <h2 data-text="Overview"><strong style="color:#339400;font:normal 33px/40px "Open Sans", Arial, Helvetica, sans-serif;">Overview</strong></h2>

                        <p class="text-md-justify big">Promote your skin’s health from within for visibly younger looking skin. This supplement is available in Strawberry Lemonade flavor. It is formulated with Verisol®* collagen to support skin elasticity and reduce wrinkles.† </p>


                    </div>
                    <div class="col-md-4 col-md-preffix-1 offset-1">
                        <div class="image-wrap preffix-1 content-shift-up-1 img-width block-center">
                            <img src="../../images/page-1_img02.jpg" alt="" height="601" width="401">
                        </div>
                    </div>

                    <div class="col-xs-12">
                        <div class="image-wrap-2 lg-visible">
                            <img src="../../images/page-1_img04.jpg" alt="" height="537" width="646"></div>
                    </div>
                    <div class="col-xs-12">
                        <div class="image-wrap-3 md-visible">
                            <img src="../../images/page-1_img03-old.jpg" alt="" height="546" width="397"></div>
                    </div>
                </div>
            </div>
        </section>
        <!-- END overview-->

        <!-- benefits -->
        <section class="text-md-left offset-2">
            <div class="container">
                <div class="row row-no-gutter row-sm-bottom">
                    <div class="col-sm-6 col-md-4">
                        <!--Figure-->
                        <figure class="figure">
                            <p><img src="../../images/collagenbg.jpg" alt=""></p>
                            <div class="figure__overlay bg-secondary-3"></div>
                            <figcaption class="figure__body">
                                <p style="font-size: 16px;">Collagen is what gives the dermis (the thick inner layer of our skin) its firm structure. As we age, the production of collagen in our bodies diminishes resulting in the loss of firmness and elasticity, and the appearance of wrinkles. Herbalife SKIN® Collagen Beauty Booster nourishes the skin from within and provides the nutrients to maintain a youthful and radiant skin. </p>

                                <!--<a href="#" class="btn btn-lg btn-contrast"><span>Read more</span></a>-->
                            </figcaption>
                        </figure>
                        <figure class="figure">
                            <p><img src="../../images/1.png" alt=""></p>
                            <div class="figure__overlay bg-secondary-3"></div>
                            <figcaption class="figure__body">
                                <h3>Formulated with Verisol®* collagen which has been tested to show support of skin elasticity and the reduction of fine wrinkles.† </h3>

                                <!--<a href="#" class="btn btn-lg btn-contrast"><span>Read more</span></a>-->
                            </figcaption>
                        </figure>
                    </div>
                    <div class="col-sm-6 col-md-4">
                        <div class="box-white text-center">

                            <div class="divider-2"></div>

                            <h2><strong style="color:#339400;font:normal 33px/40px "Open Sans", Arial, Helvetica, sans-serif;">
                                 Key Benefits</strong>
                            </h2>

                            <div class="divider-2"></div>

                        </div>

                        <!--Figure-->
                        <figure class="figure">
                            <p><img src="../../images/2.png" alt=""></p>

                            <div class="figure__overlay bg-primary"></div>
                            <figcaption class="figure__body">
                                <h3>Bioactive Collagen Peptides®‡ can reduce signs of cellulite.† </h3>

                            </figcaption>
                        </figure>
                    </div>

                    <div class="col-md-4">
                        <div class="row row-no-gutter">
                            <div class="col-sm-6 col-md-12">
                                <!--Figure-->
                                <figure class="figure">
                                    <p><img src="../../images/3.png" alt=""></p>

                                    <div class="figure__overlay bg-secondary-2"></div>
                                    <figcaption class="figure__body">
                                        <h3>Contains Vitamins A (as beta-carotene), C and E, which help prevent harmful free radical cell damage that ages your skin.†</h3>

                                    </figcaption>
                                </figure>
                            </div>
                            <div class="col-sm-6 col-md-12">
                                <!--Figure-->
                                <figure class="figure">
                                    <p><img src="../../images/4.png" alt=""></p>

                                    <div class="figure__overlay bg-secondary-1"></div>
                                    <figcaption class="figure__body">
                                        <h3>Supports strong nails and healthy hair with selenium, zinc and biotin.† </h3>

                                    </figcaption>
                                </figure>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- END benefits-->

        <br><br>
        <center>
          <div class="mfControls btn-group text-center text-md-center">
              <a href="#goform" class="page-scroll btn btn-md btn-default">Fill out the contact form</a>     
          </div>
        </center>

        <!-- results -->
        <section class="well well-md well--inset-1 well--inset-2 text-md-left">
            <div class="container">
                <div class="row">
                    <div class="col-md-4 col-md-preffix-1 inset-1">

                           <h2 data-text="Results"><strong style="color:#339400;font:normal 23px/40px "Open Sans", Arial, Helvetica, sans-serif;">Amazing Results from <br class="lg-visible"> Drinking Collagen Beauty Booster</strong></h2>
                           <p>Look at the results from these 2 clients in just 7 days!*</p>
                    </div>

                    <div class="col-md-7">

                            <!--
                        <div class="owl-stage-outer"><div style="transform: translate3d(-1340px, 0px, 0px); transition: all 0s ease 0s; width: 4690px;" class="owl-stage"><div style="width: 670px; margin-right: 0px;" class="owl-item cloned">-->
                        <blockquote class="quote">
                                <div class="box-md">
                                    <div class="box__left box__middle"><img  src="../../images/collagen2.jpg" alt="" height="310" width="310"></div>
                                     <div class="box__body ">
                                       <q>Women aged 45 and older can generally expect comparable improvement in appearance of wrinkles by using the Herbalife® product as directed, administering at least 2.5 g daily of the Verisol® branded ingredient over a period of at least 4 weeks. Based on a study of 110 women, consuming 2.5 g of Verisol® ingredient in neutral composiIon daily for 4 and 8 weeks. *BioacIve Collagen PepIdes® is a registered trademark of GELITA AG.
                                        <br>
                                        †These statements have not been evaluated by the FDA. This product is not intended to diagnose, treat, cure, or prevent any disease.</q>
                                    </div>
                                </div>
                        </blockquote>
                    </div>
                </div>
            </div>

        </section>
        <!-- END results-->

        <!-- Contact us -->
        <section>
            <div class="container relative">
                <div class="row flow-offset-2">
                    <div class="col-sm-10 col-sm-preffix-1">
                        <div class="box-1 box-md-absolute box-white text-md-left inset-3">
                            <h2>Independent<br>Coach</h2>

                            <address class="contact-info md-absolute bg-contrast">
                                <dl>
                                    <dt class="heading-5 text-default">' . $name . '</dt>
                                </dl>
                                <dl>
                                    <dt class="heading-5 text-default">Email</dt>
                                    <dd><a href="mailto:' . $email . '">' . $email . '</a></dd>
                                </dl>
                                <dl>
                                    <dt class="heading-5 text-default">Telephone</dt>
                                    <dd><a href="#">' . $phone . '</a></dd>
                                </dl>
                            </address>
                        </div>
                    </div>

                    <div class="col-sm-10 col-sm-preffix-1 offset-2">
                        <div class="box-2 box-md-absolute bg-contrast text-md-left">
                            <h2>Free Consultation</h2>

                            <!-- RD Mailform -->
                            <form class="rd-mailform" method="post" action="">
                                <!-- RD Mailform Type -->
                                <input name="form-type" value="contact" type="hidden">
                                <!-- END RD Mailform Type -->
                                <fieldset>
                                    <label class="mfInput" data-add-placeholder="">
                                        <input name="firstname" type="text" placeholder="Firstname" required>
                                    <span class="mfValidation"></span><span class="mfPlaceHolder"></span></label>

                                    <label class="mfInput" data-add-placeholder="">
                                        <input name="lastname" type="text" placeholder="Lastname" required>
                                    <span class="mfValidation"></span><span class="mfPlaceHolder"></span></label>

                                    <label class="mfInput" data-add-placeholder="">
                                        <input name="lista" type="email" placeholder="E-mail" required>
                                    <span class="mfValidation"></span><span class="mfPlaceHolder"> </span></label>

                                    <label class="mfInput" data-add-placeholder="">
                                        <input name="phone" type="text" placeholder="Number Phone" required>
                                    <span class="mfValidation"></span><span class="mfPlaceHolder"></span></label>

                                    <div class="mfControls btn-group text-center text-md-left">
                                        <button type="submit" value="Continue" id="Continue" name="Continue" class="btn btn-md btn-default"><span>SEND</span></button>
                                    </div>
                                    <div class="mfInfo mfProgress"><span class="cnt"></span><span class="loader"></span><span class="msg"></span></div>
                                </fieldset>
                            </form>
                            <!-- END RD Mailform -->
                        </div>
                    </div>
                </div>

                <div class="row offset-2">
                    <div class="col-md-9">
                        <div class="rd-google-map">
                            <img src="../../images/page-1_img01-.jpg">
                        </div>
                    </div>
                </div>
            </div>

        </section>
        <!-- END Contact us-->

        <!-- results -->
        <section class="well well-md well--inset-1 well--inset-2 text-md-left">
            <div class="container">
                <div class="row">
                    <div class="col-md-4 col-md-preffix-1 inset-1">

                           <h2 data-text="Results"><strong style="color:#339400;font:normal 23px/40px "Open Sans", Arial, Helvetica, sans-serif;">Amazing Results from <br class="lg-visible"> Drinking Collagen Beauty Booster</strong></h2>
                    </div>

                    <div class="col-md-7">

                            <!--
                        <div class="owl-stage-outer"><div style="transform: translate3d(-1340px, 0px, 0px); transition: all 0s ease 0s; width: 4690px;" class="owl-stage"><div style="width: 670px; margin-right: 0px;" class="owl-item cloned">-->
                        <blockquote class="quote">
                                <div class="box-md">
                                     <div class="box__body ">
                                       <q>Women aged 45 and older can generally expect comparable improvement in appearance of wrinkles by using the Herbalife® product as directed, administering at least 2.5 g daily of the Verisol® branded ingredient over a period of at least 4 weeks. Based on a study of 110 women, consuming 2.5 g of Verisol® ingredient in neutral composiIon daily for 4 and 8 weeks. *BioacIve Collagen PepIdes® is a registered trademark of GELITA AG.
                                        <br>
                                        †These statements have not been evaluated by the FDA. This product is not intended to diagnose, treat, cure, or prevent any disease.</q>
                                    </div>
                                </div>
                        </blockquote>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                          <blockquote class="quote">
                                <div class="box-md">
                                    <div class="box__left box__middle"><img  src="../../images/collagen3.jpg" alt="" height="310" width="310"></div>
                                </div>
                        </blockquote>
                    </div>

                    <div class="col-md-6">
                        <blockquote class="quote">
                                <div class="box-md">
                                    <div class="box__left box__middle"><img  src="../../images/collagen4.jpg" alt="" height="310" width="310"></div>
                                </div>
                        </blockquote>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                          <blockquote class="quote">
                                <div class="box-md">
                                    <div class="box__left box__middle"><img  src="../../images/collagen5.jpg" alt="" height="310" width="310"></div>
                                </div>
                        </blockquote>
                    </div>

                    <div class="col-md-6">
                        <blockquote class="quote">
                                <div class="box-md">
                                    <div class="box__left box__middle"><img  src="../../images/collagen6.jpg" alt="" height="310" width="310"></div>
                                </div>
                        </blockquote>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                          <blockquote class="quote">
                                <div class="box-md">
                                    <div class="box__left box__middle"><img  src="../../images/collagen7.jpg" alt="" height="310" width="310"></div>
                                </div>
                        </blockquote>
                    </div>

                    <div class="col-md-6">
                        <blockquote class="quote">
                                <div class="box-md">
                                    <div class="box__left box__middle"><img  src="../../images/collagen8.jpg" alt="" height="310" width="310"></div>
                                </div>
                        </blockquote>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                          <blockquote class="quote">
                                <div class="box-md">
                                    <div class="box__left box__middle"><img  src="../../images/collagen9.jpg" alt="" height="310" width="310"></div>
                                </div>
                        </blockquote>
                    </div>

                    <div class="col-md-6">
                        <blockquote class="quote">
                                <div class="box-md">
                                    <div class="box__left box__middle"><img  src="../../images/collagen10.jpg" alt="" height="310" width="310"></div>
                                </div>
                        </blockquote>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                          <blockquote class="quote">
                                <div class="box-md">
                                    <div class="box__left box__middle"><img  src="../../images/collagen11.jpg" alt="" height="310" width="310">
                                    <img  src="../../images/collagen14.jpg" alt="" height="310" width="310"></div>
                                </div>
                        </blockquote>
                    </div>

                    <div class="col-md-6">
                        <blockquote class="quote">
                                <div class="box-md">
                                    <div class="box__left box__middle"><img  src="../../images/collagen12.jpg" alt="" height="310" width="310"></div>
                                </div>
                        </blockquote>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                          <blockquote class="quote">
                                <div class="box-md">
                                    <div class="box__left box__middle"><img  src="../../images/collagen13.jpg" alt="" height="310" width="310"></div>
                                </div>
                        </blockquote>
                    </div>

                    <div class="col-md-6">
                        <blockquote class="quote">
                                <div class="box-md">
                                    <div class="box__left box__middle"><img  src="../../images/collagen15.jpg" alt="" height="310" width="310"></div>
                                </div>
                        </blockquote>
                    </div>
                </div>
<!--
                <div class="row">
                    <div class="col-md-6">
                          <blockquote class="quote">
                                <div class="box-md">
                                    <div class="box__left box__middle"><img  src="../../images/collagen17.jpg" alt="" height="310" width="310"></div>
                                </div>
                        </blockquote>
                    </div>

                    <div class="col-md-6">
                        <blockquote class="quote">
                                <div class="box-md">
                                    <div class="box__left box__middle"><img  src="../../images/collagen16.jpg" alt="" height="310" width="310"></div>
                                </div>
                        </blockquote>
                    </div>
                </div>-->


            </div>

        </section>
        <!-- END results-->

        <center>
          <div class="mfControls btn-group text-center text-md-center">
              <a href="#goform" class="page-scroll btn btn-md btn-default">Fill out the contact form</a>     
          </div>
        </center>
        <br><br><br>


    </main>

</div>
</html>
';




        $estructura = "../../skin/collagen/".$folder;

        //creamos directorio para Colombia
        if(file_exists($estructura)){
            echo '<div class="container">';
                echo '<div class="row">';
                    echo '<div class="inner-addon left-addon">';


            echo "<script> 
                alert('The name of this folder already exists')
                </script>";

            echo "<h3>Clon Web Collagen</h3><br>";
            echo "The name of this folder already exists<br><br>";
            echo "<a href=".$estructura." target='_blank' class='btn btn-success  '><span class='glyphicon glyphicon-thumbs-up'></span> Mostrar Web ''".$folder."''</a>";
            echo "<br><br>";

            echo "<input type='button' class='btn btn-danger' value='volver atrás' name='volver atrás2' onclick='history.back()' />";

                    echo '</div>';
                echo '</div>';
            echo '</div>';
            //echo $mensaje;
        }else{
            mkdir($estructura, 0777);
 
            //indicamos la ruta del fichero index.php
 
            $ruta = $estructura . "/index.php";
 
            //Creamos el fichero index.php e introducimos el contenido del TextArea 
            $a = file_put_contents($ruta, $web);
 
            if(!$a){echo "ERROR al insertar el fichero";}   

             echo "<script> 
                alert('It has been created successfully')
                </script>";

            echo "<h3>Clon Web Collagen</h3><br>";
            echo "<h3>It has been created successfully</h3>";
            echo "<a href=".$estructura." target='_blank' class='btn btn-success  '><span class='glyphicon glyphicon-thumbs-up'></span> Mostrar Web ''".$folder."''</a>";
            echo "<br/>";
            echo "<br/>";
            
            $insert = "INSERT INTO webcoach(coach,web,dir_name,folder,country) VALUES('$id_coach_lead','Collagen','$estructura','$folder','USA')";
              if ($conexion->query($insert) == TRUE) {
              }else{

              }
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

<?php 
if ($tipo_usu == "Administrador") {
 ?>


<div class="container">
    <div class="row">
        <form action="createCollagen2.php" method="POST">
            <h3>Create Web Collagen</h3>
<br>
          <div class="form-group col-xs-6">

          <label for="name">Select a Coach to see your list</label>
            <div class="inner-addon left-addon">

              <select name="coach" id="coach" class="form-control" required>
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

           
            <label for="name">Select Coach Leads</label>
            <div class="inner-addon left-addon">
                <select name="id_coach_lead" id="coach_leads" class="form-control"></select>
            </div>

            <label for="folder">Folder name</label>
            <div class="inner-addon left-addon">
              <i class="glyphicon glyphicon-folder-open"></i>
              <input type="text" class="form-control" placeholder="Example: luismarin"  id="folder" name="folder" required/>
            </div>

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
        <form action="createCollagen2.php" method="POST">
            <h3>Create Web Collagen</h3>
<br>
          <div class="form-group col-xs-6">

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
            <label for="folder">Folder name</label>
            <div class="inner-addon left-addon">
              <i class="glyphicon glyphicon-folder-open"></i>
              <input type="text" class="form-control" placeholder="Example: luismarin"  id="folder" name="folder" required/>
            </div>

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
        <form action="createCollagen.php" method="POST">
            <!--<h3>Create Web Collagen</h3>-->
            <h3>Crear Capturadora Collageno</h3>
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