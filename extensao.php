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
    	
			
require("phpmailer/class.smtp.php");
require("phpmailer/class.phpmailer.php");

        	# Cria uma instância da classe
        	$mail = new PHPMailer();
            # Define que a mensagem será enviada via servidor SMTP
          
            # Endereço do seu servidor SMTP.
            $mail->Host = "envio02.redehost.com.br";
			
            # Ativa a autenticação
            $mail->SMTPAuth = true;
			
			$mail->SMTPDebug = 2;
            # Usuário que será utilizado na autenticação
            $mail->Username = "contact@warhoo.com";
            # Senha do usuário para autenticação
            $mail->Password = "Warhoo123@";
            # A porta de envio do servidor SMTP
            $mail->Port = 2550;
            # E-mail do usuário que está enviando a mensagem 
            $mail->From = $email;
            # Nome do usuário que está enviando a mensagem
            $mail->FromName = $nome;

			# Adiciona o destinatário que receberá a mensagem
            $mail->AddAddress('warhoosocialtransaction@gmail.com', 'warhoo');
            # Adiciona o destinatário que receberá uma cópia da mensagem
            $mail->AddCC('nathan.soares01@gmail.com', 'Nathan'); 
            # Adiciona o destinatário oculto que receberá uma cópia da mensagem
            $mail->AddBCC('Nathan.soares01@hotmail.com', 'Nathan');

			# Define que o e-mail será enviado no formato HTML
            $mail->IsHTML(true);
            # Define a codificação
            $mail->CharSet = 'utf-8';

			# Define o título da mensagem
            $mail->Subject  = "Contato - ". $assunto;

            # Define o conteúdo (corpo) da mensagem
            $mail->Body .= "<b>Nome</b>: ". $nome."<br>";
            $mail->Body .= "<b>E-mail</b>: ". $email."<br>";
            $mail->Body .= "<b>Assunto</b>: 'Redefine Passord'<br><br>";
            $mail->Body .= "<b>Mensagem</b>:<br> ". nl2br(htmlspecialchars($mensagem, ENT_QUOTES));

			# Envia o e-mail
            $enviado = $mail->Send();

			# Limpa os recipientes
            $mail->ClearAllRecipients();
            $mail->ClearAttachments();

			# Grava a mensagem que será exibida ao usuário após o envio
            if ($enviado) {
                $retorno = "We will contact you soon";
            } else {
                $retorno = "Error " . $mail->ErrorInfo;
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
				<legend>Password Request</legend><br>

				<label>Name:</label><br>
				<input id="nome" name="nome" type="text" placeholder="Digite seu nome" value="<?= $nome; ?>" /><br><br>

				<label>E-mail:</label><br>
				<input id="email" name="email" type="text" placeholder="Digite seu e-mail" value="<?= $email; ?>" /><br><br>

				<input name="submit" type="submit" value="Submit" style="width: auto;" />
			</fieldset>
		</form>
	</body>
</html>