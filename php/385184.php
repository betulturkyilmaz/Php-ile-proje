<?php
require 'Medoo.php';
 
// Using Medoo namespace
use Medoo\Medoo;
 
$database = new Medoo([
	// required
	'database_type' => 'mysql',
	'database_name' => 'itp_vt',
	'server' => 'localhost',
	'username' => 'root',
    'password' => '',
    
    // [optional]
	'charset' => 'utf8mb4',
	'collation' => 'utf8mb4_general_ci',
	'port' => 3306,
 

]);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
    table.blueTable {
  border: 1px solid #1C6EA4;
  background-color: #EEEEEE;
  width: 100%;
  text-align: left;
  border-collapse: collapse;
}
table.blueTable td, table.blueTable th {
  border: 1px solid #AAAAAA;
  padding: 3px 2px;
}
table.blueTable tbody td {
  font-size: 13px;
}
table.blueTable tr:nth-child(even) {
  background: #D0E4F5;
}
table.blueTable thead {
  background: #1C6EA4;
  background: -moz-linear-gradient(top, #5592bb 0%, #327cad 66%, #1C6EA4 100%);
  background: -webkit-linear-gradient(top, #5592bb 0%, #327cad 66%, #1C6EA4 100%);
  background: linear-gradient(to bottom, #5592bb 0%, #327cad 66%, #1C6EA4 100%);
  border-bottom: 2px solid #444444;
}
table.blueTable thead th {
  font-size: 15px;
  font-weight: bold;
  color: #FFFFFF;
  border-left: 2px solid #D0E4F5;
}
table.blueTable thead th:first-child {
  border-left: none;
}

table.blueTable tfoot td {
  font-size: 14px;
}
table.blueTable tfoot .links {
  text-align: right;
}
table.blueTable tfoot .links a{
  display: inline-block;
  background: #1C6EA4;
  color: #FFFFFF;
  padding: 2px 8px;
  border-radius: 5px;
}
    </style>
</head>
<body>
    <form action="" method="POST">
    <b>TV Markası:</b><input type="text" name="TV_Markaa" value="">
    <b>TV Fiyatı:</b><input type="text" name="TV_Fiyatt" value="">
    <b>TV Ekran Boyutu:</b><input type="text" name="TV_EkranBoyutuu" value="">
    <b>TV İşletim Sistemi:</b><input type="text" name="TV_IsletimSistemii" value="">
    <input type="submit"  value="Kaydet">

    </form><br><br>
    
<?php
$TVMarka="";
$TVFiyat="";
$TVEkranBoyutu="";
$TVIsletimSistemi="";
if(isset($_POST["TV_Markaa"]) && isset($_POST["TV_Fiyatt"]) && isset($_POST["TV_EkranBoyutuu"]) && isset($_POST["TV_IsletimSistemii"]) )
{
    $TVMarka=$_POST["TV_Markaa"];
    $TVFiyat=$_POST["TV_Fiyatt"];
    $TVEkranBoyutu=$_POST["TV_EkranBoyutuu"];
    $TVIsletimSistemi=$_POST["TV_IsletimSistemii"];
    $database->insert("tbl_385184", [
        "TV_Marka" => $TVMarka,
        "TV_Fiyat" => $TVFiyat,
        "TV_EkranBoyutu" =>$TVEkranBoyutu,
        "TV_IsletimSistemi" => $TVIsletimSistemi

    ]);
    $sonKayit=0;
    $sonKayit=$database->id();
    if($sonKayit>0){
       echo '<script> alert("Kayıt Başarılı");</script>';
    }else{

        echo '<script> alert("Hata!");</script>';
    }


}
?>
<table class="blueTable">
<thead>
<tr>
<th>Sıra</th>
<th>TV Markası</th>
<th>TV Fiyatı(TL)</th>
<th>TV Ekran Boyutu(cm)</th>
<th>TV İşletim Sistemi</th>
</tr>
</thead>
<tbody>

<?php

$kayitlar= $database->select("tbl_385184", "*");
$sira=1;
foreach($kayitlar as $kayit){
    echo "<tr>
    <td>$sira</td>
    <td>".$kayit["TV_Marka"]."</td>
    <td>".$kayit["TV_Fiyat"]."</td>
    <td>".$kayit["TV_EkranBoyutu"]."</td>
    <td>".$kayit["TV_IsletimSistemi"]."</td>
    </tr>";
    $sira++;

   
}

?>
</tbody>
</table>

  
</body>
</html>