<?php
include("../conetion.php");
$id_coach = $_POST['id'];

$result = $conexion->query("SELECT * FROM coachleads WHERE id_coach = ".$id_coach);
if ($result->num_rows > 0) {
	echo '<label for="name">Select Coach Leads</label>
	<select name="id_coach_lead" id="coach_lead" class="form-control" required>
                <option value="">>-----------------Select a Downline--------------<</option>';
    while ($row = $result->fetch_assoc()) {               
        echo '<option value="'.$row['id'].'">'.$row['name'].'</option>';
    }
    echo "</select>";


}else {
	echo 'Register a new Downline for continues<br>
			<a href="../cpanel/new-coach-leads.php" class="btn btn-success">Create  ></a>';
	
}
?>