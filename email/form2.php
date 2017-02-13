<?php 
        session_start();
        //validamos de que alla una sesion active
        if (isset($_SESSION['login']) && $_SESSION['login']==true) {
        	$id_name = $_SESSION['idname'];
        	$tipo_usu = $_SESSION['nivel'];
            }
            else{
                echo "<script> 
                alert('no puedes acceder')
                window.location='../'
                </script>";
                exit;
            }
            
include("../conetion.php");


if (isset($_GET['lista']) && !empty($_GET['lista'])) {
	
	$lista_web = $_GET['lista'];

	$result = $conexion->query("SELECT email FROM emails WHERE id_coach = '".$id_name."' AND web = '".$lista_web."'");
	if ($result->num_rows > 0) {

	}else{
		echo "<script>
			alert('No existen prospectos para esta web.');
			history.back();
		</script>";
	}

	?>
<!DOCTYPE html>
<html>
<head>
	<title>CK Editor</title>
	<script type="text/javascript" src="ckeditor.js"></script>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/bootstrap-theme.min.css">
	<script type="text/javascript" src="js/bootstrap.min.js"></script>
</head>
<body>
	<div class="container">
		<div class="jumbotrom">
			<h2>Mailing</h2>
			<form class="form-inline" method="POST" action="email2.php">
				<div class="form-group">
			      <label class="sr-only" for="lista">Lista de Correos:</label>
			      <input type="text" class="form-control" " id="lista" placeholder="Enter lista" value="<?php echo $result->num_rows; ?> Prospectos" readonly>
			      <input type="hidden" class="form-control" name="lista" value="<?php echo $lista_web; ?>" readonly>
			    </div>

			    <div class="form-group">
			      <label class="sr-only" for="name">Name:</label>
			      <input type="text" class="form-control" name="name" id="name" placeholder="Enter Name" value="<?php echo $lista_web; ?>">
			    </div>
			    
			    <div class="form-group">
			      <label class="sr-only" for="Subject">Asunto:</label>
			      <input type="text" class="form-control" name="subject" id="Subject" placeholder="Enter Subject">
			    </div>
			    <br><br>
			    <textarea class="ckeditor" name="message"></textarea>
			    <br><br>
			    <button type="submit" class="btn btn-success">Send Email</button>
		  </form>
		</div>
	</div>
	  
	

</body>
</html>

<?php 

}else{
	echo "<script>
			history.back();
		</script>";
}

 ?>