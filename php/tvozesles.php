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
if(!isset($_SESSION["kullaniciID"]) || $_SESSION["kullaniciID"]==""){
    header('Location: giris4.php');
    
}else
{
    

echo "<a href=\"cikis.php\">Çıkış Yap</a>";
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Oswald&display=swap" rel="stylesheet">
   <style type="text/css">
    body {background: url(televizyon.jpg) no-repeat center center fixed;
	            -webkit-background-size: cover;
                -moz-background-size: cover;
                -o-background-size: cover;
                background-size: cover; 
                font-family: 'Oswald', sans-serif;
            font-size:18px;
            color:black;}
   
            #deneme {
                width: 650px;
                height: auto;
                padding: 20px;
                /* background-color: skyblue; */
                position: relative;
                margin: auto;
            }
    
     #profil
            {   
                width:650px;
                float:right;
                height:150px;
                
            }
    #menu
            {   
                width:650px;
                float:left;
                
                margin-top:10px;
                margin:10px;

            }
            ul {
                list-style-type: none;

                margin: 0;

                padding: 0;

                overflow: hidden;
                
}

            li {
                float: left;
                
                
            }
            a {
            text-decoration: none;
            font-family: 'Oswald', sans-serif;
            font-size:23px;
            color:black;
    }

            li a {
                display: block;

                padding:12px 14px;

                background-color: #F48FB1;
                
}
            li a:hover{
                    background-color:#F06292; 
                }
            .active {

                    background-color: #EC407A;
}

            .temizle
            {
                clear:both;
            }
            #solicerik
            {
                float:left;
                margin:0 0 0 20px;
                width:600px;
                height:auto;
                border:2px solid gray;
                
            }
            #ic
            {
                position: relative;
                margin:30px 0 0 180px;
                width:400px;
                height:100px;
                
                
            }
            #button
            {
                position: relative;
                margin:0 0 0 100px;
                font-family: 'Oswald', sans-serif;
                font-size:15px;
                border:2px solid gray;
                
            }
            table.topazCells {
  border: 4px solid #555555;
  background-color: #A43152;
  width: 600px;
  text-align: center;
  border-collapse: collapse;
  margin:43px 0 0 0;
}
table.topazCells td, table.topazCells th {
  border: 1px solid #555555;
  padding: 4px 7px;
}
table.topazCells tbody td {
  font-size: 13px;
  
  color: #FFFFFF;
}
table.topazCells tr:nth-child(even) {
  background: #A43152;
}
table.topazCells td:nth-child(even) {
  background: #A43152;
}
table.topazCells tfoot td {
  font-size: 13px;
}
table.topazCells tfoot .links {
  text-align: right;
}
table.topazCells tfoot .links a{
  display: inline-block;
  background: #FFFFFF;
  color: #A43152;
  padding: 2px 8px;
  border-radius: 5px;
}
   </style>
</head>
<body>
<div id="deneme">
<div id="profil">
<?php
    $kullanici = $database->get("385184_tbl_kullanici", "foto", ["id" => $_SESSION["kullaniciID"]]);
    ?>
     <?php echo '<img src="'.$kullanici.'" style="width:650px;height:150px;" alt="">'; ?>
</div>
<div id="menu">
<ul>
  <li><a href="tvkayit.php">TV KAYIT</a></li>

  <li><a href="tvozellik.php">TV ÖZELLİK KAYIT</a></li>

  <li><a href="tvozesles.php">TV ÖZELLİK EŞLEŞTİR</a></li>

  <li><a href="tvozellikleri.php">TV ÖZELLİKLERİ</a></li>

</ul>



</div>
<div class="temizle"></div>
<div id="icerik">
<div id="solicerik">
<div id="ic">

<form action="" method="post">

<label for="385184_tbl_tv">Marka Ve Modeli Seçiniz:</label>
<select id="385184_tbl_tv" name="tv2">
    <?php
    $tbl_tv_=$database->select("385184_tbl_tv","*");

    foreach($tbl_tv_ as $tv2_){
        echo "<option value='".$tv2_["Id"]."'>".$tv2_["TV_Marka"]."-".$tv2_["TV_Model"]."</option>";
    }
    
    ?>
    </select><br><br>
<label for="385184_tbl_tvozellik">Özellik Seçiniz</label>
    <select id="385184_tbl_tvozellik" name="ozellik">
    <?php
    $ozellik_=$database->select("385184_tbl_tvozellik","*");

    foreach($ozellik_ as $ozel_){
        echo "<option value='".$ozel_["Id"]."'>".$ozel_["TV_isletim_sistemi"]."-".$ozel_["TV_Ekran_Boyutu"]."-".$ozel_["TV_Cozunurluk_standardi"]."-".$ozel_["TV_Ekran_Tipi"]."</option>";
    }
    
    
    ?></select>
    <br><br>
    <input type="submit" value="kaydet" id="button"><br>
    
</form>


</div>

<table class="topazCells">
<tbody>
<tr>
<td>Id</td>
    <td>TV ID</td>
    <td>TV MARKA</td>
    <td>TV Model</td>
    <td>ÖZELLİK ID</td>
    <td>OZELLİK TV İŞLETİM SİSTEMİ</td>
    <td>OZELLİK TV EKRAN BOYUTU</td>
    <td>OZELLİK TV ÇÖZÜNÜRLÜK STANDARDI</td>
    <td>OZELLİK TV EKRAN TİPİ</td></tr>
    <?php

   $tbl_tv_ozellikleri=$database->select("385184_tbl_tv_ozellikleri","*");

    foreach($tbl_tv_ozellikleri as $tv_oz){
        $tv_bilgiler_= $database->get("385184_tbl_tv", "*", ["Id" => $tv_oz ["TV_id"]]);
        $ozellik_bilgiler_= $database->get("385184_tbl_tvozellik", "*", ["Id" => $tv_oz ["ozellik_id"]]);
        
        echo " <tr>
        <td>".$tv_oz["Id"]."</td>
        <td>".$tv_oz["TV_id"]."</td>
        <td>". $tv_bilgiler_["TV_Marka"]."</td>
        <td>". $tv_bilgiler_["TV_Model"]."</td>
        <td>".$tv_oz["ozellik_id"]."</td>
        <td>".$ozellik_bilgiler_["TV_isletim_sistemi"]."</td>
        <td>".$ozellik_bilgiler_["TV_Ekran_Boyutu"]."</td>
        <td>".$ozellik_bilgiler_["TV_Cozunurluk_standardi"]."</td>
        <td>".$ozellik_bilgiler_["TV_Ekran_Tipi"]."</td>
      
      
        </tr>";
    }



?>
 </tbody> </table>



</div>
           
</div>
    
</body>
</html>
<?php
$tv2="";
$ozellik="";

if(isset($_POST["tv2"]) && isset($_POST["ozellik"])){
    if($_POST["tv2"]!="" && $_POST["ozellik"]!="" ){
        $tv2=$_POST["tv2"];
        $ozellik=$_POST["ozellik"];
        

         //Kayıt işlemi yapmalıyız
      $database->insert("385184_tbl_tv_ozellikleri", ["TV_id" => $tv2,"ozellik_id" => $ozellik]);
       $son_eklenen_id = $database->id();
      if($son_eklenen_id>0){
            echo '<script>alert("Kayıt oluşturuldu,")</script>';
      }else{
            echo '<script>alert("Kayıt oluşturulurken hata!Lütfen tekrar deneyiniz.")</script>';
        }
    }else{
         echo '<script>alert("Eksik alanlar var. Lütfen bilgileri eksiksiz doldurunuz.")</script>';
}    
 }


?>