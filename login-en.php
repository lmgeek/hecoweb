<?php
    session_start();
    //validamos de que alla una sesion active
    if (isset($_SESSION['login']) && $_SESSION['login']==true) {
      header("location:panel/");
      }else{
  ?>
  <!DOCTYPE html>
<html >
  <head>
    <meta charset="UTF-8">
    <title>Herbalife Coach WebApp</title>
    <link href='http://fonts.googleapis.com/css?family=Titillium+Web:400,300,600' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="css/normalize.css">
        <link rel="stylesheet" href="css/style.css">
    <style>
      .forgot {
        text-align: right;
      }
    </style>
  </head>
  <body>
    <div class="form">
      <!--
      <ul class="tab-group">
        <li class="tab active"><a href="#login">Log In</a></li>
        <li class="tab"><a href="#signup">Sign Up</a></li>
        <li class="tab"><a href="#forgot">Sign Up</a></li>
      </ul>-->
      <div class="tab-content">
        <div id="login">   
          <h1>Welcome Back! to Herbalife Coach WebApp</h1>
          <form action="login.php" method="post">
            <div class="field-wrap">
            <label>
              Username<span class="req">*</span>
            </label>
            <input type="text" name="user" required autocomplete="off"/>
          </div>
          <div class="field-wrap">
            <label>
              Password<span class="req">*</span>
            </label>
            <input type="password" name="password" required autocomplete="off"/>
          </div>
          <p class="tab forgot"><a href="#forgot">Forgot Password?</a></p>
          <input class="button button-block" type="submit" value="Log In" />
          </form>
        </div>
        <div id="forgot">   
          <h1>Forgot Password?</h1>
          <form action="forgot-password.php" method="post">
          <div class="field-wrap">
            <label>
              Email Address<span class="req">*</span>
            </label>
            <input type="email" name="email" id="email" required autocomplete="off"/>
          </div>
          <p class="tab forgot"><a href="#login">Login</a></p>
          <button type="submit" class="button button-block"/>Send Password</button>
          </form>
        </div>
      </div><!-- tab-content -->
</div> <!-- /form -->
    <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
        <script src="js/index.js"></script>
  </body>
</html>

<?php } ?>