<?php

include 'conn.php'
?>
<?php  ?>
<!DOCTYPE html>
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
    <link rel="stylesheet" href="menustyle.css">

    <!-- Custom CSS -->
    <link href="css/3-col-portfolio.css" rel="stylesheet">
    <style type="text/css">
    body {
	background-color: #f2f2f2;	
}
    .paginator a{
		width:50px;
		height:30px;
		background-color:#fff;
		font:#333;
		text-decoration:none;
		font-size:14px;
		border: solid 2px #003;
		
		
		}
    </style>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body bgcolor="#f2f2f2" style="background-color:#f2f2f2">
<nav class="navbar  navbar-fixed-top " role="navigation" style="background-color:#011C47; border:0px;">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
           
                
          <a  style="height:50px;margin-left:-5px; "  href="home.php" ><img   src="img/newlogo.png" width="60" height="50"  /></a>
          <?php if(isset($_SESSION["email"]) ||isset($_SESSION["password"])) {  ?> <div style="float:right"><a href="explore.php"><img   style=" border:2px; float:left  margin-right:25px; padding:5px; margin-top:5px"width="42px;" height="42px"  src="img/profile.jpg" alt="<?php echo $name; ?>" class="img-circle" ></a><div class="hidden-xs hidden-sm " style="float:right; margin-top:10px;"><span style="color:#fff; padding-left:5px;"><?php echo $name; ?></span><br><a href="logout.php"><span style=" font-size:12px;color:#fff; padding-left:5px; float:left;">Logout</span></a></div>
         </div><?php }else{  ?><div style="float:right"><a href="profile.php"><a style="height:33px; width:76px" class=" " href="login.php">
       <h5 style="margin-top:15px; color:#FFF; font-weight:600;">Login </h5>
  	  </a></div><?php }  ?>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul  class="nav navbar-nav" style=" color:#121212; font-stretch:condensed; font-size:14px; font-weight:600; margin-top: -50px; margin-left:430px;"><li><a style=" color:#fff; font-size:14px; text-decoration:none;" href="search.php">Search <span class="sr-only">(current)</span></a></li>
        
        <li><a style=" color:#fff; font-size:14px;text-decoration:none;" class="scroll" href="follow.php">Brands</a></li>
        <li><a style=" color:#fff; font-size:14px; text-decoration:none;" class="scroll" href="explore.php">Explore</a></li>
                   
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
</nav>
    


    <!-- /.container -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

</body>

</html>
