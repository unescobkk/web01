<?php
require_once("config.php");

 $query = "SELECT  * FROM inventory where  po_date LIKE '%2014%'";
 $result = mssql_query($query);
while ( $record = mssql_fetch_array($result))
{
	$originalDate1 = $record["dv_date"];
	
	 $m = date("F", strtotime($originalDate1));
	 $y = date("Y", strtotime($originalDate1));
	
		$query_rate = "SELECT  * FROM exrate where year = '{$y}' AND month = '{$m}'";
		$result_rate = mssql_query($query_rate);
		$us_rate = mssql_fetch_array($result_rate);
		 $tmp =   number_format($record["cost"]/$us_rate["rate"],2);
		//
		
		
		 echo $sql = "UPDATE inventory SET cost_us = '{$tmp}' WHERE id = {$record['id']}";
	echo "<br>";
							
		//$result = mssql_query($sql)or die('Error querying MSSQL database');
}
			
?>