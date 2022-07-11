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
                margin:30px 0 0 50px;
                width:250px;
                height:175px;
                
                float:left;
                
            }
            #ic2
            {
                position: relative;
                margin:30px 0 0 20px;
                width:250px;
                height:70px;
               
                float:left;
                
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
  width: 400px;
  text-align: center;
  border-collapse: collapse;
  margin:30px 0 0 100px;
  float:left;
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

  <b> TV Marka:</b><input type="text" name="TV_Marka"><br><br>
  <b>TV Model:</b><input type="text" name="TV_Model"><br><br>
  <b> TV Fiyat:</b><input type="text" name="TV_Fiyat"><br><br>
   <input type="submit" value=" KAYDET" id="button"><br>
   
</form>


</div>
<div id="ic2">

<form action="" method="post">
   
  <b> Id:</b><input type="text" name="Id"><br><br>
       <input type="submit" value=" Sil" id="button"><br>
  
   
</form>


</div><?php
$TVId="";
if(isset($_POST["Id"])){
    if($_POST["Id"]!="" ){
        $TVId=$_POST["Id"];

        $result=$database->delete('385184_tbl_tv',
                    ["AND" =>[
                        'Id'=>$TVId

                    ]
                      


                    ]);
    }
}

?>
 <div class="temizle"></div>

<table class="topazCells">
<tbody>
    <tr>
    <td>Id</td>
    <td>TV MARKA</td>
    <td>TV MODEL</td>
    <td>TV FİYAT</td>
    <td>İşlem</td></tr>
   <?php
   $tv=$database->select("385184_tbl_tv","*");
   

    foreach($tv as $tvv){
        
        echo " <tr>
        <td>".$tvv ["Id"]."</td>
        <td>".$tvv["TV_Marka"]."</td>
        <td>".$tvv["TV_Model"]."</td>
        <td>".$tvv["TV_Fiyat"]."</td>
        <td><a href='update2.php?Id=echo ".$tvv ["Id"]."'>DÜZENLE</a></td>
        </tr>";
    }
   
    ?>
 </tbody> </table>


</div>





</div>

<?php
$marka="";
$model="";
$fiyat="";
if(isset($_POST["TV_Marka"]) && isset($_POST["TV_Model"]) && isset($_POST["TV_Fiyat"])){
    if($_POST["TV_Marka"]!="" && $_POST["TV_Model"]!="" && $_POST["TV_Fiyat"]!=""){
        $marka=$_POST["TV_Marka"];
        $model=$_POST["TV_Model"];
        $fiyat=$_POST["TV_Fiyat"];

        
        $database->insert("385184_tbl_tv", ["TV_Marka" => $marka,"TV_Model" => $model,"TV_Fiyat" =>  $fiyat]);
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

    
</body>
</html>
