<?php 
require_once("config.php");
$today = date("Y-m-d H:i:s"); 


$sql_id = "SELECT MAX(ID)+1 as id FROM user_login";
	$result = mssql_query($sql_id);
	$next_id =  mssql_result($result,0,'id');
	
	
  $sql = "INSERT INTO user_login (
								  ID
								  ,Username
								  ,Password
								 
								  ,last_login
								  ,email)
								  
						VALUES( '{$next_id}','{$_POST['usernamesignup']}', '{$_POST['passwordsignup']}','{$today}','{$_POST['emailsignup']}')";

$result = mssql_query($sql)or die('Error querying MSSQL database');
if($result){
		echo '<script type="text/javascript">
		
         window.location.replace("index2.html");
      </script>';
	  
}
?>