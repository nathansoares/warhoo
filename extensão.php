<?php
    $nome = "";
    $email = "";
    $assunto = "";
    $mensagem = "";
    $retorno = "";
    $css = "display: none";

    if($_POST)
    {
    	$nome = ucwords(trim($_POST['nome']));
		$email = strtolower(trim($_POST['email']));
		$mensagem = "Redefine my password";
		

    	# Executa a validação dos campos do formulário
        $erros = "";
        if(empty($nome)) {
        	$erros .= "You need to put your name<br>";
        }
        if(empty($email)) {
        	$erros .= "You need to put your e-mail.<br>";
        } else {
          $email = $_POST['email'];
          eregi("([\._0-9A-Za-z-]+)@([0-9A-Za-z-]+)(\.[0-9A-Za-z\.]+)",$email,$match);
            if(!isset($match)){
               $erros .= "Invalid E-mail.<br>";
            }
        }
       

 		# Caso não houver erros na validação
        if(empty($erros)) {

        	# Inclui a classe que faz o envio do e-mail
    		require('phpmailer/PHPMailerAutoload.php');
			require("phpmailer/class.phpmailer.php");
require("phpmailer/class.smtp.php");

        	# Cria uma instância da classe
        	$phpmail = new PHPMailer();
            # Define que a mensagem será enviada via servidor SMTP
            $phpmail->IsSMTP();
            # Endereço do seu servidor SMTP.
            $phpmail->Host = "smtp.gmail.com";
            # Ativa a autenticação
            $phpmail->SMTPAuth = true;
            # Usuário que será utilizado na autenticação
            $phpmail->Username = "warhoosocialtransaction@gmail.com";
            # Senha do usuário para autenticação
            $phpmail->Password = "flamboyant123";
            # A porta de envio do servidor SMTP
            $phpmail->Port = 465;
            # E-mail do usuário que está enviando a mensagem 
            $phpmail->From = $email;
            # Nome do usuário que está enviando a mensagem
            $phpmail->FromName = $nome;

			# Adiciona o destinatário que receberá a mensagem
            $phpmail->AddAddress('contact@warhoo.com', 'warhoo');
            # Adiciona o destinatário que receberá uma cópia da mensagem
            $phpmail->AddCC('nathan.soares01@gmail.com', 'Nathan'); 
            # Adiciona o destinatário oculto que receberá uma cópia da mensagem
            $phpmail->AddBCC('Nathan.soares01@hotmail.com', 'Nathan');

			# Define que o e-mail será enviado no formato HTML
            $phpmail->IsHTML(true);
            # Define a codificação
            $phpmail->CharSet = 'utf-8';

			# Define o título da mensagem
            $phpmail->Subject  = "Contato - ". $assunto;

            # Define o conteúdo (corpo) da mensagem
            $phpmail->Body .= "<b>Nome</b>: ". $nome."<br>";
            $phpmail->Body .= "<b>E-mail</b>: ". $email."<br>";
            $phpmail->Body .= "<b>Assunto</b>: 'Redefine Passord'<br><br>";
            $phpmail->Body .= "<b>Mensagem</b>:<br> ". nl2br(htmlspecialchars($mensagem, ENT_QUOTES));

			# Envia o e-mail
            $enviado = $phpmail->Send();

			# Limpa os recipientes
            $phpmail->ClearAllRecipients();
            $phpmail->ClearAttachments();

			# Grava a mensagem que será exibida ao usuário após o envio
            if ($enviado) {
                $retorno = "We will contact you soon";
            } else {
                $retorno = "Error " . $phpmail->ErrorInfo;
            }
        } else {
        	$retorno = $erros;
        }

        $css = "display: block"; 
    }
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Formulário de Contato com PHPMailer</title>
		<style type="text/css">
			* {
				font-family: verdana, tahoma, sans-serif;
				font-size: 12px;
			}
			body {
				padding: 20px;
			}
			fieldset {
				margin: 0 auto;
				padding: 10px;
				border: 1px solid #ddd;
				border-radius: 5px;
			}
			#painel {
				margin: 0 auto;
				padding: 10px;
				margin-bottom: 20px;
				border: 1px solid #ddd;
				border-radius: 5px;
			}
		    #contato input, #contato textarea {
		        padding: 10px;
		        width: 300px;
		        border: 1px solid #ddd;
		    }
		    #contato select {
		    	padding: 10px;
		        width: 150px;
		        border: 1px solid #ddd;
		    }
		    #contato input[type=submit] {
		    	cursor: pointer;de3a31
		    }
		    #contato input[type=submit]:hover {
		    	background-color: #de3a31;
		    	color: white;
		    }
		</style>
	</head>
	<body>
		<div id="painel" style="<?= $css; ?>">
			<?php
				if (!empty($retorno)) {
					echo $retorno;
				}
			?>
		</div>
		<form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST" id="contato">
			<fieldset>
				<legend>Formulário de Contato com PHPMailer</legend><br>

				<label>Nome:</label><br>
				<input id="nome" name="nome" type="text" placeholder="Digite seu nome" value="<?= $nome; ?>" /><br><br>

				<label>E-mail:</label><br>
				<input id="email" name="email" type="text" placeholder="Digite seu e-mail" value="<?= $email; ?>" /><br>

				<input name="submit" type="submit" value="Enviar" style="width: auto;" />
			</fieldset>
		</form>
	</body>
</html>