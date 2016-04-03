<?php

include 'conn.php'
?>
<?php
    session_start();
	if(!isset($_SESSION["email"]) ||!isset($_SESSION["password"])) {
		header("location: login.php");
		exit;
	} else {
		echo"<center></center>";
}


?>
	 <?php $selecionauser= mysql_query("SELECT * FROM users WHERE email ='".$_SESSION['email']."'");
while($user = mysql_fetch_array($selecionauser)){ 
	$gender = $user['genero'];
	$name = $user['firstname'];
	$id = $user['id'];
	
	?>
          
          <?php }

?><?php  ?>
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
	background-color: #F2F2F2;
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

<body bgcolor="#fff" style="background-color:#fff">
<div id="scroll-container">
    <?php
		$nav = "navbar.php";
		include ("$nav");
		?>
    <!-- Page Content --><br><br>
    <!-- Page Content -->
    <div class="container">
    
    

        <!-- Page Header -->
        <div class="row">
<div class="col-lg-12"></div>
        <!-- /.row -->
<br><h2>Based you are following</h2><br><br>
        <!-- Projects Row -->
        <div class="row">
            <div class="container" style="width:100%"><?php
   $pag = (isset($_GET['pag'])) ? strip_tags((int)$_GET['pag']) : '1';
  $maximo = '40';
  $inicio = ($pag * $maximo) - $maximo;
 
   $seleciona_produtos = mysql_query("SELECT `tudo`.* FROM `tudo` INNER JOIN `seguidores` ON `tudo`.`loja` = `seguidores`.`seguindo` &&`seguidores`.`seguidor`=$id ORDER BY `tudo`.`id` DESC LIMIT $inicio, $maximo"
); 
  
  
  
  if(mysql_num_rows($seleciona_produtos) == 0){
		  echo'sem produtos';
	  }else{
		  while($linhaprodutos = mysql_fetch_array($seleciona_produtos)){
		 
		  ?> 
          
          

<center> <div class=" hidden-xs hidden-sm hidden-md  " style="width:80%;"> <div class="col-md-6  portfolio-item"  style=" padding:8px;  margin-top:-60px;">
    <p>
    </font><a id="<?php  echo  $linhaprodutos['titulo'];?>"></a><br /> 
      
    </p>
    <div class="thumbnail"   style="box-shadow:0 0 4px #CCC; width:100%;
	-moz-box-shadow: 0 0 4px #CCC;
	-webkit-box-shadow: 0 0 4px #CCC;">
    
         <a style="text-decoration:none;" href="warhoo.php?warhoo=<?php echo $linhaprodutos['id'];?>"   >
         
         <div style="padding:2px;  " class="thumbnail">
        <img src="<?php echo $linhaprodutos['thumb'];?>" 
         alt="Generic placeholder thumbnail" width="309" height="309"></div></a><div style="padding:0px;" class="caption">
        <p class=" btn-default" style=" padding-left:10px;padding-right:10px; background-color: #FFFFFF; border: dashed 0px #FF6; height: 30px; font-size: 12px;"><font style=" font-style: ; font-family: 'Trebuchet MS', Arial, Helvetica, sans-serif; font-weight: 300;"   color="#373737"  size="4"><?php  echo  $linhaprodutos['titulo'];?></font><font style=" font-style: ; font-family: 'Trebuchet MS', Arial, Helvetica, sans-serif; font-weight: 300;"   color="#373737"  size="2"><?php  echo  $linhaprodutos['descricao'];?></font><font size="4" color="#333"><?php   echo   " $ {$linhaprodutos['valordolar']}";?></font>
         <div style=" padding-top:5px; margin-top:50px; margin-left:40px;"></div>
          
          </div>
   
    </div>
      
</div></div></center><div class=" hidden-lg   " > <div class="col-md-6  portfolio-item"  style=" padding:8px;  margin-top:-60px;">
    <p>
    </font><a id="<?php  echo  $linhaprodutos['titulo'];?>"></a><br /> 
      
    </p>
    <div class="thumbnail"   style="box-shadow:0 0 4px #CCC; width:100%;
	-moz-box-shadow: 0 0 4px #CCC;
	-webkit-box-shadow: 0 0 4px #CCC;">
    
         <a style="text-decoration:none;" href="warhoo.php?warhoo=<?php echo $linhaprodutos['id'];?>"   >
         
         <div style="padding:2px;  " class="thumbnail">
        <img src="<?php echo $linhaprodutos['thumb'];?>" 
         alt="Generic placeholder thumbnail" width="309" height="309"></div></a><div style="padding:0px;" class="caption">
        <p class=" btn-default" style=" padding-left:10px;padding-right:10px; background-color: #FFFFFF; border: dashed 0px #FF6; height: 30px; font-size: 12px;"><font style=" font-style: ; font-family: 'Trebuchet MS', Arial, Helvetica, sans-serif; font-weight: 300;"   color="#373737"  size="4"><?php  echo  $linhaprodutos['titulo'];?></font><font style=" font-style: ; font-family: 'Trebuchet MS', Arial, Helvetica, sans-serif; font-weight: 300;"   color="#373737"  size="2"><?php  echo  $linhaprodutos['descricao'];?></font><font size="4" color="#333"><?php   echo   " $ {$linhaprodutos['valordolar']}";?></font>
         <div style=" padding-top:5px; margin-top:50px; margin-left:40px;"></div>
          
          </div>
   
    </div>
      
</div></div></center><?php }}?></div><center><div style="width:210px; "  >
          <?php
              $registros = mysql_query("SELECT `tudo`.* FROM `tudo` INNER JOIN `seguidores` ON `tudo`.`loja` = `seguidores`.`seguindo` &&`seguidores`.`seguidor`=$id ORDER BY `tudo`.`id` "
); 
			 $totalRegistros = mysql_num_rows($registros);
			 $paginas = ceil($totalRegistros/$maximo);
			 $links = '1';
			 
			
			 for($i = $pag-$links; $i <= $pag-1; $i++){
				if($i <= 0){
				}else{
					echo'<a style=" text-decoration:none; float:left;color:#fff" href="home.php?pag='.$i.'"  ><div  style=" float:left;width:100px; height:40px; font:#fff; border:solid 2px #CCC; background-color:#09f; " class=" img-rounded  " ><h4>Back</h4></div></a>';
					
					}
				 
		      }
			  for($i = $pag+1; $i <= $pag+1; $i++){
				if($i>$paginas){
				}else{
					echo'<a style=" float:right; text-decoration:none;color:#fff" href="home.php?pag='.$i.'"><div style=" float:right;width:100px; height:40px; font:#fff; border:solid 2px #CCC; background-color:#09f; " class=" img-rounded  " ><h4>More</h4></div></a>';
					
				}
				  }
				 
        ?>
        </div></center>
            <!-- /.row -->
            
       

    </div></div>
    <ul class="menu">
 
<?php
		$search = "quicksearch.php";
		include ("$search");
		?>



</ul>
    <!-- /.container -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

</body>
<?php
		$footer = "footer.php";
		include ("$footer");
		?>

</html>
