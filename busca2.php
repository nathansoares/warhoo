<!DOCTYPE HTML>
<html>
<head>
<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
<script type="text/javascript" src="https://code.jquery.com/jquery.js"></script><script type="text/javascript" src="js/bootstrap.min.js"></script>
<br /><br /><br />
<meta charset="utf-8">
<title></title>
<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script type="text/javascript"></script></head>
<body>
<div class="" style=" padding:3px; margin-left:0px;margin-right:0px;">
    <p><font style=" font-style: ; font-family: 'Trebuchet MS', Arial, Helvetica, sans-serif; font-weight: bold;"  color="#003366"  size="2">
<?php
	//Faz a conexão com o banco de dados
	 mysql_connect("mysql.qlix.com.br", "7829_warhoo", "flamboyant123");
     mysql_select_db("7829_warhoo");
	
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
	}else{while($res = mysql_fetch_assoc($query)){?>
		<div class="col-md-4 col-lg-4 col-sm-6 portfolio-item" style=" padding:1px; margin-left:0px;margin-right:0px; margin-top:-50px">
		
		<?php  echo  $res['titulo'];?>
      <font  style=" float:right; font-style: ; font-family: 'Trebuchet MS', Arial, Helvetica, sans-serif;"   color="#999999" size="2">
      <?php  echo   " $ {$res['valordolar']}";?>
      
    </font><a id="<?php  echo  $res['titulo'];?>"></a><br /> 
      
    </p>
    <div class="thumbnail"   style="box-shadow:0 0 4px #CCC;
	-moz-box-shadow: 0 0 4px #CCC;
	-webkit-box-shadow: 0 0 4px #CCC;>">
    
         <a style="text-decoration:none;" href="warhoo.php?warhoo=<?php echo $res['id'];?>"   >
         
         <div style="padding:2px; " class="thumbnail">
          <img src="<?php echo $res['thumb'];?>" 
         alt="Generic placeholder thumbnail" width="329" height="329"></div></a><div style="padding:0px;" class="caption">
        <p class=" btn-default" style=" padding-left:10px;padding-right:10px; background-color: #FFFFFF; border: dashed 0px #FF6; height: 30px; font-size: 12px;"><font style=" font-style: ; font-family: 'Trebuchet MS', Arial, Helvetica, sans-serif; font-weight: bold;"  color="#003366"  size="2"><?php  echo  $res['titulo'];?></font><span class=" btn-default" style=" padding-left:20px;padding-right:10px; background-color: #FFFFFF; border: dashed 0px #FF6; height: 30px; font-size: 12px;"><font style=" margin-left:-5%;font-weight: normal; font-family:'Trebuchet MS', Arial, Helvetica, sans-serif"  color="#1A1A1A" size="2">
          <?php   echo   "  {$res['desc']}";?>
        </font></span><br />
          <br /><?php   echo   " $ {$res['valordolar']}";?>&nbsp; <?php   echo   " R$ {$res['valor']}";?>&nbsp; <?php   echo   " € {$res['valoreuro']}";?><br />  </p>
        <p class=" btn-default" style=" padding-left:20px;padding-right:10px; background-color: #FFFFFF; border: dashed 0px #FF6; height: 30px; font-size: 12px;"><br /></p>
        <p class=" btn-default" style=" padding-left:20px;padding-right:10px; background-color: #FFFFFF; border: dashed 0px #FF6; height: 30px; font-size: 12px;">&nbsp;</p>
        </p>
       </div>
   
    </div>
      
</div><?php }}?></div>
    
		
	