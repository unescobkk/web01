<?php
require_once("../config.php");

 $sql = "INSERT INTO inv_code (
								  code
								  ,sub_code
								 
								  ,description
								  ,asset_class
								)
					VALUES ('{$_POST['code']}'
							,'{$_POST['sub_code']}'
							
							,'{$_POST['description']}'
							,'{$_POST['asset_class']}'
							)";
					
$result = mysql_query($sql)or die('Error querying mysql database');

?>