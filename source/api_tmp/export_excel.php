<?php
require_once("config.php");
$strExcelFileName="report_inventory.xls";
header("Content-Type: application/x-msexcel; name=\"$strExcelFileName\"");
header("Content-Disposition: inline; filename=\"$strExcelFileName\"");
header("Pragma:no-cache");


function display_cat($code,$sub_code){

	 $sql_cat = "SELECT * FROM inv_code WHERE code = {$code} AND sub_code = {$sub_code}";
	$result_cat = mssql_query($sql_cat);
	$res_cat = mssql_fetch_array($result_cat);
	return $res_cat['description'];
}
if($_GET){

$where = "1=1";
						if($_GET['status'] != ''){
							
							$where .= " AND status = '{$_GET['status']}'";
						
						}
						if($_GET["po_date"] != '')
						{
							$where .= " AND po_date LIKE '%{$_GET['po_date']}%'";
						}
						if($_GET['unit'] != '')
						{
							$where .= " AND unit = '{$_GET['unit']}'";
							
						}
						if($_GET['officer'] != '')
						{
							$where .= " AND officer = '{$_GET['officer']}'";
						}
						if($_GET['code'] != '')
						{
							$where .= " AND code = '{$_GET['code']}'";
							
						}
						if($_GET['sub_code'] != '')
						{
							$where .= " AND sub_code = '{$_GET['sub_code']}'";
							
						}
						if($_GET['cost_us'] != '')
						{
							$where .= " AND cost_us >= {$_GET['cost_us']}";
						}
						if($_GET['sn'])
						{
							$where .= " AND sn LIKE '%{$_GET['sn']}%'";
						}
						if($_POST['inv_no'])
						{
								$tmp =	explode( ',',$_GET['inv_no'] );
							
								foreach($tmp as $index => &$value){
								
									
								//	echo $index;
									
									$code1 = substr("{$value}", 0,2);
									$sub_code1 = substr("{$value}",2,2);
								//echo	$inv =	explode( '.',$value );echo "<br>";
								
								list($k,$v) = explode('.', $value);
								$a[$k] = $v;
								//echo $a[$k];echo "<br>";
								if($index == 0){
									$where .= " AND (code = '{$code1}' AND sub_code = '{$sub_code1}' AND inv_no = '{$a[$k]}')";
								}
								if($index > 0){
									$where .= " OR (code = '{$code1}' AND sub_code = '{$sub_code1}' AND inv_no = '{$a[$k]}')";
								}
									
								}
								//$code1 = substr("{$_POST['inv_no']}", 0,2); 
								//$sub_code1 = substr("{$_POST['inv_no']}",2,2);
								//$inv =	explode( '.',$_POST['inv_no'] );
									// $inv['1'];
								
								//$where .= "AND (code = '{$code1}' AND sub_code = '{$sub_code1}' AND inv_no = '{$inv['1']}')";
						}
						if($_GET['brand'])
						{
							$where .= " AND (brand LIKE '%{$_GET['brand']}%' OR model LIKE '%{$_GET['brand']}%')";
						}
						
						echo	 $query = "SELECT  * FROM inventory where {$where}";
							
}
 $result = mssql_query($query);
 $num = mssql_num_rows($result);


?>
<html xmlns:o="urn:schemas-microsoft-com:office:office"xmlns:x="urn:schemas-microsoft-com:office:excel"xmlns="http://www.w3.org/TR/REC-html40">
 
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>
<body>
<strong>Date<?php echo date("d/m/Y");?> Total <?php echo $num;?> record </strong><br>

<br>

<TABLE  x:str BORDER="1">
<tr>

						<th></th>
						<th>Inv. No</th>
						<th>Brand/Model</th>
						<th>Unit/Officer</th>
						<th>Budget/Bus. Area</th>
						<th>Purchase Order</th>
						<th>Voucher</th>
						<th>Amount Paid</th>
</tr>
<?php

while($record = mssql_fetch_array($result)){
							$seria = "(S/N:".$record["sn"].")";
							$originalDate = $record["po_date"];
							$po_date = date("d M Y", strtotime($originalDate));
							$originalDate1 = $record["dv_date"];
							$dv_date = date("d M Y", strtotime($originalDate1));
							$us_1 += $record["cost_us"];
							$sum += $record["cost"];
							/*$m = date("F", strtotime($originalDate1));
							$y = date("Y", strtotime($originalDate1));
							 $query_rate = "SELECT  * FROM exrate where year = '{$y}' AND month = '{$m}'";
							$result_rate = mssql_query($query_rate);
							 $us_rate = mssql_fetch_array($result_rate);
							 $tmp =  $record["cost"]/$us_rate["rate"];
							 $us_1 += $tmp;
							
							if($us_rate["rate"] == ""){
								 $us_rate = "-no rate-";
							}else{
								 $us_rate =  number_format($record["cost"]/$us_rate["rate"],2)." US$";
							}*/
							?>
<tr >
							<td align = "center"><?echo "[".$record["code"].$record["sub_code"]."]  ".display_cat($record["code"],$record["sub_code"]); ?></td>
							<td align = "center"><a class="iframe_maps" href="update_from.php?id=<?=$record["id"]?>" id="id_inv"><?=$record["code"].$record["sub_code"].".".$record["inv_no"]; ?></a></td>
							
							<td align = "center"><?=$record["brand"]." ".$record["model"]." ".$seria; ?></td>
							<td align = "center"><?=$record["unit"]."<br>".$record["officer"]; ?></td>
							<td align = "center"><?=$record["budget_code"].$record["busa"].".".$record["ob_no"]; ?></td>
						
							<td align = "center"><?=$record["po_no"]; echo "<br>"; echo $po_date; ?></td>
							<td align = "center"><?=$dv_date; ?></td>
							<td align = "center"><font color = 'red'><?php echo number_format($record["cost_us"], 2)." US"; ?></font><?php echo "<br>"; echo number_format($record["cost"], 2)." THB"; ?></td>
						</tr>
<?php

}
?>
<tr>
				<td colspan = "6" align = "center">TOTAL<td>
				<td align = "center"><?= number_format($us_1,2)." US$"?><?php echo "<br>";?><?= number_format($sum,2)." THB"?><td>
				<tr>
</table>
</div>
<script>
window.onbeforeunload = function(){return false;};
setTimeout(function(){window.close();}, 10000);
</script>
</body>
</html>
