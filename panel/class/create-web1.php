<?php 


/******************************************************************************************************/
/**************************			CREA EL CLON DE 3 DAY TRIAL PACK 	 ******************************/
/******************************************************************************************************/























 //creamos directorio
 
        if(file_exists("./".$folder)){
            echo("EL NOMBRE DE ESTA CARPETA YA EXISTE<br>");
            //echo $mensaje;
        }else{
            mkdir("./".$folder, 0777);
            mkdir("./".$folder."/movil", 0777);
 
            //indicamos la ruta del fichero index.php
 
            $ruta = "./".$folder."/index.php";
            $ruta2 = "./".$folder."/movil/index.php";
 
            //Creamos el fichero index.php e introducimos el contenido del TextArea 
            $a = file_put_contents($ruta, $mensaje);
            $b = file_put_contents($ruta2, $mensaje2);
 
            if(!$a){echo "ERROR al insertar el fichero";}   
            if(!$b){echo "ERROR al insertar el fichero";}   
 
            echo "<a href=".$ruta.">ENLACE A: ".$folder."</a>";
            echo "<br/>";
            echo "<br/>";
            echo $ruta; 
            echo "<br/>";
            $host= $_SERVER["HTTP_HOST"];
            echo "http://" . $ruta;
            echo "<br>";
 
        } ?>