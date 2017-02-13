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
			<form class="form-inline" method="POST" action="email.php">
			    <div class="form-group">
			      <label class="sr-only" for="name">Name:</label>
			      <input type="text" class="form-control" name="name" id="name" placeholder="Enter Name">
			    </div>
			    <div class="form-group">
			      <label class="sr-only" for="email">Email:</label>
			      <input type="email" class="form-control" name="email" id="email" placeholder="Enter email">
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