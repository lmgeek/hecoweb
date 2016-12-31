<?php
//Base de datos
include("conetion.php");

//fecha de la exportación
$fecha = date("d-m-Y");
$resultado = $conexion->query("SELECT * FROM emails");


//Inicio de la instancia para la exportación en Excel
header('Content-type: application/vnd.ms-excel');
header("Content-Disposition: attachment; filename=Listado_$fecha.xls");
header("Pragma: no-cache");
header("Expires: 0");

echo "<table border=1> ";
echo "<tr> ";
echo     "<th>Cliente N</th> ";
echo 	"<th>Nombre</th> ";
echo 	"<th>Apellido</th> ";
echo 	"<th>email</th> ";
echo 	"<th>phone</th> ";
echo "</tr> ";

while($row = $resultado->fetch_assoc()){	

	$id_cliente = $row['id_coach'];
	$nombrec = $row['firstname'];
	$apellido = $row['lastname'];
	$email = $row['email'];
	$phone = $row['phone'];

	echo "<tr> ";
	echo 	"<td>".$id_cliente."</td> "; 
	echo 	"<td>".$nombrec."</td> "; 
	echo 	"<td>".$apellido."</td> "; 
	echo 	"<td>".$email."</td> "; 
	echo 	"<td>".$phone."</td> "; 
	echo "</tr> ";

}
echo "</table> ";
?>