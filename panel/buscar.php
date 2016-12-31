<?php
 
      $buscar = $_POST['b'];
       
      if(!empty($buscar)) {
            buscar($buscar);
      }
       
      function buscar($b) {
            $con = mysql_connect('localhost','thrdaytr_oportun', 'oportunidadhbl');
            mysql_select_db('thrdaytr_promocionhbl', $con);
       
            $sql = mysql_query("SELECT * FROM coach WHERE name LIKE '%".$b."%'",$con);
             
            $contar = mysql_num_rows($sql);
             
            if($contar == 0){
                  echo "No se han encontrado resultados para '<b>".$b."</b>'.";
            }else{
                  while($row=mysql_fetch_array($sql)){
                        $nombre = $row['name'];
                        $id = $row['id'];
                         
                        echo $id." - ".$nombre."<br /><br />";    
                  }
            }
      }
       
?>