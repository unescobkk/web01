<?php
 $dv_date = $_POST['datepicker1'];
 $cost = $_POST['cost'];
require_once("config.php");
	
	$thai_month_arr= array(  
    "0"=>"",  
    "01"=>"January",  
    "02"=>"February",  
    "03"=>"March",  
    "04"=>"April",  
    "05"=>"May",  
    "06"=>"June",   
    "07"=>"July",  
    "08"=>"August",  
    "09"=>"September",  
    "10"=>"October",  
    "11"=>"November",  
    "12"=>"December"                    
	);  
	
	
		$tmp_date =  explode('/', $dv_date);
		 $tmp_date['0'];
		 $m = $thai_month_arr[$tmp_date['0']];
		 $y = $tmp_date['2'];
	
	
	

		 $query_rate = "SELECT  * FROM exrate where year = '{$y}' AND month = '{$m}'";
		$result_rate = mssql_query($query_rate);
		$us_rate = mssql_fetch_array($result_rate);
		// $us_rate["rate"];
		echo $tmp =   number_format($cost/$us_rate["rate"],2);
	

			
?>