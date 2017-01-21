<?php 

$my_ip = $_SERVER["REMOTE_ADDR"]; 

echo $my_ip;/*
include("../conexion.php");

$con = mysql_connect ("$host_db","$user_db","$pass_db") or die ("No se puede conectar con el servidor SQL"); # Me conecto a la BD
mysql_select_db ("$name_db_temp") or die ("No se puede seleccionar base de datos."); # Abro la base de datos 

$mysql = ("INSERT INTO auditoria SET nombre='$nombre', ip='$my_ip'");
mysql_query($mysql); 

//Los campos "nombre" e "ip" son los nombres que tienes en la bd en Mysql...
?>