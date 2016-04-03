
<!DOCTYPE html>
<html lang="en"><head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Warhoo</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="menustyle.css">
    <link href="//netdna.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
    

    <!-- Custom CSS -->
    <link href="css/3-col-portfolio.css" rel="stylesheet">
     <link rel="stylesheet" href="css/animate.css" />
     <link rel="stylesheet" href="css/bootstrap.min.css" />

<link rel="stylesheet" href="css/animate.css" />
<link rel="stylesheet" href="css/font-awesome.min.css" >

<link href="css/owl.carousel.css" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="css/cubeportfolio.min.css">

<link href="css/owl.carousel.css" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="css/cubeportfolio.min.css">
    <style type="text/css">
    body {
	background-color: #fff;
}
.hotnow{
	background-image:url(img/hotnow.png);}


    </style>
<script src="js/custom.modernizr.js"></script>
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    


</head>

<body bgcolor="#fff">
 <!-- Navigation -->
    
    
 <!-- Navigation -->
    
     <!-- Navigation --><!-- Page Content -->
    
<section id="new" style="background-color:#fff;"><div><a style="text-decoration:none;" href="recent.php"><h3 style=" font-family:Verdana, Geneva, sans-serif; color:#0CF;"></h3></a><BR>
        <!-- Page Header -->
        <div class="row">
            <div class=""></div>

      
        
        <div class="row" >
            <div class="container" style="width:100%"><?php
  $pag = (isset($_GET['pag'])) ? strip_tags((int)$_GET['pag']) : '1';
  
  $pag = (isset($_GET['pag'])) ? strip_tags((int)$_GET['pag']) : '1';
  $maximo = '30';
  $inicio = ($pag * $maximo) - $maximo;
 
  
 
    if( ($gender == "male")){
      $seleciona_produtos = mysql_query("SELECT * FROM loja WHERE categoria=1   ORDER BY id DESC  LIMIT $inicio, $maximo"
); 
$seleciona_seguindo = mysql_query("SELECT * FROM seguidores WHERE seguidor=$id   ORDER BY id DESC"
);
  } if( ($gender == "female")){
       $seleciona_produtos = mysql_query("SELECT * FROM loja WHERE categoria=2   ORDER BY id DESC LIMIT $inicio, $maximo"
); 

$seleciona_seguindo = mysql_query("SELECT * FROM seguidores WHERE seguidor=$id   ORDER BY id DESC"
);  
  } 
  
  
  if((mysql_num_rows($seleciona_produtos) == 0)){?> 
		
  <div class="modal-content " style="background-color: #FFFFFF">
    <div  class="modal-footer">
      <div class="col-lg-12 col-md-12 col-sm-12 col-sx-12" style=" background-color:transparent ">
          
           
  	  </p>
  	  <p><center>
  	    <h1 style="color:#333">FIRST TIME HERE?</h1>
        <font size="3" color="#333"> Please, follow stores before go to home page</font>
  	  </center></p>
  	  <center>
  	  
  	    <div class="row">
            <div  class="container" style="width:100%;"><?php
  $pag = (isset($_GET['pag'])) ? strip_tags((int)$_GET['pag']) : '1';
  $maximo = '5';
  $inicio = ($pag * $maximo) - $maximo;
 
   if( $gender == "male"){
 
      $seleciona_produtos = mysql_query("SELECT * FROM loja WHERE categoria=1  ORDER BY id DESC"
) or die (mysql_error());  $seguidor = mysql_query("SELECT * FROM seguidores WHERE seguidor='$id'") ;
    $query_seguidor = mysql_fetch_array($seguidor);}
	 if( $gender == "female"){
 
      $seleciona_produtos = mysql_query("SELECT * FROM loja WHERE categoria=2  ORDER BY id DESC"
);  $seguidor = mysql_query("SELECT * FROM seguidores WHERE seguidor='$id'") ;
    $query_seguidor = mysql_fetch_array($seguidor);}

  
  
  if(mysql_num_rows($seleciona_produtos) == 0){
		  echo'sem produtos';
	  }else{
		  while($linhaprodutos = mysql_fetch_array($seleciona_produtos)){
		 
		  ?> 
          

  <div class="col-md-2 col-sm-6 portfolio-item" style=" padding:5px; margin-left:0px;margin-right:0px;">
    <p>
    </font><br /> 
      
    </p>
    <div class="thumbnail"   style="box-shadow:0 0 4px #CCC; width:100%;
	-moz-box-shadow: 0 0 4px #CCC;
	-webkit-box-shadow: 0 0 4px #CCC;">
    
         <a style="text-decoration:none;" href="tofollow.php"   >
         
         <div style="padding:2px;  " class="thumbnail">
        <img class="img-circle" src="<?php echo $linhaprodutos['thumb'];?>" 
         alt="Generic placeholder thumbnail" width="250" height="250"></div></a><div style="padding:0px;" class="caption">
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
					echo'<a style=" text-decoration:none; float:left;color:#fff" href="tofollow.php?pag='.$i.'"  ><div  style=" float:left;width:100px; height:40px; font:#fff; border:solid 2px #CCC; background-color:#09f; " class=" img-rounded  " ><h4>Back</h4></div></a>';
					
					}
				 
		      }
			  for($i = $pag+1; $i <= $pag+1; $i++){
				if($i>$paginas){
				}else{
					echo'<a style=" float:right; text-decoration:none;color:#fff" href="tofollow.php?pag='.$i.'"><div style=" float:right;width:100px; height:40px; font:#fff; border:solid 2px #CCC; background-color:#09f; " class=" img-rounded  " ><h4>More</h4></div></a>';
					
				}
				  }
				 
        ?>
        </div></center>
     <br>
     <div><font size="1" style="color:#fff;">*clicking login you are logging with you facebook account.   </font></div><br>
 </center><center>
       
  	  </center>
	    </div>	
      </div>
  </div>
		

  


		
	<?php	
	  }else{
		  while($linhaprodutos = mysql_fetch_array($seleciona_produtos)){
		 
		  ?> 
          

  <div class="col-md-4 col-lg-4 col-sm-6 col-xs-6 portfolio-item" style=" padding:1px; margin-left:0px;margin-right:0px; margin-top:-50px">
  
    <p>
    </font><a id="<?php  echo  $linhaprodutos['titulo'];?>"></a><br />
    <?php $loja = $linhaprodutos['loja'];
		   $seleciona_loja = mysql_query("SELECT * FROM loja WHERE id = '$loja'");
		    $query_loja = mysql_fetch_array($seleciona_loja);?> 
      
    </p>
    <div class="thumbnail"   style=" margin:3px; margin-top:30px; background-color:#E0E0E0; width:100%;
	
    border-bottom-left-radius:0px;
    border-bottom-right-radius:0px;
    border-radius:0px;
    ">
   
    
    
    
         <a style="text-decoration:none;" href="warhoo.php?warhoo=<?php echo $linhaprodutos['id'];?>"   >
         
         <div style="padding:0px; border-right:0px; border-left:0px; border-top:0px;  margin-bottom:0px;" class="thumbnail product">
        <img class="product" style="border:0px; padding:0px; border-color:transparent;" src="<?php echo $linhaprodutos['thumb'];?>" 
         alt="Generic placeholder thumbnail" width="329" height="329"></div></a><div style="padding:0px;" class="caption">
         <p><div style="margin-left:-10px;  background-color:transparent "><div style=" width:100%; "><div style=" border-right:solid 2px #fff; width:57%;"><a class="btn btn-default" style=" border-radius:0px; background-color:transparent;   border:0px; " ><font style="  font-weight: 600;padding-left:10px;"  color="#000"  size="2">
           <?php   echo   " $ {$linhaprodutos['valordolar']}";?>
           </font></a></div><span style="float:right; padding-right:10px; margin-top:-26px; font-weight:600">WISH</span><i style=" float:right; margin-top:-23px; padding-right:50px;" class=" fa fa-shopping-cart "> </i></div><div style="float:right"><div style=" width:60px; margin-top:-20px;"></div></div></div>
         
        
          
          </div>
   
    </div>
      
</div><?php }}?></div><div>
          <center><?php
             if( $gender == "male"){
 
      $registros = mysql_query("SELECT * FROM tudo WHERE categoria=1 or categoria=0  "
); }
	 if( $gender == "female"){
 
      $registros = mysql_query("SELECT * FROM tudo WHERE categoria=2 or categoria=0 "
);}
			 $totalRegistros = mysql_num_rows($registros);
			 $paginas = ceil($totalRegistros/$maximo);
			 $links = '1';
			 
			
			 for($i = $pag-$links; $i <= $pag-1; $i++){
				if($i <= 0){
				}else{
					echo'<a style=" text-decoration:none; float:left;color:#fff" href="index.php?pag='.$i.'"  ><div  style=" float:left;width:180px; height:40px; font:#fff; border:solid 2px #CCC; background-color:#09f; " class=" img-rounded  " ><h4>Back</h4></div></a>';
					
					}
				 
		      }
			  for($i = $pag+1; $i <= $pag+1; $i++){
				if($i>$paginas){
				}else{
					echo'<a class="hidden-xs hidden-sm"style=" float:right; text-decoration:none;color:#fff" href="index.php?pag='.$i.'"><div  style=" float:right;width:100px; height:40px; font:#fff; border:solid 2px #CCC; background-color:#09f; " class=" img-rounded  " ><h4>More</h4></div></a>
					<a class=" hidden-lg hidden-md" style="  text-decoration:none;color:#fff" href="index.php?pag='.$i.'"><div style=" float:right;width:100%; height:40px; font:#fff; border:solid 2px #CCC; background-color:#09f; " class=" img-rounded  " ><center><h4>More</h4></center></div></a> 
					';
					
					
					
				}
				  }
				 
        ?></center>
        </div>
 </section>
<ul class="">
 
<?php
		$search = "quicksearch2.php";
		include ("$search");
		?>
        

</ul>

            <!-- /.row -->
        
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<script src="blurbox.js"></script>
    </div>
    <!-- /.container -->

    <!-- jQuery -->
<script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/retina.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/royal_preloader.min.js"></script>
	<script src="js/smooth-scroll.js"></script>
	<script src="js/jquery.appear.js"></script>	
	<script src="js/parallax.js"></script>
	<script src="js/wow.js"></script>
	<script src="js/count.js"></script>
	<script src="js/charts.js"></script>
	<script src="js/jquery.cubeportfolio.min.js"></script>
	<script src="js/main.js"></script>
	<script src="js/owl.carousel.min.js"></script>
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
</script><script src="js/scripts.js"></script>

<script src="js/owl.carousel.min.js"></script>
<script type="text/javascript">
//<![CDATA[
	$(document).ready(function() {
    		$("#clients").owlCarousel({
				autoPlay: 3000, //Set AutoPlay to 3 seconds
				items : 4,
				itemsDesktop : [1199,3],
				itemsDesktopSmall : [979,3]
			});
		});
	//]]>
</script>
<script src="styleswitcher/js/styleswitcher.js"></script>
</body>

</html>
