<?php
require_once("config.php");


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
	<!----- ui jquery ----------->
	
<link rel="stylesheet" type="text/css" href="../../media/css/add.css">

<script language="JavaScript">
	function showPreview(ele)
	{
			$('#imgAvatar').attr('src', ele.value); // for IE
            if (ele.files && ele.files[0]) {
			
                var reader = new FileReader();
				var img = ele.value;
				$('#brand').val(img);
				alert(img);
				
                reader.onload = function (e) {
                    $('#imgAvatar').attr('src', e.target.result);
					$('#dis_image').css('display', 'show');
                }

                reader.readAsDataURL(ele.files[0]);
            }
	}
</script>
 <script>
$(function() {
	$( "#datepicker" ).datepicker();
	$( "#datepicker1" ).datepicker();
});
</script>
<script type="text/javascript">


$(document).ready(function(){

	$(".slidediv").hide();
	$('#dis_image').css('display', 'none');
	
	$('#code').change(function(){
		//var code = this.value;
		
		$(".slidediv").hide();
		 var datalist2 = $.ajax({
			type	: "GET",
			cache	: false,
			url		: "select_query.php",
			data    :  "code="+$(this).val(),
			 async: false 
		}).responseText;          
        $("select#sub_code").html(datalist2);

	
	});
	
	$('#sub_code').change(function(){
		var sub_code = this.value;
		var code = $( "#code" ).val();
		if(((sub_code == 12) || (sub_code == 11)) && (code == 9)) {
		
			$(".slidediv").slideToggle();
		}else{
			$(".slidediv").hide();
		}
		
	
	});
	
	
	/*$('#btn_update').click(function(){

		//$.fancybox.showActivity();

		$.ajax({
			type	: "POST",
			cache	: false,
			url		: "add_item.php",
			data	:  $("#update").serialize(),
			
			success: function(data) { 
					alert(data);
				parent.jQuery.fancybox.close()
				alert("Update Success");
				
			}
		});

		return false;
	});*/
	
	
	


});


</script>
<script type="text/javascript">
	$(document).ready(function (e){
		$("#update").on('submit',(function(e){
		e.preventDefault();
			$.ajax({
				url: "add_item.php",
				type: "POST",
				data:  new FormData(this),
				contentType: false,
				cache: false,
				processData:false,
				success: function(data){
					parent.jQuery.fancybox.close()
					alert("Add Success");
				},
				error: function(){} 	        
			});
		}));
	});
	
	$(document).ready(function() {
    $("#cost").keydown(function(event) {
    	// Allow only backspace and delete
    	 if( !(event.keyCode == 8                                // backspace
				|| event.keyCode == 46                              // delete
				|| (event.keyCode >= 35 && event.keyCode <= 40)     // arrow keys/home/end
				|| (event.keyCode >= 48 && event.keyCode <= 57)     // numbers on keyboard
				|| (event.keyCode >= 96 && event.keyCode <= 105))   // number on keypad
			) 
		{
            event.preventDefault();     // Prevent character input
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


	
<div id='preview'></div>
<form action="add_item.php" method="post" class="bootstrap-frm" id = "update" name = "update" enctype="multipart/form-data" >
    <h1>Add New Item Form  </h1>	
	<label >
		<span width = "10px;">Image:</span><input name="userImage" type="file" class="inputFile" />
	</label>
	<p>
	<label id = "dis_image">
		<span  style = "padding-left:100px;"><img id="imgAvatar" width = "200px;" height = "200px;"></span>
	</label>
	<p>
	
	<label>
		 <span>Category :</span>
				<?php
						$sql= "SELECT  * FROM inv_code  where sub_code = '00' ORDER BY code ASC ";
						$result=mssql_query($sql);
						?>
						<select name="code" id = "code">
						<option value = "" selected="selected">--------SELECT CODE---------</option>
						<?
							while ($array = mssql_fetch_array($result)) {
						?>
							<option value="<?=$array['code'];?>">[<?=$array['code'];?>]<?=$array['description'];?></option>
						<? } ?>
						</select>
						
	</label>
	
	<label>
		 <span  style = "padding-left:35px;">Sub Category :</span>
				
						<select name="sub_code" id = "sub_code">
						<option value="">--------SELECT CODE---------</option>
					
						</select>
						
	</label>
	<p>
    <label>
        <span>Brand :</span>
		<input id="brand" type="text" name="brand" value = "" />
       
	 </label>	
	 <label>
	<span>Model :</span>
      <input id="model" type="text" name="model" value = ""  />
		
    </label>
    <p>
    <label>
        <span>Serial No :</span>
         <input id="sn" type="text" name="sn"  value = "" />
       
    </label>
    <p>
    <label>
        <span>Description :</span>
         <textarea id="description" name="description" placeholder="Your description to Us"></textarea>
    </label> 
	<p>
     <label>
        <span>Officer :</span>
		  <input id="officer" type="text" name="officer" placeholder="Your Full Name"  value = ""/>
    </label> 
	<label>
        <span>Unit :</span>
		<input id="unit" type="text" name="unit"  value = "" />
    </label>  	
	<p>
	<label>
        <span>Room No :</span>
		<input id="room" type="text" name="room"  value = "" />
    </label> 
	<p>
     <label>
        <span>PO.No. :</span>
		  <input id="po_no" type="text" name="po_no" value = ""/>
    </label> 
	<label>
        <span>PO.Date :</span>
		
		<input id="datepicker" type="text" name="datepicker"   value = "" />
    </label>  
	<p>
     <label>
        <span>DV.No. :</span>
		  <input id="dv_no" type="text" name="dv_no"value = ""  />
    </label> 
	<label>
        <span>DV.Date :</span>
		
		<input id="datepicker1" type="text" name="datepicker1"   value = "" />
    </label> 
	<p>
     <label>
        <span>FR No. :</span>
		  <input id="ob_no" type="text" name="ob_no"  value = "" />
    </label> 
	<p>
	<label>
        <span>Cost xxx:</span>
		<input id="cost" type="text" name="cost" placeholder="0"  value = ""/>
		 <select name="currency">
							
							<option value="THB">THB</option>
							<option value="USD">USD</option>
							
		</select>
    </label>  
	<p>
     <label>
        <span>Budget Cost :</span>
		  <input id="budget_code" type="text" name="budget_code" placeholder="0" value = "" />
    </label> 
	<label>
        <span>Bus. Area :</span>
		<input id="busa" type="text" name="busa" placeholder="0"  value = ""/>
    </label>
	<p>
     <label>
        <span>Status. :</span>
		  <select name="status">
							<option value="">-------ALL-------</option>
							<option value="a">Active</option>
							<option value="s">Stored</option>
							<option value="r">Damaged</option>
							<option value="d">Disposed</option>
		</select>
    </label> 
	<p>
	<label>
        <span>Remark :</span>
		 <textarea id="remark" name="remark"> </textarea>
    </label>
	
	<p><p>
	
	<div class="slidediv">
	<label>
        <span width = "10px;">CPU Type :</span>
		 <select name="cputype">
			<option value="Intel Pentium M" selected>Intel Pentium M</option>
			<option value="'Intel Pentium 4" selected>Intel Pentium 4</option>
			<option value="Intel Celeron" selected>Intel Celeron</option>
			<option value="Intel Pentium III" selected>Intel Pentium III</option>
			<option value="Intel Pentium II" selected>Intel Pentium II</option>
			<option value="Intel Pentium Pro" selected>Intel Pentium Pro</option>
			<option value="Apple G4" selected>Apple G4</option>
			<option value="AMD Duron" selected>AMD Duron</option>
			<option value="AMD Athlon" selected>AMD Athlon</option>
			<option value="80486" selected>80486</option>
			<option value="80386" selected>80386</option>
			<option value="80286" >80286</option>
		
	
        </select>
       
	 </label>	
	 <label>
	<span  style = "padding-left:35px;">CPU Speed :</span>
      <input id="name" type="text" name="cpuspeed" id="cpuspeed" class = "text1"  value = ""  />MHz.
		
    </label>
    <p>
    <label>
        <span>RAM :</span>
         <input id="name" type="text" name="ram" id = "ram" class = "text1"   value = "" />MB.
       
    </label>
   
    <label>
        <span  style = "padding-left:15px;">Harddisk :</span>
        <input id="name" type="text" name="hd" id = "hd" class = "text1" value = "" />GB.
    </label> 
	<p>
     <label>
        <span>Accessories :</span>
		
		 <input type = "checkbox" id = "cd" name = "cd" value ="1" >CD-ROM  
		 <input type = "checkbox" id = "dvd" name = "dvd" value = "1" >DVD-ROM
		 <input type = "checkbox" id = "modem" name = "modem" value = "1">Modem  
		 <input type = "checkbox" id = "speaker" name = "speaker" value ="1">Speaker
		<input type = "checkbox" id = "mic" name = "mic" value = "1">Microphone
		 
	 
    </label> 
	<p>
	<label>
        <span>NIC :</span>
		<input id="nic" type="text" name="nic" value = "" />
    </label>  	
	
	<label>
        <span>Station ID :</span>
		<input id="station" type="text" name="station"  value = "" />
    </label> 
	<p>
     <label>
        <span>VGA :</span>
		  <input id="vga" type="text" name="vga" value = ""/>
    </label> 
	<label>
        <span>Sound :</span>
		<input id="sound" type="text" name="sound"  value = "" />
    </label>  
	<p>
	<label>
        <span>OS :</span>
		 <select name="os">
			<option value="Windows XP" selected>Windows XP</option>
			<option value="Windows Me" selected>Windows Me</option>
			<option value="Windows 98" selected>Windows 98</option>
			<option value="Windows 95" selected>Windows 95</option>
			<option value="Windows 2000" selected>Windows 2000</option>
			
			<option value="Windows NT" selected>Windows NT</option>
			<option value="Windows 3.x" selected>Windows 3.x</option>
			<option value="MacOS X" selected>MacOS X</option>
			<option value="MacOS 9.0" selected>MacOS 9.0</option>
			<option value="Linux" selected>Linux</option>
			
	
        </select>
    </label> 
	<p>
	<label>
        <span>Remark :</span>
		 <textarea id="remark1" name="remark1"></textarea>
    </label>  
	</div>
	<p>
	<div align = "center">
     <label>
        <span>&nbsp;</span> 
        <input type="submit" class="button" value="ADD ITEM" id = "btn_update" /> 
    </label> 
	
	</div>	
</form>