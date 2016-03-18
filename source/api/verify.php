<?PHP
require_once("config.php");

 
 $sql = "SELECT * FROM user_login WHERE Username = '{$_POST['username']}' AND Password =  '{$_POST['password']}'";
 $result = mysql_query($sql);
 $rs = mysql_fetch_array($result);
 
 $_SESSION["user"] = $rs['Username'];

if($_SESSION["user"]){

	echo '<script type="text/javascript">
		
         window.location.replace("home.php");
      </script>';
}else{
echo '<script type="text/javascript">
		
         window.location.replace("index.html");
      </script>';
}

?>