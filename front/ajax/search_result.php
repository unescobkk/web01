
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
								$where .= " AND cost_us >= {$_POST['cost_us']}";
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
						}else{
                                                    echo $query = "SELECT  * FROM inventory ";
                                                }
						//echo $_SESSION['query'] = $query;
						//echo "<br>";
						$row_array = array();
						$result = mysql_query($query);
                                             
                                             echo   $totalData = mysql_num_rows($result);
                                                $totalFiltered = $totalData;


                                                $sum = 0;$sum_us = 0;$us_1 = 0;
						while ( $row = mysql_fetch_array($result) )
						{
                                                    $nestedData=array();

                                                    $nestedData[] = $row["id"];
                                                    $nestedData[] = $row["code"];
                                                    $nestedData[] = $row["sub_code"];
                                                    $nestedData[] = $row["model"];
                                                    $nestedData[] = $row["unit"];
                                                    $nestedData[] = $row["po_no"];
                                                    $data[] = $nestedData;


                                                }
                                                $json_data = array(
                                                              "draw"            => intval(1),
                                                                "recordsTotal"    => $totalData,
                                                                     "recordsFiltered" => $totalfiltered,
                                                                "data"            => $data   // total data array
                                                                );
		
echo json_encode($json_data); 
                                                ?>


