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
	'password' => ''
 
	
]);

if(isset($_GET["mail"]) && isset($_GET["kod"]))
{   $mail=$_GET["mail"];
    $kod=$_GET["kod"];
    $user=$database->get("385184_tbl_kullanici","id",["AND" =>["eposta"=>$mail,"aktivasyon" =>$kod]]);
    if($user>0)
    {
        $data=$database->update("385184_tbl_kullanici",["aktif_mi"=>1],["id" =>$user]);
        header("Location:giris4.php");
    }
    else{
        
        header("Location:giris4.php?m=kod hatalı");
    }

}

    



?>
