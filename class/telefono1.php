<?php
include("../conetion.php");
$id_coach = $_POST['id_coach_lead'];

$result = $conexion->query("SELECT * FROM coachleads WHERE id = ".$id_coach);
	echo '<label for="name">Seleccione Teléfono</label><br>';
    $row = $result->fetch_assoc();
    echo '<input type="checkbox" name="telf[]" value="'.$row['phone'].'"/> '.$row['phone'].' <br/>';
    echo '<input type="checkbox" name="telf[]" value="'.$row['phone2'].'"/> '.$row['phone2'].' <br/>';
    echo '<input type="checkbox" name="telf[]" value="'.$row['phone3'].'"/> '.$row['phone3'].' <br/>';
    
?>

