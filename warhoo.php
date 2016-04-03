<?php

include 'conn.php'
?>
<?php
    session_start();
	if(isset($_SESSION["email"]) ||isset($_SESSION["password"])) {
		
		$selecionauser= mysql_query("SELECT * FROM users WHERE email ='".$_SESSION['email']."'");
while($user = mysql_fetch_array($selecionauser)){ 
	$gender = $user['genero'];
	$name = $user['firstname'];
	$id = $user['id'];}
	} else {
		echo"<center></center>";
}


?>
	  
	
	
          
          <?php 

?><?php  ?><!DOCTYPE html>
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
 <link href="//netdna.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
<link href="css/owl.carousel.css" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="css/cubeportfolio.min.css">
<style type="text/css">
body {
	background-color: #62B0FF;
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

    <!-- Navigation -->
   <?php
		$nav = "navbar.php";
		include ("$nav");
		?>

    
    <!-- Page Content -->
   <section id="home"  style="background-color:#62B0FF;" class="top_video"> <div class="container"><br><br><br><br>
    <div class="col-sm-12 col-md-6 col-xs-12 img-rounded" style=" background:transparent; border:dashed 1px  #CCC;">

<div class="thumbnail"  style="box-shadow:0 0 8px #CCC;
	-moz-box-shadow: 0 0 8px #CCC;
	-webkit-box-shadow: 0 0 8px #CCC;>"><div class="thumbnail"><?php 
		  $idproduto =$_GET['warhoo'];
		  $seleciona_produtos = mysql_query("SELECT * FROM tudo WHERE id = '$idproduto'");
		 
		  $query_produto = mysql_fetch_array($seleciona_produtos);
		  $loja = $query_produto['loja'];
		   $seleciona_loja = mysql_query("SELECT * FROM loja WHERE id = '$loja'");
		    $query_loja = mysql_fetch_array($seleciona_loja);
		  
		  {
			  
		  }
		   
		  
		  ?> 
         <a style="text-decoration:none;" href="brand.php?warhoo=<?php echo $query_loja['id'];?>"   ><img style=" float:left; padding-right:0px;" class="img-circle" width="30px" height="30px;" src="<?php echo $query_loja['thumb'];?>" 
         alt="Generic placeholder thumbnail"></a><img width="400px" height="400px;" src="<?php echo $query_produto['thumb'];?>" 
         alt="Generic placeholder thumbnail"></div>
         
      </div><div class="img-rounded"  style="background-color:transparent; margin-top:10px;; height:50px;;"><div style=" padding-top:10px; margin-top:10px; margin-left:40px;"><font size="3" style=" font-weight:500"   color="transparent" > </font> 
</form>


</div></div></div>

        <!-- Page Header -->
        <div class="row" style="border:1px #FF0">
          <div class="col-sm-12 col-md-6 col-xs-12 img-rounded" style=" background:transparent; border:solid 3px  #ccc;">
            <p><font size="5" style=" font-weight:500"   color="#fff"><?php echo $query_produto['titulo'];?></font></p>
            <p><br />
            </p>
            <iframe width="100%" height="300px;" src="//www.youtube.com/embed/<?php echo $query_produto['embed'];?>?rel=0&amp;controls=0&amp;showinfo=0" frameborder="0" allowfullscreen></iframe><hr><font color="#fff"><?php echo $query_produto['descricao'];?></font><br />
    <div> <font class="" size="2" style=" font-weight:600"  color="#fff" > <?php  echo   " $ {$query_produto['valordolar']}";?></font><br>
    <div class="img-rounded"  style="background-color:#F7D511; margin-top:10px;; height:50px;;"><div style=" padding-top:10px; margin-top:10px; margin-left:40px;"><font size="3" style=" font-weight:500"   color="#fff" > </font> <font size="4" style=" font-weight:500"   color="#fff" >Price:<?php  echo   " $ {$query_produto['valordolar']}";?></font>
      <form class="form-group-sm" style=" float:right; margin-top:-5px; padding-right:10px;" action="https://www.paypal.com/cgi-bin/webscr" method="post" target="paypal">
<input type="hidden" name="cmd" value="_s-xclick">
<input type="hidden" name="hosted_button_id" value="<?php echo $query_produto['paypal'];?>">
<button type="submit" class="btn btn-primary" style="background-color:#09F; border:0px;"  src=""border="0" name="submit" alt=""><span><i style="" class=" fa fa-shopping-cart fa-2x"> </i></span> </button>

</form>


</div></div></div><div  style="margin-left:; margin-top:50px;" class="col-sm-12 col-md-6 col-xs-12" id=pagamentos></div>
        </div>
        <!-- /.row -->

        <!-- Projects Row -->
        <div class="row"><!-- /.row -->
     

    </div><div id="BigVideo" class="player" data-property="{videoURL:'http://www.youtube.com/watch?v=<?php echo $query_produto['embed'];?>', containment:'.top_video', autoPlay:true, mute:true, startAt:0, opacity:1, showControls : false}"></div></section>
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
</script><script type="text/javascript">$(document).delegate('*[data-toggle="lightbox"]', 'click', function(event) {
    event.preventDefault();
    $(this).ekkoLightbox();
});</script>
<script src="styleswitcher/js/styleswitcher.js"></script>

</body>
<?php
		$footer = "footer.php";
		include ("$footer");
		?>

</html>
