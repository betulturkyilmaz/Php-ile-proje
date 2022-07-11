<?php
session_start();
session_destroy();
 
echo header('Location: giris4.php');

?>