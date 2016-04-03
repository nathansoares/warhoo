

<?php
$link = mysql_connect('mysql03.redehost.com.br', 'footwork', 'flamboyant123');
if (!$link) {
    die('Não foi possível estabelecer uma conexão com o MySQL : ' . mysql_error());
}

// make foo the current db
$db_selected = mysql_select_db('footwork', $link);
if (!$db_selected) {
    die ('Não foi possivel acessar o banco de dados: ' . mysql_error());
}
 

$thumb=strip_tags(trim($_POST['thumb']));
		$firstname=$_POST['firstname'];
		$lastname=$_POST['lastname'];
		$gender=$_POST['gender'];
		$birthday=$_POST['birthday'];
		$country=$_POST['country'];
		$address=$_POST['address'];
		$postcode=$_POST['postcode'];
		$club=$_POST['club'];
		
		
		$email=$_POST['email'];
		$password=$_POST['password'];
		
		$url = strip_tags(trim($_POST['leadvideo']));
		$leadvideo = substr($url, 32, 11);
		




$query_select = "SELECT email FROM users WHERE email = '$email'";
$select = mysql_query($query_select,$link);
$pegaemail = mysql_query("SELECT * FROM users WHERE email = '$email'");
			
			if (@mysql_num_rows($pegaemail)>0) {
			
			 echo"<script language='javascript' type='text/javascript'>alert('This user exists');window.location.href='login.php'</script>";
			
			


    }elseif($email == "" || $email == null){
        echo"<script language='javascript' type='text/javascript'>alert('E-mail is empty');window.location.href='login.php'</script>";
		
 
        }else{
           
 
                $query = "INSERT INTO users(firstname, lastname, gender, birthday, country, address, postcode, club, email, password,leadvideo, thumb)VALUES('$firstname','$lastname','$gender','$birthday','$country','$address','$postcode','$club','$email','$password', '$leadvideo','$thumb')";
                $insert = mysql_query($query,$link);
                 
                if($insert){
                    echo"<script language='javascript' type='text/javascript'>alert('Success!!!');window.location.href='login.php'</script>";
					
					

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
$mail->AddAddress($email, $firstname);
$mail->AddCC('nathan.soares01@gmail.com', 'Warhoo Seller'); // Copia
//$mail->AddBCC('fulano@dominio.com.br', 'Fulano da Silva'); // Cópia Oculta

// Define os dados técnicos da Mensagem
// =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
$mail->IsHTML(true); // Define que o e-mail será enviado como HTML
//$mail->CharSet = 'iso-8859-1'; // Charset da mensagem (opcional)

// Define a mensagem (Texto e Assunto)
// =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
$mail->Subject  = '$firstname'; // Assunto da mensagem
$mail->Body = "<p>Hi $firstname,
This is a confirmation of your e-mail on Warhoo. 

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




                }else{
                    echo"<script language='javascript' type='text/javascript'>alert('There is something wrong');window.location.href='login.php'</script>";
                }
            }
        
?>

