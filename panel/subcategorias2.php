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

$conexion = new mysqli('localhost', 'thrdaytr_oportun', 'oportunidadhbl', 'thrdaytr_promocionhbl');
$id_coach = $_POST['id'];

$result = $conexion->query("SELECT * FROM coachleads
                            WHERE id_coach = ".$id_coach." ORDER BY name ASC");


$result2 = $conexion->query("SELECT * FROM coach
                            WHERE id = ".$id_coach);
$row2 = $result2->fetch_assoc();
$coach = $row2['name'];

if ($result->num_rows > 0) {
	?>
	<center>
		<?php echo "<a href='../class/export_mail.php?id_coach=$id_coach' class='btn btn-success'><i class='glyphicon glyphicon-download-alt'></i> Descargar Lista de Correo</a>";  ?>
	</center>
      <br><br>
      <h3 align="center"><strong><i>Entrenador:</i></strong> <?php echo $coach; ?></h3><br>
	<table width="100%" class="table-hover" style="background: #fff;">
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
?>

