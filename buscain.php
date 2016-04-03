<strong<?php

include 'conn.php'
?>

<!DOCTYPE HTML>
<html>
<head>
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
	background-color: #EFEFEF;
}
</style>
<script type="text/javascript" src="https://code.jquery.com/jquery.js"></script><script type="text/javascript" src="js/bootstrap.min.js"></script>
<br /><br /><br />
<meta charset="utf-8">
<title></title>
<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script type="text/javascript"></script></head>
<body>

<?php
	//Faz a conexão com o banco de dados
	$link = mysql_connect('mysql03.redehost.com.br', 'warhoo', 'flamboyant123');
if (!$link) {
    die('Não foi possível estabelecer uma conexão com o MySQL : ' . mysql_error());
}

// make foo the current db
$db_selected = mysql_select_db('warhoo', $link);
if (!$db_selected) {
    die ('Não foi possivel acessar o banco de dados: ' . mysql_error());
}
	//Seta os cacteres vindos do banco em UTF8
	mysql_query("SET NAMES 'utf8'");
	mysql_query('SET character_set_connection=utf8');
	mysql_query('SET charecter_set_client=utf8');
	mysql_query('SET charecter_set_results=utf8');
	
	//Recupera a pesquisa feita
	$pesquisa 	= mysql_real_escape_string($_POST['palavra']);
	//Recupera oque foi selecionado
	$campo 		= mysql_real_escape_string("titulo");
	
	

	//Cria a SQL para fazer a consulta no banco, e onde se poe o nome do campo, trocamos pela váriavel '$campo'
	/*Exemplo: se for selecionado o campo titulo, então ele pequisa na tabela no campo titulo,
	se for selecionado o campo categoria ele faz a pesquisa no campo categoria da tabela*/

	
	$sql = "SELECT * FROM tudo WHERE $campo LIKE '%$pesquisa%'";
	
	//Excuta a SQL
	$query		= mysql_query($sql) or die("Erro ao Pesquisar");
	
	//Se não for encontrado nada, então diz: 'Nada Encontrado...', se não retorna o resultado
	if(mysql_num_rows($query) <= 0){
		echo 'Nada Encontrado...';
	}else{while($linhaprodutos = mysql_fetch_assoc($query)){?>
    <div class="col-md-4 col-lg-3 col-sm-6 portfolio-item" style=" padding:1px; margin-left:0px;margin-right:0px; margin-top:-50px">
<div class="thumbnail"   style="box-shadow:0 0 4px #CCC; width:100%;
	-moz-box-shadow: 0 0 4px #CCC;
	-webkit-box-shadow: 0 0 4px #CCC;
    border-bottom-left-radius:0px;
    border-bottom-right-radius:0px;
    border-radius:0px; padding:3px; padding-bottom:35px;">
    
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
      
      
</div><?php }}?></div>
    
		
	