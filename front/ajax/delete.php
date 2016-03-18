<?php
require_once("../config.php");
//var_dump($_POST);

 $sql = "DELETE  inventory FROM inventory LEFT JOIN computer ON inventory.id = computer.id WHERE inventory.id = '{$_POST['id']}'";
 $result = mysql_query($sql)or die('Error querying mysql database');
 
//  $sql_pic = "DELETE FROM PICTURE WHERE brand =  '{$_POST['brand']}' AND model =  '{$_POST['model']}' "
 //  $result = mysql_query($sql_pic)or die('Error querying mysql database');

?>