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
        echo "no data";
    }

$web = '
<?php
  $conexion = new mysqli("localhost", "thrdaytr_oportun", "oportunidadhbl", "thrdaytr_promocionhbl");
  $search = $conexion->query(\'SELECT * FROM coach WHERE name ="'.$name.'"\');
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
    <!-- Site Title -->
    <title>Collagen</title>
    <meta name="format-detection" content="telephone=no">
    <meta name="viewport" content="width=device-width, height=device-height, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">

    <!-- Stylesheets -->
    <link href="../css/css.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/style.css">

    <!--[if lt IE 10]>
    <script src="../js/html5shiv.min.js"></script>
    <![endif]-->
</head>
<!-- The Main Wrapper -->
<style>
    .video-responsive1 {
        position: relative;
        padding-bottom: 56.25%; /* 16/9 ratio */
        padding-top: 30px; /* IE6 workaround*/
        height: 0;
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
                        <div class="image-wrap-1"><img src="../images/page-1_img01.jpg" alt=""></div>
                    </div>
                </div>
            </div>
        </section>
        <!-- END colagen-->

        <?php set_time_limit(0);


if($_POST["Continue"]){


  //EMAIL DEL DESTINATARIO
  $FromName = $_POST["firstname"]." ".$_POST["lastname"];
  $FromMail = $mail_coach;
  $Phone = $_POST["phone"];
  $firstname = $_POST["firstname"];
  $lastname = $_POST["lastname"];


  //ASUNTO DEL EMAIL
  $asunto = "Collagen";


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
        Thank you for showing your interest in our program of <font color=\'#339400\' size=3><b>Collagen Beauty Booster</b></font>, one of our Coaches will contact you as soon as possible.
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

        <!-- Contact us -->
        <section>
            <div class="container relative">
                <div class="row flow-offset-2">


                    <div class="col-sm-10 col-sm-preffix-1 offset-2">
                        <div class="box-2 box-md-absolute bg-contrast text-md-left">
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
                                      $insert = "INSERT INTO emails(id_coach,firstname,lastname,email,phone,web) VALUES(\'".$id_coach."\',\'".$firstname."\',\'".$lastname."\',\'".$arquivo."\',\'".$Phone."\',\'Collagen\')";
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
                        <div class="video-responsive1">
                            <!--<img src="images/page-1_img01-.jpg">-->
                            <iframe width="800" height="500" src="https://www.youtube.com/embed/umOWyDN9Lpw" frameborder="0" allowfullscreen></iframe>
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
                            <img src="../images/page-1_img02.jpg" alt="" height="601" width="401">
                        </div>
                    </div>

                    <div class="col-xs-12">
                        <div class="image-wrap-2 lg-visible">
                            <img src="../images/page-1_img04.jpg" alt="" height="537" width="646"></div>
                    </div>
                    <div class="col-xs-12">
                        <div class="image-wrap-3 md-visible">
                            <img src="../images/page-1_img03-old.jpg" alt="" height="546" width="397"></div>
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
                            <p><img src="../images/collagenbg.jpg" alt=""></p>
                            <div class="figure__overlay bg-secondary-3"></div>
                            <figcaption class="figure__body">
                                <p style="font-size: 16px;">Collagen is what gives the dermis (the thick inner layer of our skin) its firm structure. As we age, the production of collagen in our bodies diminishes resulting in the loss of firmness and elasticity, and the appearance of wrinkles. Herbalife SKIN® Collagen Beauty Booster nourishes the skin from within and provides the nutrients to maintain a youthful and radiant skin. </p>

                                <!--<a href="#" class="btn btn-lg btn-contrast"><span>Read more</span></a>-->
                            </figcaption>
                        </figure>
                        <figure class="figure">
                            <p><img src="../images/1.png" alt=""></p>
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
                            <p><img src="../images/2.png" alt=""></p>

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
                                    <p><img src="../images/3.png" alt=""></p>

                                    <div class="figure__overlay bg-secondary-2"></div>
                                    <figcaption class="figure__body">
                                        <h3>Contains Vitamins A (as beta-carotene), C and E, which help prevent harmful free radical cell damage that ages your skin.†</h3>

                                    </figcaption>
                                </figure>
                            </div>
                            <div class="col-sm-6 col-md-12">
                                <!--Figure-->
                                <figure class="figure">
                                    <p><img src="../images/4.png" alt=""></p>

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
                                    <div class="box__left box__middle"><img  src="../images/collagen2.jpg" alt="" height="310" width="310"></div>
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
                            <img src="../images/page-1_img01-.jpg">
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
                                    <div class="box__left box__middle"><img  src="../images/collagen3.jpg" alt="" height="310" width="310"></div>
                                </div>
                        </blockquote>
                    </div>

                    <div class="col-md-6">
                        <blockquote class="quote">
                                <div class="box-md">
                                    <div class="box__left box__middle"><img  src="../images/collagen4.jpg" alt="" height="310" width="310"></div>
                                </div>
                        </blockquote>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                          <blockquote class="quote">
                                <div class="box-md">
                                    <div class="box__left box__middle"><img  src="../images/collagen5.jpg" alt="" height="310" width="310"></div>
                                </div>
                        </blockquote>
                    </div>

                    <div class="col-md-6">
                        <blockquote class="quote">
                                <div class="box-md">
                                    <div class="box__left box__middle"><img  src="../images/collagen6.jpg" alt="" height="310" width="310"></div>
                                </div>
                        </blockquote>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                          <blockquote class="quote">
                                <div class="box-md">
                                    <div class="box__left box__middle"><img  src="../images/collagen7.jpg" alt="" height="310" width="310"></div>
                                </div>
                        </blockquote>
                    </div>

                    <div class="col-md-6">
                        <blockquote class="quote">
                                <div class="box-md">
                                    <div class="box__left box__middle"><img  src="../images/collagen8.jpg" alt="" height="310" width="310"></div>
                                </div>
                        </blockquote>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                          <blockquote class="quote">
                                <div class="box-md">
                                    <div class="box__left box__middle"><img  src="../images/collagen9.jpg" alt="" height="310" width="310"></div>
                                </div>
                        </blockquote>
                    </div>

                    <div class="col-md-6">
                        <blockquote class="quote">
                                <div class="box-md">
                                    <div class="box__left box__middle"><img  src="../images/collagen10.jpg" alt="" height="310" width="310"></div>
                                </div>
                        </blockquote>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                          <blockquote class="quote">
                                <div class="box-md">
                                    <div class="box__left box__middle"><img  src="../images/collagen11.jpg" alt="" height="310" width="310">
                                    <img  src="../images/collagen14.jpg" alt="" height="310" width="310"></div>
                                </div>
                        </blockquote>
                    </div>

                    <div class="col-md-6">
                        <blockquote class="quote">
                                <div class="box-md">
                                    <div class="box__left box__middle"><img  src="../images/collagen12.jpg" alt="" height="310" width="310"></div>
                                </div>
                        </blockquote>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                          <blockquote class="quote">
                                <div class="box-md">
                                    <div class="box__left box__middle"><img  src="../images/collagen13.jpg" alt="" height="310" width="310"></div>
                                </div>
                        </blockquote>
                    </div>

                    <div class="col-md-6">
                        <blockquote class="quote">
                                <div class="box-md">
                                    <div class="box__left box__middle"><img  src="../images/collagen15.jpg" alt="" height="310" width="310"></div>
                                </div>
                        </blockquote>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                          <blockquote class="quote">
                                <div class="box-md">
                                    <div class="box__left box__middle"><img  src="../images/collagen17.jpg" alt="" height="310" width="310"></div>
                                </div>
                        </blockquote>
                    </div>

                    <div class="col-md-6">
                        <blockquote class="quote">
                                <div class="box-md">
                                    <div class="box__left box__middle"><img  src="../images/collagen16.jpg" alt="" height="310" width="310"></div>
                                </div>
                        </blockquote>
                    </div>
                </div>


            </div>

        </section>
        <!-- END results-->


    </main>
    <!--========================================================
                              FOOTER
    ==========================================================-->
    <footer class="page-footer">


    </footer>
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
            <!--<h3>Create Web 3daytrial Challenge</h3>-->
            <h3>Creación del WebSite Reto del Paquete de 3 días</h3>
<br>
          <div class="form-group col-xs-6">
          
          <!--<label for="name">Select a Coach to see your list</label>-->
          <label for="name">Selecione un Entrenador Asociado</label>
            <div class="inner-addon left-addon">
              <?php
              ?>

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


            <!--<label for="folder">Folder name</label>-->
            <label for="folder">Nombre de Carpeta a crear</label>
            <div class="inner-addon left-addon">
              <i class="glyphicon glyphicon-folder-open"></i>
              <input type="text" class="form-control" placeholder="Example: luismarin"  id="folder" name="folder" required/>
            </div>

            <!--<label for="">Create web on:</label>--
            <label for="">Crear website en:</label>
            <div class="inner-addon left-addon">
            <input type="checkbox" name="web[]" value="USA"/> Estados Unidos <br/>
            <input type="checkbox" name="web[]" value="Colombia"/> Colombia <br/>
            <!--<input type="checkbox" name="web[]" value="Venezuela"/> Venezuela <br/>
            </div>-->

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
             <!--<h3>Create Web 3daytrial Challenge</h3>-->
            <h3>Creación del WebSite Reto del Paquete de 3 días</h3>
<br>
          <div class="form-group col-xs-6">
          <!--<label for="name">Select a Coach to see your list</label>-->
          <label for="name">Entrenador :</label>
            <div class="inner-addon left-addon">
            <?php 
              $user2 = $conexion->query("SELECT * FROM coachleads WHERE id = ".$id_name);
              $row2 = $user2->fetch_assoc();
              $name_user = $row2['name'];

              echo $name_user;

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


            }else {
              echo 'Register a new coach Leads for continues<br>
                  <a href="../cpanel/new-coach-leads.php" class="btn btn-success">Create  ></a>';
              
            }
            ?>


            <!--<label for="folder">Folder name</label>-->
            <label for="folder">Nombre de Carpeta a crear</label>
            <div class="inner-addon left-addon">
              <i class="glyphicon glyphicon-folder-open"></i>
              <input type="text" class="form-control" placeholder="Example: luismarin"  id="folder" name="folder" required/>
            </div>

            <!--<label for="">Create web on:</label>--
            <label for="">Crear website en:</label>
            <div class="inner-addon left-addon">
            <input type="checkbox" name="web[]" value="USA"/> Estados Unidos <br/>
            <input type="checkbox" name="web[]" value="Colombia"/> Colombia <br/>
            <!--<input type="checkbox" name="web[]" value="Venezuela"/> Venezuela <br/>
            </div>-->

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
        <form action="createCollagen2.php" method="POST">
             <!--<h3>Create Web 3daytrial Challenge</h3>-->
            <h3>Creación del WebSite Reto del Paquete de 3 días</h3>
<br>
          <div class="form-group col-xs-6">
          <!--<label for="name">Select a Coach to see your list</label>-->
          <label for="name">Entrenador :</label>
            <div class="inner-addon left-addon">
            <?php 
              $user2 = $conexion->query("SELECT * FROM coachleads WHERE id = ".$id_name);
              $row2 = $user2->fetch_assoc();
              $name_user = $row2['name'];

              echo $name_user;
              echo '<input type="hidden" class="form-control"  name="id_coach_lead" id="coach_lead" value="'.$id_name.'" readonly/>';

              echo "</div>";

            ?>


            <!--<label for="folder">Folder name</label>-->
            <label for="folder">Nombre de Carpeta a crear</label>
            <div class="inner-addon left-addon">
              <i class="glyphicon glyphicon-folder-open"></i>
              <input type="text" class="form-control" placeholder="Example: luismarin"  id="folder" name="folder" required/>
            </div>

            <!--<label for="">Create web on:</label>--
            <label for="">Crear website en:</label>
            <div class="inner-addon left-addon">
            <input type="checkbox" name="web[]" value="USA"/> Estados Unidos <br/>
            <input type="checkbox" name="web[]" value="Colombia"/> Colombia <br/>
            <!--<input type="checkbox" name="web[]" value="Venezuela"/> Venezuela <br/>--
            </div>-->

            <input type="submit" class="btn btn-success" value="Create  >">
                
          </div>
            

        </form>
    </div>
</div>


<?php 
  }

}

 
         ?>