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
$id_coach = $_POST['id'];
$idcoach = $_POST['id_coach'];

$result = $conexion->query("SELECT * FROM webcoach
                            WHERE coach = ".$id_coach);


$result2 = $conexion->query("SELECT * FROM coach
                            WHERE id = ".$idcoach);
$row2 = $result2->fetch_assoc();
$coach = $row2['name'];

$result4 = $conexion->query("SELECT * FROM coachleads
                            WHERE id = ".$id_coach);
$row4 = $result4->fetch_assoc();
$coach2 = $row4['name'];


	?>
	<!DOCTYPE html>
<html lang="es">

	<meta charset="UTF-8">
	<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
	<title>Panel</title>
	<link rel="stylesheet" href="../css/style2.css">
	<link href="../css/bootstrap.css" rel="stylesheet">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

<script language="JavaScript"> 
	function confirmar ( mensaje ) { 
		return confirm( mensaje ); 
	} 
</script>

      <br><br>
      <h3 align="center"><strong><i>Entrenador Asociado:</i></strong> <?php echo $coach; ?></h3><br>
	<table width="100%" class="table-hover" style="background: #fff;">
	        <tr align="center">
	          <td><strong>ID Coach</strong></td>
	          <td><i class="glyphicon glyphicon-user"></i>&nbsp;&nbsp;<strong>Nombre</strong></td>
	          <td><i class="glyphicon glyphicon-globe"></i>&nbsp;&nbsp;<strong>Capturadora</strong></td>
	          <td><i class="glyphicon glyphicon-globe"></i>&nbsp;&nbsp;<strong>País</strong></td>
	          <td><i class="glyphicon glyphicon-hand-down"></i>&nbsp;&nbsp;<strong>Ación</strong></td>
	          <td>&nbsp;</td>
	        </tr>
	        <?php 
	    $result3 = $conexion->query("SELECT * FROM webcoach WHERE coach = ".$idcoach);
	    if ($result3->num_rows > 0) {
			while ($row3 = $result3->fetch_assoc()) {
				$dirname1 = $row3['dir_name'];
				$id = $row3['id'];
			    echo "<tr><td colspan='5'>&nbsp;</td></tr>";
		        echo '<tr align="center">
					        <td>'.$idcoach.'</td>
						    <td>'.$coach.'</td>
						    <td>'.$row3['web'].'</td>
						    <td>'.$row3['country'].'</td>
					        <td><a href="../class/deletewebsite.php?id='.$id.'&dirname='.$dirname1.'" onclick="return confirmar(\'¿Are you sure to delete the registry?\')" class="btn btn-success"><i class="glyphicon glyphicon-trash"></i> Delete Web</a></td>
					      </tr>';
			}
		}
	if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {    
    	$coach_id = $row['id'];
    	$dirname = $row['dir_name'];
    	echo "<tr><td colspan='5'>&nbsp;</td></tr>";
        echo '<tr align="center">
			        <td>'.$id_coach.'</td>
				    <td>'.$coach2.'</td>
				    <td>'.$row['web'].'</td>
				    <td>'.$row['country'].'</td>
			        <td><a href="../class/deletewebsite.php?id='.$coach_id.'&dirname='.$dirname.'" onclick="return confirmar(\'¿Are you sure to delete the registry?\')" class="btn btn-success"><i class="glyphicon glyphicon-trash"></i> Delete Web</a></td>
			      </tr>';

    }
    ?>
	</table>
	<?php 
}else {
	?>
	  <center>
	  <div class="alert alert-danger">
		<h3 style=""><strong>No hay datos relacionados con el Entrenador Bajo Linea Seleccionado</strong></h3>
		<br>
	</div>
	  </center>
	<?php 
}
?>

