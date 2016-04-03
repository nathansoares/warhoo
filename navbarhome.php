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
	background-color: #f2f2f2;	
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

<body bgcolor="#f2f2f2" style="background-color:#f2f2f2">

    <nav class="navbar  navbar-default navbar-fixed-top hidden-lg hidden-md hidden-sm" role="navigation" style=" margin-top:40px;background-color:#EFEFEF;">
        <div class="container">
            <br><center>
            <a  style="font-size: 14px; padding-right: 10px; text-decoration: none; font-family: 'Trebuchet MS', Arial, Helvetica, sans-serif; font-weight: 600; color: #1A1A1A;"  href="search.php">Search</a>
             <a  style="font-size: 14px; padding-right: 10px; font-family: 'Trebuchet MS', Arial, Helvetica, sans-serif; font-weight: 600; color: #1A1A1A;" class="scroll" href="#brands">Brands</a>
              <a  style="font-size: 14px; padding-right: 10px; font-family: 'Trebuchet MS', Arial, Helvetica, sans-serif; font-weight: 600; color: #1A1A1A;" class="scroll" href="#explore">Explore</a>
               
        
        
                   
               
        </div>
    
        <!-- /.navbar-collapse -->
    </div>
    </nav>

<nav class="navbar-inverse navbar navbar-fixed-top "  style=" background-color:#0CF; border:0px;"  >
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
           
                
          <a  style="height:50px;margin-left:-5px; "  href="home.php" ><img   src="img/newlogo.png" width="60" height="50"  /></a>
          <div style="float:right"><a href="explore.php"><img   style=" border:2px; float:left  margin-right:25px; padding:5px; margin-top:5px"width="42px;" height="42px" src="<?php echo $image; ?>" alt="<?php echo $name; ?>" class="img-circle" ></a><div class="hidden-xs hidden-sm " style="float:right; margin-top:10px;"><span style="color:#fff; padding-left:5px;"><?php echo $name; ?></span><br><a href="logout.php"><span style=" font-size:12px;color:#fff; padding-left:5px; float:left;">Logout</span></a></div>
         </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul  class="nav navbar-nav" style=" color:#121212; font-stretch:condensed; font-size:14px; font-weight:600; margin-top: -55px; margin-left:430px;"><li><a style=" color:#000; font-size:14px; text-decoration:none;" href="search.php">SEARCH<span class="sr-only">(current)</span></a></li>
        
        <li><a style=" color:#000; font-size:14px;text-decoration:none;" class="scroll" href="#brands">BRANDS</a></li>
        <li><a style=" color:#000; font-size:14px; text-decoration:none;" class="scroll" href="#explore">EXPLORE</a></li>
                   
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>
    


    <!-- /.container -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

</body>

</html>
