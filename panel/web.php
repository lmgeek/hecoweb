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
$idcoach = $row2['id'];
$coach = $row2['name'];

if ($result->num_rows > 0) {
	?>
<!DOCTYPE html>
<html lang="es">

	<meta charset="UTF-8">
	<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
	<title>Panel</title>
	<link rel="stylesheet" href="../css/style2.css">
	<link href="../css/bootstrap.css" rel="stylesheet">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js" type="text/javascript"></script>
<script language="javascript">
$(document).ready(function(){
   $("#webs").change(function () {
           $("#webs option:selected").each(function () {
            id = $(this).val();
            id_coach = "<?php echo $idcoach; ?>";
            $.post("webs.php", { id: id, id_coach: id_coach }, function(data){
                $("#subwebs").html(data);
            });            
        });
   })
});
</script>


<div class="container">
    <div class="row">
          <div class="form-group col-xs-6">
          <label for="name">Selecione Entrenador Bajo Linea</label>
            <div class="inner-addon left-addon">

              <select name="webs" id="webs" class="form-control">
                <option value="">>-----------------Seleccinar Entrenador--------------<</option>
                  <?php
                    while ($row = $result->fetch_assoc()) {                
                        echo '<option value="'.$row['id'].'">'.$row['name'].'</option>';
                    }
                  ?>
              </select>
            </div>

            
    </div>
</div>

</div> 


<div name="subwebs" id="subwebs"></div>

	<?php 
}else {

	$result3 = $conexion->query("SELECT * FROM webcoach WHERE coach = ".$id_coach);
	if ($result->num_rows > 0) {
		$row3 = $result3->fetch_assoc();
		$web = $row3['web'];
		$dir_name = $row3['dir_name'];
		$country = $row3['country'];


		?>


		<br><br>
	      <h3 align="center"><strong><i>Entrenador Asociado:</i></strong> <?php echo $coach; ?></h3><br>
		<table width="100%" class="table-hover" style="background: #fff;">
	        <tr align="center">
	          <td><strong>ID Coach</strong></td>
	          <td><i class="glyphicon glyphicon-user"></i>&nbsp;&nbsp;<strong>Nombre</strong></td>
	          <td><i class="glyphicon glyphicon-globe"></i>&nbsp;&nbsp;<strong>Capturadora</strong></td>
	          <td><i class="glyphicon glyphicon-globe"></i>&nbsp;&nbsp;<strong>País</strong></td>
	          <td><i class="glyphicon glyphicon-hand-down"></i>&nbsp;&nbsp;<strong>Acción</strong></td>
	          <td>&nbsp;</td>
	        </tr>
	        <?php 
	    	$coach_id = $row['id'];
	    	echo "<tr><td colspan='5'>&nbsp;</td></tr>";
	        echo '<tr align="center">
				        <td>'.$id_coach.'</td>
				        <td>'.$coach.'</td>
				        <td>'.$row3['web'].'</td>
				        <td>'.$row3['country'].'</td>
				        <td><a href="../class/deletewebsite.php?id_coach='.$id_coach.'" class="btn btn-success"><i class="glyphicon glyphicon-trash"></i> Delete Web</a></td>
				      </tr>
				    </table>';
	}else{
	?>

	<center>
		<br><br>
		<h3><strong><i>Coach:</i></strong> <?php echo $coach; ?></h3><br><br>
		<div class="alert alert-danger">
		<h3><strong>No hay Capturadoras relacionadas</strong></h3>
		</div>
	  </center>
	<?php 
	}
}
?>

