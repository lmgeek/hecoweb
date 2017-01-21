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
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js" type="text/javascript"></script>
<script language="javascript">
$(document).ready(function(){
   $("#category").change(function () {
           $("#category option:selected").each(function () {
            id = $(this).val();
            $.post("subcategorias2.php", { id: id }, function(data){
                $("#subcategory").html(data);
            });            
        });
   })
});
</script>

<?php 
if ($tipo_usu == "Administrador") {
   ?>



<div class="container">
    <div class="row text-center" >
    
            <h3>Lista de Correos</h3>
<br>
          <div class="form-group col-xs-6">
          <label for="name">Seleccionar Entrenador<label>
            <div class="inner-addon left-addon">
              <select name="category" id="category" class="form-control">
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

            
    </div>
</div>
</div> 
<div name="subcategory" id="subcategory"></div>


<?php 
 
 } elseif ($tipo_usu == "Lider") {


    $id_coach = $id_name;

    $result = $conexion->query("SELECT * FROM coachleads
                                WHERE id_coach = ".$id_coach." ORDER BY name ASC");


    $result2 = $conexion->query("SELECT * FROM coach
                                WHERE id = ".$id_coach);
    $row2 = $result2->fetch_assoc();
    $coach = $row2['name'];

    if ($result->num_rows > 0) {
      ?>

  
      <h3 align="center"><strong><i>Entrenador:</i></strong> <?php echo $coach; ?></h3><br>
      <center>
    <?php echo "<a href='../class/export_mail.php?id_coach=$id_coach' class='btn btn-success'><i class='glyphicon glyphicon-download-alt'></i> Descargar Lista de Correo</a>";  ?>
  </center>
      <br><br>
  <table width="100%" class="table-hover" style="background: #fff;border-radius: 5px;">
          <tr align="center">
            <td><strong>ID Entrenador</strong></td>
            <td><i class="glyphicon glyphicon-user"></i>&nbsp;&nbsp;<strong>Nombre</strong></td>
            <td><i class="glyphicon glyphicon-phone"></i>&nbsp;&nbsp;<strong>Telefonovs</strong></td>
            <td><i class="glyphicon glyphicon-envelope"></i>&nbsp;&nbsp;<strong>Email</strong></td>
            <td>&nbsp;</td>
          </tr>
          <?php 
    while ($row = $result->fetch_assoc()) {    
      $coach_id = $row['id'];
      echo "<tr><td colspan='5'>&nbsp;</td></tr>";
        echo '<tr align="center">
              <td>'.$row['id'].'</td>
              <td>'.$row['name'].'</td>
              <td>'.$row['phone'].'</td>
              <td>'.$row['email'].'</td>
              <td><a href="../class/export_mail.php?id_coach='.$coach_id.'" class="btn btn-success"><i class="glyphicon glyphicon-download-alt"></i> Descargar Lista de Correo</a></td>
            </tr>';

    }
    ?>
  
  

  </table>
  <br><br>
  <center><h3>This Mail List has Downloader in CSV Format, open in Ms Office Excel or Libre Office Calc</h3></center>


  <?php 
}else {
  ?><center>
    
    <center>
    <?php echo "<a href='../class/export_mail.php?id_coach=$id_coach' class='btn btn-success'><i class='glyphicon glyphicon-download-alt'></i> Descargar Lista de Correo</a>";  ?>
  </center>
    <br><br>
    <h3><strong><i>Entrenador Asociado:</i></strong> <?php echo $coach; ?></h3><br><br>
    <h3><strong>No hay datos asociados con la  Base de datos</strong></h3>
    </center>
  <?php 
}



 }  elseif ($tipo_usu == "Usuario") {


    $id_coach = $id_name;

    $result = $conexion->query("SELECT * FROM coachleads
                                WHERE id_coach = ".$id_coach." ORDER BY name ASC");


    $result2 = $conexion->query("SELECT * FROM coachleads
                                WHERE id = ".$id_coach);
    $row2 = $result2->fetch_assoc();
    $coach = $row2['name'];

    if ($result->num_rows > 0) {
      ?>

  
      <h3 align="center"><strong><i>Entrenador:</i></strong> <?php echo $coach; ?></h3><br>
      <center>
    <?php echo "<a href='../class/export_mail.php?id_coach=$id_coach' class='btn btn-success'><i class='glyphicon glyphicon-download-alt'></i> Descargar Lista de Correo</a>";  ?>
  </center>
      <br><br>
  <table width="100%" class="table-hover" style="background: #fff;border-radius: 5px;">
          <tr align="center">
            <td><strong>ID Entrenador</strong></td>
            <td><i class="glyphicon glyphicon-user"></i>&nbsp;&nbsp;<strong>Nombre</strong></td>
            <td><i class="glyphicon glyphicon-phone"></i>&nbsp;&nbsp;<strong>Telefonovs</strong></td>
            <td><i class="glyphicon glyphicon-envelope"></i>&nbsp;&nbsp;<strong>Email</strong></td>
            <td>&nbsp;</td>
          </tr>
          <?php 
    while ($row = $result->fetch_assoc()) {    
      $coach_id = $row['id'];
      echo "<tr><td colspan='5'>&nbsp;</td></tr>";
        echo '<tr align="center">
              <td>'.$row['id'].'</td>
              <td>'.$row['name'].'</td>
              <td>'.$row['phone'].'</td>
              <td>'.$row['email'].'</td>
              <td><a href="../class/export_mail.php?id_coach='.$coach_id.'" class="btn btn-success"><i class="glyphicon glyphicon-download-alt"></i> Descargar Lista de Correo</a></td>
            </tr>';

    }
    ?>
  
  

  </table>
  <br><br>
  <center><h3>This Mail List has Downloader in CSV Format, open in Ms Office Excel or Libre Office Calc</h3></center>


  <?php 
}else {
  ?><center>
    
    <center>
    <?php echo "<a href='../class/export_mail.php?id_coach=$id_coach' class='btn btn-success'><i class='glyphicon glyphicon-download-alt'></i> Descargar Lista de Correo</a>";  ?>
  </center>
    <br><br>
    <h3><strong><i>Entrenador Asociado:</i></strong> <?php echo $coach; ?></h3><br><br>
    <h3><strong>No hay datos asociados con la  Base de datos</strong></h3>
    </center>
  <?php 
}



 }


 ?>





