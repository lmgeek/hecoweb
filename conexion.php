<?
/*#Test de prueba MYSQL



#Los datos de acceso:

$hostname = "localhost";
$usuario = "thrdaytr_oportun";
$password = "oportunidadhbl";
$basededatos = "thrdaytr_promocionhbl";
$tabla = "users";


#Conectando con MySQL

$idconnect=mysql_connect("$hostname", "$usuario", "$password");

if ($idconnect==0)
echo "Lo sentimos, no se ha podido conectar con la MySQL";
else {
echo "Se logró conectar con MySQL";


#Conectando con la base de datos
            $dbconnect = mysql_select_db("$basededatos",$idconnect);
            if ($dbconnect==0)
            echo "Lo sentimos, no se ha podido conectar con la base datos:" . $basededatos;
            else
            {
            echo "Se logró conectar con la base de datos:" . $basededatos;


#Probando una tabla
                    $idresult=mysql_query ("SELECT count(*) from $tabla;",$idconnect);
                    if ($idresult==0) echo "Sentencia incorrecta llamado a tabla:" . $tabla;
                    else
                    {
                            $nregistrostotal=mysql_result ($idresult,0,0);
                            echo "Hay" . $nregistrostotal . "registros en la tabla:" . $tabla;
                            mysql_free_result($idresult);
                     }
            }


        }
mysql_close($idconnect);
*/
?>


<?php
    $conexion = mysql_pconnect('localhost', 'thrdaytr_oportun','oportunidadhbl');
    mysql_select_db('thrdaytr_promocionhbl', $conexion) or die (mysql_error());
    mysql_query ("SET NAMES 'utf8'");
?>
