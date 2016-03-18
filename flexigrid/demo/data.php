<?php
header("Content-type:text/x-json; charset=UTF-8");        
header("Cache-Control: no-store, no-cache, must-revalidate");       
header("Cache-Control: post-check=0, pre-check=0", false);       
// ส่วนการเชื่อมต่อกับฐานข้อมูล
$objConnect = mssql_connect("172.24.67.14","sa","")
	  or die('Could not connect to the server!');
	mssql_select_db('promis') 
		or die('Could not select a database');
$page = $_POST['page']; // รับค่าหน้าที่ต้องการนำมาแสดง
$rp = $_POST['rp']; // รับค่าจำนวนแสดงต่อ 1 หน้า
$sortname = $_POST['sortname']; //  รับค่าเงื่อนไข field ที่ต้องการจัดเรียง
$sortorder = $_POST['sortorder']; // รับค่ารูปแบบการจัดเรียงข้อมูล
 
// ส่วนการกำหนดค่า กรณีไม่ได้ส่งค่ามา
if (!$sortname) $sortname = 'id'; // ถ้าไม่ส่งค่ามา กำหนดเป็น ชื่อ field ในฐานข้อมูลของเรา ที่ต้องการให้เรียงเมื่อไม่ได้กำหนดค่าในหน้า index.php
if (!$sortorder) $sortorder = 'desc'; // ถ้าไม่ส่งรูปแบบการจัดเรียงข้อมูลมา ให้กำหนดเป็น จากมากไปหาน้อย desc
if (!$page) $page = 1; //  ถ้าไม่ได้ส่งหน้าที่ต้องการแสดงมา ให้แสดงหน้าแรก เป็น 1
if (!$rp) $rp = 10; // หากไม่กำหนดรายการที่จะแสดงต่อ 1 หน้ามา ให้กำหนดเป็น 10
 
// ส่วนสำหรับจัดรูปแบบขอบเขตและเงื่อนไขข้อมูลที่ต้องการแสดง
$start = (($page-1) * $rp);
$limit = "LIMIT $start, $rp";
$sort = "ORDER BY $sortname $sortorder";
 
// ส่วนหรับหาว่ามีข้อมูลทั้งหมดเท่าไหร่ เก็บในตัวแปร $total
$q = "SELECT * FROM inventory ";
$qr = mssql_query($q);
echo $total = mssql_num_rows($qr);
$query = $_POST['query']; //รับค่าที่ค้นหา
$qtype = $_POST['qtype']; //เงื่อนไขที่ส่งมา
 
$where = "";
if ($query) $where = " WHERE $qtype LIKE '%$query%' ";
// ส่วนสำหรับดึงข้อมูลมาสร้าง json ไฟล์ สำหรับแสดง
echo $q = "SELECT  TOP 50 * FROM inventory $where  $sort";
$qr1 = mssql_query($q);
echo $numrow = mssql_num_rows($qr1);

if($numrow>0){
$data['page'] = intval($page); // 
$data['total'] = intval($total); //
while ($row = mssql_fetch_array($qr1)) {
		$rows[] = array(
				"id" => $row['id'],
				"cell" => array(
					$row['brand']
				    ,$row['model']
					,$row['unit']
	               ,$row['po_no']
				)
			);	
}
}else { // ในกรณีค่าที่ค้นหา ไม่มี ให้คืน ค่า เป็น null ไปทั้งหมด 
     		$rows[] = array(
				"id" => 'null',
				"cell" => array(
					'null'
				    ,'null'
					,'null'
	               ,'null'
				)
			);		
 
}

$data['rows'] = $rows;
echo json_encode($data);
// เข้ารหัสส่งค่ากับไปเป็น json
//exit;
 
?>