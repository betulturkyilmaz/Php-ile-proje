<?php
// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'Medoo.php';
 
// Using Medoo namespace
use Medoo\Medoo;
 
$database = new Medoo([
	// required
	'database_type' => 'mysql',
	'database_name' => 'php_final',
	'server' => 'localhost',
	'username' => 'root',
	'password' => ''
 
	
]);

// Load Composer's autoloader
require 'vendor/autoload.php';

// Instantiation and passing `true` enables exceptions
$mail = new PHPMailer(true);
//kod üretimi
$kod_icin1=date('d.m.Y H:i:s');
$kod_icin2=rand(0,20000);
$aktivasyon_dkod= hash('sha256',$kod_icin1.$kod_icin2);

if(isset($_POST["eposta"]) )
{   $eposta=$_POST["eposta"];
    
    $sifre = $database->get("385184_tbl_kullanici","sifre", ["eposta" => $eposta]);
    
     try {
        //Server settings
        $mail->SMTPAuth   = true;
        $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      // Enable verbose debug output
        $mail->isSMTP();                                            // Send using SMTP
        $mail->Host       = 'smtp.gmail.com';                    // Set the SMTP server to send through
                                                                     // Enable SMTP authentication
        $mail->Username   = 'ybssodev@gmail.com';                     // SMTP username
        $mail->Password   = 'Odev5353';                               // SMTP password
        $mail->SMTPSecure = 'tls';         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
        $mail->Port       = 587;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above
    
        //Recipients
        $mail->setFrom('ybssodev@gmail.com', 'Mailer');
        $mail->addAddress( $eposta, 'Yeni Hesap');     // Add a recipient
       // $mail->addAddress('ellen@example.com');               // Name is optional
        //$mail->addReplyTo('info@example.com', 'Information');
        //$mail->addCC('cc@example.com');
        //$mail->addBCC('bcc@example.com');
    
        // Attachments
        //$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
        //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
    
        // Content
        $mail->isHTML(true);                                  // Set email format to HTML
        $mail->Subject = 'Şifre hatırlatma';
        $mail->Body    = '<h3>unutulan şifreniz '.$sifre.'"</h3>';
        
    
        $mail->send();
        echo 'Message has been sent';
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
    

}



?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<form action="" method="post">
    kullanici adı<input type="text" name="eposta"><br>
    
    <input type="submit" name="hatırlat"><br>
    </form>
    
</body>
</html>
<?php
if(isset($_POST["eposta"]) )
{   $eposta=$_POST["eposta"];
    
    $user=$database->get("385184_tbl_kullanici","id",["AND" =>["eposta"=>$eposta,"sifre" =>$sifre,"aktif_mi"=>1]]);
    if($user>0)
    {
        header("Location:giris4.php");
    }
    else{
        header("Location:giris.php?m=kullanici_hata");
    }

}

    


?>