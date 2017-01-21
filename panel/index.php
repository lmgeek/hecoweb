<?php
		session_start();
		//validamos de que alla una sesion active
		if (isset($_SESSION['login']) && $_SESSION['login']==true) {
			$tipo_usu = $_SESSION['nivel'];
			}
			else{
				echo "<script> 
				alert('no puedes acceder')
				window.location='../'
				</script>";
				exit;
			}
		
	?>
<script>
/*function cerrar(){
window.open("../class/closetab.php") // creo que asi, llamas a un php que cierre la sesion
}
</script>




<!DOCTYPE html>
<html>
<head>

<link href="../css/bootstrap.css" rel="stylesheet" type='text/css' />
<!-- Custom Theme files -->
<link href="../css/style2.css" rel="stylesheet" type="text/css" media="all" />
<!-- Custom Theme files -->
<script src="../js/jquery.min.js"></script>
<link rel="stylesheet" href="../css/font-awesome.css">
<link rel="stylesheet" href="http://fontawesome.io/assets/font-awesome/css/font-awesome.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<!-- Custom Theme files -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="shortcut icon" href="http://3daytrialonline.com/3daytrial/assets/images/favicon.png" type="image/x-icon">
<meta name="keywords" content="Herbalife WebApp" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!--webfont-->
<link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
<script>$(document).ready(function(c) {
	$('.alert-close').on('click', function(c){
		$('.calender-left').fadeOut('slow', function(c){
	  		$('.calender-left').remove();
		});
	});	  
});
</script>
<script>$(document).ready(function(c) {
	$('.alert-close1').on('click', function(c){
		$('.calender-right').fadeOut('slow', function(c){
	  		$('.calender-right').remove();
		});
	});	  
});
</script>
<script>$(document).ready(function(c) {
	$('.alert-close2').on('click', function(c){
		$('.graph').fadeOut('slow', function(c){
	  		$('.graph').remove();
		});
	});	  
});
</script>
<script>$(document).ready(function(c) {
	$('.alert-close3').on('click', function(c){
		$('.site-report').fadeOut('slow', function(c){
	  		$('.site-report').remove();
		});
	});	  
});
</script>
<script>$(document).ready(function(c) {
	$('.alert-close4').on('click', function(c){
		$('.total-sale').fadeOut('slow', function(c){
	  		$('.total-sale').remove();
		});
	});	  
});
</script>
<script>$(document).ready(function(c) {
	$('.alert-close5').on('click', function(c){
		$('.to-do').fadeOut('slow', function(c){
	  		$('.to-do').remove();
		});
	});	  
});
</script>
<script>$(document).ready(function(c) {
	$('.alert-close7').on('click', function(c){
		$('.user-trends').fadeOut('slow', function(c){
	  		$('.user-trends').remove();
		});
	});	  
});
</script>
<script>$(document).ready(function(c) {
	$('.alert-close6').on('click', function(c){
		$('.world-map').fadeOut('slow', function(c){
	  		$('.world-map').remove();
		});
	});	  
});
</script>

	<script src="../js/zingchart.min.js"></script>
	<script src="../js/zingchart.jquery.js"></script>
	<script src="../js/jquery.easydropdown.js"></script>
	<script src="../js/jquery.nicescroll.js"></script>
	
					 <link href="../css/jqvmap.css" media="screen" rel="stylesheet" type="text/css" />
					 <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js" type="text/javascript"></script>
    <script src="../js/jquery.vmap.js" type="text/javascript"></script>
    <script src="../js/jquery.vmap.world.js" type="text/javascript"></script>
	<script src="../js/jquery.vmap.sampledata.js" type="text/javascript"></script>
    
	<script type="text/javascript">
	jQuery(document).ready(function() {
		jQuery('#vmap').vectorMap({
		    map: 'world_en',
		    backgroundColor: '#333333',
		    color: '#ffffff',
		    hoverOpacity: 0.7,
		    selectedColor: '#666666',
		    enableZoom: true,
		    showTooltip: true,
		    values: sample_data,
		    scaleColors: ['#C8EEFF', '#006491'],
		    normalizeFunction: 'polynomial'
		});
	});
	</script>
<!----Calender -------->
  <link rel="stylesheet" href="../css/clndr.css" type="text/css" />
  <script src="../js/underscore-min.js"></script>
  <script src= "../js/moment-2.2.1.js"></script>
  <script src="../js/clndr.js"></script>
  <script src="../js/site.js"></script>
<!----End Calender -------->
<script src="../js/easyResponsiveTabs.js" type="text/javascript"></script>
		    <script type="text/javascript">
			    $(document).ready(function () {
			        $('#horizontalTab,#horizontalTab1,#horizontalTab2').easyResponsiveTabs({
			            type: 'default', //Types: default, vertical, accordion           
			            width: 'auto', //auto or any width like 600px
			            fit: true   // 100% fit in a container
			        });
			    });
			   </script>
<link href="../css/nav.css" rel="stylesheet" type="text/css" media="all"/>
<script src="../js/main.js"></script> <!-- Resource jQuery -->
					<!-- chart -->
					<script src="j../s/Chart1.js"></script>
					<!-- //chart -->
	<!-- //iframe -->

	<style>
		iframe {
			border: none;
		}
	</style>


<script language="JavaScript" type="text/javascript">
 <!--

function show5(){
if (!document.layers&&!document.all&&!document.getElementById)
return

 var Digital=new Date()
 var hours=Digital.getHours()
 var minutes=Digital.getMinutes()
 var seconds=Digital.getSeconds()

var dn="PM"
if (hours<12)
dn="AM"
if (hours>12)
hours=hours-12
if (hours==0)
hours=12

 if (minutes<=9)
 minutes="0"+minutes
 if (seconds<=9)
 seconds="0"+seconds
//change font size here to your desire
myclock="<font size='5' face='Arial' ><b><font size='1'>Hora actual:</font></br>"+hours+":"+minutes+":"
 +seconds+" "+dn+"</b></font>"
if (document.layers){
document.layers.liveclock.document.write(myclock)
document.layers.liveclock.document.close()
}
else if (document.all)
liveclock.innerHTML=myclock
else if (document.getElementById)
document.getElementById("liveclock").innerHTML=myclock
setTimeout("show5()",1000)
 }


window.onload=show5
 //-->
 </script>

<style>
	body{
		font-size: 10px!important;
	}
</style>
</head>
<body onUnLoad="cerrar();">


<?php 

if ($tipo_usu == "Administrador") {

 ?>



	<!-- MENU ADMINISTRADOR -->
	<div >
		<div class="col-md-3 side-bar">
			<div class="logo text-center">
			<span id="liveclock" style="left:90px;color: #fff"></span><br>
				<img src="../images/logo.png" alt="Logo" width="50%" />
			</div>

			<div class="navigation">
				<a href="panel.php" target="search_iframe">
					<ul>
						<li><span class="glyphicon glyphicon-home" aria-hidden="true"></li>
						<li>&nbsp;&nbsp;Inicio</li>
					</ul>
				</a>
				<a href="perfil.php" target="search_iframe">
					<ul>
						<li><span class="fa fa-user-circle-o" aria-hidden="true"></li>
						<li>&nbsp;&nbsp;Mi Perfil</li>
					</ul>
				</a>
				<a href="new-coach.php" target="search_iframe">
					<ul>
						<li><span class="fa fa-user-plus" aria-hidden="true"></i></li>
						<li>&nbsp;&nbsp;Crear Tab</li>
					</ul>
				</a>
				<a href="editcoach.php" target="search_iframe">
					<ul>
						<li><span class="fa fa-pencil" aria-hidden="true"></i></li>
						<li>&nbsp;&nbsp;Editar Tab</li>
					</ul>
				</a>
				<a href="new-coach-leads.php" target="search_iframe">
					<ul>
						<li><span class="fa fa-user-plus" aria-hidden="true"></i></li>
						<li>&nbsp;&nbsp;Crear Bajo Linea</li>
					</ul>
				</a>
				<a href="mypages.php" target="search_iframe">
					<ul>
						<li><span class="fa fa-desktop" aria-hidden="true"></i></li>
						<li>&nbsp;&nbsp;Crear Capturadoras</li>
					</ul>
				</a>
				<a href="mywebs.php" target="search_iframe">
					<ul>
						<li><span class="glyphicon glyphicon-globe" aria-hidden="true"></li>
						<li>&nbsp;&nbsp;Mis Sitios</li>
					</ul>
				</a>
				<a href="users.php" target="search_iframe">
					<ul>
						<li><span class="fa fa-users" aria-hidden="true"></li>
						<li>&nbsp;&nbsp;Listar Bajo Linea</li>
					</ul>
				</a>
				<a href="email_list.php" target="search_iframe">
					<ul>
						<li><span class="glyphicon glyphicon-list-alt" aria-hidden="true"></li>
						<li>&nbsp;&nbsp;Lista de Correo</li>
					</ul>
				</a>
				<a href="new-user.php" target="search_iframe">
					<ul>
						<li><span class="fa fa-pencil" aria-hidden="true"></i></li>
						<li>&nbsp;&nbsp;Crear Usuario</li>
					</ul>
				</a>
				<a href="help.php" target="search_iframe">
					<ul>
						<li><span class="fa fa-question" aria-hidden="true"></i></li>
						<li>&nbsp;&nbsp;Ayuda</li>
					</ul>
				</a>
				<a href="../class/close.php">
					<ul>
						<li><span class="glyphicon glyphicon-off" aria-hidden="true"></span></li>
						<li>&nbsp;&nbsp;Cerrar Sesión</li>
					</ul>
				</a>				
			</div>
		</div>

		
	</div>
	<!-- FIN MENU ADMINISTRADOR -->

	<?php }elseif ($tipo_usu == "Lider") {   ?>

	<!-- MENU LIDER -->
	<div >
		<div class="col-md-3 side-bar">
			<div class="logo text-center">
			<span id="liveclock" style="left:90px;color: #fff"></span>
				<img src="../images/logo.png" alt="Logo" width="90%" />
			</div>

			<div class="navigation">
				<a href="panel.php" target="search_iframe">
					<ul>
						<li><span class="glyphicon glyphicon-home" aria-hidden="true"></li>
						<li>&nbsp;&nbsp;Inicio</li>
					</ul>
				</a>
				<a href="perfil.php" target="search_iframe">
					<ul>
						<li><span class="fa fa-user-circle-o" aria-hidden="true"></li>
						<li>&nbsp;&nbsp;Mi Perfil</li>
					</ul>
				</a>
				<a href="new-coach-leads.php" target="search_iframe">
					<ul>
						<li><span class="fa fa-user-plus" aria-hidden="true"></i></li>
						<li>&nbsp;&nbsp;Crear Bajo Linea</li>
					</ul>
				</a>
				<a href="mypages.php" target="search_iframe">
					<ul>
						<li><span class="fa fa-desktop" aria-hidden="true"></i></li>
						<li>&nbsp;&nbsp;Crear Capturadoras</li>
					</ul>
				</a>
				<a href="mywebs.php" target="search_iframe">
					<ul>
						<li><span class="glyphicon glyphicon-globe" aria-hidden="true"></li>
						<li>&nbsp;&nbsp;Mis Sitios</li>
					</ul>
				</a>
				<a href="users.php" target="search_iframe">
					<ul>
						<li><span class="fa fa-users" aria-hidden="true"></li>
						<li>&nbsp;&nbsp;Listar Bajo Linea</li>
					</ul>
				</a>
				<a href="email_list.php" target="search_iframe">
					<ul>
						<li><span class="glyphicon glyphicon-list-alt" aria-hidden="true"></li>
						<li>&nbsp;&nbsp;Lista de Correo</li>
					</ul>
				</a>
				<a href="help.php" target="search_iframe">
					<ul>
						<li><span class="fa fa-question" aria-hidden="true"></i></li>
						<li>&nbsp;&nbsp;Ayuda</li>
					</ul>
				</a>
				<a href="../class/close.php">
					<ul>
						<li><span class="glyphicon glyphicon-off" aria-hidden="true"></span></li>
						<li>&nbsp;&nbsp;Cerrar Sesión</li>
					</ul>
				</a>			
			</div>
		</div>

		
	</div>
	<!-- FIN MENU TAB -->

<?php }elseif ($tipo_usu == "Usuario") {   ?>

	<!-- MENU USUARIO -->
	<div >
		<div class="col-md-3 side-bar">
			<div class="logo text-center">
			<span id="liveclock" style="left:90px;color: #fff"></span>
				<img src="../images/logo.png" alt="Logo" width="90%" />
			</div>

			<div class="navigation">
				<a href="panel.php" target="search_iframe">
					<ul>
						<li><span class="glyphicon glyphicon-home" aria-hidden="true"></li>
						<li>&nbsp;&nbsp;Inicio</li>
					</ul>
				</a>
				<a href="perfil.php" target="search_iframe">
					<ul>
						<li><span class="fa fa-user-circle-o" aria-hidden="true"></li>
						<li>&nbsp;&nbsp;Mi Perfil</li>
					</ul>
				</a>
				<a href="mypages.php" target="search_iframe">
					<ul>
						<li><span class="fa fa-desktop" aria-hidden="true"></i></li>
						<li>&nbsp;&nbsp;Crear Capturadoras</li>
					</ul>
				</a>
				<a href="mywebs.php" target="search_iframe">
					<ul>
						<li><span class="glyphicon glyphicon-globe" aria-hidden="true"></li>
						<li>&nbsp;&nbsp;Mis Sitios</li>
					</ul>
				</a>
				<a href="users.php" target="search_iframe">
					<ul>
						<li><span class="fa fa-users" aria-hidden="true"></li>
						<li>&nbsp;&nbsp;Listar Bajo Linea</li>
					</ul>
				</a>
				<a href="email_list.php" target="search_iframe">
					<ul>
						<li><span class="glyphicon glyphicon-list-alt" aria-hidden="true"></li>
						<li>&nbsp;&nbsp;Lista de Correo</li>
					</ul>
				</a>
				<a href="help.php" target="search_iframe">
					<ul>
						<li><span class="fa fa-question" aria-hidden="true"></i></li>
						<li>&nbsp;&nbsp;Ayuda</li>
					</ul>
				</a>
				<a href="../class/close.php">
					<ul>
						<li><span class="glyphicon glyphicon-off" aria-hidden="true"></span></li>
						<li>&nbsp;&nbsp;Cerrar Sesión</li>
					</ul>	
				</a>			
			</div>
		</div>

		
	</div>
	<!-- FIN MENU USUARIO -->
<?php } ?>

<div class="col-md-9" style="padding-left: 0px!important; padding-right: 0px!important;margin-left: 0px!important; margin-right: 0px!important;">
			<iframe src="panel.php" width="110%" height="100%" name="search_iframe"></iframe>
		</div>

<!--
<div class="clearfix"></div>


		<div class="footer">
			<div class="copyright text-center">
					<p><b>&copy; 2016 All rights reserved | Vincent Anzellini</b> </p>
			</div>		
		</div>
		-->
</body>
</html>