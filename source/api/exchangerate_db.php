<?php
require_once("config.php");
echo $_POST['month'];
echo sizeof($_POST['month']);


	$sql= "SELECT  MAX(id) as num FROM exrate ";
	$result=mysql_query($sql);
	$record  = mysql_fetch_array($result);
	$num = $record['num']+1;
				
for ($i=0; $i<sizeof($_POST['month']); $i++){

	
 echo $sql = "INSERT INTO exrate ( id ,rate ,month,year) VALUES  ('{$num}','{$_POST['rate'][$i]}','{$_POST['month'][$i]}','{$_POST['year'][$i]}')";
					
	$result = mysql_query($sql)or die('Error querying mysql database');			
  $num++;

}
?>