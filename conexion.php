<?php
    $conexion = mysql_pconnect('localhost', 'thrdaytr_webapp','pRf_&lue#LU7');
    mysql_select_db('thrdaytr_planhbl', $conexion) or die (mysql_error());
    mysql_query ("SET NAMES 'utf8'");
?>
