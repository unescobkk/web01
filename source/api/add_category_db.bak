<?php
require_once("config.php");
//var_dump($_POST);

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
					
$result = mssql_query($sql)or die('Error querying MSSQL database');

?>