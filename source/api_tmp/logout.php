<?php 
require_once("config.php");


unset($_SESSION["user"]);
session_destroy();
echo '<script type="text/javascript">
		
         window.location.replace("index.html");
      </script>';

?>