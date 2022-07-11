<?php

require 'Medoo.php';
session_start();
// Using Medoo namespace
use Medoo\Medoo;
 
$database = new Medoo([
	// required
	'database_type' => 'mysql',
	'database_name' => 'php_final',
	'server' => 'localhost',
	'username' => 'root',
	'password' => '',
 
	// [optional]
	'charset' => 'utf8mb4',
	'collation' => 'utf8mb4_general_ci',
	'port' => 3306
]);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    
    <style>
        body {background: url(giris.jpg) no-repeat center center fixed;
	            -webkit-background-size: cover;
                -moz-background-size: cover;
                -o-background-size: cover;
                background-size: cover; }
        div {
            width:350px;height:350px;
            float:left;
            margin:200px 0 0 850px;
            z-index:999; 
            background:  radial-gradient(circle, rgba(238,174,202,1) 8%, rgba(148,187,233,0.4990371148459384) 53%);
            border-radius:10px; }

        td{font-size:25px; text-align:center;}
        table{margin:80px 0 0 85px;}
    </style>
</head>
<body>
    
    <form action="" method="post">
        <div><table><tr><td>
        E-Posta:</td></tr><tr><td><input type="email" name="eposta"></td></tr>
        <tr><td>Şifre:</td></tr><tr><td><input type="password" name="sifre"></td></tr>
        <tr><td><input type="submit" VALUE="GİRİŞ"></td></tr>
        <tr><td><a href="hatirlat.php">Şifremi unuttum</a></td></tr>
        <tr><td><a href="kayit.php">Kayıt Ol</a></td></tr>


       </table>
        </div>
    </form>
</body>
</html>
<?php
$sifre="";
$eposta="";
if(isset($_POST["eposta"]) && isset($_POST["sifre"])){
    if($_POST["eposta"]!="" && $_POST["sifre"]!=""){
        $eposta=$_POST["eposta"];
        $sifre=$_POST["sifre"];
        $kullanici = $database->get("385184_tbl_kullanici", "*", ["AND" => ["eposta" => $eposta,"sifre"=>$sifre,"aktif_mi"=>1]]);
        if($kullanici['id']!=""){
            
            if($kullanici['aktif_mi']==1){
               
                $_SESSION["kullaniciID"]=$kullanici['id'];
                header('Location: tvkayit.php');
                
                exit;
            }else{
              
                echo '<script>alert("Hesabınız henüz aktifleştirilmedi.")</script>';
            }
        }else{
           
            echo '<script>alert("E-Posta ve Şifre bilgileriniz eksik ya da hatalı. Lütfen Tekrar deneyiniz.")</script>';
        }       

    }else{
        echo '<script>alert("Eksik alanlar var. Lütfen bilgileri eksiksiz doldurunuz.")</script>';
    }    
}


?>