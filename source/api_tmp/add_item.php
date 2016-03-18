
<?php
require_once("config.php");
if($_SESSION["user"] == ""){
echo '<script type="text/javascript">
		
         window.location.replace("index2.html");
      </script>';
}
/*echo $_FILES["userImage"]["name"];

$x = move_uploaded_file($_FILES["userImage"]["tmp_name"],"../../source/resources/image/".$_FILES["userImage"]["name"]);

echo $x;

exit('xxx');
//var_dump($_POST);*/

function convert_date($date){
	$tmp_date =  explode('/', $date);
	return $tmp_date['2']."-".$tmp_date['0']."-".$tmp_date['1']." 00:00:00.000";
}


function gen_inv_no ($code,$sub_code){
	$sql = "SELECT  max(inv_no)+1 as count FROM inventory WHERE code = '{$code}' AND sub_code = '{$sub_code}'";
	$result = mssql_query($sql);
	$count =  mssql_result($result,0,'count');
	return $inv_no = sprintf("%03d", $count);
}

$inv_no =  gen_inv_no($_POST['code'],$_POST['sub_code']);
if(($_POST['datepicker']) != ""){
	$po_date = convert_date($_POST['datepicker']);
}
if(($_POST['datepicker1']) != ""){
	$dv_date = convert_date($_POST['datepicker1']);
}
$today = date("Y-m-d H:i:s"); 
// $_FILES['userImage']['name'];
   $sql = "INSERT INTO inventory (
								  code
								  ,sub_code
								 
								  ,inv_no
								  ,brand
								  ,model
								  ,description
								  ,po_no
								  ,po_date
								  ,dv_no
								  ,dv_date
								  ,lastupdate
								  ,cost
								  ,cost_us
								  ,currency
								  ,ob_no
								  ,budget_code
								  ,sn
								  ,officer
								  ,unit
								  ,room
								  ,status
								  ,supplier_id
								  ,remark
								 
								  ,busa)
					VALUES ('{$_POST['code']}'
							,'{$_POST['sub_code']}'
							,'{$inv_no}'
							,'{$_POST['brand']}'
							,'{$_POST['model']}'
							,'{$_POST['description']}'
							,'{$_POST['po_no']}'
							,'{$po_date}'
							,'{$_POST['dv_no']}'
							,'{$dv_date}'
							,'{$today}'
							,'{$_POST['cost']}'
							,'{$_POST['cost_us']}'
							,'{$_POST['currency']}'
							,'{$_POST['ob_no']}'
							,'{$_POST['budget_code']}'
							,'{$_POST['sn']}'
							,'{$_POST['officer']}'
							,'{$_POST['unit']}'
							,'{$_POST['room']}'
							,'{$_POST['status']}'
							,'{$_POST['supplier_id']}'
							,'{$_POST['remark']}'
							
							,'{$_POST['busa']}'
							
						)";
					
	$result = mssql_query($sql)or die('Error querying MSSQL database');
	
	$sql_id = "SELECT IDENT_CURRENT('inventory') as id";
	$result = mssql_query($sql_id);
	$next_id =  mssql_result($result,0,'id');
	
	if(($_POST['code'] == "09") && (($_POST['sub_code'] == '11' || ($_POST['sub_code'] == '12')))){
			 $sql_com = "INSERT INTO computer (id
								  ,cputype
								  ,cpuspeed
								  ,ram
								  ,hd
								  ,cd
								  ,dvd
								  ,modem
								  ,speaker
								  ,mic
								  ,nic
								  ,station
								  ,os
								  ,vga
								  ,sound
								  ,remark
								  ,lastupdate
								  )
								VALUES ('{$next_id}'
									,'{$_POST['cputype']}'
									,'{$_POST['cpuspeed']}'
									,'{$_POST['ram']}'
									,'{$_POST['hd']}'
									,'{$_POST['cd']}'
									,'{$_POST['dvd']}'
									,'{$_POST['modem']}'
									,'{$_POST['speaker']}'
									,'{$_POST['mic']}'
									
									,'{$_POST['nic']}'
									,'{$_POST['station']}'
									,'{$_POST['os']}'
									,'{$_POST['vga']}'
									,'{$_POST['sound']}'
									
									,'{$_POST['remark1']}'
									,'{$today}'
							
								)";
						
			$result = mssql_query($sql_com)or die('Error querying MSSQL database');
	}
	
	if(move_uploaded_file($_FILES["userImage"]["tmp_name"],"../../source/resources/image/".$_FILES["userImage"]["name"]))
	{
		//echo "Copy/Upload Complete<br>";
		  $sql_pic = "INSERT INTO picture (brand,model,picurl) VALUES ('{$_POST['brand']}','{$_POST['model']}','{$_FILES['userImage']['name']}')";
	//	$result = mssql_query($sql_pic);
		
		
	}
 $alert = $_POST['code'].$_POST['sub_code'].".".$inv_no;
	if($result){
		echo "Success Inv.NO ".$alert;
	
		 
	}

?>