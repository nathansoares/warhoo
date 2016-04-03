
<?php
$link = mysql_connect('mysql03.redehost.com.br:41890', 'warhoo', 'flamboyant123');
if (!$link) {
    die('Não foi possível estabelecer uma conexão com o MySQL : ' . mysql_error());
}

// make foo the current db
$db_selected = mysql_select_db('warhoo', $link);
if (!$db_selected) {
    die ('Não foi possivel acessar o banco de dados: ' . mysql_error());
}
?> 
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>cadastrar produto</title>
 <!-- Carregando o CSS do Bootstrap -->
        <link href="css/bootstrap.min.css" rel="stylesheet" media="screen">
        <style type="text/css">
        body,td,th {
	color: #EEE;
}
body {
	background-color: #0099FF;
	background-image: url();
}
        </style>

</head>

<body>



   <center><h1 style="color:#fff">Product Admin</h1> </center>    
<div class=" thumbnail" style="box-shadow:0 0 4px #CCC; 
	-moz-box-shadow: 0 0 4px #CCC;
	-webkit-box-shadow: 0 0 4px #CCC; width:400px;  height:2000px; margin-left:35%" id="boxform">
   
    <?php if(isset($_POST['acao']) && $_POST['acao'] == 'enviar'){
	;
	
	{
		 
		$thumb=strip_tags(trim($_POST['thumb']));
		$embed=$_POST['embed'];
		$titulo=$_POST['titulo'];
		$descricao=$_POST['descricao'];
		$valor=$_POST['valor'];
		$valordolar=$_POST['valordolar'];
		$valoreuro=$_POST['valoreuro'];
		$categoria=$_POST['categoria'];
		$cat=$_POST['cat'];
		$start=$_POST['start'];
		$type=$_POST['type'];
		$loja=$_POST['loja'];
		$paypal=$_POST['paypal'];
		
		
		
		$cadastra_video = mysql_query("INSERT INTO tudo(titulo, thumb, embed, descricao, valor, valordolar, valoreuro, categoria, cat, start, type, loja, paypal)VALUES('$titulo','$thumb','$embed','$descricao','$valor','$valordolar','$valoreuro','$categoria','$cat','$start','$type','$loja', '$paypal')");
	if($cadastra_video){
		echo'<script>alert("Produto Cadastrado")</script>';
		header('Location: cadastrar2.php');
	}

		
		
		
		}
	
	}
	
	?>
  <form  action="" method="post" enctype="multipart/form-data"  style="height:2000px;"class="form-control">
    
    
     
      <p>
        <input  type="hidden" name="acao" value="enviar" />
        <label><span class="form-control">Titulo</span> 
          <input style="width:370px" type="text" name="titulo"/>
        </label>
  <input type="hidden" name="acao" value="enviar"/>
        
        
  <label><span class="form-control">
    Descricao</span> 
    <input  style="width:370px" type="text" name="descricao"/>
  </label>
  <input type="hidden" name="acao" value="enviar"/>
  
   
  <label><span class="form-control">
    Valor</span> 
    <input  style="width:370px" type="text" name="valor"/>
  </label>
  <input type="hidden" name="acao" value="enviar"/>
  
  <label><span class="form-control">
    Valor em Dolar</span> 
    <input style="width:370px" type="text" name="valordolar"/>
  </label>
  <input type="hidden" name="acao" value="enviar"/>
  
  <label><span class="form-control">
    Valor em Euro</span> 
    <input style="width:370px" type="text" name="valoreuro"/>
  </label>
  <input type="hidden" name="acao" value="enviar"/>
  
  <label><span class="form-control">Imagem</span> 
          <input style="width:370px" type="text" name="thumb"/>
        </label>
      
        <input type="hidden" name="acao" value="enviar"/>
        
          <label><span class="form-control">Video</span> 
          <input style="width:370px" type="text" name="embed"/>
        </label>
      
        <input type="hidden" name="acao" value="enviar"/>
      <p>
        <span style=" font-style:inherit" class="form-control"><strong>Categoria</strong></span>    
        <select name="categoria" class='form-control'>
          <?php
$qr=mysql_query("SELECT * FROM categories ");
$cont=0;
while ($row=mysql_fetch_array($qr)){
$cont++;

$categoria=$row['categoria'];
$qr2=mysql_query("SELECT name FROM categories WHERE id='$categoria'");
$row2=mysql_fetch_array($qr2);
$categoria=$row2['name'];
}

$qr2=mysql_query("SELECT * FROM categories");
while ($row2=mysql_fetch_array($qr2)){
?>
          <option <?php if($row2['id']==$row['categoria']) echo "selected"?> value="<?php echo $row2['id']?>"><?php echo $row2['name']?></option>
          <?php }?>
        </select>
         <span style=" font-style:inherit" class="form-control"><strong>Cat</strong></span>    
         <select name="cat" class='form-control'>
          <?php
$qr=mysql_query("SELECT * FROM cat ");
$cont=0;
while ($row=mysql_fetch_array($qr)){
$cont++;

$cat=$row['cat'];
$qr2=mysql_query("SELECT nome FROM cat WHERE id='$cat'");
$row2=mysql_fetch_array($qr2);
$cat=$row2['nome'];
}

$qr2=mysql_query("SELECT * FROM cat");
while ($row2=mysql_fetch_array($qr2)){
?>
          <option <?php if($row2['id']==$row['cat']) echo "selected"?> value="<?php echo $row2['id']?>"><?php echo $row2['nome']?></option>
          <?php }?>
        </select>
        <span style=" font-style:inherit" class="form-control"><strong>Start page</strong></span>    
         <select name="start" class='form-control'>
          <?php
$qr=mysql_query("SELECT * FROM start ");
$cont=0;
while ($row=mysql_fetch_array($qr)){
$cont++;

$start=$row['start'];
$qr2=mysql_query("SELECT note FROM start WHERE id='$start'");
$row2=mysql_fetch_array($qr2);
$start=$row2['note'];
}

$qr2=mysql_query("SELECT * FROM start");
while ($row2=mysql_fetch_array($qr2)){
?>
          <option <?php if($row2['id']==$row['start']) echo "selected"?> value="<?php echo $row2['id']?>"><?php echo $row2['note']?></option>
          <?php }?>
        </select>
        
        <span style=" font-style:inherit" class="form-control"><strong>tipo</strong></span>    
        <select name="type" class='form-control'>
          <?php
$qr=mysql_query("SELECT * FROM types ");
$cont=0;
while ($row=mysql_fetch_array($qr)){
$cont++;

$categoria=$row['type'];
$qr2=mysql_query("SELECT name FROM types WHERE id='$categoria'");
$row2=mysql_fetch_array($qr2);
$categoria=$row2['name'];
}

$qr2=mysql_query("SELECT * FROM types");
while ($row2=mysql_fetch_array($qr2)){
?>
          <option <?php if($row2['id']==$row['type']) echo "selected"?> value="<?php echo $row2['id']?>"><?php echo $row2['name']?></option>
          <?php }?>
        </select>
        <span class="form-control"><strong>Loja</strong></span>    
        <select name="loja" class='form-control'>
          <?php
$qr=mysql_query("SELECT * FROM loja ");
$cont=0;
while ($row=mysql_fetch_array($qr)){
$cont++;

$loja=$row['loja'];
$qr2=mysql_query("SELECT nome FROM loja WHERE id='$loja'");
$row2=mysql_fetch_array($qr2);
$loja=$row2['nome'];
}

$qr2=mysql_query("SELECT * FROM loja");
while ($row2=mysql_fetch_array($qr2)){
?>
          <option <?php if($row2['id']==$row['loja']) echo "selected"?> value="<?php echo $row2['id']?>"><?php echo $row2['nome']?></option>
          <?php }?>
        </select>
        <label><span class="form-control">
    PayPal Id</span> 
    <input style="width:370px" type="text" name="paypal"/>
  </label>
  <input type="hidden" name="acao" value="enviar"/>
        
        
        <input type="submit" value="Cadastrar" class="btn-cad" />
      </p>
  </form>
    
</div>
</body>
</html>