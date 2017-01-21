<?php
    session_start();
    //validamos de que alla una sesion active
    if (isset($_SESSION['login']) && $_SESSION['login']==true) {
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
<div class="container">
    <div class="row">
        <form action="newcoach.php" method="POST">
            <h3>Registrar Entrenador</h3>
<br>
          <div class="form-group col-xs-6">
          <label for="name">Nombre Completo
            <div class="inner-addon left-addon">
              <i class="glyphicon glyphicon-user"></i>
              <input type="text" class="form-control" placeholder="Example: Luis Marín"  id="name" name="name" required/>
            </div>

            <label for="phone">Teléfono
            <div class="inner-addon left-addon">
              <i class="glyphicon glyphicon-phone"></i>
              <input type="text" class="form-control" placeholder="Example: +11234567890"  id="phone" name="phone" required/>
            </div>

            <label for="phone">Teléfono 2
            <div class="inner-addon left-addon">
              <i class="glyphicon glyphicon-phone"></i>
              <input type="text" class="form-control" placeholder="Example: +11234567890"  id="phone" name="phone2" />
            </div>

            <label for="phone">Teléfono 3
            <div class="inner-addon left-addon">
              <i class="glyphicon glyphicon-phone"></i>
              <input type="text" class="form-control" placeholder="Example: +11234567890"  id="phone" name="phone3" />
            </div>

            <label for="email">Email</label>
            <div class="inner-addon left-addon">
              <i class="glyphicon glyphicon-envelope"></i>
              <input type="email" class="form-control" placeholder="Example: name@mail.com"  id="email" name="email" required/>
            </div>

            <input type="submit" class="btn btn-success" value="Registrar">
                
          </div>
            

        </form>
    </div>
</div>