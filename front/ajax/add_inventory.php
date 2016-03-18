<?php include('../config.php'); ?>
<div class="clearfix"></div>
<h4 class="page-header" style="padding-top: 30px;">Add new inventory</h4>
<div class="row">
	<div class="col-xs-12 col-sm-12">
		<div class="box">
			
			<div class="box-content">
                            <p class="page-header">New inventory</p>
				
				
                                  <form action="add_item.php" method="post" role="form" class="form-horizontal"  id = "update" name = "update" enctype="multipart/form-data" >  
                                    <div class="form-group">
						<label class="col-sm-2 control-label">Image</label>
						<div class="col-sm-4">
                                                    
                                                    
                                                    <input name="userImage" type="file" class="inputFile" />
                                                   
						</div>
						
						
					</div>
                                    
					<div class="form-group">
						<label class="col-sm-2 control-label">Category</label>
						<div class="col-sm-4">
                                                    
                                                    
                                                    
                                                    	<?php
                                                            $sql= "SELECT  * FROM inv_code  where sub_code = '00' ORDER BY code ASC ";
                                                            $result = mysql_query($sql);
                                                           
                                                            ?>
                                                            <select name="code" id = "code"  class="form-control" >
                                                            <option value="">----------SELECT CODE-----------</option>  
                                                            <?
                                                                    while ($array = mysql_fetch_array($result)) {
                                                                       
                                                            ?>
                                                                    <option value="<?=$array['code'];?>">[<?=$array['code'];?>]<?=$array['description'];?></option>
                                                            <? } ?>
                                                            </select>
                                                    
                                                   
						</div>
						<label class="col-sm-2 control-label">Sub Category</label>
						<div class="col-sm-4">
                                                <select name="sub_code" id = "sub_code" class="form-control" >
                                                    <option value="">--------SELECT CODE---------</option>
					
						</select>
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label">Brand </label>
						<div class="col-sm-4">
							<input type="text" class="form-control" placeholder="brand" name = "brand" id = "brand">
						</div>
						<label class="col-sm-2 control-label">Model </label>
						<div class="col-sm-4">
							<input type="text" class="form-control" placeholder="Model" name = "model" id = "model">
							
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label">Serial NO </label>
						<div class="col-sm-4">
							<input type="text" class="form-control" placeholder="Serial NO" name = "sn" id = "sn">
						</div>
						<label class="col-sm-2 control-label">Dercription </label>
						<div class="col-sm-4">
                                                    <textarea id="description" name="description" placeholder="Your description"class="form-control" rows="5"></textarea>
								
						</div>
					</div>
					
					<div class="form-group has-error has-feedback">
						<label class="col-sm-2 control-label">PO.Date / No</label>
						<div class="col-sm-2">
							
                                                        <input type="text" id="input_date" name ="input_date" class="form-control" placeholder="Date">
							<span class="fa fa-calendar txt-danger form-control-feedback"></span>
						</div>
						<div class="col-sm-2">
							<input type="text" id="po_no" name = "po_no" class="form-control" placeholder="PO.No">
							
						</div>
						<label class="col-sm-2 control-label">DV.Date / No</label>
						<div class="col-sm-2">
							  <input type="text" id="input_date1"name ="input_date1" class="form-control" placeholder="Date">
							<span class="fa fa-calendar txt-danger form-control-feedback"></span>
						</div>
						<div class="col-sm-2">
							<input type="text" id="dv_no" name = "dv_no"  class="form-control" placeholder="DV.No">
							
						</div>
					</div>
                                       <div class="form-group">
						<label class="col-sm-2 control-label">FR.No</label>
						<div class="col-sm-4">
							<input type="text" id="ob_no" name="ob_no"  class="form-control" placeholder="FR.No">
						</div>
						
						<label class="col-sm-2 control-label">Cost</label>
						<div class="col-sm-2">
							 <div class="input-group">
							  <span class="input-group-addon"><i class="fa fa-money"></i></span>
							  <input type="text" class="form-control" placeholder="Cost"  id="cost" name="cost">
							 
							</div>
						</div>
                                                <div class="col-sm-2">
							  <select id="status"class="form-control" name = "currency">
                                                                   <option value="">-----currency-----</option>
                                                                   <option value="THB">THB</option>
                                                                    <option value="USD">USD</option>
                                                                 
                                                            </select>
							
						</div>
						
					</div>
                                      <div class="form-group">
						<label class="col-sm-2 control-label">Officer  </label>
						<div class="col-sm-4">
							<input type="text" class="form-control" placeholder="Officer" name = "officer" id = "officer">
						</div>
						<label class="col-sm-2 control-label">Unit </label>
						<div class="col-sm-4">
							<input type="text" class="form-control" placeholder="Unit" name = "unit" id = "unit">
							
						</div>
					</div>
                                    <div class="form-group">
						<label class="col-sm-2 control-label">Budget Cost </label>
						<div class="col-sm-4">
							<input type="text" class="form-control" placeholder="Budget Cost" id="budget_code" name ="budget_code">
						</div>
						<label class="col-sm-2 control-label">Bus. Area </label>
						<div class="col-sm-4">
							<input type="text" class="form-control" placeholder="Bus Area"  id="busa" name = "busa">
							
						</div>
					</div>
                                    
                                        <div class="form-group">
                                                    <label class="col-sm-2 control-label">Status</label>
                                                    <div class="col-sm-4">
                                                            <select id="status"class="form-control" name = "status">
                                                                   <option value="">-------ALL-------</option>
                                                                   <option value="a" selected="select">Active</option>
                                                                    <option value="s">Stored</option>
                                                                    <option value="r">Damaged</option>
                                                                    <option value="d">Disposed</option>
                                                            </select>
                                                    </div>
                                                   
                                            </div>
					
					
                                    <div class="slidediv">
                                        <fieldset>
						
						<p class="page-header">Computer detail</p>
                                                
                                         <div class="form-group">
						<label class="col-sm-2 control-label" >CPU Type </label>
						<div class="col-sm-4">
                                                     <select name="cputype"class="form-control">
							
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
                                                </div>                              
						<label class="col-sm-2 control-label" >CPU Speed </label>
						<div class="col-sm-4">
							<input type="text" class="form-control" placeholder="CPU Speed" name="cpuspeed" id="cpuspeed" > 
							
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label">RAM  </label>
						<div class="col-sm-4">
							<input type="text" name ="ram" id ="ram" class="form-control" placeholder="RAM">
						</div>
						<label class="col-sm-2 control-label">Harddisk  </label>
						<div class="col-sm-4">
								<input type="text" name ="hd" id ="ram"  class="form-control" placeholder="Harddisk">
						</div>
					</div>
                                        <div class="form-group">
						<label class="col-sm-2 control-label">RAM  </label>
                                                        <div class="col-sm-6">
                                                            <div class="checkbox-inline">
                                                                    <label>
                                                                            <input type = "checkbox" id = "cd" name = "cd" value ="1" >CD-ROM 
                                                                            <i class="fa fa-square-o"></i>
                                                                    </label>
                                                            </div>
                                                            <div class="checkbox-inline">
                                                                    <label>
                                                                            <input type = "checkbox" id = "dvd" name = "dvd" value ="1" >DVD-ROM
                                                                            <i class="fa fa-square-o"></i>
                                                                    </label>
                                                            </div>
                                                            <div class="checkbox-inline">
                                                                    <label>
                                                                            <input type="checkbox"  id = "modem" name = "modem"  value ="1"  > 	Modem 
                                                                            <i class="fa fa-square-o"></i>
                                                                    </label>
                                                            </div>
                                                            <div class="checkbox-inline">
                                                                    <label>
                                                                            <input type="checkbox"  id = "speaker" name = "speaker" value ="1">  Speaker 
                                                                            <i class="fa fa-square-o"></i>
                                                                    </label>
                                                            </div>
                                                            <div class="checkbox-inline">
                                                                    <label>
                                                                            <input type="checkbox"  id = "mic" name = "mic" value = "1"> 	Microphone
                                                                            <i class="fa fa-square-o"></i>
                                                                    </label>
                                                            </div>
                                                           
                                                        </div>
						
					</div>        
                                           <div class="form-group">
						<label class="col-sm-2 control-label">NIC </label>
						<div class="col-sm-4">
							<input type="text" class="form-control" placeholder="Company" name="nic" id = "nic">
						</div>
						<label class="col-sm-2 control-label">Station ID </label>
						<div class="col-sm-4">
							<input type="text" class="form-control" placeholder="Station"  name="station"  id="station" >
							
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label">VGA   </label>
						<div class="col-sm-4">
							<input type="text" class="form-control" placeholder="VGA" name="vga"  id="vga">
						</div>
						<label class="col-sm-2 control-label">Sound   </label>
						<div class="col-sm-4">
								<input type="text" class="form-control" placeholder="Sound" name="sound"  id="sound">
						</div>
					</div>
                                                <div class="form-group">
						<label class="col-sm-2 control-label">OS   </label>
						<div class="col-sm-4">
							 <select name="os" class="form-control">
                                                                        <option value="Windows 8" selected>Windows 8</option>
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
						</div>
						
						<label class="col-sm-2 control-label">Remark </label>
						<div class="col-sm-4">
						<textarea id="remark1" name="remark1"class="form-control" rows="5"></textarea>
						</div>
					</div>
                                                </fieldset>
				</div>
                                      
                                      <div class="clearfix"></div>
					<div class="form-group">
						<div class="col-sm-offset-2 col-sm-2">
							<button type="cancel" class="btn btn-default btn-label-left" >
							<span><i class="fa fa-clock-o txt-danger"></i></span>
								Cancel
							</button>
						</div>
						
						<div class="col-sm-2">
							<button type="submit" class="btn btn-primary btn-label-left"  id = "btn_update">
							<span><i class="fa fa-clock-o"></i></span>
								Submit
							</button>
						</div>
					</div>        
                                        </form>        
				</div>       
                                                
                                        
                                                
                                                
						
					
                                    </div>
				
			</div>
		</div> 
	</div>
</div>
<style type="text/css">  

body {
   
    font-size: 13px;
  
}input[type="text"]{
    font-size: 13px;
} 
</style> 

<script type="text/javascript">
// Run Select2 plugin on elements
function DemoSelect2(){
	$('#cate').select2();
	
        $('#subcat').select2();
     //    $('#status').select2();
}
// Run timepicker
function DemoTimePicker(){
	$('#datepicker').timepicker({setDate: new Date()});
}
$(document).ready(function() {
	// Create Wysiwig editor for textare
        TinyMCEStart('#wysiwig_simple1', null);
	TinyMCEStart('#wysiwig_simple', null);
	TinyMCEStart('#wysiwig_full', 'extreme');
	// Add slider for change test input length
	FormLayoutExampleInputLength($( ".slider-style" ));
	// Initialize datepicker
	$('#input_date').datepicker({setDate: new Date()});
        $('#input_date1').datepicker({setDate: new Date()});
	// Load Timepicker plugin
	LoadTimePickerScript(DemoTimePicker);
	// Add tooltip to form-controls
	$('.form-control').tooltip();
	LoadSelect2Script(DemoSelect2);
	// Load example of form validation
	LoadBootstrapValidatorScript(DemoFormValidator);
	// Add drag-n-drop feature to boxes
	WinMove();
});





$(document).ready(function(){

	$(".slidediv").hide();
	$('#dis_image').css('display', 'none');
	
	$('#code').change(function(){
		//var code = this.value;
		
		$(".slidediv").hide();
		 var datalist2 = $.ajax({
			type	: "GET",
			cache	: false,
			url		: "/front/ajax/select_query.php",
			data    :  "code="+$(this).val(),
			 async: false 
		}).responseText;          
        $("select#sub_code").html(datalist2);

	
	});
	
	$('#sub_code').change(function(){
		var sub_code = this.value;
		var code = $( "#code" ).val();
                
              //  alert(code);if(($_POST['code'] == "09") && (($_POST['sub_code'] == '11' || ($_POST['sub_code'] == '12')))){
		if(((sub_code == 12) || (sub_code == 11) ) && (code == 09)) {
		
			$(".slidediv").slideToggle();
		}else{
			$(".slidediv").hide();
		}
		
	
	});
        
        $(document).ready(function (e){
		$("#update").on('submit',(function(e){
		e.preventDefault();
			$.ajax({
				url: "/front/ajax/add_item.php",
				type: "POST",
				data:  new FormData(this),
				contentType: false,
				cache: false,
				processData:false,
				success: function(data){
				
				alert(data);
				location.reload();
					//parent.jQuery.fancybox.close()
					
				
				},
				error: function(){} 	        
			});
		}));
	});
	
	
	

});


</script>
</script>
