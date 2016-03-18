<?php

require_once("../config.php");


 echo $sql = "DELETE inv_code FROM inv_code WHERE id = '{$_POST['id']}' ";
$result = mysql_query($sql)or die('Error querying mysql database');


?>