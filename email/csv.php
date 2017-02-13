<?php 

if (isset($_GET['web']) && !empty($_GET['web']) && isset($_GET['id_name']) && !empty($_GET['id_name'])) {

	$web = $_GET['web'];
	$id_name = $_GET['id_name'];



	header("Content-Type: text/html;charset=utf-8");


	$Name = 'Reporte_UltimaCuotaPaga.csv';
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


	//conection: 
	include("../conetion.php");
	 
	/**1.  consultar sap_maestro_cartera_v3 **/
	$RsSql = $conexion->query("SELECT * FROM emails WHERE id_coach = ".$id_name." AND web = ".$web." ORDER BY 1");
	if ($RsSql->num_rows > 0) {
		while($oRow = mysqli_fetch_object($RsSql) ){
		    $Datos .= "$oRow->firstname;$oRow->lastname;$oRow->email;$oRow->phone;$oRow->web;    ";
		    $Datos .= "\r\n"; 
		}#end while
		echo $Datos;
	} else {
			echo "<script>
					alert('No esisten valores en la Base de datos');
					history.back();
				</script>";
		}
} else {
		echo "<script>
				history.back();
			</script>";
	}
?>