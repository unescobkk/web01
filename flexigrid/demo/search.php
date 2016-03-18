<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>jQuery FlexiGrid exsample </title>
<!-- นำสคริปต่างๆ เข้ามา -->

 <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
 <script type="text/javascript" src="../js/flexigrid.pack.js"></script>
<link rel="stylesheet" type="text/css" href="../css/flexigrid.pack.css" />
 
<!--jquery script-->
<script type="text/javascript">
 
$(document).ready(function(){
 
	$("#table").flexigrid({ // กำหนดให้สร้าง data grid ให้กับ แท็ก table ที่มี id=table
			url: 'data.php', // กำหนด url ของไฟล์ที่จะใช้เชื่อมต่อฐานข้อมูลมาแสดง
			dataType: 'json', // กำหนดชนิดของไฟล์ข้อมูลที่ต้องการใช้งานในที่นี้ใช้ json 
			colModel : [  // กำหนดลักษณะการแสดงของคอลัมน์ในตาราง อ่านคำอธิบายด้านล่าง
					{display: 'ลำดับ', name : 'id', width : 40, sortable : true, align: 'center'},
					{display: 'ชื่อ', name : 'brand', width : 100, sortable : true, align: 'left'},
					{display: 'นามสกุล', name : 'model', width : 100, sortable : true, align: 'left'},
					{display: 'รหัสบัตรประชาชน', name : 'unit', width : 250, sortable : true, align: 'center'},
					     		],
									//		display คือ กำหนด ชื่อข้อความที่ต้องการแสดงหัวข้อคอลัมน์
									//		name คือ ชื่อ field ของตารางในฐานข้อมูลที่สอดคล้องกัน
									//		widh คือ ความกว้างของคอลัมน์ที่ต้องการแสดง หน่วยเป็น pixel (กำหนดแต่ตัวเลข) 
									//		sortable คือ กำหนดว่าคอลัมน์สามารถทำการเรียงข้อมูลได้หรือไม่ ค่า true / false
									//		align คือ กำหนดการจัดตำแหน่งการแสดงข้อมูล ค่า left / center / right
									//		hide คือ กำหนดให้แสดงหรือไม่แสดงคอลัมน์นั้น ค่า true / false (ส่วนเพิ่มเติม กำหนดหรือไม่ก็ได้)
 
			searchitems : [ // ปุ่ม search กำหนดให้ค้นหาจากอะไรได้บ้าง ถ้าต้องการให้ค่า default เป็นอะไร ให้ตั้งค่า isdefault: true
				{display: 'ชื่อ', name : 'brand', isdefault: true},
				{display: 'นามสกุล', name : 'model'},
				{display: 'ไอดี', name : 'id'}
				],
 
			sortname: "id",	 // กำหนดการจัดเรียงเริ่มต้น ว่าต้องการให้เรียงตาม field อะไรในฐานข้อมูล 
			sortorder: "desc",	 // กำหนดเรียกจากมากไปน้อย หรือน้ยอไปมาก desc / asc
			usepager: true,	 // กำหนดให้แสดงส่วนการแบ่งหน้าหรือไม่ true / false
			title: 'jQuery Flexigrid plugins',	 // หัวข้อตาราง
			useRp: true, 	// กำหนดให้แสดงการ กำหนดจำนวนรายการแสดงต่อหน้า หรือไม่ true / false
          			 // useRp:true,
			rp: 10, 	// กำหนดจำนวนรายการที่จะแสดงในแต่ละหน้า
			showTableToggleBtn: false,	 // กำหนดให้แสดงปุ่ม ซ่อน / แสดงตารางหรือไม่ true / false
			width: 550, 	// กำหนดความกว้าง
			height: 300  	// กำหนดความสูง
			});   
 
 
 
 
});
</script>
 
</head>
 
<body>
 
<table id="table" style="display:none"></table>
 
</body>
</html>