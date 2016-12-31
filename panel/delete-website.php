<?php
session_start();
        //validamos de que alla una sesion active
        if (isset($_SESSION['login']) && $_SESSION['login']==true) {
        	$name_user = $_SESSION['name'];
            }
            else{
                echo "<script> 
                alert('no puedes acceder')
                window.location='../'
                </script>";
                exit;
            }


require('../conetion.php');

?>

 <link href="../css/bootstrap.css" rel="stylesheet" type='text/css' />
<link href="../css/style2.css" rel="stylesheet" type='text/css' />
<style>
    /* enable absolute positioning */
.inner-addon {
  position: relative;
  margin-bottom: 10px;
}

/* style glyph */
.inner-addon .glyphicon {
  position: absolute;
  padding: 10px;
  pointer-events: none;
}

/* align glyph */
.left-addon .glyphicon  { left:  0px;}
.right-addon .glyphicon { right: 0px;}

/* add padding  */
.left-addon input  { padding-left:  30px; }
.right-addon input { padding-right: 30px; }



body {
  margin: 10px;
}

</style>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js" type="text/javascript"></script>
<script language="javascript">
$(document).ready(function(){
   $("#category").change(function () {
           $("#category option:selected").each(function () {
            id = $(this).val();
            $.post("web.php", { id: id }, function(data){
                $("#subcategory").html(data);
            });            
        });
   })
});
</script>







<div class="container">
    <div class="row">
            <h3>Eliminar Capturadora</h3>
<br>
          <div class="form-group col-xs-6">
          <label for="name">Seleccione un Entrenador</label>
            <div class="inner-addon left-addon">

              <select name="category" id="category" class="form-control">
                <option value="">>-----------------Seleccionar Entrenador--------------<</option>
                  <?php
                  $result = $conexion->query("SELECT * FROM coach WHERE 1");
                  if ($result->num_rows > 0) {
                      while ($row = $result->fetch_assoc()) {                
                          echo '<option value="'.$row['id'].'">'.$row['name'].'</option>';
                      }
                  }
                  ?>
              </select>
            </div>

            
    </div>
</div>

</div> 



<div name="subcategory" id="subcategory"></div>


