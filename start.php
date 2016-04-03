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
<html lang="en"><head>

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
    
     <!-- Navigation --><nav class="navbar  navbar-default navbar-fixed-top hidden-lg hidden-md hidden-sm" role="navigation" style=" margin-top:40px;background-color:#EFEFEF;">
        <div class="container">
            <br><center>
            <a  style="font-size: 14px; padding-right: 10px; text-decoration: none; font-family: 'Trebuchet MS', Arial, Helvetica, sans-serif; font-weight: 600; color: #1A1A1A;"href="search.php">Search</a>
             <a  style="font-size: 14px; padding-right: 10px; font-family: 'Trebuchet MS', Arial, Helvetica, sans-serif; font-weight: 600; color: #1A1A1A;"href="follow.php">Brands</a>
              <a  style="font-size: 14px; padding-right: 10px; font-family: 'Trebuchet MS', Arial, Helvetica, sans-serif; font-weight: 600; color: #1A1A1A;"href="home.php">Home</a>
               
        
        
                   
               
        </div>
    
        <!-- /.navbar-collapse -->
    </div>
    </nav>

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
        <li><a style=" color:#fff;" href="home.php">Home</a></li>
                   
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>
    

    
    
            

    <!-- Page Content --><br>
    <nav  class="navbar navbar-inverse " role="navigation" style="background-color:#F8D901; border:1px #CCC; margin-top:-40px;">
        <div class="container">
        
       
        
<?php
		$home = "homelink.php";
		include ("$home");
		?>
          
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav" style="float:left; margin-top:7px;" >
                    
  
                        
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>
 

</div>
    <div class="container">

        <!-- Page Header -->
        <div class="row">
            <div class=""></div>
        </div>
        <!-- /.row -->

        <!-- Projects Row -->
        <br>
        <div class="row">
            <div class="container" style="width:100%"><?php
  $pag = (isset($_GET['pag'])) ? strip_tags((int)$_GET['pag']) : '1';
 
  
 
    if( ($gender == "male")){
      $seleciona_produtos = mysql_query("SELECT `tudo`.* FROM `tudo` INNER JOIN `seguidores` ON `tudo`.`loja` = `seguidores`.`seguindo` &&`seguidores`.`seguidor`=$id ORDER BY `tudo`.`id` DESC"
); 
$seleciona_seguindo = mysql_query("SELECT * FROM seguidores WHERE seguidor=$id   ORDER BY id DESC"
);
  } if( ($gender == "female")){
       $seleciona_produtos = mysql_query("SELECT `tudo`.* FROM `tudo` INNER JOIN `seguidores` ON `tudo`.`loja` = `seguidores`.`seguindo` &&`seguidores`.`seguidor`=$id ORDER BY `tudo`.`id` DESC"
); 

$seleciona_seguindo = mysql_query("SELECT * FROM seguidores WHERE seguidor=$id   ORDER BY id DESC"
);  
  }
  
  if(mysql_num_rows($seleciona_seguindo) == 0){?> 
		
		
<?php header('Location:tofollow.php');?>
  


		
	<?php	
	  }else{
		  while($linhaprodutos = mysql_fetch_array($seleciona_produtos)){
		 
		  ?> 
          

  <div class="col-md-4 col-lg-4 col-sm-6 portfolio-item" style=" padding:1px; margin-left:0px;margin-right:0px; margin-top:-50px">
    <p>
    </font><a id="<?php  echo  $linhaprodutos['titulo'];?>"></a><br /> 
      
    </p>
    <div class="thumbnail"   style="box-shadow:0 0 4px #CCC; width:100%;
	-moz-box-shadow: 0 0 4px #CCC;
	-webkit-box-shadow: 0 0 4px #CCC;">
    
         <a style="text-decoration:none;" href="warhoo.php?warhoo=<?php echo $linhaprodutos['id'];?>"   >
         
         <div style="padding:2px;  " class="thumbnail">
        <img src="<?php echo $linhaprodutos['thumb'];?>" 
         alt="Generic placeholder thumbnail" width="329" height="329"></div></a><div style="padding:0px;" class="caption">
        <p class=" btn-default" style=" padding-left:10px;padding-right:10px; background-color: #FFFFFF; border: dashed 0px #FF6; height: 30px; font-size: 12px;"><font style=" font-style: ; font-family: 'Trebuchet MS', Arial, Helvetica, sans-serif; font-weight: 300;"   color="#373737"  size="4"><?php  echo  $linhaprodutos['titulo'];?></font><font style=" font-style: ; font-family: 'Trebuchet MS', Arial, Helvetica, sans-serif; font-weight: 300;"   color="#373737"  size="2"><?php  echo  $linhaprodutos['desc_en'];?></font><font size="4" color="#333"><?php   echo   " $ {$linhaprodutos['valordolar']}";?></font>
         <div style=" padding-top:5px; margin-top:50px; margin-left:40px;"></div>
          
          </div>
   
    </div>
      
</div><?php }}?></div>
            <!-- /.row -->
        </footer>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<script src="blurbox.js"></script>
    </div>
    <!-- /.container -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

</body>

</html>
