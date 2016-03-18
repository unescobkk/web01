<?php include('../config.php'); 
function display_cat($code,$sub_code){

	 $sql_cat = "SELECT * FROM inv_code WHERE code = {$code} AND sub_code = {$sub_code}";
	$result_cat = mysql_query($sql_cat);
	$res_cat = mysql_fetch_array($result_cat);
	return $res_cat['description'];
}
if($_SESSION['query'] !== ""){
						//echo "session";echo "<br>";
						$query = $_SESSION['query'];
					}
					if($_POST){
                                            var_dump($_POST);
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
							if($_POST['cost'])
							{
								$where .= " AND cost >= {$_POST['cost']}";
							}
                                                        if($_POST['currency'])
							{
								$where .= " AND currency LIKE '%{$_POST['currency']}%'";
							}
							if($_POST['sn'])
							{
								$where .= " AND sn LIKE '%{$_POST['sn']}%'";
							}
							if($_POST['inv_no'])
							{
								$tmp =	explode( ',',$_POST['inv_no'] );
							
								foreach($tmp as $index => &$value){
							
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
							if($_POST['brand'])
							{
								$where .= " AND (brand LIKE '%{$_POST['brand']}%' OR model LIKE '%{$_POST['brand']}%')";
							}
							if($_POST['po_no'])
							{
								$where .= " AND (po_no = '{$_POST['po_no']}')";
							}
						
							echo $query = "SELECT  * FROM inventory {$where} ";
                                                
                                              
							 $_SESSION['query'] = $query;
						}
						//echo $_SESSION['query'] = $query;
						//echo "<br>";
						
						$result = mysql_query($query);
                                                $sum = 0;$sum_us = 0;$us_1 = 0;
						while ( $record = mysql_fetch_array($result) )
						{
							//var_dump($record);
							$seria = "(S/N:".$record["sn"].")";
							$originalDate = $record["po_date"];
							$po_date = date("d M Y", strtotime($originalDate));
							$originalDate1 = $record["dv_date"];
							$dv_date = date("d M Y", strtotime($originalDate1));
							$us_1 += $record["cost_us"];
							$sum += $record["cost"];
							
                                                       
                                                  if(empty($record)) {
                                                        echo "<tr>";
                                                            echo "<td colspan='6'>There were not records</td>";
                                                        echo "</tr>";
                                                    }
                                                   else{
                                                  ?>
                                                <tr >
							<td align = "center"> <?php echo "[".$record["code"].$record["sub_code"]."]  ".display_cat($record["code"],$record["sub_code"]); ?></td>
							<td ><a  target="_blank" href="#ajax/edit.php?id=<?=$record["id"]?>&get=<?=$excel?>" id="id_inv"><?=$record["code"].$record["sub_code"].".".$record["inv_no"]; ?></a></td>
							
							<td align = "left"><?=$record["brand"]." ".$record["model"]." ".$seria; ?></td>
							<td ><?=$record["unit"]."<br>".$record["officer"]; ?></td>
					
						
							<td ><?=$record["po_no"]; echo "<br>"; echo $po_date; ?></td>
							
							<td><font color = 'red'><?php  echo  $record["cost"].$record["currency"]; ?></td>
						</tr>
						
						<?php
                                                   }//$sum += $record["cost"];
							
						}
						
					
						
					?>
                                                
                                 