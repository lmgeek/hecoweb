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
    <link rel="stylesheet" href="css/bootstrap.min.css">  
    
    <style>
      .container {
        margin-top: 70px;
      }
    </style>
    
  </head>

  <body>

    <div class="container text-center">
      <h3>Select a Idiom | Seleccione un idioma</h3>
      <div class="row">
        <div class="col-md-6 col-sm-6 col-xs-6">
          <h3>English / Ingles</h3>
          <a href="login-en.php"><img src="images/en.jpg" alt=""></a>
        </div>
        <div class="col-md-6 col-sm-6 col-xs-6">
          <h3>Spanish / Español</h3>
          <a href="login-es.php"><img src="images/es.jpg" alt=""></a>
        </div>
      </div>
    </div>

    
    <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

        <script src="js/index.js"></script>

    
    
  </body>
</html>
<?php } ?>