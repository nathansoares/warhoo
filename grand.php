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
	
	 
 
 /*PROCESS*/
	
	//1.Stat Session
	
	 
 


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
    <link href="grandmenu.css" rel="stylesheet">
    

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>
<nav class="navbar navbar-inverse navbar-fixed-top" style="background-color:#0A0A0A"><div class="container">
    <div class="navbar-header">
		
		<a style=" padding:2px;" class="navbar-brand" href="#"><img src="img/newlogo.png" width="54" height="45"></a>
	</div>
    <div style="float:right"><a href="explore.php"><img   style="  float:left  margin-right:25px; padding:5px; margin-top:10px"width="35px;" height="35px" src="<?php echo $image; ?>" alt="<?php echo $name; ?>" class="img-thumbnail" ></a><div class="hidden-xs hidden-sm " style="float:right; margin-top:10px;"><span style="color:#fff; padding-left:5px;"><?php echo $name; ?></span><br><a href="logout.php"><span style=" font-size:12px;color:#f4f4f4; padding-left:5px; float:left;">Logout</span></a></div>
         </div>
	

                
            
	<div class="collapse navbar-collapse js-navbar-collapse">
    <div style="margin-left:40%; margin-top:10px;  width:300px; height:30px;" ><a style=" color:#fff; padding-right:20px; text-transform:uppercase; font-size:16px;" href="search.php">Search <span class="sr-only">(current)</span></a>
        
        <a style="padding-right:3px; color:#fff; text-transform:uppercase; font-size:16px;" href="follow.php">Brands</a>
        <a style="padding-right:3px; color:#fff; text-transform:uppercase; font-size:16px;" href="explore.php">Explore</a>
                   
               </div>
		<ul style="margin-left:41%; margin-top:-15px;" class="nav navbar-nav">
			<li  class="dropdown mega-dropdown">
				<a href="#"><span class="glyphicon glyphicon-chevron-down pull-right"></span></a>
				
				
				
			</li>
		</ul>
		
	</div></div><!-- /.nav-collapse -->
</nav>
<script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

</html>