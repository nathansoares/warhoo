<?php

include 'conn.php'
?>

<?php
set_time_limit(0);
/*	FACEBOOK LOGIN + LOGOUT - PHP SDK V4.0 - BOOTSTRAP THEME
 *	file 			- index.php
 * 	Developer 		- Krishna Teja G S
 *	Website			- http://packetcode.com/apps/fblogin-basic/
 *	Date 			- 27th Sept 2014
 *	license			- GNU General Public License version 2 or later
*/

/* INCLUSION OF LIBRARY FILEs*/
	require_once( 'lib/Facebook/FacebookSession.php');
	require_once( 'lib/Facebook/FacebookRequest.php' );
	require_once( 'lib/Facebook/FacebookResponse.php' );
	require_once( 'lib/Facebook/FacebookSDKException.php' );
	require_once( 'lib/Facebook/FacebookRequestException.php' );
	require_once( 'lib/Facebook/FacebookRedirectLoginHelper.php');
	require_once( 'lib/Facebook/FacebookAuthorizationException.php' );
	require_once( 'lib/Facebook/GraphObject.php' );
	require_once( 'lib/Facebook/GraphUser.php' );
	require_once( 'lib/Facebook/GraphSessionInfo.php' );
	require_once( 'lib/Facebook/Entities/AccessToken.php');
	require_once( 'lib/Facebook/HttpClients/FacebookCurl.php' );
	require_once( 'lib/Facebook/HttpClients/FacebookHttpable.php');
	require_once( 'lib/Facebook/HttpClients/FacebookCurlHttpClient.php');

/* USE NAMESPACES */
	
	use Facebook\FacebookSession;
	use Facebook\FacebookRedirectLoginHelper;
	use Facebook\FacebookRequest;
	use Facebook\FacebookResponse;
	use Facebook\FacebookSDKException;
	use Facebook\FacebookRequestException;
	use Facebook\FacebookAuthorizationException;
	use Facebook\GraphObject;
	use Facebook\GraphUser;
	use Facebook\GraphSessionInfo;
	use Facebook\FacebookHttpable;
	use Facebook\FacebookCurlHttpClient;
	use Facebook\FacebookCurl;

/*PROCESS*/
	
	//1.Stat Session
	 session_start();
	 
 


	//check if users wants to logout
	 if(isset($_REQUEST['logout'])){
	 	unset($_SESSION['fb_token']);
	 }
	
	//2.Use app id,secret and redirect url 
	$app_id = '528865363883764';
	$app_secret = 'c01b8502e97379fead44e839961f3feb';
	$redirect_url='http://www.warhoo.com/home.php';

	//3.Initialize application, create helper object and get fb sess
	 FacebookSession::setDefaultApplication($app_id,$app_secret);
	 $helper = new FacebookRedirectLoginHelper($redirect_url);
	 $sess = $helper->getSessionFromRedirect();

	 //check if facebook session exists
	if(isset($_SESSION['fb_token'])){
		$sess = new FacebookSession($_SESSION['fb_token']);
		try{
			$sess->Validate($app_id, $app_secret);
		}catch(FacebookAuthorizationException $e){
			print_r($e);
		}
	}

	$loggedin = false;
	//get email as well with user permission
	$login_url = $helper->getLoginUrl(array('email'));
	//logout
	$logout = 'http://www.warhoo.com/logout.php';

	//4. if fb sess exists echo name 
	 	if(isset($sess)){
			    
         


	 		//store the token in the php session
	 		$_SESSION['fb_token']=$sess->getToken();
	 		//create request object,execute and capture response
	 		$request = new FacebookRequest($sess,'GET','/me');
			// from response get graph object
			$response = $request->execute();
			$graph = $response->getGraphObject(GraphUser::classname());
			// use graph object methods to get user details
			$id = $graph->getId();
			
			
			$name= $graph->getName();
			$location = $graph->getProperty('location');
			$locale = $graph->getProperty('locale');
			$email = $graph->getProperty('email');
			$firstname = $graph->getFirstName();
			$middlename = $graph->getMiddleName();
			$lastname = $graph->getLastName();
			$birthday = $graph->getBirthday();
			$gender = $graph->getProperty('gender');
			$wcode = md5 ($email);
			$warhoocreditnumber = ($id/3);
			$image = 'https://graph.facebook.com/'.$id.'/picture?width=300';
			$loggedin  = true;
			
			$pegaemail = mysql_query("SELECT * FROM users WHERE fid = '$id'");
			
			if (@mysql_num_rows($pegaemail)>0) {
			
			$loggedin  = true;
			
			}else{
				
			$cadastra_user = mysql_query("INSERT INTO users(name, firstname, middlename, lastname, gender, email, locale, birthday,fid, wcode, warhoocreditnumber)VALUES('$name','$firstname','$middlename','$lastname','$gender','$email','$locale','$birthday','$id', '$wcode', '$warhoocreditnumber')");
				
				
				}
			
			
	}
	if(!isset($sess)){header("location: login.php");}
	if(!isset($_SESSION['fb_token'])){header("location: login.php");}

?><?php  ?>
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
    

    <!-- Custom CSS -->
    <link href="css/3-col-portfolio.css" rel="stylesheet">
     <link rel="stylesheet" href="css/animate.css" />
     <link rel="stylesheet" href="css/bootstrap.min.css" />
     

<link rel="stylesheet" href="css/animate.css" />
 <link href="//netdna.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
<link href="css/owl.carousel.css" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="css/cubeportfolio.min.css">

<link href="css/owl.carousel.css" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="css/cubeportfolio.min.css">
    <style type="text/css">
    body {
	background-color: #f2f2f2;
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

<body>
 <!-- Navigation -->
    
    
 <!-- Navigation -->
    
     <!-- Navigation --><?php
		$nav = "navbarhome.php";
		include ("$nav");
		?><!-- Page Content --><a href="#htw" class="scroll ">"<div class="hotnow hidden-xs hidden-sm"   style=" width:160px; height:120px;  position:fixed; right:0px; z-index:1500; top:30%"></div></a>
        

<br><br>
		<section style="height:600px;  width:100%;" id="home" class="top_video">
			<div id="overlay">
			  <center><div id="apDiv1"><a href="#start" class="scroll"><img class="img-thumbnail thumbnail" style="background-color:transparent; border:0px;" src="img/logotipo3.png" alt="" width="460" height="415" border="0" /></a></div></center>
			</div>
			<!--ADD YOUR VIDEO-->	
		<div id="BigVideo" class="player" data-property="{videoURL:'http://youtu.be/PIb5YNC3yW0', containment:'.top_video', autoPlay:true, mute:true, startAt:0, opacity:1, showControls : false}"></div>	
	
			<!--ANIMATED TEXT-->	
					
						
						
						
						<div class="text-center pad30">
							<a href="#about" class="scroll">
							<i class="fa fa-caret-down fa-3x fa-inverse wow rotateIn" data-wow-duration="1s" data-wow-delay="8s"></i></a>
						</div>
					</div>	
				</section><section id="start"><?php
		$start = "hstart.php";
		include ("$start");
		?></section><br>
        
    
<section id="new"><div class="container"><a style="text-decoration:none;" href="recent.php"><h3 style=" font-family:Verdana, Geneva, sans-serif; color:#191919;">RECENT FASHION</h3></a><BR>
        <!-- Page Header -->
        <div class="row">
            <div class=""></div>

      
        
        <div class="row" >
            <div class="container" style="width:100%"><?php
  
  
  $pag = (isset($_GET['pag'])) ? strip_tags((int)$_GET['pag']) : '1';
  $maximo = '6';
  $inicio = ($pag * $maximo) - $maximo;
 
  
 
    if( ($gender == "male")){
      $seleciona_produtos = mysql_query("SELECT * FROM tudo WHERE categoria=1 or categoria=0  ORDER BY id DESC  LIMIT $inicio, $maximo"
); 
$seleciona_seguindo = mysql_query("SELECT * FROM seguidores WHERE seguidor=$id   ORDER BY id DESC"
);
  } if( ($gender == "female")){
       $seleciona_produtos = mysql_query("SELECT * FROM tudo WHERE categoria=2 or categoria=0  ORDER BY id DESC LIMIT $inicio, $maximo"
); 

$seleciona_seguindo = mysql_query("SELECT * FROM seguidores WHERE seguidor=$id   ORDER BY id DESC"
);  
  } 
  
  
  	 if(mysql_num_rows($seleciona_produtos) == 0){
		  echo'No products';	
	  }else{
		  while($linhaprodutos = mysql_fetch_array($seleciona_produtos)){
		 
		  ?> 
          

  <div class="col-md-4 col-lg-4 col-sm-6 portfolio-item" style=" padding:1px; margin-left:0px;margin-right:0px; margin-top:-50px">
  
    <p>
    </font><a id="<?php  echo  $linhaprodutos['titulo'];?>"></a><br />
    <?php $loja = $linhaprodutos['loja'];
		   $seleciona_loja = mysql_query("SELECT * FROM loja WHERE id = '$loja'");
		    $query_loja = mysql_fetch_array($seleciona_loja);?> 
      
    </p>
    <div class="thumbnail"   style="box-shadow:0 0 4px #CCC; width:100%;
	-moz-box-shadow: 0 0 4px #CCC;
	-webkit-box-shadow: 0 0 4px #CCC;
    border-bottom-left-radius:0px;
    border-bottom-right-radius:0px;
    border-radius:0px;">
    
     <div style="width:100%"><div style=""><div style="margin-left:5px; margin-right:20px;"><h4 style="text-transform:uppercase; font-weight:600;  font-stretch:condensed">
       <?php  echo  $linhaprodutos['titulo'];?>
     </h4>
     <div style="float:right; margin-top:-30px; padding-right:5px;"><span style=""><a style="text-decoration:none; color:#000; "  href="warhoo.php?warhoo=<?php echo $linhaprodutos['id'];?>"> <i style="color:#F03; " class="fa fa-plus fa-lg "></i></a></span> </div></div></div></div> <br>
    
         <a style="text-decoration:none;" href="warhoo.php?warhoo=<?php echo $linhaprodutos['id'];?>"   >
         
         <div style="padding:2px;" class="thumbnail product">
        <img class="product" style="background-color:transparent; border:0px;" src="<?php echo $linhaprodutos['thumb'];?>" 
          width="329" height="329"></div></a><div style="padding:0px;" class="caption">
        <p class=" btn-default" style=" padding-left:10px;padding-right:10px; background-color: #FFFFFF; border: dashed 0px #FF6; height: 30px; font-size: 12px;"><font style=" font-style: ; font-family: 'Trebuchet MS', Arial, Helvetica, sans-serif; font-weight: 300;"   color="#373737"  size="4"><?php  echo  $linhaprodutos['titulo'];?></font><font style=" font-style: ; font-family: 'Trebuchet MS', Arial, Helvetica, sans-serif; font-weight: 300;"   color="#373737"  size="2"><?php  echo  $linhaprodutos['descricao'];?></font><font style="font-weight:600; color:#333" size="5" ><?php   echo   " $ {$linhaprodutos['valordolar']}";?></font>
         <div style=" padding-top:5px; margin-top:50px; margin-left:40px;"></div>
          
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
					echo'<a style=" text-decoration:none; float:left;color:#fff" href="fashion.php?pag='.$i.'"  ><div  style=" float:left;width:100px; height:40px; font:#fff; border:solid 2px #CCC; background-color:#09f; " class=" img-rounded  " ><h4>Back</h4></div></a>';
					
					}
				 
		      }
			  for($i = $pag+1; $i <= $pag+1; $i++){
				if($i>$paginas){
				}else{
					echo'<center><a class="hidden-xs hidden-sm"style="  text-decoration:none;color:#fff" href="fashion.php?pag=1"><center><div style=" margin-left:45%; margin-top:-13px; width:100px; height:40px; font:#03D1F5; border:solid 2px #CCC; background-color:#fff; " class=" img-rounded col-sm-12 col-xs-12  " ><h4 style=" color:#03D1F5">More</h4></div></center></a></center>
					<a class="col-sm-12 col-xs-12 hidden-lg hidden-md" style="  text-decoration:none;color:#fff" href="fashion.php?pag=1"><div style=" float:right;width:100%; height:40px; font:#fff; border:solid 2px #CCC; background-color:#09f; " class=" img-rounded  " ><center><h4>More</h4></center></div></a> 
					';
					
					
					
				}
				  }
				 
        ?></center>
        </div>
 </section>
<ul class="menu hidden-xs hidden-sm">
 
<?php
		$search = "quicksearch.php";
		include ("$search");
		?>
        

</ul>
          <div class="container"><a style="text-decoration:none;" href="tech.php"><h3 style=" font-family:Verdana, Geneva, sans-serif; color:#191919;">RECENT TECH</h3></a></div>
         <section id="tech"><?php
		$htech = "htech.php";
		include ("$htech");
		?><br></section>
       
        <section id="htw"><?php
		$hhtw = "hhtw.php";
		include ("$hhtw");
		?><br></section><section id="brands"><?php
		$brands = "hbrand.php";
		include ("$brands");
		?></section><br>
        <div class="container"> <a style="text-decoration:none;" href="tech.php"><h3 style=" font-family:Verdana, Geneva, sans-serif; color:#191919;">EXPLORE FASHION</h3></a></div>
        <section id="explore"><?php
		$hcasual = "hcasual.php";
		include ("$hcasual");
		?><br></section>
        <section id="style2"><?php
		$hsocial = "hsocial.php";
		include ("$hsocial");
		?><br></section>
        
       <section id="style3"> <?php
		$hothers = "hothers.php";
		include ("$hothers");
		?></section><section id="cat"><?php
		$cat = "hcat.php";
		include ("$cat");
		?></section><div class="container"> <a style="text-decoration:none;" href="tech.php"><h3 style=" font-family:Verdana, Geneva, sans-serif; color:#191919;">EXPLORE TECHNOLOGY</h3></a></div>
         <section id="style3"> <?php
		$htech2 = "htech2.php";
		include ("$htech2");
		?></section><section id="cat"><?php
		$catech = "hcatech.php";
		include ("$catech");
		?></section><div class="container"> <a style="text-decoration:none;" href="tech.php"><h3 style=" font-family:Verdana, Geneva, sans-serif; color:#191919;">MORE</h3></a></div><section id="OTH"><?php
		$hstand = "hstand.php";
		include ("$hstand");
		?><br></section>
        
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
    <script src="js/share.min.js"></script>
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
</script>
<script src="js/scripts.js"></script>

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
 <?php
		$footer = "footer.php";
		include ("$footer");
		?>
</html>
