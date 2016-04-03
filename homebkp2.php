<?php

include 'conn.php'
?>
<?php


?><?php
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
	$name = $user['firstname'];
	$id = $user['id'];
	
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
	background-color: #EFEFEF;
}
    </style>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

    <script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script type="text/javascript">
$(function(){
	
	//PESQUISA INSTANTANEA PELO INPUT
	$("#pesquisa").keyup(function(){
		//Recupera oque está sendo digitado no input de pesquisa
		var pesquisa 	= $(this).val();

		//Recupera oque foi selecionado
		var campo 		= $("#campo").val();

		//Verifica se foi digitado algo
		if(pesquisa != ''){
			//Cria um objeto chamado de 'dados' e guarda na propriedade 'palavra' a pesquisa e na propriedade campo o campo a ser pesquisado
			var dados = {
				palavra : pesquisa,
				campo 	: campo
			}
			
			//Envia por AJAX pelo metodo post, a pequisa para o arquivo 'busca.php'
			//O paremetro 'retorna' é responsável por recuperar oque vem do arquivo 'busca.php'
			$.post('busca.php', dados, function(retorna){
				//Mostra dentro da ul com a class 'resultados' oque foi retornado
				$(".resultados").html(retorna);
			});
		}else{
			$(".resultados").html('');
		}
	});

	//PESQUISA INSTANTANEA PELO SELECT
	$("#campo").change(function(){
		//Recupera oque está sendo digitado no input de pesquisa
		var pesquisa = $("#pesquisa").val();

		//Recupera oque foi selecionado
		var campo 		= $(this).val();

		//Verifica se foi digitado algo
		if(pesquisa != ''){
			//Cria um objeto chamado de 'dados' e guarda na propriedade 'palavra' a pesquisa e na propriedade campo o campo a ser pesquisado
			var dados = {
				palavra : pesquisa,
				campo 	: campo
			}
			
			//Envia por AJAX pelo metodo post, a pequisa para o arquivo 'busca.php'
			//O paremetro 'retorna' é responsável por recuperar oque vem do arquivo 'busca.php'
			$.post('busca.php', dados, function(retorna){
				//Mostra dentro da ul com a class 'resultados' oque foi retornado
				$(".resultados").html(retorna);
			});
		}else{
			$(".resultados").html('');
		}
	});

	//PESQUISA DE FORMULÀRIO
	$("#form-pesquisa").submit(function(e){
		//Cancela a ação padrao o formulário, impedindo que ele atualize a página
		e.preventDefault();

		//Recupera oque está sendo digitado no input de pesquisa
		var pesquisa = $("#pesquisa").val();

		//Recupera oque foi selecionado
		var campo = $("#campo").val();
		
		//Se não for digitado nada, então ele mostra um alert
		if(pesquisa == ''){
			alert('Informe sua Pequisa!');
		}else{
			//Cria um objeto chamado de 'dados' e guarda na propriedade 'palavra' a pesquisa
			//Cria um objeto chamado de 'dados' e guarda na propriedade 'palavra' a pesquisa e na propriedade campo o campo a ser pesquisado
			var dados = {
				palavra : pesquisa,
				campo 	: campo
			}
			
			//Envia por AJAX pelo metodo post, a pequisa para o arquivo 'busca.php'
			//O paremetro 'retorna' é responsável por recuperar oque vem do arquivo 'busca.php'
			$.post('busca.php', dados, function(retorna){
				$(".resultados").html(retorna);
			});
		}
	});
});
</script>
    
<?php
		$nav = "navbar.php";
		include ("$nav");
		?><br>
<div class=""  style="background-color:transparent; border:1px #CCC; margin-top:50px;">
     <div style="margin-top: " class="container"> <div style=" width:100px; float:left; margin-top:-10px; margin-left:-30px;  "><img src="img/search_icon.png" width="76" height="76"></div> <div>
        <center><form class=" col-lg-12 col-sm-12 hidden-xs hidden-sm "  style=" color:#FC0;  height:50px; margin-top:-70px;   " id="form-pesquisa" action="" method="post"> 
	
	

	<input  height="50px" style="height:60px;  font-size:40px; margin-right:-100px;  text-align:center" placeholder="Type the Keyword(s) here" class="form-control" type="text" name="pesquisa" id="pesquisa">
   
</form></center></div>
            <!-- Brand and toggle get grouped for better mobile display -->
           
            <!-- Collect the nav links, forms, and other content for toggling -->
            
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
</div>
     <!-- Navigation --><!-- jQuery (plugins em JavaScript) -->
<script type="text/javascript" src="https://code.jquery.com/jquery.js"></script><script type="text/javascript" src="js/bootstrap.min.js"></script>





<div style=" padding-right:30px;">

<ul class="resultados">

</ul></div><div class="container hidden-xs hidden-sm" style="border-radius:0px; border-color:#FFF;  background-color:#fff"><br><div class="hidden-xs hidden-sm"><div class="col-lg-12">
 
<center><div class="col-lg-4 thumbnail" style="float:left;border-top-left-radius:20px; background-color:transparent; border-color:transparent; ">

  <h3 style=""> BRANDS</h3>
  <?php
  $pag = (isset($_GET['pag'])) ? strip_tags((int)$_GET['pag']) : '1';
  $maximo = '7';
  $inicio = ($pag * $maximo) - $maximo;
 
   if( $gender == "male"){
 
      $seleciona_produtos = mysql_query("SELECT * FROM loja WHERE categoria=1  ORDER BY id DESC LIMIT $inicio, $maximo"
);  $seguidor = mysql_query("SELECT * FROM seguidores WHERE seguidor='$id'") ;
    $query_seguidor = mysql_fetch_array($seguidor);}
	 if( $gender == "female"){
 
      $seleciona_produtos = mysql_query("SELECT * FROM loja WHERE categoria=2  ORDER BY id DESC LIMIT $inicio, $maximo"
);  $seguidor = mysql_query("SELECT * FROM seguidores WHERE seguidor='$id'") ;
    $query_seguidor = mysql_fetch_array($seguidor);}

  
  
  if(mysql_num_rows($seleciona_produtos) == 0){
		  echo'sem produtos';
	  }else{
		  while($linhaprodutos = mysql_fetch_array($seleciona_produtos)){
		 
		  ?>
          
          
         <div style="100%">
         <div class="col-md-12 col-sm-12  portfolio-item" style=" padding:2px; margin-left:0px; margin-top:-30px; margin-right:0px;">
    <p>
    </font><br /> 
      
    </p>
    
    
         <a style="text-decoration:none;" href="brand.php?warhoo=<?php echo $linhaprodutos['id'];?>"   >
         
         <div style="padding:2px; float:left; border-radius:0px;  " class="thumbnail">
        <img class="img-circle" style="float:left;" src="<?php echo $linhaprodutos['thumb'];?>" 
         alt="Generic placeholder thumbnail" width="50" height="50"></div><div style="padding: 0px; color: #F9F2FF;" class="caption">
        <div style="float:left; padding:5px;"><font style=" font-style: ; font-family: 'Trebuchet MS', Arial, Helvetica, sans-serif; font-weight: 300;"   color="#373737"  size="3"><center><?php  echo  $linhaprodutos['nome'];?></center></font></div>
         
          
          </div></a>
   
    
      
</div>
         
        
         
         
         </div>  <?php }} ?><br><br><a href="follow.php" class="btn btn-defout" style="border:solid 1px #00CCFF; float:left"><span style="color:#09F; "> More </span> </a>
        
</div>
<div class="col-lg-4 thumbnail" style="float:left; border-radius:0px;">
  <h3 style=""> TRENDING</h3>
  <?php
  $pag = (isset($_GET['pag'])) ? strip_tags((int)$_GET['pag']) : '1';
  $maximo = '5';
  $inicio = ($pag * $maximo) - $maximo;
 
   if( $gender == "male"){
 
      $seleciona_produtos = mysql_query("SELECT * FROM tudo WHERE categoria=1 && type=1  ORDER BY id DESC LIMIT $inicio, $maximo"
);  $seguidor = mysql_query("SELECT * FROM seguidores WHERE seguidor='$id'") ;
    $query_seguidor = mysql_fetch_array($seguidor);}
	 if( $gender == "female"){
 
      $seleciona_produtos = mysql_query("SELECT * FROM tudo WHERE categoria=2 && type=1  ORDER BY id DESC LIMIT $inicio, $maximo"
);  $seguidor = mysql_query("SELECT * FROM seguidores WHERE seguidor='$id'") ;
    $query_seguidor = mysql_fetch_array($seguidor);}

  
  
  if(mysql_num_rows($seleciona_produtos) == 0){
		  echo'sem produtos';
	  }else{
		  while($linhaprodutos = mysql_fetch_array($seleciona_produtos)){
		 
		  ?>
          
          
         <div style="100%">
         <div class="col-md-12  portfolio-item" style=" padding:2px; margin-left:0px; margin-top:-30px; margin-right:0px;">
    <p>
    </font><br /> 
      
    </p>
    
    
         <a style="text-decoration:none;" href="warhoo.php?warhoo=<?php echo $linhaprodutos['id'];?>"   >
         
         <div style="padding:2px; float:left; border-radius:0px;  " class="thumbnail">
        <img class="img-circle" style="float:left;" src="<?php echo $linhaprodutos['thumb'];?>" 
         alt="Generic placeholder thumbnail" width="44" height="45"></div><div style="padding: 0px; color: #F9F2FF;" class="caption">
        <div style="float:left; padding:5px;"><font style=" font-style: ; font-family: 'Trebuchet MS', Arial, Helvetica, sans-serif; font-weight: 300;"   color="#373737"  size="3"><center><?php  echo  $linhaprodutos['titulo'];?></center></font></div>
         
          
          </div></a>
   
    
      
</div>
         
        
         
         
         </div>  <?php }} ?><a href="http://www.warhoo.com/hotthisweak/" class="btn btn-defout" style="border:solid 1px #00CCFF; float:left"><span style="color:#09F; "> More </span> </a>
        
</div>
<div class="col-lg-4 thumbnail" style="float:left; background-color:transparent; border-top-right-radius:20px; border-color:transparent">
<h3 style=""> FASHION </h3><?php
  $pag = (isset($_GET['pag'])) ? strip_tags((int)$_GET['pag']) : '1';
  $maximo = '5';
  $inicio = ($pag * $maximo) - $maximo;
 
   if( $gender == "male"){
 
      $seleciona_produtos = mysql_query("SELECT * FROM tudo WHERE categoria=1 && tag=1  ORDER BY id DESC LIMIT $inicio, $maximo"
);  $seguidor = mysql_query("SELECT * FROM seguidores WHERE seguidor='$id'") ;
    $query_seguidor = mysql_fetch_array($seguidor);}
	 if( $gender == "female"){
 
      $seleciona_produtos = mysql_query("SELECT * FROM tudo WHERE categoria=2  && tag=1  ORDER BY id DESC LIMIT $inicio, $maximo"
);  $seguidor = mysql_query("SELECT * FROM seguidores WHERE seguidor='$id'") ;
    $query_seguidor = mysql_fetch_array($seguidor);}

  
  
  if(mysql_num_rows($seleciona_produtos) == 0){
		  echo'sem produtos';
	  }else{
		  while($linhaprodutos = mysql_fetch_array($seleciona_produtos)){
		 
		  ?>
          
          
         <div style="100%">
         <div class="col-md-12  portfolio-item" style=" padding:2px; margin-left:0px; margin-top:-30px; margin-right:0px;">
    <p>
    </font><br /> 
      
    </p>
    
    
         <a style="text-decoration:none;" href="warhoo.php?warhoo=<?php echo $linhaprodutos['id'];?>"   >
         
         <div style="padding:2px; float:left; border-radius:0px;  " class="thumbnail">
        <img class="img-circle" style="float:left;" src="<?php echo $linhaprodutos['thumb'];?>" 
         alt="Generic placeholder thumbnail" width="44" height="45"></div><div style="padding: 0px; color: #F9F2FF;" class="caption">
        <div style="float:left; padding:5px;"><font style=" font-style: ; font-family: 'Trebuchet MS', Arial, Helvetica, sans-serif; font-weight: 300;"   color="#373737"  size="3"><center><?php  echo  $linhaprodutos['titulo'];?></center></font></div>
         
          
          </div></a>
   
    
      
</div>
         
        
         
         
         </div>  <?php }} ?><a href="recent.php" class="btn btn-defout" style="border:solid 1px #00CCFF; float:left"><span style="color:#09F; "> More </span> </a>
</div></center></div>



</div></div>
</div>
<div class="hidden-lg hidden-md">
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
</div>
		
   
  </body>
  <?php
		$footer = "footer.php";
		include ("$footer");
		?>
</html>


