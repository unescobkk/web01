<?php

require_once("config.php");


 $sql = "DELETE exrate FROM exrate WHERE id = '{$_GET['id']}' ";
$result = mssql_query($sql)or die('Error querying MSSQL database');


echo '<script type="text/javascript">
		alert("Delete already");
         window.location.replace("exchage_rate.php");
      </script>';
	  
?>