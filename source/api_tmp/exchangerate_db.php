<?php
require_once("config.php");
echo $_POST['month'];
echo sizeof($_POST['month']);


	$sql= "SELECT  MAX(id) as num FROM exrate ";
	$result=mssql_query($sql);
	$record  = mssql_fetch_array($result);
	$num = $record['num']+1;
				
for ($i=0; $i<sizeof($_POST['month']); $i++){

	
 echo $sql = "INSERT INTO exrate ( id ,rate ,month,year) VALUES  ('{$num}','{$_POST['rate'][$i]}','{$_POST['month'][$i]}','{$_POST['year'][$i]}')";
					
	$result = mssql_query($sql)or die('Error querying MSSQL database');			
  $num++;

}
?>