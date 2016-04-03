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

    <!-- Navigation --><br><br>
    <nav  class="navbar navbar-inverse navbar-fixed-top" role="navigation" style="background-color:#E8E8E8; border:1px #CCC; margin-top:50px;">
        <div style="margin-top:10px;" class="container">
        <H4 style="color:#fff;">&nbsp;</H4><a style="text-decoration:none;" href="following.php"><span class="btn btn-primary" style=" float:right;background-color:#06F; margin-top:-35px;">Following</span></a>
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
     <!-- Navigation --><?php
		$nav = "navbar.php";
		include ("$nav");
		?><!-- Page Content -->
    <div  class="container"><br>


        <!-- Page Header -->
        <div class="row">
            <div class="col-lg-12"></div>
        </div><br>
        <!-- /.row -->

        <!-- Projects Row -->
<div class="row">
            <div class="container" style="width:100%"><?php
  $pag = (isset($_GET['pag'])) ? strip_tags((int)$_GET['pag']) : '1';
  $maximo = '40';
  $inicio = ($pag * $maximo) - $maximo;
 
   if( $gender == "male"){
 
      $seleciona_produtos = mysql_query("SELECT * FROM loja WHERE categoria=1  ORDER BY id DESC LIMIT $inicio, $maximo"
);  $seguidor = mysql_query("SELECT * FROM seguidores WHERE seguidor='$id'") ;
    $query_seguidor = mysql_fetch_array($seguidor);}
	 if( $gender == "female"){
 
      $seleciona_produtos = mysql_query("SELECT * FROM loja WHERE categoria=2  ORDER BY id DESC LIMIT $inicio, $maximo"
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
    
         <a style="text-decoration:none;" href="brand.php?warhoo=<?php echo $linhaprodutos['id'];?>"   >
         
         <div style="padding:2px; border-radius:opx;  " class="thumbnail">
        <img class="img-circle" src="<?php echo $linhaprodutos['thumb'];?>" 
         alt="Generic placeholder thumbnail" width="250" height="250"></div></a><div style="padding: 0px; color: #F9F2FF;" class="caption">
        <font style=" font-style: ; font-family: 'Trebuchet MS', Arial, Helvetica, sans-serif; font-weight: 300;"   color="#373737"  size="4"><center><?php  echo  $linhaprodutos['nome'];?></center></font>
         
          
          </div>
   
    </div>
      
</div><?php }}?></div><center><div style="width:210px; "  >
          <?php
             if( $gender == "male"){
 
      $registros = mysql_query("SELECT * FROM loja WHERE categoria=1  "
); }
	 if( $gender == "female"){
 
      $registros = mysql_query("SELECT * FROM loja WHERE categoria=2 "
);}
			 $totalRegistros = mysql_num_rows($registros);
			 $paginas = ceil($totalRegistros/$maximo);
			 $links = '1';
			 
			
			 for($i = $pag-$links; $i <= $pag-1; $i++){
				if($i <= 0){
				}else{
					echo'<a style=" text-decoration:none; float:left;color:#fff" href="follow.php?pag='.$i.'"  ><div  style=" float:left;width:100px; height:40px; font:#fff; border:solid 2px #CCC; background-color:#09f; " class=" img-rounded  " ><h4>Back</h4></div></a>';
					
					}
				 
		      }
			  for($i = $pag+1; $i <= $pag+1; $i++){
				if($i>$paginas){
				}else{
					echo'<a style=" float:right; text-decoration:none;color:#fff" href="follow.php?pag='.$i.'"><div style=" float:right;width:100px; height:40px; font:#fff; border:solid 2px #CCC; background-color:#09f; " class=" img-rounded  " ><h4>More</h4></div></a>';
					
				}
				  }
				 
        ?>
        </div></center>

            <!-- /.row -->
        

    </div>
    <ul class="menu">
 
<?php
		$search = "quicksearchstore.php";
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
