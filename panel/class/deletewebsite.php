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

function delete_directory($dir){
  if ($handle = opendir($dir)){
      while (false !== ($file = readdir($handle))) {
          if ($file != "." && $file != "..") {
              if(is_dir($dir.$file)){
                  if(!@rmdir($dir.$file)) // Empty directory? Remove it
                  {
                  delete_directory($dir.$file.'/'); // Not empty? Delete the files inside it
                  }
              }
              else{
                 @unlink($dir.$file);
              }
          }
      }
      closedir($handle);
      @rmdir($dir);
  }
}


if (isset($_GET['id']) && isset($_GET['dirname']) &&
  !empty($_GET['id']) && !empty($_GET['dirname'])) {
  

  $id_coach = $_GET['id'];
  $dir_name = $_GET['dirname'];
  $dir = $_GET['dirname']."/";

    if ($result = $conexion->query("DELETE FROM webcoach WHERE id ='$id_coach'")) {
      delete_directory($dir);
      echo "<script>  alert('Capturadora eliminada Satisfactoriamente');
      window.location='../panel/panel.php'; </script>";

    } else {
      //echo "<script>  alert('Don\'t Exist Website in Database'); </script>";
      echo "<script>  alert('No Existen datos relacionados en la Base de Datos'); </script>";

    }


}else{

echo "<script>  window.location='../panel/panel.php'; </script>";

}
?>
