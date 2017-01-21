<?php 
       session_start();
    //validamos de que alla una sesion active
    if (isset($_SESSION['login']) && $_SESSION['login']==true) {
      }
      else{
        echo "<script> 
        alert('no puedes acceder')
        window.location='../'
        </script>";
        exit;
      }


if (isset($_GET['id_coach']) &&!empty($_GET['id_coach'])) {
	# code...

		$id_coach = $_GET['id_coach'];

/* vars for export */
// database record to be exported
$db_record = 'emails';
// filename for export
$csv_filename = 'MailList_'.$db_record.'_'.date('Y-m-d').'.csv';
// database variables
$hostname = "localhost";
$user = "thrdaytr_webapp";
$password = "pRf_&lue#LU7";
$database = "thrdaytr_planhbl";
// Database connecten voor alle services
mysql_connect($hostname, $user, $password)
or die('Could not connect: ' . mysql_error());
                    
mysql_select_db($database)
or die ('Could not select database ' . mysql_error());
// create empty variable to be filled with export data
$csv_export = '';
// query to get data from database
$query = mysql_query("SELECT * FROM ".$db_record."  WHERE id_coach =".$id_coach);
$contar = mysql_num_rows($query);
             
if($contar == 0){
      echo "<script>  alert('No email Data');  history.back(); </script>";
}else{
	$field = mysql_num_fields($query);
	// create line with field names
	for($i = 2; $i < $field; $i++) {
	  $csv_export.= mysql_field_name($query,$i).';';
	}
	// newline (seems to work both on Linux & Windows servers)
	$csv_export.= '
	';
	// loop through database query and fill export variable
	while($row = mysql_fetch_array($query)) {
	  // create line with field values
	  for($i = 2; $i < $field; $i++) {
	    $csv_export.= '"'.$row[mysql_field_name($query,$i)].'";';
	  } 
	  $csv_export.= '';  
	}

// Export the data and prompt a csv file for download
header("Content-type: text/x-csv");
header("Content-Disposition: attachment; filename=".$csv_filename."");
echo($csv_export);


}

}else{
	echo "<script>  history.back(); </script>";
}

//ALTER TABLE `emails` MODIFY `phone` BIGINT 
?>