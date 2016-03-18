<?php
require_once("config.php");
$where = "WHERE 1 = 1";
	
	if($_POST['status']){
		$where .= " AND status = '{$_POST['status']}'";
						
	}
	if($_POST['year'])
	{
		$where .= " AND po_date LIKE '%{$_POST['year']}%'";
	}
	if($_POST['unit'])
	{
		$where .= " AND unit = '{$_POST['unit']}'";
	}
	if($_POST['officer'])
	{
		$where .= " AND officer = '{$_POST['officer']}'";
	}
	if($_POST['category'])
	{
		 $code = substr("{$_POST['category']}", 0,2);
		 $sub_code = substr("{$_POST['category']}", 2);
		$where .= " AND code = '{$code}' AND sub_code = '{$sub_code}'";
	}
	if($_POST['cost_us'])
	{
		$where .= " AND cost_us >= '{$_POST['cost_us']}'";
	}
						
	$query = "SELECT TOP 50 * FROM inventory {$where}";
	$result = mysql_query($query);
	
	while ( $record = mysql_fetch_array($result) )
	{
		
       $results[] = array(
          'sn' => $record['id'],
          'po_date' => $record['po_date'],
          'brand' => $record['brand'],
          'unit' => $record['unit'],
		  'officer' => $record['officer'],
          'po_no' => $record['po_no']
       );
    }
	 echo json_encode($results);
	 
	
    
     
   
?>