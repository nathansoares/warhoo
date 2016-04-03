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

    <!-- Navigation -->
 
<?php
		$nav = "navbar.php";
		include ("$nav");
		?>
        


<?php
  $pag = (isset($_GET['pag'])) ? strip_tags((int)$_GET['pag']) : '1';
   $idloja =$_GET['warhoo'];
   $seguidor = mysql_query("SELECT * FROM seguidores WHERE seguidor='$id' && seguindo='$idloja'") ;
    $query_seguidor = mysql_fetch_array($seguidor);
     if( ($gender == "male")){
      $seleciona_produtos = mysql_query("SELECT * FROM tudo WHERE categoria=1 AND type = '$idloja'  ORDER BY id DESC  LIMIT $inicio, $maximo"
); 
$seleciona_seguindo = mysql_query("SELECT * FROM seguidores WHERE seguidor=$id   ORDER BY id DESC"
);
  } if( ($gender == "female")){
       $seleciona_produtos = mysql_query("SELECT * FROM tudo WHERE categoria=2 AND type = '$idloja' ORDER BY id DESC LIMIT $inicio, $maximo"
); 

$seleciona_seguindo = mysql_query("SELECT * FROM seguidores WHERE seguidor=$id   ORDER BY id DESC"
);  
  } 
		 
		 
		  $query_produto = mysql_fetch_array($seleciona_produtos);
		   
           
		  

?>
</div>
    <?php

		   $seleciona_loja = mysql_query("SELECT * FROM type WHERE id = '$idloja'");
		   
		  ?>
          </div>
   
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav" style="float:left; margin-top:7px;" >
                    
  
                        
                </ul>
            </div>
            <!-- /.navbar-collapse -->
</div>
        <!-- /.container -->
    

<!-- Page Content -->
    <div class="container">

        <!-- Page Header -->
       
<!-- /.row -->

        <!-- Projects Row -->
        <div class="row"><br>
            <div class="container" style="width:100%"><?php 
   
  if(mysql_num_rows($seleciona_produtos) == 0){
		  echo'sem produtos';
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
	-webkit-box-shadow: 0 0 4px #CCC;">
    
     <div style="width:100%"><a style="text-decoration:none;" href="brand.php?warhoo=<?php echo $query_loja['id'];?>"   ><img style=" float:left;  position:relative; z-index:auto; margin-top:-5px; margin-left:5px;padding-right:0px;" class="img-circle" width="30px" height="30px;" src="<?php echo $query_loja['thumb'];?>" 
         alt="Generic placeholder thumbnail"></a><div style=""><div style="margin-left:48px; margin-right:20px;"><h4 style="text-transform:uppercase; font-weight:600;  font-stretch:condensed">
       <?php  echo  $linhaprodutos['titulo'];?>
     </h4>
     <div style="float:right; margin-top:-30px; padding-right:5px;"><span style=""><a style="text-decoration:none; color:#000; "  href="warhoo.php?warhoo=<?php echo $linhaprodutos['id'];?>"> <i style="color:#F03; " class="fa fa-plus fa-lg "></i></a></span> </div></div></div></div> <br>
    
         <a style="text-decoration:none;" href="warhoo.php?warhoo=<?php echo $linhaprodutos['id'];?>"   >
         
         <div style="padding:2px;" class="thumbnail product">
        <img class="product" src="<?php echo $linhaprodutos['thumb'];?>" 
         alt="Generic placeholder thumbnail" width="329" height="329"></div></a><div style="padding:0px;" class="caption">
        <p class=" btn-default" style=" padding-left:10px;padding-right:10px; background-color: #FFFFFF; border: dashed 0px #FF6; height: 30px; font-size: 12px;"><font style=" font-style: ; font-family: 'Trebuchet MS', Arial, Helvetica, sans-serif; font-weight: 300;"   color="#373737"  size="4"><?php  echo  $linhaprodutos['titulo'];?></font><font style=" font-style: ; font-family: 'Trebuchet MS', Arial, Helvetica, sans-serif; font-weight: 300;"   color="#373737"  size="2"><?php  echo  $linhaprodutos['descricao'];?></font><font style="font-weight:600; color:#333" size="5" ><?php   echo   " $ {$linhaprodutos['valordolar']}";?></font>
         <div style=" padding-top:5px; margin-top:50px; margin-left:40px;"></div>
          
          </div>
   
    </div>
      
</div><?php }}?></div>
<ul class="menu">
 
<?php
		$search = "quicksearch.php";
		include ("$search");
		?>
        

</ul>
 


          <!-- /.row -->
        

    </div>
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
