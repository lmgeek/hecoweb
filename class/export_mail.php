<?php 

if (isset($_GET['id_coach']) &&!empty($_GET['id_coach'])) {
	# code...

		$id_coach = $_GET['id_coach'];


	header("Content-Type: text/html;charset=utf-8");


	//conection: 
	include("../conetion.php");
	 
	/**1.  consultar sap_maestro_cartera_v3 **/
	$RsSql = $conexion->query("SELECT * FROM emails WHERE id_coach = '".$id_coach."' ORDER BY 1");
	if ($RsSql->num_rows == 0) {
		?>
		<script>
			alert('No esisten valores en la Base de datos');
			history.back();
		</script>
<?php
	} else {

		$result2 = $conexion->query("SELECT * FROM coach WHERE id = ".$id_coach);
	    if ($result2->num_rows > 0) {
	      $row2 = $result2->fetch_assoc();
	      $nameto = $row2['name'];
	    }else{
	      $result3 = $conexion->query("SELECT * FROM coachleads WHERE id = ".$id_coach);
	      if ($result3->num_rows > 0) {
	        $row3 = $result3->fetch_assoc();
	        $nameto = $row3['name'];
	      }
	    }



		$Name = 'Mailist-_-'.$nameto.'-_-'.$web.'.csv';
		$FileName = "./$Name";
		$Datos = 'Firstname;Lastname;Email;Phone;Web';
		$Datos .= "\r\n";

		//Descarga el archivo desde el navegador
		header('Expires: 0');
		header('Cache-control: private');
		header('Content-Type: application/x-octet-stream'); // Archivo de Excel
		header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
		header('Content-Description: File Transfer');
		header('Last-Modified: '.date('D, d M Y H:i:s'));
		header('Content-Disposition: attachment; filename="'.$Name.'"');
		header("Content-Transfer-Encoding: binary");



		while($oRow = mysqli_fetch_object($RsSql) ){
	    $Datos .= "$oRow->firstname;$oRow->lastname;$oRow->email;$oRow->phone;$oRow->web;    ";
	    $Datos .= "\r\n"; 
		}#end while
		echo $Datos;
		}


}else{
	echo "<script>  history.back(); </script>";
}

//ALTER TABLE `emails` MODIFY `phone` BIGINT 
?>