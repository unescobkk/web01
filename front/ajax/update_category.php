<?php
include('../config.php');



 // echo $sql = "SELECT * FROM table WHERE id='".$_POST['i']['description']."'";
 // $query = "UPDATE * FROM inv_code  WHERE inventory.id = '{$_POST['sub_code'][$i]}''";
	

  $query = "UPDATE inv_code SET  description = '{$_POST['description']}', asset_class = '{$_POST['asset_class']}'  WHERE code = '{$_POST['code']}' AND sub_code = '{$_POST['sub_code']}'";
$result = mysql_query($query)or die('Error querying mysql database');
  //echo $_POST['description'][$i];

?>