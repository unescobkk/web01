<?php
require_once("config.php");
$id = $_POST['id'];

for ($i=0; $i<sizeof($id); $i++){

 // echo $sql = "SELECT * FROM table WHERE id='".$_POST['i']['description']."'";
 // $query = "UPDATE * FROM inv_code  WHERE inventory.id = '{$_POST['sub_code'][$i]}''";
	

 echo  $query = "UPDATE inv_code SET  description = '{$_POST['description'][$i]}', asset_class = '{$_POST['asset_class'][$i]}'  WHERE code = '{$_POST['code'][$i]}' AND sub_code = '{$_POST['sub_code'][$i]}'";
 $result = mysql_query($query)or die('Error querying mysql database');
  //echo $_POST['description'][$i];
  

}
?>