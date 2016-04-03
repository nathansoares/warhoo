

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
	background-image: url();
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
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation" style="background-color:#0CF; border-bottom:0px;"><br>
    <div class="container " style="margin-top:-10px;">
        
        <img class=" img-responsive"  style="background-color:transparent; border:0px;" src="img/WARHOOama.png" width="191" height="37"><div class="hidden-xs hidden-sm col-lg-6 col-md-6 " style=" margin-top:-15px; float:right;"> <?php
include "loginpage.php";
?></div></nav>
  	  </p>
  	  <p><center>
  	  </center></p>
  	  <center>
  	    
  	    <p>&nbsp; </p>
        
        
  	    <div class=" "><div class=" hidden-xs hidden-sm col-lg-4 col-md-6 col-sm-12 col-xs-12" style="float:left; padding:10px; margin-top:30px; margin-left:40px;"><iframe width="720" height="510" src="https://www.youtube.com/embed/LhRLDvTKw44?rel=0&amp;controls=0&amp;showinfo=0" frameborder="0" allowfullscreen></iframe></div><br><div><center><div class="thumbnail col-lg-4 col-md-6 col-sm-12 col-xs-12" style=" float:right; padding:10px; margin:0px;">
  	     <?php
include "singup2.php";
?></center></div></center></div>
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
