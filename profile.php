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
	
	$id = $user['id'];
	$fname = $user['firstname'];
	$name = $user['firstname'];
	$userid = $user['id'];
	$emailuser = $user['email'];
	
	$lname = $user['lastname'];
	$credit = $user['credit'];
	$warhoocode = $userid*100;

	
	?>
          
          <?php }

?> 
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Warhoo</title>
    

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
	-webkit-box-shadow: 0 0 4px #797979;"></nav>
<nav  style=" height:40px;background-color: transparent"class="navbar  navbar-fixed-bottom">
  </div>
</nav>
<!-- jQuery (plugins em JavaScript) -->
<script type="text/javascript" src="https://code.jquery.com/jquery.js"></script><script type="text/javascript" src="js/bootstrap.min.js"></script>
<br /><br /><?php
		$nav = "navbar.php";
		include ("$nav");
		?><br><div class="container"><div class="col-sm-12 col-md-12" style=" background:#069; border:dashed 1px  #CCC;">
  <p><br />
    <br>
    <div class="col-lg-6 col-md-12 col-sm-12" style="float:left; margin-top:-10px;"><img src="img/newlogo.png" alt="<?php echo $name; ?>" width="109" height="97" class="img-thumbnail"  style=" float:; border:2px;  margin-right:10px; padding:5px; margin-top:-5px">
    
    <?php 
	  echo " <font size='3' style='margin-left:-5px;' color='#FFFFFF'>&nbsp;$name&nbsp;$lname</font>"; 
	   echo "<br> <font size='3' style='' color='#FFFFFF'>&nbsp;$emailuser</font>"; 
	  
	  
	 
	  
	
 ?><h5 style="color:#fff">Warhoo Code</h5><code><?php echo $warhoocode ?></code>
 
 <h5 style="color:#fff">Warhoo Dots</h5><code><?php echo $credit ?></code><?php  ?>
 
 </div><div class="col-lg-6 col-md-12 col-sm-12" style="float:right"><img class="img-thumbnail" style="float:right" src="img/download.png" width="123" height="123"></div> 
 </p>
  <br>
 <br>
</div><br></div><div class="container"><?php
  $pag = (isset($_GET['pag'])) ? strip_tags((int)$_GET['pag']) : '1';
  $maximo = '4';
  $inicio = ($pag * $maximo) - $maximo;
  
  if( ($gender == "male")){
      $seleciona_transaction = mysql_query("SELECT * FROM transaction WHERE id_usuario=$userid  ORDER BY id DESC LIMIT $inicio, $maximo"
);  
  } if( ($gender == "female")){
      $seleciona_transaction = mysql_query("SELECT * FROM transaction WHERE id=$userid  ORDER BY id DESC LIMIT $inicio, $maximo"
);  
  }?>
<div class="panel panel-default">
  <!-- Default panel contents -->
  <div class="panel-heading" style="width:100%">Recent purchases</div><?php
  
  if(mysql_num_rows($seleciona_transaction) == 0){
		  echo'sem produtos';
	  }else{
		  while($linhatransaction = mysql_fetch_array($seleciona_transaction)){
			  $statustransaction=$linhatransaction['status'];
			  
		 
		  ?><?php if($statustransaction="delivering"){
			  
			  $colorstatus="#009999";
			  
			  
			  }elseif($statustransaction="processing"){
			  
			  $colorstatus="#1CA5C1";
			  
			  
			  }else{
			  
			  $colorstatus="#42E02C";
			  
			  
			  };?>


  <!-- Table -->
  <center><table   width="76%" height="67" border="0" class="table">
  <tr>
    
 <th width="35%" style="background-color:<  " data-halign="right" data-align="center"><a style="text-decoration:none;" href="transactionstatus.php?transaction=<?php echo $linhatransaction['id'];?>"   >
         
         <div style="padding:2px; float:left">
      <img width="50px" height="50px" src="<?php echo $linhatransaction['thumb_produto'];?>" 
         alt="Generic placeholder thumbnail"></div></a></th>
    <th width="44%" data-halign="right" data-align="center"><div style="float:left;"><font size="-1"><?php echo $linhatransaction['nome_produto'];?><br></font><font size="1"><?php echo "Price: $ {$linhatransaction['valor_produto']}";?></font></div></th>
    <th width="21%" data-halign="right" data-align="center"><div style="float:left"><font size="-1"><?php  echo $linhatransaction['status'];?></font></div></th>
  </tr>
</table></center>


<?php }}?></div><div class="panel panel-default" ><div class="panel-heading" style="width:100%">Notifications</div><table class="table"   width="100%" border="0">
  <tr>
    
 
    
    <th data-halign="right" data-align="center"><center><font size="-1">
  </tr>
</table></div><div class="panel panel-default"  > <table class="table"   width="100%" border="0">
  <tr>
    
 
    
    <th data-halign="right" data-align="center"><center>
     </th>
  </tr>
</table></div></div><br><br>

  
            
		
   
  </body>
  <?php
		$footer = "footer.php";
		include ("$footer");
		?>
</html>


