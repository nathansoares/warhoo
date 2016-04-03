<?php

include 'conn.php'
?>
<?php


?><?php
   
	if(!isset($_SESSION["email"]) ||!isset($_SESSION["password"])) {
		header("location: login.php");
		exit;
	} else {
		echo"<center></center>";
}


?>
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
	background-color: #FFFFFF;
}
    </style>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body style="background-color:#F4F4F4;">

    <!-- Navigation --><!-- Navigation --><!-- Page Content -->
    <div  class="container"><br>


        <!-- Page Header --><!-- /.row -->

        <!-- Projects Row -->
<div class="row">
            <div class="container" style="width:100%"><?php
  $pag = (isset($_GET['pag'])) ? strip_tags((int)$_GET['pag']) : '1';
  $maximo = '6';
  $inicio = ($pag * $maximo) - $maximo;
 
   if( $gender == "male"){
 
      $seleciona_produtos = mysql_query("SELECT * FROM catstand WHERE categoria=1  ORDER BY id DESC LIMIT $inicio, $maximo"
);  $seguidor = mysql_query("SELECT * FROM seguidores WHERE seguidor='$id'") ;
    $query_seguidor = mysql_fetch_array($seguidor);}
	 if( $gender == "female"){
 
      $seleciona_produtos = mysql_query("SELECT * FROM catstand WHERE categoria=2  ORDER BY id DESC LIMIT $inicio, $maximo"
);  $seguidor = mysql_query("SELECT * FROM seguidores WHERE seguidor='$id'") ;
    $query_seguidor = mysql_fetch_array($seguidor);}

  
  
  if(mysql_num_rows($seleciona_produtos) == 0){
		  echo'sem produtos';
	  }else{
		  while($linhaprodutos = mysql_fetch_array($seleciona_produtos)){
		 
		  ?> 

 <div class="col-md-2 col-sm-4 col-xs-6 portfolio-item" style=" padding:2px; margin-left:0px;margin-right:0px;">
    <p>
    </font><br /> 
      
    </p>
    <div class="thumbnail"   style="box-shadow:0 0 4px #CCC; width:100%;
	-moz-box-shadow: 0 0 4px #CCC;
	-webkit-box-shadow: 0 0 4px #CCC;">
    
         <a style="text-decoration:none;" href="cat.php?warhoo=<?php echo $linhaprodutos['id'];?>"   >
         
         <div style="padding:2px; border-radius:opx;  " class="thumbnail">
        <img class="img-circle" src="<?php echo $linhaprodutos['thumb'];?>" 
         alt="Generic placeholder thumbnail" width="250" height="250"></div></a><div style="padding: 0px; color: #F9F2FF;" class="caption">
        <font style=" font-style: ; font-family: 'Trebuchet MS', Arial, Helvetica, sans-serif; font-weight: 300;"   color="#373737"  size="4"><center><?php  echo  $linhaprodutos['nome'];?></center></font>
         
          
          </div>
   
    </div>
      
</div><?php }}?></div><center>
    <!-- /.container -->

    <!-- jQuery -->
<script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

</body>

</html>
