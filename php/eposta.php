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

if(isset($_POST["ad_soyad"])&& isset($_POST["eposta"]) && isset($_POST["sifre"]))
{   $eposta=$_POST["eposta"];
    $sifre=$_POST["sifre"];
    $ad_soyad=$_POST["ad_soyad"];
   
        $hedef_klasor="yuklenenler/";
        $hedef_dosya=$hedef_klasor.basename($_FILES["fileToUpload"]["name"]);
        $yuklemeyeUygunluk = 1;
        $durum="";
        
        
        if(file_exists($hedef_dosya)){
            $yuklemeyeUygunluk=0;
            $durum.="Aynı dosya Var.";
        }
        
        
        if($_FILES["fileToUpload"]["size"]>10000000){
            $yuklemeyeUygunluk=0;
            echo "aa";
            $durum.="Dosya boyutu 10MB üstünde.";
        }
        
        
       
        $resimKontrol=mime_content_type($_FILES["fileToUpload"]["tmp_name"]);
        
        if(strpos($resimKontrol,"image") !=false){
            $yuklemeyeUygunluk=0;
            $durum.="Resim dosyası değil.";
        }
        
        
        $resimDosyaTur = strtolower(pathinfo($hedef_dosya,PATHINFO_EXTENSION));
        if($resimDosyaTur!="jpg" && $resimDosyaTur!="jpeg" && $resimDosyaTur!="png" && $resimDosyaTur!="gif"){
            $yuklemeyeUygunluk=0;
            $durum.="png, jpg, jpeg ve gif uzantılı olmalı.";
        }
        
        if($yuklemeyeUygunluk==1){
            if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $hedef_dosya)) {
                $database->insert("385184_tbl_kullanici",["ad_soyad"=>$ad_soyad,
                "eposta" => $eposta,
                "sifre" => $sifre,   
                "aktivasyon" => $aktivasyon_dkod,"foto"=>$hedef_dosya]);
               $soneklenen=$database->id();
                if($soneklenen>0){
                    header("Location:giris4.php");
                }
                
                echo "Dosya ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " yüklendi.";
              } else {
                echo "Hata";
              }
        }else{
            echo "Kriterler sağlanmadı!";
            echo $durum;
        }
        
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
        $mail->Subject = 'Here is the subject';
        $mail->Body    = 'Kayıt olduğunuz için teşekkürler.<br>Hesabınızı aktif etmek için <"a href=localhost/385184/aktif2_et.php?mail='.$eposta.'&kod='.$aktivasyon_dkod.'">tıklayınız</a>';
        $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
    
        $mail->send();
        echo 'Message has been sent';
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
    

}else{
    header ("Location:kayit.php");
}


?>



