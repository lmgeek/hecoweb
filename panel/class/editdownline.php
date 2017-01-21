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


<?php 


if (isset($_POST['name']) && isset($_POST['id']) && isset($_POST['phone'])  && isset($_POST['email'])
  && !empty($_POST['name']) && !empty($_POST['id']) && !empty($_POST['phone'])  && !empty($_POST['email'])){

//aqui resivimos los valores
$id = $_POST['id'];
$name = $_POST['name'];
$phone = $_POST['phone'];

if (isset($_POST['phone2']) && !empty($_POST['phone2'])) {
  $phone2 = $_POST['phone2'];
}else{
  $phone2 = "";
}

if (isset($_POST['phone3']) && !empty($_POST['phone3'])) {
  $phone3 = $_POST['phone3'];
}else{
  $phone3 = "";
}

$email = $_POST['email'];

    if ($conexion->query("UPDATE `coachleads` SET `name` = '".$name."',`phone` = '".$phone."',`phone2` = '".$phone2."',`phone3` = '".$phone3."',`email` = '".$email."' WHERE `id` = ".$id) == TRUE) {
      echo '<script>alert("Entrenador Actualizado Satisfactoriamente!");
      window.location="../panel/panel.php";
      </script>';
    }else{
      echo '<script>
          alert("Error al Actualizar!"); 
          history.back();
        </script>';
    }



}else{

  if (isset($_GET['id']) && !empty($_GET['id'])) {
    $idcoach = $_GET['id'];
     ?>
     <div class="container">
      <div class="row">
          <form action="editdownline.php" method="POST">
              <!--<h3>Create a New Downline</h3>-->
              <h3>Editar Entrenador Bajo Linea</h3>
  <br>
            <div class="form-group col-xs-6">
                    <?php
                    $resultado = $conexion->query("SELECT * FROM coachleads WHERE id = ".$idcoach);
                    if ($resultado->num_rows > 0)
                      $row = $resultado->fetch_assoc();
                        
                      
                    //mysql_close($conexion);
                    ?>
            <input type="hidden" value="<?php echo $idcoach ?>" name="id">

            <label for="name">Nombre y Apellido</label>
              <div class="inner-addon left-addon">
                <i class="glyphicon glyphicon-user"></i>
                <input type="text" class="form-control" value="<?php echo $row['name']; ?>"  id="name" name="name" required/>
              </div>

              <label for="phone">Teléfono 1</label>
              <div class="inner-addon left-addon">
                <i class="glyphicon glyphicon-phone"></i>
                <input type="text" class="form-control" value="<?php echo $row['phone']; ?>""  id="phone" name="phone" required/>
              </div>

              <label for="phone">Teléfono 2</label>
              <div class="inner-addon left-addon">
                <i class="glyphicon glyphicon-phone"></i>
                <input type="text" class="form-control" value="<?php echo $row['phone2']; ?>""  id="phone2 name="phone2" />
              </div>

              <label for="phone">Teléfono 3</label>
              <div class="inner-addon left-addon">
                <i class="glyphicon glyphicon-phone"></i>
                <input type="text" class="form-control" value="<?php echo $row['phone3']; ?>""  id="phone3 name="phone3" />
              </div>

              <label for="email">Email</label>
              <div class="inner-addon left-addon">
                <i class="glyphicon glyphicon-envelope"></i>
                <input type="email" class="form-control" value="<?php echo $row['email']; ?>""  id="email" name="email" required/>
              </div>

              <button type="submit" class="btn btn-success" value="Crear">Editar y Guardar&nbsp;&nbsp;<span class="glyphicon glyphicon-save"></span></button>
                  
            </div>
              

          </form>
      </div>
  </div>
  <?php 
   

   }else{
    header("location:../panel/panel.php");
   }


}

  ?>