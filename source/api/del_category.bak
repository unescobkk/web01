<?php

require_once("config.php");


 $sql = "DELETE inv_code FROM inv_code WHERE code = '{$_GET['code']}' AND sub_code = '{$_GET['sub_code']}'";
$result = mssql_query($sql)or die('Error querying MSSQL database');


echo '<script type="text/javascript">
		alert("Delete already");
         window.location.replace("category.php");
      </script>';
	  
?>