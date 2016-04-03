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

    <!-- Navigation --><!-- Page Content -->
    <div class="container">

        <!-- Page Header -->
       
<!-- /.row -->

        <!-- Projects Row -->
        <div class="row">
        <?php
  $pag = (isset($_GET['pag'])) ? strip_tags((int)$_GET['pag']) : '1';
  
  $pag = (isset($_GET['pag'])) ? strip_tags((int)$_GET['pag']) : '1';
  $maximo = '6';
  $inicio = ($pag * $maximo) - $maximo;
 
  
 
    if( ($gender == "male")){
      $seleciona_produtos = mysql_query("SELECT * FROM stand WHERE categoria=1 && type=1 ORDER BY id DESC  LIMIT $inicio, $maximo"
); 
$seleciona_seguindo = mysql_query("SELECT * FROM seguidores WHERE seguidor=$id   ORDER BY id DESC"
);
  } if( ($gender == "female")){
       $seleciona_produtos = mysql_query("SELECT * FROM stand WHERE categoria=2  && type=1  ORDER BY id DESC LIMIT $inicio, $maximo"
); 

$seleciona_seguindo = mysql_query("SELECT * FROM seguidores WHERE seguidor=$id   ORDER BY id DESC"
);  
  } 
  

   
  if(mysql_num_rows($seleciona_produtos) == 0){
		  echo'sem produtos';
	  }else{
		  while($linhaprodutos = mysql_fetch_array($seleciona_produtos)){
		 
		  ?> 
          

  <div class="col-md-4 portfolio-item" style=" padding:1px; margin-left:0px;margin-right:0px;">
   <?php $loja = $linhaprodutos['loja'];
		   $seleciona_loja = mysql_query("SELECT * FROM loja WHERE id = '$loja'");
		    $query_loja = mysql_fetch_array($seleciona_loja);?>
    <p>
    </font><a id="<?php  echo  $linhaprodutos['titulo'];?>"></a><br /> 
      
    </p>
    <div class="thumbnail"   style="box-shadow:0 0 4px #CCC; width:100%;
	-moz-box-shadow: 0 0 4px #CCC;
	-webkit-box-shadow: 0 0 4px #CCC;
    border-bottom-left-radius:0px;
    border-bottom-right-radius:0px;
    border-radius:0px;">
    <div style="width:100%"><a style="text-decoration:none;" href="brand.php?warhoo=<?php echo $query_loja['id'];?>"   ><img style=" float:left;  position:relative; z-index:auto; margin-top:-5px; margin-left:5px;padding-right:0px;" class="img-circle" width="30px" height="30px;" src="<?php echo $query_loja['thumb'];?>" 
         alt="Generic placeholder thumbnail"></a><div style=""><div style="margin-left:48px; margin-right:20px;"><h4 style="  text-transform:uppercase; font-weight:600;  font-stretch:condensed">
       <?php  echo  $linhaprodutos['titulo'];?>
     </h4>
     <div style="float:right; margin-top:-30px; padding-right:5px;"><span style=""><a style="text-decoration:none; color:#000; "  href="warhoo.php?warhoo=<?php echo $linhaprodutos['id'];?>"> <i style="color:#F03; " class="fa fa-plus fa-lg "></i></a></span> </div></div></div></div> <br>
         <a style="text-decoration:none;" href="warhoo.php?warhoo=<?php echo $linhaprodutos['id'];?>"   >
         
         <div style="padding:2px;  " class="thumbnail product">
        <img src="<?php echo $linhaprodutos['thumb'];?>" 
         alt="Generic placeholder thumbnail" width="367" height="367"></div></a><div style="padding:0px;" class="caption">
        <p class=" btn-default" style=" padding-left:10px;padding-right:10px; background-color: #FFFFFF; border: dashed 0px #FF6; height: 30px; font-size: 12px;"><font style=" font-style: ; font-family: 'Trebuchet MS', Arial, Helvetica, sans-serif; font-weight: 300;"   color="#373737"  size="4"><?php  echo  $linhaprodutos['titulo'];?></font><font style=" font-style: ; font-family: 'Trebuchet MS', Arial, Helvetica, sans-serif; font-weight: 300;"   color="#373737"  size="2"></font><font style="font-weight:600; color:#333" size="5" ><?php   echo   " $ {$linhaprodutos['valordolar']}";?></font>
         <div style=" padding-top:5px; margin-top:50px; margin-left:40px;"></div>
          
          </div>
   
    </div>
      
</div><?php }}?></div>
<div style=""> <center><a class="hidden-xs hidden-sm"style="  text-decoration:none;color:#fff" href="stand.php?pag=1"><center><div style=" margin-left:45%; margin-top:-13px; width:100px; height:40px; font:#03D1F5; border:solid 2px #CCC; background-color:#fff; " class=" img-rounded col-sm-12 col-xs-12  " ><h4 style=" color:#03D1F5">More</h4></div></center></a></center>
					<a class="col-sm-12 col-xs-12 hidden-lg hidden-md" style="  text-decoration:none;color:#fff" href="stand.php?pag=1"><div style=" float:right;width:100%; height:40px; font:#fff; border:solid 2px #CCC; background-color:#09f; " class=" img-rounded  " ><center><h4>More</h4></center></div></a> 

 


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
