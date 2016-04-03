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
	$redirect_url='http://localhost/warhoo/bootstrap/index.php';

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
	$logout = 'http://localhost/warhoo/bootstrap/logout.php';

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
			$email = $graph->getProperty('email');
			$image = 'https://graph.facebook.com/'.$id.'/picture?width=300';
			$loggedin  = true;
			$seleciona_user = mysql_query("SELECT * FROM users WHERE fid = '$id'");
		  $user = mysql_fetch_array($seleciona_user);
		  {
	
	$fname = $user['firstname'];
	$userid = $user['id'];
	$emailuser = $user['email'];
	$mname = $user['middlename'];
	$lname = $user['lastname'];
	$credit = $user['credit'];
	$warhoocode = $user['wcode'];
	$userwarhoocreditnumber=$user['warhoocreditnumber'];
		  
			   $idproduto =$_GET['warhoo'];
		  $seleciona_produtos = mysql_query("SELECT * FROM tudo WHERE id = '$idproduto'");
		  $query_produto = mysql_fetch_array($seleciona_produtos);
		  {
			 $nome_produto = $query_produto['titulo'];
			 $valor_produto = $query_produto['valor'];
			 $id_produto = $query_produto['id'];
			 $loja_produto = $query_produto['loja'];
			 $meio_pagamento="warhoo";
		  }
	
	
		  }$cadastra_transaction = mysql_query("INSERT INTO transaction (nome_produto,  valor_produto, meio_pagamento, nome_usuario, id_usuario, loja, id_produto)VALUES('$nome_produto','$valor_produto','$meio_pagamento','$name','$userid','$loja_produto','$id_produto')");
	
	}

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Facebook Login Demo</title>
	<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
	<style>
	body{
	background: #f8f8f8;
	background-color: #f8f8f8;
	}
	.main-container{
		width:400px;
		margin:30px auto 0px;
		background:white;
		padding:30px;
	}
	.footer{
		background:#ecf0f1;
		padding:30px;
		color:#7f8c8d;
		width:400px;
		margin: 0px auto;
	}
	</style>
  </head>
  <body>
  	 </pre>
        <link href="css/styles.css" rel="stylesheet">
<nav class="navbar  navbar-fixed-top"   style="box-shadow:0 0 4px #797979; width:100%;
	-moz-box-shadow: 0 0 4px #797979;
	-webkit-box-shadow: 0 0 4px #797979;">
   <div class="container">
    <div class="navbar-header"  style=" background-color:#0099CC;  ">
      <a class="navbar-brand" style="height:50px; " background-color:##0099CC"" href="javascript:history.back()" ><img style="margin-top:0%" src="img/whoohooback.png" width="139" height="27" /><font color="#FFFFFF" style=" ">: PAYMENT</font></a>
      <img  style="float:right; border:2px;  margin-right:25px; padding:5px; margin-top:10px"width="35px;" height="35px" src="<?php echo $image; ?>" alt="<?php echo $name; ?>" class="img-thumbnail">
      
    </div>
      <div class="navbar-collapse collapse" style=" background-color:#0099CC;">
        <ul class="nav navbar-nav"> 
        <li><a href="hotnowstand.php">Hot Now</a></li> 
          <li><a href="mural.php">Explore</a></li>
          <li><a href="radar.php">Radar</a></li>
          <li><a href="warhoostand.php">Warhoo!</a></li>
          
              
        </ul>
          </li>
        </ul>
        <ul class="nav navbar-right navbar-nav">
          <li class="dropdown">
            <a href="buscapage.php" ><i class="glyphicon glyphicon-search"></i></a>
            <ul class="dropdown-menu" style="padding:12px;">
                
            </ul>
          </li>
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="glyphicon glyphicon-user"></i> <i class="glyphicon glyphicon-chevron-down"></i></a>
            <ul class="dropdown-menu">
              <li><a href="<?php echo $logout; ?>">
	    		Logout
	    	</a>	</li>
              <li><a href="profile.php">Profile</a></li>
              <li class="divider"></li>
              <li><a href="about.php">About</a></li>
            </ul>
          </li>
        </ul>
      </div>
  </div>
</nav>
<nav  style=" height:40px;background-color: transparent"class="navbar  navbar-fixed-bottom">
   <div class="container">
    <div class="navbar-header"><a  style="background-color: transparent; margin-top:-22px; margin-left:-15px;  width:50px; height:50px; "class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
       <center> <img  src="img/circulo.png" width="63px" height="63px"></center>
      </a>
    </div>
      
      </div>
  </div>
</nav>

<!-- jQuery (plugins em JavaScript) -->
<script type="text/javascript" src="https://code.jquery.com/jquery.js"></script><script type="text/javascript" src="js/bootstrap.min.js"></script>
<div class="container" style=" margin-right:-20px"></div><br><br><br>

<div class="col-sm-6 col-md-5" style=" background:#FFF; border:dashed 1px  #CCC;">

<div class="thumbnail"  style="box-shadow:0 0 8px #CCC;
	-moz-box-shadow: 0 0 8px #CCC;
	-webkit-box-shadow: 0 0 8px #CCC; background-color:#306;"><div style="background-color:#306" class="thumbnail"><?php 
		  $idproduto =$_GET['warhoo'];
		  $seleciona_produtos = mysql_query("SELECT * FROM tudo WHERE id = '$idproduto'");
		  $query_produto = mysql_fetch_array($seleciona_produtos);
		  {
			 $nome_produto = $query_produto['titulo'];
			 $valor_produto = $query_produto['valor'];
			 $id_produto = $query_produto['id'];
			 $loja_produto = $query_produto['loja'];
			 $thumb_produto = $query_produto['thumb_produto'];
			 $meio_pagamento="warhoo"; 
		  }
		   
		  
		  ?><img style="background-color:#306; border:0px; "  src="img/WARHOOama.png" 
         alt="Generic placeholder thumbnail" width="224" height="44">
</div>
         
         </div><?php

// Inclui o arquivo class.phpmailer.php localizado na pasta phpmailer
require("phpmailer/class.phpmailer.php");
require("phpmailer/class.smtp.php");


$mail = new PHPMailer(); // create a new object

$mail->IsSMTP(); // enable SMTP
$mail->SMTPDebug = 0; // debugging: 1 = errors and messages, 2 = messages only
$mail->SMTPAuth = true; // authentication enabled
$mail->SMTPSecure = 'ssl'; // secure transfer enabled REQUIRED for GMail
$mail->Host = "smtp.gmail.com";
$mail->Port = 465; // or 587
$mail->IsHTML(true);
$mail->Username = "warhoosocialtransaction@gmail.com";
$mail->Password = "flamboyant123";
$mail->SetFrom("warhoosocialtransaction@gmail.com");
$mail->AddAddress($email, $name);
$mail->AddCC('nathan.soares01@gmail.com', 'Warhoo Seller'); // Copia
//$mail->AddBCC('fulano@dominio.com.br', 'Fulano da Silva'); // Cópia Oculta

// Define os dados técnicos da Mensagem
// =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
$mail->IsHTML(true); // Define que o e-mail será enviado como HTML
//$mail->CharSet = 'iso-8859-1'; // Charset da mensagem (opcional)

// Define a mensagem (Texto e Assunto)
// =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
$mail->Subject  = $query_produto['titulo']; // Assunto da mensagem
$mail->Body = "<p>Hi $name, You choose the {$query_produto['titulo']}. {$query_produto['descricao']}.The price is $ {$query_produto['valordolar']}, R$ {$query_produto['valor']}, €{$query_produto['valoreuro']}.<br />
<center><img style='border:dashed #FFFF00 1px;' src=".$query_produto['thumb'].";></center><br /> 
<br /> <br /> 

To complete your purchase, just click on the link below:

https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=".$query_produto['paypal']."<br /><br />
  
  

  
This is a link that will take you to a PayPal page where you can pay with Credit Card or a PayPal account.<br /><br />


Thanks for choosing Warhoo.</p>";
$mail->AltBody = "Thanks for choosing Warhoo! \r\n :)";

// Define os anexos (opcional)
// =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
//$mail->AddAttachment("c:/temp/documento.pdf", "novo_nome.pdf");  // Insere um anexo

// Envia o e-mail
$enviado = $mail->Send();

// Limpa os destinatários e os anexos
$mail->ClearAllRecipients();
$mail->ClearAttachments();

// Exibe uma mensagem de resultado

if ($enviado) {
echo "<center><h1>Thank You!</h1><br><code  class='alert-info'>There is an e-mail where have some informations about the product you choose and the instructions to complete your purchase.</code></center>";

$cadastra_transaction = mysql_query("INSERT INTO transaction (nome_produto,  valor_produto, meio_pagamento, nome_usuario, id_usuario, loja, id_produto, thumb_produto)VALUES('$nome_produto','$valor_produto','$meio_pagamento','$name','$userid','$loja_produto','$id_produto')");
} else {
echo "Não foi possível enviar o e-mail.<br /><br />";
echo "<b>Informações do erro:</b> <br />" . $mail->ErrorInfo;
}

?><br><br>

<font " size="5" style=" font-family:'Trebuchet MS', Arial, Helvetica, sans-serif">Thanks for choosing warhoo!</font>




</div>
    
    <hr>

</div>




