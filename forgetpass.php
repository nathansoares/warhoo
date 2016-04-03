<?php

include 'conn.php'
?>

	
          
         
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Warhoo</title>
    

	<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
	<style>
	body{
	background: #f8f8f8;
	background-color: #f8f8f8;
	}
	
	.main-container{
		width:400px;
		margin:30px auto 0px;
		background:white;
		padding:30px;
	}
	.footer{
		background:#ecf0f1;
		padding:30px;
		color:#7f8c8d;
		width:400px;
		margin: 0px auto;
	}
	</style>
  </head>
  <body>
  	 </pre>
        <link href="css/styles.css" rel="stylesheet">
<?php
		$nav = "navbar.php";
		include ("$nav");
		?>
<!-- jQuery (plugins em JavaScript) -->
<script type="text/javascript" src="https://code.jquery.com/jquery.js"></script><script type="text/javascript" src="js/bootstrap.min.js"></script>
<br /><br /><br>
<center>
 <?php
		$pass = "extensao.php";
		include ("$pass");
		?></center>
   
  </body>
  <?php
		$footer = "footer.php";
		include ("$footer");
		?>
</html>


