

<?php
include "conn.php";
?><?php session_start();

if(isset($_SESSION["email"]) ||isset($_SESSION["password"])) {
		header("location: home.php");
		exit;
	} else { ?><!DOCTYPE html>
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
	background-color: #0099FF;
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
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation" style="background-color:#009FBB; border-bottom:0px;"><br>
    <div class="container " style="margin-top:-10px;">
        
        <img class=" img-responsive"  style=" margin-top:-5px;background-color:transparent; border:0px;" src="img/WARHOOama.png" width="183" height="36"><div class="hidden-xs hidden-sm col-lg-6 col-md-6 " style=" margin-top:-15px; float:right;"><form style="margin-top:-20px;" name="loginform" method="post" action="loginconfig.php">
  <font face="Trebuchet MS, Arial, Helvetica, sans-serif" color="#fff">User:</font>
  <input type="text" name="email" />
 <font face="Trebuchet MS, Arial, Helvetica, sans-serif" color="#fff">Password:</font>
 <input type="password" name="password" />
<input class=" btn btn-primary" style="background-color:#3CF

" type="submit" value="Login"/></div></nav>
  	  </p>
  	  <p><center>
  	  </center></p>
  	  <center>
  	    
  	    <p>&nbsp; </p>
        
         <div class=" hidden-lg hidden-md col-sm-12 col-xs-12"><br></div><div class=" thumbnail hidden-lg hidden-md col-sm-12 col-xs-12"><br> <h2>Sign In</h2><form style="margin-top:-20px;" class="form form-group" name="loginform" method="post" action="loginconfig.php">
        <div class="control-group">
        
   <label class="control-label" style="float:left" for="email"> E-mail:</label><div class="controls">
  <input class="form-control" type="text" name="email" />
  </div></div>
  <div class="control-group">
        
   <label class="control-label" style="float:left" for="password"> Password:</label><div class="controls">
 <input class="form-control" type="password" name="password" /></div></div>
<br><input class=" btn btn-primary col-sm-12 col-xs-12" style="

" type="submit" value="Login"/><br><span>or</span><a href="signup.php" class="btn btn-primary col-sm-12 col-xs-12" style="background-color:#06F">sign up</a></div>
  	    <div class="container hidden-xs hidden-sm"><div><div class=" hidden-xs hidden-sm col-lg-4 col-md-6 col-sm-12 col-xs-12" style="float:left; padding:10px; margin:20px;"><iframe width="640" height="480" src="https://www.youtube.com/embed/LhRLDvTKw44?rel=0&amp;controls=0&amp;showinfo=0" frameborder="0" allowfullscreen></iframe></div><div class="thumbnail col-lg-4 col-md-6 col-sm-12 col-xs-12" style="float:right; padding:10px; margin:20px; margin-left:30px;">
  	    <h1 style=" ">Sign Up</h1>
      <form class=" form form-group   col-sm-12 col-xs-12" method="POST" action="submit.php">
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
</form></div></div>
</div><br>
 </center><center>
       
  	  </center>
	    </div>	
      </div>
  </div>
  </div><div style="margin-top:250px;" id="BigVideo" class="player" data-property="{videoURL:'http://www.youtube.com/watch?v=LhRLDvTKw44', containment:'.top_video', autoPlay:true, mute:true, startAt:0, opacity:1, showControls : false}"></div></div><?php  }?>
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
