<?php
session_start();
        //validamos de que alla una sesion active
        if (isset($_SESSION['login']) && $_SESSION['login']==true) {
        	$name_user = $_SESSION['name'];
            }
            else{
                echo "<script> 
                alert('no puedes acceder')
                window.location='../'
                </script>";
                exit;
            }


require('../conetion.php');

if (isset($_GET['id']) && !empty($_GET['id'])) {
  

  $id_coach = $_GET['id'];

    if ($result = $conexion->query("DELETE FROM coachleads WHERE id ='$id_coach'")) {
      echo "<script>  alert('Se ha eliminado Satisfactoriamente el Bajo Linea');
      window.location='../cpanel/panel.php'; </script>";

    } else {
      echo "<script>  alert('Bajo lines no existe en la Base de datos'); </script>";

    }


}else{

echo "<script>  window.location='../cpanel/panel.php'; </script>";

}
?>
