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
		
	?>


<!DOCTYPE html>
<html lang="es">

  <meta charset="UTF-8">
  <meta http-equiv="Content-type" content="text/html; charset=utf-8" />
  <title>Panel</title>
  <link rel="stylesheet" href="../css/style2.css">
  <link href="../css/bootstrap.css" rel="stylesheet">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

  <style>
  	div.show-top-margin{margin-top:2em;}.show-grid{margin-bottom:2em;}.show-grid [class^="col-"]{padding-top:10px;padding-bottom:10px;border:1px solid #AAA;background-color:#EEE;background-color:rgba(200,200,200,0.3);}.responsive-utilities-test .col-xs-6{margin-bottom:10px;}.responsive-utilities-test span{padding:15px 10px;font-size:14px;font-weight:bold;line-height:1.1;text-align:center;border-radius:4px;}.visible-on .col-xs-6 .hidden-xs,.visible-on .col-xs-6 .hidden-sm,.visible-on .col-xs-6 .hidden-md,.visible-on .col-xs-6 .hidden-lg,.hidden-on .col-xs-6 .visible-xs,.hidden-on .col-xs-6 .visible-sm,.hidden-on .col-xs-6 .visible-md,.hidden-on .col-xs-6 .visible-lg{color:#999;border:1px solid #ddd;}.visible-on .col-xs-6 .visible-xs,.visible-on .col-xs-6 .visible-sm,.visible-on .col-xs-6 .visible-md,.visible-on .col-xs-6 .visible-lg,.hidden-on .col-xs-6 .hidden-xs,.hidden-on .col-xs-6 .hidden-sm,.hidden-on .col-xs-6 .hidden-md,.hidden-on .col-xs-6 .hidden-lg{color:#468847;background-color:#dff0d8;border:1px solid #d6e9c6;}div.controls input,div.controls select{margin-bottom:.5em;}#inputSeleccionado{border-color:rgba(82,168,236,.8);outline:0;outline:thin dotted \9;-moz-box-shadow:0 0 8px rgba(82,168,236,.6);box-shadow:0 0 8px rgba(82,168,236,.6);}.bs-glyphicons{padding-left:0;padding-bottom:1px;margin-bottom:20px;list-style:none;overflow:hidden;}.bs-glyphicons li{float:left;width:25%;height:115px;padding:10px;margin:0 -1px -1px 0;font-size:12px;line-height:1.4;text-align:center;border:1px solid #ddd;}.bs-glyphicons .glyphicon{display:block;margin:5px auto 10px;font-size:24px;}.bs-glyphicons li:hover{background-color:rgba(86,61,124,.1);}@media (min-width: 768px) {.bs-glyphicons li{width:12.5%;}}.btn-toolbar+.btn-toolbar{margin-top:10px;}.dropdown>.dropdown-menu{position:static;display:block;margin-bottom:5px;}form .row{margin-bottom:1em;}.nav .dropdown-menu{display:none;}.nav .open .dropdown-menu{display:block;position:absolute;}
  </style>
</head>
<body>

<h2 align="center"><i class="fa fa-globe"></i> Creacion de Capturadoras</h2>

<div class="container">
  <div class="row">

    


<?php 

if ($tipo_usu == "Administrador") {

 ?>

    <div class="col-md-12" style="background-color: #ffffff; margin-bottom: 20px;border-radius: 5px">
      <div class="col-md-3 " style="padding: 5px 0">
        <img src="../images/3daytrial-2.png" alt="" width="100%">
      </div>
      <div class="col-md-9 " style="padding-right: 0px;">
        <h3>Reto de 3 días</h3>


        <h4>Crear Capturadora para:</h4>

        <div>
          <button type="button" class="btn btn-success"  onclick=" location.href='../class/create3daytrial.php' ">
            <span class="glyphicon glyphicon-edit"></span> Duplicar a Tab
          </button>&nbsp;&nbsp;
          <button type="button" class="btn btn-success"  onclick=" location.href='../class/create3daytrial2.php' ">
            <span class="glyphicon glyphicon-edit"></span> Duplicar a Bajo Linea
          </button>

        </div>
      </div>
    </div>

    <div class="col-md-12" style="background-color: #ffffff; margin-bottom: 20px;border-radius: 5px">
      <div class="col-md-3 " style="padding: 5px 0">
        <img src="../images/3daytrial-2.png" alt="" width="100%">
      </div>
      <div class="col-md-9 " style="padding-right: 0px;">
        <h3>Reto de 7 días</h3>


        <h4>Crear Capturadora para:</h4>

        <div>
          <button type="button" class="btn btn-success"  onclick=" location.href='../class/create7daytrial.php' ">
            <span class="glyphicon glyphicon-edit"></span> Duplicar a Tab
          </button>&nbsp;&nbsp;
          <button type="button" class="btn btn-success"  onclick=" location.href='../class/create7daytrial2.php' ">
            <span class="glyphicon glyphicon-edit"></span> Duplicar a Bajo Linea
          </button>

        </div>
      </div>
    </div>

    <div class="col-md-12" style="background-color: #ffffff; margin-bottom: 20px;border-radius: 5px">
      <div class="col-md-3 " style="padding: 5px 0">
        <img src="../images/collagen-2.png" alt="" width="100%">
      </div>
      <div class="col-md-9 " style="padding-right: 0px;">
        <h3>Colageno</h3>


        <h4>Crear Capturadora para:</h4>

        <div>
          <button type="button" class="btn btn-success"  onclick=" location.href='../class/createCollagen.php' ">
            <span class="glyphicon glyphicon-edit"></span> Duplicar a Tab
          </button>&nbsp;&nbsp;
          <button type="button" class="btn btn-success"  onclick=" location.href='../class/createCollagen2.php' ">
            <span class="glyphicon glyphicon-edit"></span> Duplicar a Bajo Linea
          </button>

        </div>
      </div>
    </div>

    <div class="col-md-12" style="background-color: #ffffff; margin-bottom: 20px;border-radius: 5px">
      <div class="col-md-3 " style="padding: 5px 0">
        <img src="../images/fitcamp-3.png" alt="" width="100%">
      </div>
      <div class="col-md-9 " style="padding-right: 0px;">
        <h3>FitCamp</h3>


        <h4>Crear Capturadora para:</h4>

        <div>
          <button type="button" class="btn btn-success"  onclick=" location.href='../class/fitcamp.php' ">
            <span class="glyphicon glyphicon-edit"></span> Duplicar a Tab
          </button>&nbsp;&nbsp;
          <button type="button" class="btn btn-success"  onclick=" location.href='../class/fitcamp2.php' ">
            <span class="glyphicon glyphicon-edit"></span> Duplicar a Bajo Linea
          </button>
        </div>
      </div>
    </div>

    <div class="col-md-12" style="background-color: #ffffff; margin-bottom: 20px;border-radius: 5px">
      <div class="col-md-3 " style="padding: 5px 0">
        <img src="../images/bodyscan-2.jpg" alt="" width="100%">
      </div>
      <div class="col-md-9 " style="padding-right: 0px;">
        <h3>Body Scan (Scanner Corporal)</h3>


        <h4>Crear Capturadora para:</h4>

        <div>
          <button type="button" class="btn btn-success"  onclick=" location.href='../class/bodyscan.php' ">
            <span class="glyphicon glyphicon-edit"></span> Duplicar a Tab
          </button>&nbsp;&nbsp;
          <button type="button" class="btn btn-success"  onclick=" location.href='../class/bodyscan2.php' ">
            <span class="glyphicon glyphicon-edit"></span> Duplicar a Bajo Linea
          </button>
        </div>
      </div>
    </div>


  </div> 
</div>


<?php 

} elseif ($tipo_usu == "Lider") {

  ?>
  

    <div class="col-md-12" style="background-color: #ffffff; margin-bottom: 20px;border-radius: 5px">
      <div class="col-md-3 " style="padding: 5px 0">
        <img src="../images/3daytrial-2.png" alt="" width="100%">
      </div>
      <div class="col-md-9 " style="padding-right: 0px;">
        <h3>Reto de 3 días</h3>


        <h4>Crear Capturadora para:</h4>

        <div>
          <button type="button" class="btn btn-success"  onclick=" location.href='../class/create3daytrial.php' ">
            <span class="glyphicon glyphicon-edit"></span> Duplicar
          </button>&nbsp;&nbsp;
          <button type="button" class="btn btn-success"  onclick=" location.href='../class/create3daytrial2.php' ">
            <span class="glyphicon glyphicon-edit"></span> Duplicar a Bajo Linea
          </button>

        </div>
      </div>
    </div>

    <div class="col-md-12" style="background-color: #ffffff; margin-bottom: 20px;border-radius: 5px">
      <div class="col-md-3 " style="padding: 5px 0">
        <img src="../images/3daytrial-2.png" alt="" width="100%">
      </div>
      <div class="col-md-9 " style="padding-right: 0px;">
        <h3>Reto de 7 días</h3>


        <h4>Crear Capturadora para:</h4>

        <div>
          <button type="button" class="btn btn-success"  onclick=" location.href='../class/create7daytrial.php' ">
            <span class="glyphicon glyphicon-edit"></span> Duplicar
          </button>&nbsp;&nbsp;
          <button type="button" class="btn btn-success"  onclick=" location.href='../class/create7daytrial2.php' ">
            <span class="glyphicon glyphicon-edit"></span> Duplicar a Bajo Linea
          </button>

        </div>
      </div>
    </div>

    <div class="col-md-12" style="background-color: #ffffff; margin-bottom: 20px;border-radius: 5px">
      <div class="col-md-3 " style="padding: 5px 0">
        <img src="../images/collagen-2.png" alt="" width="100%">
      </div>
      <div class="col-md-9 " style="padding-right: 0px;">
        <h3>Colageno</h3>


        <h4>Crear Capturadora para:</h4>

        <div>
          <button type="button" class="btn btn-success"  onclick=" location.href='../class/createCollagen.php' ">
            <span class="glyphicon glyphicon-edit"></span> Duplicar
          </button>&nbsp;&nbsp;
          <button type="button" class="btn btn-success"  onclick=" location.href='../class/createCollagen2.php' ">
            <span class="glyphicon glyphicon-edit"></span> Duplicar a Bajo Linea
          </button>

        </div>
      </div>
    </div>

    <div class="col-md-12" style="background-color: #ffffff; margin-bottom: 20px;border-radius: 5px">
      <div class="col-md-3 " style="padding: 5px 0">
        <img src="../images/fitcamp-3.png" alt="" width="100%">
      </div>
      <div class="col-md-9 " style="padding-right: 0px;">
        <h3>FitCamp</h3>


        <h4>Crear Capturadora para:</h4>

        <div>
          <button type="button" class="btn btn-success"  onclick=" location.href='../class/fitcamp.php' ">
            <span class="glyphicon glyphicon-edit"></span> Duplicar
          </button>&nbsp;&nbsp;
          <button type="button" class="btn btn-success"  onclick=" location.href='../class/fitcamp2.php' ">
            <span class="glyphicon glyphicon-edit"></span> Duplicar a Bajo Linea
          </button>
        </div>
      </div>
    </div>

    <div class="col-md-12" style="background-color: #ffffff; margin-bottom: 20px;border-radius: 5px">
      <div class="col-md-3 " style="padding: 5px 0">
        <img src="../images/bodyscan-2.jpg" alt="" width="100%">
      </div>
      <div class="col-md-9 " style="padding-right: 0px;">
        <h3>Body Scan</h3>


        <h4>Crear Capturadora para:</h4>

        <div>
          <button type="button" class="btn btn-success"  onclick=" location.href='../class/bodyscan.php' ">
            <span class="glyphicon glyphicon-edit"></span> Duplicar
          </button>&nbsp;&nbsp;
          <button type="button" class="btn btn-success"  onclick=" location.href='../class/bodyscan2.php' ">
            <span class="glyphicon glyphicon-edit"></span> Duplicar a Bajo Linea
          </button>
        </div>
      </div>
    </div>

  </div> 
</div>

 
<?php 

} elseif ($tipo_usu == "Usuario") {

  ?>
  

    <div class="col-md-12" style="background-color: #ffffff; margin-bottom: 20px;border-radius: 5px">
      <div class="col-md-3 " style="padding: 5px 0">
        <img src="../images/3daytrial-2.png" alt="" width="100%">
      </div>
      <div class="col-md-9 " style="padding-right: 0px;">
        <h3>Reto de 3 días</h3>

        <div>
          <button type="button" class="btn btn-success"  onclick=" location.href='../class/create3daytrial2.php' ">
            <span class="glyphicon glyphicon-edit"></span> Duplicar
          </button>

        </div>
      </div>
    </div>

    <div class="col-md-12" style="background-color: #ffffff; margin-bottom: 20px;border-radius: 5px">
      <div class="col-md-3 " style="padding: 5px 0">
        <img src="../images/3daytrial-2.png" alt="" width="100%">
      </div>
      <div class="col-md-9 " style="padding-right: 0px;">
        <h3>Reto de 7 días</h3>

        <div>
          <button type="button" class="btn btn-success"  onclick=" location.href='../class/create7daytrial2.php' ">
            <span class="glyphicon glyphicon-edit"></span> Duplicar
          </button>

        </div>
      </div>
    </div>

    <div class="col-md-12" style="background-color: #ffffff; margin-bottom: 20px;border-radius: 5px">
      <div class="col-md-3 " style="padding: 5px 0">
        <img src="../images/collagen-2.png" alt="" width="100%">
      </div>
      <div class="col-md-9 " style="padding-right: 0px;">
        <h3>Colageno</h3>

        <div>
          <button type="button" class="btn btn-success"  onclick=" location.href='../class/createCollagen2.php' ">
            <span class="glyphicon glyphicon-edit"></span> Duplicar
          </button>

        </div>
      </div>
    </div>

    <div class="col-md-12" style="background-color: #ffffff; margin-bottom: 20px;border-radius: 5px">
      <div class="col-md-3 " style="padding: 5px 0">
        <img src="../images/fitcamp-3.png" alt="" width="100%">
      </div>
      <div class="col-md-9 " style="padding-right: 0px;">
        <h3>FitCamp</h3>

        <div>
          <button type="button" class="btn btn-success"  onclick=" location.href='../class/fitcamp2.php' ">
            <span class="glyphicon glyphicon-edit"></span> Duplicar
          </button>
        </div>
      </div>
    </div>

    <div class="col-md-12" style="background-color: #ffffff; margin-bottom: 20px;border-radius: 5px">
      <div class="col-md-3 " style="padding: 5px 0">
        <img src="../images/bodyscan-2.jpg" alt="" width="100%">
      </div>
      <div class="col-md-9 " style="padding-right: 0px;">
        <h3>Body Scan</h3>

        <div>
          <button type="button" class="btn btn-success"  onclick=" location.href='../class/bodyscan2.php' ">
            <span class="glyphicon glyphicon-edit"></span> Duplicar
          </button>
        </div>
      </div>
    </div>

  </div> 
</div>

 
<?php 

}


 ?>