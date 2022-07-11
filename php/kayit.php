<?php
require 'Medoo.php';
 
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
        body {background: url(kayit.jpg) no-repeat center center fixed;
	            -webkit-background-size: cover;
                -moz-background-size: cover;
                -o-background-size: cover;
                background-size: cover; }
        div {
            width:400px;height:400px;
            float:left;
            margin:150px 0 0 80px;
            z-index:999; 
            background: linear-gradient(90deg, rgba(96,88,91,1) 0%, rgba(6,36,70,0.969625350140056) 100%);
            border-radius:10px; }
        td{font-size:25px; text-align:center;}
        table{margin:20px 0 0 25px;}
    </style>
</head>
<body>
        
    <form action="eposta.php" method="post" enctype="multipart/form-data">
    <div><table><tr><td>
    Lütfen profil fotoğrafınızı yükleyiniz:</td></tr><tr><td>
    <input type="file" name="fileToUpload" id="fileToUpload"></td></tr>
   
    <tr><td>Ad Soyad:</td></tr><tr><td><input type="text" name="ad_soyad"></td></tr>
    <tr><td>E-Posta:</td></tr><tr><td><input type="email" name="eposta"></td></tr>
    <tr><td> Şifre:</td></tr><tr><td><input type="password" name="sifre"></td></tr>
        </td></tr><tr><td> <input type="submit" value="Kayıt Ol" name="submit"><br></td></tr>
        <tr><td><a href="giris4.php">Giriş Yap</a></td></tr> </table></div>
    </form> 
    
</body>
</html>
