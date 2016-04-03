

<?php
include "conn.php";
?><!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Warhoo</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    

    <!-- Custom CSS -->
    <link href="css/3-col-portfolio.css" rel="stylesheet">
    <link rel="stylesheet" href="css/animate.css" />
<link rel="stylesheet" href="css/font-awesome.min.css" >
<link href="css/owl.carousel.css" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="css/cubeportfolio.min.css">
<style type="text/css">
body {
	background-color: #FFF;
	background-image: url(img/trianglebg.png);
}
</style>
<script src="js/custom.modernizr.js"></script>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>
	<body>
  	  </p>
  	  
  	  <center>
  	    
  	    
        
        
       
  	    <h1 style=" ">Sign Up</h1>
      <center><form class=" form form-group   col-sm-12 col-xs-12" method="POST" action="submit.php">
<fieldset>

<!-- Form Name -->
<legend></legend>

<!-- Text input-->
<div class="control-group">
  <label class="control-label" style="float:left" for="firstname">First Name:</label>
  <div class="controls">
    <input id="firstname" name="firstname" type="text" placeholder="" class=" form-control" required>
    
  </div>
</div>

<!-- Text input-->
<div class="control-group">
  <label class="control-label" style="float:left" for="lastname">Last Name:</label>
  <div class="controls">
    <input id="lastname" name="lastname" type="text" placeholder="" class=" form-control" required>
    
  </div>
</div>

<!-- Text input-->
<div class="control-group">
  <label class="control-label" style="float:left" for="email">E-mail:</label>
  <div class="controls">
    <input id="email" name="email" type="text" placeholder="" class=" form-control" required>
    
  </div>
</div>

<!-- Password input-->
<div class="control-group">
  <label class="control-label" style="float:left" for="password">Password:</label>
  <div class="controls">
    <input id="password"  name="password" type="password" placeholder="" class=" form-control" required>
     <p class="help-block" style="color:#C00">Mind your password</p>
    
  </div>
</div>

<!-- Select Basic -->
<div class="control-group">
  <label class="control-label" style="float:left" for="gender">Gender:</label>
  <div class="controls">
    <select id="genero" name="genero" class=" form-control">
      <option>male</option>
      <option>female</option>
    </select>
  </div>
</div>

<!-- Text input-->
<div class="control-group">
  <label class="control-label" style="float:left" for="address">Address:</label>
  <div class="controls">
    <input id="address" name="address" type="text" placeholder=""  class=" form-control" required>
    
  </div>
</div>

<!-- Text input-->
<div class="control-group">
  <label class="control-label" style="float:left" for="zip">Zip Code:</label>
  <div class="controls">
    <input id="zip" name="zip" type="text" placeholder="" class=" form-control" required>
    
  </div>
</div>

</fieldset><br>
<input type="submit" style="float:right" value="Submit" class="btn btn-primary col-lg-12"  id="csubmit" name="submit">
</form></center></div>
</div><br>
 </center><center>
       
  	  </center>
	    </div>	
      </div>
  </div>
  </div><div style="margin-top:250px;" id="BigVideo" class="player" data-property="{videoURL:'http://www.youtube.com/watch?v=LhRLDvTKw44', containment:'.top_video', autoPlay:true, mute:true, startAt:0, opacity:1, showControls : false}"></div></div>
    <!-- /.container -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>
    <script src="js/youtube/YTPlayer.js" type="text/javascript"></script> 
<script type="text/javascript">
  //<![CDATA[ 
		$(window).load(function(){
		 $(function(){
      $(".player").mb_YTPlayer();
    	});
	});
//]]>
</script>
<script src="styleswitcher/js/styleswitcher.js"></script>

</body>

</html>
