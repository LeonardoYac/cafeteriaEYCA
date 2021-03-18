<?php

function mysqli_result($result, $iRow, $field = 0) { 
 if(!mysqli_data_seek($result, $iRow)) return false; 
 if(!($row = mysqli_fetch_array($result))) return false; 
 if(!array_key_exists($field, $row)) return false; 
return $row[$field]; 
} 

$hostname_webshop = "localhost";    //
$database_webshop = "db_cafeteria";
$username_webshop = "root";         //
$password_webshop = "";             //

$webshop_connect = mysqli_connect($hostname_webshop,$username_webshop,$password_webshop,$database_webshop);

?>