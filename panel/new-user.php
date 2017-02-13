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
    

    <style media="screen" type="text/css">
    #div1 {

  display: none;
}

#div2 {

  display: none;
}
  </style>
  <script type="text/javascript">
      function desaparecer(objeto, caida){
          $(objeto).animate({
              opacity: 0.0,
              marginTop: caida,
          }, 500 ).hide("slow");
      }
     
      function aparecer(objeto, caida){
          $(objeto)
              .animate({
                  opacity: '0.0',
                  marginTop: "-"+caida,
              }, 10 ).show()
              .animate({
                  opacity: '1.0',
                  marginTop: "0",
              }, 1000 );
      }
 </script>



</head>
<body>
<input type="button" class="btn btn-success" onClick="javascript:aparecer('#div1', '10%'); return false;" onfocus="javascript:desaparecer('#div2', '10%'); return false;" value="Usuario Tab">
&nbsp;&nbsp;&nbsp;&nbsp;
<input type="button" class="btn btn-success" onclick="javascript:aparecer('#div2', '10%'); return false;" onfocus="javascript:desaparecer('#div1', '10%'); return false;" value="Usuario Bajo Linea">

<div id="div1">

<div class="row" style="margin-top: 20px;">
        <form action="../register.php" method="POST">
            <h3>Registrar Ususario HECOWEB</h3>
<br>
          <div class="form-group col-xs-6">
          <label for="coach">Selecione un Entrenador Asociado</label>
            <div class="inner-addon left-addon">
              <select name="id_coach_lead"  class="form-control" required>
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

            <label for="user">Usuario</label>
            <div class="inner-addon left-addon">
              <i class="glyphicon glyphicon-user"></i>
              <input type="text" class="form-control" placeholder="Example: luismarin"  id="user" name="user" required/>
            </div>

            <label for="passwords">Contraseña</label>
            <div class="inner-addon left-addon">
              <i class="glyphicon glyphicon-asterisk"></i>
              <input type="password" class="form-control" placeholder="**********"  id="password" name="password" required/>
            </div>

            <input type="hidden" name="tipo_usu" value="2">
<!--
            <label for="coach">Selecione un Entrenador Asociado</label>
            <div class="inner-addon left-addon">
              <select name="tipo_usu"  class="form-control" required>
                <option value="">Seleccione Tipo de Usuario</option>
                <option value="1">Administrador</option>
                <option value="2">Lider de Negocio</option>
              </select>
            </div>                
-->
            <input type="submit" class="btn btn-success" value="Registrar >"/>
                
          </div>
            

        </form>
      </div>



    </div>



<div id="div2">

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

  
  <div class="row" style="margin-top: 20px;">
        <form action="../register.php" method="POST">
            <h3>Registrar Ususario Bajo Linea HECOWEB</h3>
<br>
          <div class="form-group col-xs-6">
          <label for="name">Selecione un Entrenador Asociado</label>
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

            <label for="user">Usuario</label>
            <div class="inner-addon left-addon">
              <i class="glyphicon glyphicon-user"></i>
              <input type="text" class="form-control" placeholder="Example: luismarin"  id="user" name="user" required/>
            </div>

            <label for="passwords">Contraseña</label>
            <div class="inner-addon left-addon">
              <i class="glyphicon glyphicon-asterisk"></i>
              <input type="password" class="form-control" placeholder="**********"  id="password" name="password" required/>
            </div>

            <input type="hidden" name="tipo_usu"  value="2" required>

            <input type="submit" class="btn btn-success" value="Registrar >"/>
                
          </div>
            

        </form>
      </div>


</div>
</div>