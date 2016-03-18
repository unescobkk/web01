<?php
//var_dump($_POST);
require_once("config.php");
//var_dump($_POST);
//echo $_FILES['userImage']['name'];


function condate2Num ($date){

	$thai_month_arr= array(  
    "0"=>"",  
    "January"=>"01",  
    "February"=>"02",  
    "March"=>"03",  
    "April"=>"04",  
    "May"=>"05",  
    "June"=>"06",   
    "July"=>"07",  
    "August"=>"08",  
    "September"=>"09",  
    "October"=>"10",  
    "November"=>"11",  
    "December"=>"12"                    
	);  
	
	if(strpos($date, " ")){ // ไม่มีการเปลี่ยนวัน
			$tmp_date =  explode(' ', $date);
			return $tmp_date['2']."-".$thai_month_arr[$tmp_date['1']]."-".$tmp_date['0']." 00:00:00.000";
	}else{
		$tmp_date =  explode('/', $date);
		return $tmp_date['2']."-".$tmp_date['0']."-".$tmp_date['1']." 00:00:00.000";
	}
	

}

function convert_date($date){
	$tmp_date =  explode('/', $date);
	return $tmp_date['2']."-".$tmp_date['1']."-".$tmp_date['0']." 00:00:00.000";
}


function gen_inv_no ($code,$sub_code){
	$sql = "SELECT  count(*)+1 as count FROM inventory WHERE code = '{$code}' AND sub_code = '{$sub_code}'";
	$result = mssql_query($sql);
	$count =  mssql_result($result,0,'count');
	return $inv_no = sprintf("%03d", $count);
}
 $po_date = condate2Num($_POST['datepicker']);
 $dv_date = condate2Num($_POST['datepicker1']);
$today = date("Y-m-d H:i:s");


/*$inv_no =  gen_inv_no($_POST['code'],$_POST['sub_code']);
$po_date = convert_date($_POST['datepicker']);
$dv_date = convert_date($_POST['datepicker1']);
$today = date("Y-m-d H:i:s"); */
// $_FILES['userImage']['name'];
   $sql = "UPDATE  inventory SET 
								 
								  inv_no = '{$_POST['inv_no']}'
								  ,brand  = '{$_POST['brand']}'
								  ,model  = '{$_POST['model']}'
								  ,description = '{$_POST['description']}'
								  ,po_no = '{$_POST['po_no']}'
								  ,po_date = '{$po_date}'
								  ,dv_no = '{$_POST['dv_no']}'
								  ,dv_date = '{$dv_date}'
								  ,lastupdate = '{$today}'
								  ,cost = '{$_POST['cost']}'
								  ,currency = '{$_POST['currency']}'
								  ,ob_no = '{$_POST['ob_no']}'
								  ,budget_code = '{$_POST['budget_code']}'
								  ,sn = '{$_POST['sn']}'
								  ,officer = '{$_POST['officer']}'
								  ,unit = '{$_POST['unit']}'
								  ,room = '{$_POST['room']}'
								  ,status = '{$_POST['status']}'
								  ,supplier_id = '{$_POST['supplier_id']}'
								  ,remark = '{$_POST['remark']}'
								  ,busa = '{$_POST['busa']}'
								  ,cost_us = '{$_POST['cost_us']}'
								  
								  
								WHERE id  = '{$_POST['id']}'";
	

	 $result = mssql_query($sql)or die('Error querying MSSQL database');
	if($result){
		echo "update success";
	}

	
	if(($_POST['code'] == "09") && (($_POST['sub_code'] == '11' || ($_POST['sub_code'] == '12')))){
			 $sql_com = "UPDATE  computer SET
									
								  cputype = '{$_POST['cputype']}'
								  ,cpuspeed = '{$_POST['cpuspeed']}'
								  ,ram = '{$_POST['ram']}'
								  ,hd = '{$_POST['hd']}'
								  ,cd = '{$_POST['cd']}'
								  ,dvd = '{$_POST['dvd']}'
								  ,modem = '{$_POST['modem']}'
								  ,speaker = '{$_POST['speaker']}'
								  ,mic = '{$_POST['mic']}'
								  ,nic = '{$_POST['nic']}'
								  ,station = '{$_POST['station']}'
								  ,os = '{$_POST['os']}'
								  ,vga = '{$_POST['vga']}'
								  ,sound = '{$_POST['sound']}'
								  ,remark = '{$_POST['remark1']}'
								  ,lastupdate = '{$today}'
									WHERE id  = '{$_POST['id']}'";
							
							
						
			$result = mssql_query($sql_com)or die('Error querying MSSQL database');
	}
	
	if($_FILES["userImage"]["tmp_name"] != ""){
		if(move_uploaded_file($_FILES["userImage"]["tmp_name"],"../../source/resources/image/".$_FILES["userImage"]["name"])){
			$sql_pic = "UPDATE picture SET picurl = '{$_FILES['userImage']['name']}' WHERE brand = '{$_POST['brand']}' AND model = '{$_POST['model']}'";
			$result = mssql_query($sql_pic)or die('Error querying MSSQL database');
		}
	}

	

?>
