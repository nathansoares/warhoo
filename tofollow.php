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
	$redirect_url='http://localhost/warhooweb/bootstrap/index.php';

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
	$logout = 'http://localhost/warhooweb/bootstrap/logout.php';

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

    <!-- Custom CSS -->
    <link href="css/3-col-portfolio.css" rel="stylesheet">
    <style type="text/css">
    body {
	background-image: url(img/6819043-blur.jpg);
	background-color: #f2f2f2;
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
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation" style="background-color:#303;">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
           
                
          <a  style="height:50px;margin-left:-5px; "  href="index.php" ><img   style="margin-top:10px;;" style="height:50px; background-color:transparent; border:0px; " src="img/WARHOO.png" width="171" height="34"  /></a>
          <div style="float:right"><img   style=" border:2px; float:left  margin-right:25px; padding:5px; margin-top:10px"width="35px;" height="35px" src="<?php echo $image; ?>" alt="<?php echo $name; ?>" class="img-thumbnail" ><div class="hidden-xs hidden-sm " style="float:right; margin-top:10px;"><span style="color:#fff; padding-left:5px;"><?php echo $name; ?></span><br><a href="logout.php"><span style=" font-size:12px;color:#f4f4f4; padding-left:5px; float:left;">Logout</span></a></div>
         </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul  class="nav navbar-nav" style=" color:#fff; margin-top: -40px; margin-left:430px;"><li><a style=" color:#fff;" href="search.php">Search <span class="sr-only">(current)</span></a></li>
        
        <li><a style=" color:#fff;" href="follow.php">Brands</a></li>
        <li><a style=" color:#fff;" href="home.php">My home</a></li>
                   
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>

    <!-- Page Content --> <h2 style=" margin-left:30px; font-family:'Trebuchet MS', Arial, Helvetica, sans-serif; color:#fff">Who to follow?</h2><br>
<br>
    <div class=" modal-body container" style="box-shadow:0 5 10px #CCC; background-color:#09f; 
	-moz-box-shadow: 0 5 10px #CCC;
	-webkit-box-shadow: 0 5 10px #CCC; width:90%;"><br>

<!-- Page Header -->
        <div class="row">
            <div class="col-lg-12"></div>
</div>
        <!-- /.row -->

        <!-- Projects Row -->
        <div class="row">
            <div class="container" style="width:100%"><?php
  $pag = (isset($_GET['pag'])) ? strip_tags((int)$_GET['pag']) : '1';
  $maximo = '40';
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
    
         <a style="text-decoration:none;" href="brand.php?warhoo=<?php echo $linhaprodutos['id'];?>"   >
         
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
            <!-- /.row -->
        </footer>

    </div>
    <!-- /.container -->

    <!-- jQuery -->
<script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
<script src="js/bootstrap.min.js"></script>
<script src="js/royal_preloader.min.js"></script>
	
	<script src="js/jquery.appear.js"></script>	
	<script src="js/parallax.js"></script>
	<script src="js/wow.js"></script>
	<script src="js/count.js"></script>
	<script src="js/charts.js"></script>
	<script src="js/jquery.cubeportfolio.min.js"></script>
	<script src="js/main.js"></script>
	<script src="js/owl.carousel.min.js"></script>
	<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false&amp;language=en"></script>
	<script src="js/gmap3.min.js" type="text/javascript"></script>
	<script src="js/scripts.js"></script>

<script src="js/owl.carousel.min.js"></script>

</body>

</html>
