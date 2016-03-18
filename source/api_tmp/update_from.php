<?php
require_once("config.php");

	$id = $_GET['id'];

  $query = "SELECT  * , inventory.remark as mark1 , computer.remark as mark2 FROM inventory LEFT JOIN computer ON inventory.id = computer.id WHERE inventory.id = '{$_GET['id']}'";
					


$result = mssql_query($query);
$record = mssql_fetch_array($result);

	 $query_pic = "SELECT  * FROM picture WHERE brand = '{$record['brand']}' AND model = '{$record['model']}'";
	$result_pic = mssql_query($query_pic);
	$rs = mssql_fetch_array($result_pic);
	//var_dump($rs);
/*	$originalDate1 = $record["dv_date"];
	
	 $m = date("F", strtotime($originalDate1));
	 $y = date("Y", strtotime($originalDate1));

	echo $query_rate = "SELECT  * FROM exrate where year = '{$y}' AND month = '{$m}'";
	$result_rate = mssql_query($query_rate);
	$us_rate = mssql_fetch_array($result_rate);
	if($us_rate["rate"] == ""){
		$us_rate = "No rate";
	}else{
		$us_rate = $us_rate["rate"];
	}*/
?>
	<!---------------------------------- Fancy Box------------------------------------->
	<!-- Add jQuery library -->
	
	<script type="text/javascript" language="javascript" src="../../media/js/jquery.js"></script>

	<!-- Add fancyBox main JS and CSS files -->
	<script type="text/javascript" src="../../fancyBox/source/jquery.fancybox.js?v=2.1.5"></script>
	<link rel="stylesheet" type="text/css" href="../../fancyBox/source/jquery.fancybox.css?v=2.1.5" media="screen" />
	<!-- Add Button helper (this is optional) -->
	<link rel="stylesheet" type="text/css" href="../../fancyBox/source/helpers/jquery.fancybox-buttons.css?v=1.0.5" />
	<script type="text/javascript" src="../../fancyBox/source/helpers/jquery.fancybox-buttons.js?v=1.0.5"></script>

	<!-- Add Thumbnail helper (this is optional) -->
	<link rel="stylesheet" type="text/css" href="../../fancyBox/source/helpers/jquery.fancybox-thumbs.css?v=1.0.7" />
	<script type="text/javascript" src="../../fancyBox/source/helpers/jquery.fancybox-thumbs.js?v=1.0.7"></script>

	<!-- Add Media helper (this is optional) -->
	<script type="text/javascript" src="../../fancyBox/source/helpers/jquery.fancybox-media.js?v=1.0.6"></script>
	<link rel="stylesheet" type="text/css" href="../../media/css/form.css">
	<!---------------------------------- Fancy Box------------------------------------->
	
	<!----- ui jquery ----------->
	 <link rel="stylesheet" href="//code.jquery.com/ui/1.11.0/themes/smoothness/jquery-ui.css">
	<script src="//code.jquery.com/jquery-1.10.2.js"></script>
	<script src="//code.jquery.com/ui/1.11.0/jquery-ui.js"></script>

	<script type="text/javascript" language="javascript" src="../resources/jquery.blockUI.js"></script>
	<!----- ui jquery ----------->
<link rel="stylesheet" type="text/css" href="../../media/css/update.css">
<script type="text/javascript">
	/*$(document).ready(function (){
		$("#btn_update").on('click',(function(){
		
			$.ajax({
				url: "update_db.php",
				type: "POST",
				//data:  new FormData(this),
				data:  $("#update_form").serialize(),
				contentType: false,
				cache: false,
				processData:false,
				success: function(data){
					
					parent.jQuery.fancybox.close()
					alert("Update Success");
				},
				error: function(){} 	        
			});
		}));
	});*/
	
	$(document).ready(function() {
		


		$('#btn_update').click(function(){

			//$.fancybox.showActivity();

			$.ajax({
				type	: "POST",
				cache	: false,
				url		: "update_db.php",
				data	:  $("#update_form").serialize(),
				success: function(data) { 
					parent.jQuery.fancybox.close()
				
					
				}
			});

			return false;
		});

		
		
	});
	
	
</script>
 <script>
$(function() {
	$( "#datepicker" ).datepicker();
	$( "#datepicker1" ).datepicker();
});
</script>
<script type="text/javascript">

$(document).ready(function(){
	
	
	
	
	/*$('#btn_update').click(function(){

		//$.fancybox.showActivity();

		$.ajax({
			type	: "POST",
			cache	: false,
			url		: "update_db.php",
			data	:  $("#update").serialize(),
			success: function(data) { 
				parent.jQuery.fancybox.close()
				alert("Update Success");
				
			}
		});

		return false;
	});*/
	
	
	$('#btn_delelte').click(function(){

		//$.fancybox.showActivity();

		$.ajax({
			type	: "POST",
			cache	: false,
			url		: "delete.php",
			data	:  $("#update_form").serialize(),
			success: function(data) {
				
			   parent.jQuery.fancybox.close();
				alert("Delete Success");
				window.location.reload();
				
			}
		});

		return false;
	});

	
	
	 $('#datepicker1').change(function(e){
		var cost_us = $( "#cost_us" ).val();
		if(cost_us == '0.00'){
		 //alert(this.value);
			$.ajax({
				type	: "POST",
				cache	: false,
				url		: "thai2us.php",
				data	: {timeA:this.value,cost:$( "#cost" ).val()},
				success: function(data) {
				
					 $("#cost_us").val(data);
				}
			});

			return false;
		}else{
			$.ajax({
				type	: "POST",
				cache	: false,
				url		: "us2thai.php",
				data	: {timeA:this.value,cost_us:$( "#cost_us" ).val()},
				success: function(data) {
				
					 $("#cost").val(data);
				}
			});

			return false;
			
		
		}
	});
	

	
});

</script>

<script type="text/javascript">
$(function() {
$('.showhide').click(function() {
$(".slidediv").slideToggle();
});
});
</script>
<style type="text/css">
.slidediv{
width: 700px;

 background: #DDF0F8;

display:none;
}

</style>
<form action="update_db.php" method="post" class="elegant-aero" id = "update_form" name = "update_form" enctype="multipart/form-data" >
    <h1>Inventory Update Form  </h1>	
	<label>
        <span width = "10px;">Pic :</span>
		  <span width = "10px;"><img src = "../../source/resources/image/<?=$rs['picurl']?>" height = "20%" width = "20%"></span>
		
	 </label>
	 <p>
	 <label>
        <span width = "10px;">Upload pic :</span>
		  <span width = "10px;"><input name="userImage" type="file" class="inputFile" /></span>
		
	 </label>
	 <p>
	<label>
        <span width = "10px;">Inv. No. :</span>
		  <span width = "10px;"><?=$record['code'].$record['sub_code'].".".$record['inv_no']?></span>
		  <input id ="id" type= "hidden" name="id" value = "<?=$id?>"  />
		   <input id ="inv_no" type= "hidden" name="inv_no" value = "<?=$record['inv_no']?>"  />
		   <input id ="code" type= "hidden" name="code" value = "<?=$record['code']?>"  />
		   <input id ="sub_code" type= "hidden" name="sub_code" value = "<?=$record['sub_code']?>"  />
	 </label>	
	 <p>
    <label>
        <span width = "10px;">Brand :</span>
		<input id="brand" type="text" name="brand" value = "<?=$record['brand']?>" />
       
	 </label>	
	 <label>
	<span>Model :</span>
      <input id="model" type="text" name="model" value = "<?=$record['model']?>"  />
		
    </label>
    <p>
    <label>
        <span>Serial No :</span>
         <input id="sn" type="text" name="sn"  value = "<?=$record['sn']?>" />
       
    </label>
    <p>
    <label>
        <span>Description :</span>
         <textarea id="description" name="description" placeholder="Your description to Us"><?=$record['description']?></textarea>
    </label> 
	<p>
     <label>
        <span>Officer :</span>
		  <input id="officer" type="text" name="officer" placeholder="Your Full Name"  value = "<?=$record['officer']?>"/>
    </label> 
	<label>
        <span>Unit :</span>
		<input id="unit" type="text" name="unit"  value = "<?=$record['unit']?>" />
    </label>  	
	<p>
	<label>
        <span>Room No :</span>
		<input id="room" type="text" name="room"  value = "<?=$record['room']?>" />
    </label> 
	<p>
     <label>
        <span>PO.No. :</span>
		  <input id="po_no" type="text" name="po_no" value = "<?=$record['po_no']?>"/>
    </label> 
	<label>
        <span>PO.Date :</span>
		<input id="datepicker" type="text" name="datepicker"   value = "<?=date("d F Y", strtotime($record['po_date']))?>" />
		<input id="po_date" type="hidden" name="po_date"   value = "<?=$record['po_date']?>" />
    </label>  
	<p>
     <label>
        <span>DV.No. :</span>
		  <input id="dv_no" type="text" name="dv_no"value = "<?=$record['dv_no']?>"  />
    </label> 
	<label>
        <span>DV.Date :</span>
		<input id="datepicker1" type="text" name="datepicker1"  value = "<?=date("d F Y", strtotime($record['dv_date']))?>"/>
		<input id="dv_date" type="hidden" name="dv_date"   value = "<?=$record['dv_date']?>" />
    </label> 
	<p>
     <label>
        <span>FR No. :</span>
		  <input id="ob_no" type="text" name="ob_no"  value = "<?=$record['ob_no']?>" />
    </label> 
	
	<p>
	<label>
        <span>Cost(THB)  :</span>
		<input id="cost" type="text" name="cost"  value = "<?=number_format($record['cost'],2)?>"/>
	
    </label> 
	<label>
        <span>Cost(USD):</span>
		<input id="cost_us" type="text" name="cost_us" value = "<?=number_format($record['cost_us'],2) ?>"  />
		 
    </label>  
	<p>
     <label>
        <span>Budget Cost :</span>
		  <input id="budget_code" type="text" name="budget_code" value = "<?=$record['budget_code']?>" />
    </label> 
	<label>
        <span>Bus. Area :</span>
		<input id="busa" type="text" name="busa" placeholder="0"  value = "<?=$record['busa']?>"/>
    </label>
	<p>
     <label>
        <span>Status. :</span>
		  <select name="status">
							<option value="" <?php if($record['status'] == "")  echo ' selected="selected"';?>>-------ALL-------</option>
							<option value="a" <?php if($record['status'] == "a") echo ' selected="selected"';?>>Active</option>
							<option value="s" <?php if($record['status'] == "s") echo ' selected="selected"';?>>Stored</option>
							<option value="r" <?php if($record['status'] == "r") echo ' selected="selected"';?>>Damaged</option>
							<option value="d" <?php if($record['status'] == "d") echo ' selected="selected"';?> >Disposed</option>
		</select>
    </label> 
	<p>
	<label>
        <span>Remark :</span>
		 <textarea id="remark" name="remark" ><?=$record['mark1']?></textarea>
    </label>
	
	<p><p>
	<label>
	<?php if(($record['code'] == "09") && (($record['sub_code'] == "12") || ($record['sub_code'] == "11"))){ ?>
	<div align = "right"><a href="#" class="showhide"><h2>Show/hide More Detail</h2></a></div>
	<?php } ?>
	<!---------------------------------------MORE DETAIL --------------------------------------------------------->
	
	</label>
	<div class="slidediv">
	<label>
        <span width = "10px;">CPU Type :</span>
		 <select name="cputype">
			<option value="Intel Pentium M"<?php if ($record['cputype'] == 'Intel Pentium M') echo ' selected="selected"'; ?>>Intel Pentium M</option>
			<option value="Intel Pentium 4"<?php if ($record['cputype'] == 'Intel Pentium 4') echo ' selected="selected"'; ?>>Intel Pentium 4</option>
			<option value="Intel Celeron"<?php if ($record['cputype'] == 'Intel Celeron') echo ' selected="selected"'; ?>>Intel Celeron</option>
			<option value="Intel Pentium III"<?php if ($record['cputype'] == 'Intel Pentium III') echo ' selected="selected"'; ?>>Intel Pentium III</option>
			<option value="Intel Pentium II"<?php if ($record['cputype'] == 'Intel Pentium II') echo ' selected="selected"'; ?>>Intel Pentium II</option>
			<option value="Intel Pentium Pro"<?php if ($record['cputype'] == 'Intel Pentium Pro') echo ' selected="selected"'; ?>>Intel Pentium Pro</option>
			<option value="Apple G"<?php if ($record['cputype'] == 'Apple G') echo ' selected="selected"'; ?>>Apple G</option>
			<option value="AMD Duron"<?php if ($record['cputype'] == 'AMD Duron') echo ' selected="selected"'; ?>>AMD Duron</option>
			<option value="AMD Athlon"<?php if ($record['cputype'] == 'AMD Athlon') echo ' selected="selected"'; ?>>AMD Athlon</option>
			<option value="80486"<?php if ($record['cputype'] == '80486') echo ' selected="selected"'; ?>>80486</option>
			<option value="80386"<?php if ($record['cputype'] == '80386') echo ' selected="selected"'; ?>>80386</option>
			<option value="80286"<?php if ($record['cputype'] == '80286') echo ' selected="selected"'; ?>>80286</option>
		
		
	
        </select>
       
	 </label>	
	 <label>
	<span  style = "padding-left:35px;">CPU Speed :</span>
      <input id="name" type="cpuspeed" name="cpuspeed"  class = "text1"  value = "<?=$record['cpuspeed']?>"  />MHz.
		
    </label>
    <p>
    <label>
        <span>RAM :</span>
         <input id="ram" type="text" name="ram" class = "text1"   value = "<?=$record['ram']?>" />MB.
       
    </label>
   
    <label>
        <span  style = "padding-left:15px;">Harddisk :</span>
        <input id="name" type="text" name="name" class = "text1" value = "<?=$record['hd']?>" />GB.
    </label> 
	<p>
     <label>
        <span>Accessories :</span>
		
		 <input type = "checkbox" id = "cd" name = "cd" value ="1" <?php if($record['cd'] == 1){ echo('checked="checked"'); } ?>>CD-ROM  
		 <input type = "checkbox" id = "dvd" name = "dvd" value = "1" <?php if($record['dvd'] == 1){ echo('checked="checked"'); } ?>>DVD-ROM
		 <input type = "checkbox" id = "modem" name = "modem" value = "1" <?php if($record['modem'] == 1){ echo('checked="checked"'); } ?>>Modem  
		 <input type = "checkbox" id = "speaker" name = "speaker" value = "1" <?php if($record['speaker'] == 1){ echo('checked="checked"'); } ?>>Speaker
		<input type = "checkbox" id = "mic" name = "mic" value = "1" <?php if($record['mic'] == 1){ echo('checked="checked"'); } ?>>Microphone
		 
	 
    </label> 
	<p>
	<label>
        <span>NIC :</span>
		<input id="nic" type="text" name="nic" value = "<?=$record['nic']?>" />
    </label>  	
	
	<label>
        <span>Station ID :</span>
		<input id="station" type="text" name="station"  value = "<?=$record['station']?>" />
    </label> 
	<p>
     <label>
        <span>VGA :</span>
		  <input id="vga" type="text" name="vga" value = "<?=$record['vga']?>"/>
    </label> 
	<label>
        <span>Sound :</span>
		<input id="sound" type="text" name="sound"  value = "<?=$record['sound']?>" />
    </label>  
	<p>
	<label>
        <span>OS :</span>
		 <select name="os">
			<option value=""<?php  if($record['os'] == "") echo ' selected="selected"'; ?>>Selectd</option>
			<option value="Windows XP"<?php  if($record['os'] == "Windows XP") echo ' selected="selected"'; ?>>Windows XP</option>
			<option value="Windows Me"<?php  if($record['os'] == "Windows Me") echo ' selected="selected"'; ?>>Windows Me</option>
			<option value="Windows 98"<?php if($record['os'] == "Windows 98") echo ' selected="selected"'; ?>>Windows 98</option>
			<option value="Windows 95"<?php if($record['os'] == "Windows 95") echo ' selected="selected"'; ?>>Windows 95</option>
			<option value="Windows 2000"<?php if($record['os'] == "Windows 2000") echo ' selected="selected"';?>>Windows 2000</option>
			
			
			<option value="Windows NT"<?php if($record['os'] == "Windows NT") echo ' selected="selected"'; ?>>Windows NT</option>
			<option value="Windows 3.1"<?php if($record['os'] == "Windows 3.1")  echo ' selected="selected"'; ?>>Windows 3.1</option>
			
			<option value="MacOS X"<?php if ($record['os'] == 'MacOS X') echo ' selected="selected"'; ?>>MacOS X</option>
			<option value="MacOS 9.0"<?php if ($record['os'] == 'MacOS 9.0') echo ' selected="selected"'; ?>>MacOS 9.0</option>
			
			
			<option value="Linux"<?php if ($record['os'] == 'Linux') echo ' selected="selected"'; ?>>Linux</option>
		
		
			
	
        </select>
    </label> 
	<p>
	<label>
        <span>Remark :</span>
		 <textarea id="remark1" name="remark1"><?=$record['mark2']?></textarea>
    </label>  
	</div>
	<p>
	<div align = "center">
     <label>
        <span>&nbsp;</span> 
        <input type="button" class="button" value="Update" id = "btn_update" /> 
    </label> 
	<label>
        <span>&nbsp;</span> 
        <input type="button" class="button1" value="Delete" id = "btn_delelte" /> 
    </label> 
	</div>	
</form>