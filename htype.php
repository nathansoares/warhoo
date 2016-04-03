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
	background-color: #f3f3f3;
}
    </style>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <!-- Navigation -->

<nav  class="navbar navbar-inverse navbar-fixed-top" role="navigation" style="background-color:transparent; border:1px #CCC; margin-top:50px;">
  <div class="navbar-brand" style="float:right; padding-left:10px;"><?php
  $pag = (isset($_GET['pag'])) ? strip_tags((int)$_GET['pag']) : '1';
   $maximo = '4';
  $inicio = ($pag * $maximo) - $maximo;
 
   $idtype = 3;
   
    $query_seguidor = mysql_fetch_array($seguidor);
    if( ($gender == "male")){
		  $seleciona_produtos = mysql_query("SELECT * FROM tudo WHERE type = '$idtype' && categoria=1 or categoria=0 ORDER BY id DESC  LIMIT $inicio, $maximo");}
		   if( ($gender == "female")){
		  $seleciona_produtos = mysql_query("SELECT * FROM tudo WHERE type = '$idtype' && categoria=2 or categoria=0 ORDER BY id DESC  LIMIT $inicio, $maximo");}
	
		 
		  $query_produto = mysql_fetch_array($seleciona_produtos);
		   
           
		   



?></div>
    <?php

		   $seleciona_loja = mysql_query("SELECT * FROM types WHERE id = '$idtype'");
		   
		  $query_loja = mysql_fetch_array($seleciona_loja);
		  ?>
          <a  style=" margin-top:-10px"class="navbar-brand" href="#"><img class="img-circle"  style="float:left;"src="<?php echo $query_loja['thumb'];?>" width="40" height="40"  alt="Generic placeholder thumbnail"><div class="hidden-xs-sm" style=" margin-left:-3px; float:left"><h4 style=" padding-left:3px;"><?php echo $query_loja['name'];?></h4></a></div>
   
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav" style="float:left; margin-top:7px;" >
                    
  
                        
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>

    <!-- Page Content -->
    <div class="container"><br><br>

        <!-- Page Header -->
       
<!-- /.row -->

        <!-- Projects Row -->
        <div class="row"><br>
            <div class="container" style="width:100%"><?php 
   
  if(mysql_num_rows($seleciona_produtos) == 0){
		  echo'sem produtos';
	  }else{
		  while($linhaprodutos = mysql_fetch_array($seleciona_produtos)){
		 
		  ?> 
          

  <div class=" col-lg-3 col-md-4 portfolio-item" style=" padding:1px; margin-left:0px;margin-right:0px;">
    <p>
    </font><a id="<?php  echo  $linhaprodutos['titulo'];?>"></a><br /> 
      
    </p>
    <div class="thumbnail"   style="box-shadow:0 0 4px #CCC; width:100%;
	-moz-box-shadow: 0 0 4px #CCC;
	-webkit-box-shadow: 0 0 4px #CCC;">
    
         <a style="text-decoration:none;" href="warhoo.php?warhoo=<?php echo $linhaprodutos['id'];?>"   >
         
         <div style="padding:2px;  " class="thumbnail">
        <img src="<?php echo $linhaprodutos['thumb'];?>" 
         alt="Generic placeholder thumbnail" width="367" height="367"></div></a><div style="padding:0px;" class="caption">
        <p class=" btn-default" style=" padding-left:10px;padding-right:10px; background-color: #FFFFFF; border: dashed 0px #FF6; height: 30px; font-size: 12px;"><font style=" font-style: ; font-family: 'Trebuchet MS', Arial, Helvetica, sans-serif; font-weight: 300;"   color="#373737"  size="4"><?php  echo  $linhaprodutos['titulo'];?></font><font style=" font-style: ; font-family: 'Trebuchet MS', Arial, Helvetica, sans-serif; font-weight: 300;"   color="#373737"  size="2"><?php  echo  $linhaprodutos['desc'];?></font><font size="4" color="#333"><?php   echo   " $ {$linhaprodutos['valordolar']}";?></font>
         <div style=" padding-top:5px; margin-top:50px; margin-left:40px;"></div>
          
          </div>
   
    </div>
      
</div><?php }}?></div>

 


            <!-- /.row -->
        </footer>

    </div>
    <!-- /.container -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

</body>

</html>
