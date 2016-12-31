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

include("../conetion.php");

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>My Pages</title>
  <link href="../css/bootstrap.css" rel="stylesheet">
<script language="JavaScript"> 
	function confirmar ( mensaje ) { 
		return confirm( mensaje ); 
	} 
</script>


      <br><br>
      <h3 align="center"><strong><i>Entrenador Asociado:</i></strong> <?php echo $coach; ?></h3><br>
	<table width="100%" class="table-hover" style="background: #fff;">
	        <tr align="center">
	          <td><strong>ID Entrenador</strong></td>
	          <td><i class="glyphicon glyphicon-user"></i>&nbsp;&nbsp;<strong>Nombre</strong></td>
	          <td><i class="glyphicon glyphicon-phone"></i>&nbsp;&nbsp;<strong>Teléfonos</strong></td>
	          <td><i class="glyphicon glyphicon-envelope"></i>&nbsp;&nbsp;<strong>Email</strong></td>
	          <td><i class="glyphicon glyphicon-hand-down"></i>&nbsp;&nbsp;<strong>Acción</strong></td>
	        </tr>
	        <?php 
	        $result = $conexion->query("SELECT * FROM coach");
    while ($row = $result->fetch_assoc()) {    
    	$coach_id = $row['id'];
    	echo "<tr><td colspan='5'>&nbsp;</td></tr>";
        echo '<tr align="center">
			        <td>'.$row['id'].'</td>
			        <td>'.$row['name'].'</td>
			        <td>'.$row['phone'].'<br>'.$row['phone2'].'<br>'.$row['phone3'].'</td>
			        <td>'.$row['email'].'</td>
			        <td><a href="../class/editcoach.php?id='.$row['id'].'" class="btn btn-success"><i class="glyphicon glyphicon-pencil"></i> Editar</a><br><br>
			        </td>
			      </tr>';

    }
    ?>
	
	

	</table>

