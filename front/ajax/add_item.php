
<?php
require_once("../config.php");

/*echo $_FILES["userImage"]["name"];

$x = move_uploaded_file($_FILES["userImage"]["tmp_name"],"../../source/resources/image/".$_FILES["userImage"]["name"]);

echo $x;

exit('xxx');
//var_dump($_POST);*/

function convert_date($date){
	$tmp_date =  explode('/', $date);
	return $tmp_date['2']."-".$tmp_date['0']."-".$tmp_date['1'];
}


function gen_inv_no ($code,$sub_code){
	$sql = "SELECT IF (MAX(CAST( inv_no AS SIGNED )) +1 IS NULL,1,2) as count FROM inventory WHERE code = '{$code}' AND sub_code = '{$sub_code}'";
	$result = mysql_query($sql);
        
	$count =  mysql_result($result,0,'count');
        
        
      
	return $inv_no = sprintf("%03d", $count);
}

 $inv_no =  gen_inv_no($_POST['code'],$_POST['sub_code']);

if(($_POST['input_date']) != ""){
	$po_date = convert_date($_POST['input_date']);
}
if(($_POST['input_date1']) != ""){
	$dv_date = convert_date($_POST['input_date1']);
}
 $cost = number_format($_POST['cost'],2);
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
							,'{$cost}'
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
			
	$result = mysql_query($sql)or die('Error querying mysql database');
	
     /*   echo 'LAST_INSERT_ID: ',
          mysql_query( "SELECT LAST_INSERT_ID()" ),
          '<br>mysql_insert_id: ',*/
        $next_id =  mysql_insert_id();
        
       
  //      echo $sql_id = "SELECT LAST_INSERT_ID()";
	//$sql_id = "SELECT mysql_insert_id('inventory') as id";
//	echo $result = mysql_query($sql_id);
  //  echo     $next_id =    mysql_query("SELECT LAST_INSERT_ID()");

                
	//$next_id =  mysql_result($result,0,'id');
	
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
					
			$result = mysql_query($sql_com)or die('Error querying mysql database');
	}
	
	if(move_uploaded_file($_FILES["userImage"]["tmp_name"],"../../source/resources/image/".$_FILES["userImage"]["name"]))
	{
		//echo "Copy/Upload Complete<br>";
	echo	  $sql_pic = "INSERT INTO picture (FormID,brand,model,picurl) VALUES ('{$next_id}','{$_POST['brand']}','{$_POST['model']}','{$_FILES['userImage']['name']}')";
		$result = mysql_query($sql_pic);
		
		
	}
 $alert = $_POST['code'].$_POST['sub_code'].".".$inv_no;
	if($result){
		echo "Success Inv.NO ".$alert;
	
		 
	}

?>