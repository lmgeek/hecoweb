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

$result = $conexion->query("SELECT * FROM coachleads
                            WHERE id_coach = ".$id_coach." ORDER BY name ASC");


$result2 = $conexion->query("SELECT * FROM coach
                            WHERE id = ".$id_coach);
$row2 = $result2->fetch_assoc();
$coach = $row2['name'];

if ($result->num_rows > 0) {
	?>

      <br><br>
      <h3 align="center"><strong><i>Entrenador Asociado:</i></strong> <?php echo $coach; ?></h3><br>
	<table width="100%" class="table-hover" style="background: #fff;">
	        <tr align="center">
	          <td><strong>ID Entrenador</strong></td>
	          <td><i class="glyphicon glyphicon-user"></i>&nbsp;&nbsp;<strong>Nombre</strong></td>
	          <td><i class="glyphicon glyphicon-phone"></i>&nbsp;&nbsp;<strong>Teléfono</strong></td>
	          <td><i class="glyphicon glyphicon-envelope"></i>&nbsp;&nbsp;<strong>Email</strong></td>
	          <td><i class="glyphicon glyphicon-hand-down"></i>&nbsp;&nbsp;<strong>Acción</strong></td>
	        </tr>
	        <?php 
    while ($row = $result->fetch_assoc()) {    
    	$coach_id = $row['id'];
    	echo "<tr><td colspan='5'>&nbsp;</td></tr>";
        echo '<tr align="center">
                  <td>'.$row['id'].'</td>
                  <td>'.$row['name'].'</td>
                  <td>'.$row['phone'].'<br>'.$row['phone2'].'<br>'.$row['phone3'].'</td>
                  <td>'.$row['email'].'</td>
                  <td><a href="../class/editdownline.php?id='.$row['id'].'" class="btn btn-success"><i class="glyphicon glyphicon-pencil"></i>&nbsp;&nbsp;Editar</a>&nbsp;
                  <a href="downlinewebs.php?downline='.$row['id'].'" class="btn btn-success"><i class="fa fa-eye" aria-hidden="true"></i>&nbsp;&nbsp;&nbsp;Ver Websites</a></td>
                </tr>';

    }
    ?>
	
	

	</table>


	<?php 
}else {
	?><center>
		<br><br>
		<h3><strong><i>Entrenador Asociado:</i></strong> <?php echo $coach; ?></h3><br><br>
		<div class="alert alert-danger">
			<h3><strong>No hay datos relacionados.</strong></h3>
		</div>
	  </center>
	<?php 
}
?>

