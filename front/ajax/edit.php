<?php include('../config.php');
 $id = $_GET['id'];

  $query = "SELECT  * , inventory.remark as mark1 , computer.remark as mark2 FROM inventory LEFT JOIN computer ON inventory.id = computer.id WHERE inventory.id = '{$_GET['id']}'";
  $result = mysql_query($query);
$record = mysql_fetch_array($result);
function display_cat($code,$sub_code){

	 $sql_cat = "SELECT * FROM inv_code WHERE code = {$code} AND sub_code = {$sub_code}";
	$result_cat = mysql_query($sql_cat);
	$res_cat = mysql_fetch_array($result_cat);
	return $res_cat['description'];
}

 $query_pic = "SELECT  * FROM picture WHERE (brand = '{$record['brand']}' AND model = '{$record['model']}') || FormID = $id";
	$result_pic = mysql_query($query_pic);
	$rs = mysql_fetch_array($result_pic);
        
?>
<div class="clearfix"></div>
<h4 class="page-header" style="padding-top: 30px;">EDIT INVENTORY</h4>
<div class="row">
	<div class="col-xs-12 col-sm-12">
		<div class="box">
			
			<div class="box-content">
                          
				<form action="update_db.php" method="post" class="form-horizontal" role="form" id = "update_form" name = "update_form" enctype="multipart/form-data" >
				
					 <div class="form-group">
						<label class="col-sm-2 control-label">Image</label>
						<div class="col-sm-4">
                                                    
                                                    
                                                    <img src = "../source/resources/image/<?=$rs['picurl']?>" height = "20%" width = "50%">
                                                   
						</div>
						
						
					</div>
                                     <div class="form-group">
						<label class="col-sm-2 control-label">Upload new image</label>
						<div class="col-sm-4">
                                                    
                                               <input name="userImage" id = "userImage" type="file" class="inputFile" />
                                                   
						</div>
						
						
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label">Brand </label>
						<div class="col-sm-4">
							<input type="text" class="form-control" value = "<?=$record['brand']?>"  name = "brand" id = "brand">
						</div>
						<label class="col-sm-2 control-label">Model </label>
						<div class="col-sm-4">
							<input type="text" class="form-control"  value = "<?=$record['model']?>" name = "model" id = "model" >
							
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label">Inv. NO </label>
						<div class="col-sm-4">
                                                    <input type="text" class="form-control" value = "<?=$record['code'].$record['sub_code'].".".$record['inv_no']?>"  readonly="readonly">
                                                        
                                                          <input id ="id" type= "hidden" name="id" value = "<?=$id?>"  />
                                                            <input id ="inv_no" type= "hidden" name="inv_no" value = "<?=$record['inv_no']?>"  />
                                                            <input id ="code" type= "hidden" name="code" value = "<?=$record['code']?>"  />
                                                            <input id ="sub_code" type= "hidden" name="sub_code" value = "<?=$record['sub_code']?>"  />
						</div>
						<label class="col-sm-2 control-label">Dercription </label>
						<div class="col-sm-4">
								<textarea class="form-control" rows="5" id="description" name="description"><?=$record['description']?></textarea>
						</div>
					</div>
					
					<div class="form-group has-error has-feedback">
						<label class="col-sm-2 control-label">PO.Date / No</label>
						<div class="col-sm-2">
                                                        <input id="input_date" type="text" name="input_date" id ="input_date"  value = "<?=date("d F Y", strtotime($record['po_date']))?>" />
                                                        <input id="po_date" type="hidden" name="po_date"   value = "<?=$record['po_date']?>" />
							<span class="fa fa-calendar txt-danger form-control-feedback"></span>
						</div>
						<div class="col-sm-2">
							<input type="text" id="po_no" name = "po_no" class="form-control" value = "<?=$record['po_no']?>" >
							
						</div>
						<label class="col-sm-2 control-label">DV.Date / No</label>
						<div class="col-sm-2">
							 <input id="input_date1" type="text" name="input_date1"   value = "<?=date("d F Y", strtotime($record['dv_date']))?>" />
                                                        <input id="dv_date" type="hidden" name="dv_date" id ="dv_date"  value = "<?=$record['dv_date']?>" />
							<span class="fa fa-calendar txt-danger form-control-feedback"></span>
						</div>
						<div class="col-sm-2">
							<input type="text" id="dv_no" name = "dv_no" class="form-control" value = "<?=$record['dv_no']?>" >
							
						</div>
					</div>
                                       <div class="form-group">
						<label class="col-sm-2 control-label">FR.No</label>
						<div class="col-sm-4">
							  <input id="ob_no" type="text" name="ob_no"  value = "<?=$record['ob_no']?>" />
						</div>
						
						<label class="col-sm-2 control-label">Cost</label>
						<div class="col-sm-2">
							 <div class="input-group">
							  <span class="input-group-addon"><i class="fa fa-money"></i></span>
							 	<input id="cost" type="text" name="cost" id ="cost"  value = "<?=$record['cost']?>"/>
							
							</div>
						</div>
                                                 <div class="col-sm-2">
							  <select id="status"class="form-control" name = "currency">
                                                                   <option value="">-----currency-----</option>
                                                                   <option value="THB"  <?php if($record['currency'] == "THB") echo ' selected="selected"';?>>THB</option>
                                                                     <option value="USD"  <?php if($record['currency'] == "USD") echo ' selected="selected"';?>>USD</option>
                                                                
                                                            </select>
							
						</div>
						
					</div>
                                    <div class="form-group">
						<label class="col-sm-2 control-label">Officer  </label>
						<div class="col-sm-4">
							<input type="text" class="form-control" value = "<?=$record['officer']?>" name = "officer" id = "officer">
						</div>
						<label class="col-sm-2 control-label">Unit </label>
						<div class="col-sm-4">
							<input type="text" class="form-control"  value = "<?=$record['unit']?>"  name = "unit" id = "unit">
							
						</div>
					</div>
                                    <div class="form-group">
						<label class="col-sm-2 control-label">Budget Cost </label>
						<div class="col-sm-4">
							  <input id="budget_code" type="text" name="budget_code" value = "<?=$record['budget_code']?>" />
						</div>
						<label class="col-sm-2 control-label">Bus. Area </label>
						<div class="col-sm-4">
							<input id="busa" type="text" name="busa" placeholder="0"  value = "<?=$record['busa']?>"/>
							
						</div>
					</div>
                                    
                                        <div class="form-group">
                                                    <label class="col-sm-2 control-label">Status</label>
                                                    <div class="col-sm-4">
                                                          <select class="form-control" id ="status" name = "status">
                                                                    <option value="" <?php if($record['status'] == "")  echo ' selected="selected"';?>>-------ALL-------</option>
							<option value="a" <?php if($record['status'] == "a") echo ' selected="selected"';?>>Active</option>
							<option value="s" <?php if($record['status'] == "s") echo ' selected="selected"';?>>Stored</option>
							<option value="r" <?php if($record['status'] == "r") echo ' selected="selected"';?>>Damaged</option>
							<option value="d" <?php if($record['status'] == "d") echo ' selected="selected"';?> >Disposed</option>
                                                            </select>
                                                    </div>
                                                   
                                            </div>
					
					<div class="slidediv">
                                        
                                        <fieldset>
						<legend>Computer detail</legend>
						
                                                
                                         <div class="form-group">
						<label class="col-sm-2 control-label">CPU Type </label>
						<div class="col-sm-4">
							 <select name="cputype" class="form-control">
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
						</div>
						<label class="col-sm-2 control-label">CPU Speed </label>
						<div class="col-sm-4">
							<input type="text" class="form-control"  value = "<?=$record['cpuspeed']?>" >
							
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label">RAM  </label>
						<div class="col-sm-4">
							<input type="text" class="form-control"  name ="ram" id ="ram" value = "<?=$record['ram']?>">
						</div>
						<label class="col-sm-2 control-label">Harddisk  </label>
						<div class="col-sm-4">
								<input type="text" class="form-control"   name ="hd" id ="hd" value = "<?=$record['hd']?>">
						</div>
					</div>
                                        <div class="form-group">
						<label class="col-sm-2 control-label">Accessories  </label>
                                                        <div class="col-sm-6">
                                                            <div class="checkbox-inline">
                                                                    <label>
                                                                             <input type = "checkbox" id = "cd" name = "cd" value ="1" <?php if($record['cd'] == 1){ echo('checked="checked"'); } ?>>CD-ROM  
                                                                          
                                                                            <i class="fa fa-square-o"></i>
                                                                    </label>
                                                            </div>
                                                            <div class="checkbox-inline">
                                                                    <label>
                                                                            <input type = "checkbox" id = "dvd" name = "dvd" value = "1" <?php if($record['dvd'] == 1){ echo('checked="checked"'); } ?>> DVD-ROM
                                                                            <i class="fa fa-square-o"></i>
                                                                    </label>
                                                            </div>
                                                            <div class="checkbox-inline">
                                                                    <label>
                                                                            <input type = "checkbox" id = "modem" name = "modem" value = "1" <?php if($record['modem'] == 1){ echo('checked="checked"'); } ?>>	Modem 
                                                                            <i class="fa fa-square-o"></i>
                                                                    </label>
                                                            </div>
                                                            <div class="checkbox-inline">
                                                                    <label>
                                                                             <input type = "checkbox" id = "speaker" name = "speaker" value = "1" <?php if($record['speaker'] == 1){ echo('checked="checked"'); } ?>>Speaker 
                                                                            <i class="fa fa-square-o"></i>
                                                                    </label>
                                                            </div>
                                                            <div class="checkbox-inline">
                                                                    <label>
                                                                           <input type = "checkbox" id = "mic" name = "mic" value = "1" <?php if($record['mic'] == 1){ echo('checked="checked"'); } ?>>	Microphone
                                                                            <i class="fa fa-square-o"></i>
                                                                    </label>
                                                            </div>
                                                           
                                                        </div>
						
					</div>        
                                           <div class="form-group">
						<label class="col-sm-2 control-label">NIG </label>
						<div class="col-sm-4">
							<input type="text" class="form-control" value = "<?=$record['nic']?>" name="nic" id = "nic">
						</div>
						<label class="col-sm-2 control-label">Station ID </label>
						<div class="col-sm-4">
							<input type="text" class="form-control" value = "<?=$record['station']?>" name="station" id = "station" >
							
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label">VGA   </label>
						<div class="col-sm-4">
							<input type="text" class="form-control" value = "<?=$record['vga']?>" name="vga" id = "vga" />
						</div>
						<label class="col-sm-2 control-label">Sound   </label>
						<div class="col-sm-4">
								<input type="text" class="form-control" value = "<?=$record['sound']?>" name="sound"   id="sound"  >
						</div>
					</div>
                                        <div class="form-group">
						<label class="col-sm-2 control-label">OS   </label>
						<div class="col-sm-4">
							 <select name="os" class="form-control">
                                                                <option value=""<?php  if($record['os'] == "") echo ' selected="selected"'; ?>>Selectd</option>
                                                                 <option value="Windows 8"<?php  if($record['os'] == "Windows 8") echo ' selected="selected"'; ?>>Windows 8</option>
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
						</div>
						
						<label class="col-sm-2 control-label">Remark </label>
						<div class="col-sm-4">
								<textarea class="form-control" rows="5"  id="remark1" name="remark1"><?=$record['mark2']?></textarea>
						</div>
					</div>
                                        </fieldset>
                                        </div>
                                    
                                     <div class="clearfix"></div>
					<div class="form-group">
						<div class="col-sm-offset-2 col-sm-2">
							<button type="cancel" class="btn btn-danger" id = "btn_delelte">
							<span><i class="fa fa-clock-o txt-danger"></i></span>
								Deleted
							</button>
						</div>
						
						<div class="col-sm-2">
							<button type="submit" class="btn btn-primary btn-label-left" id = "btn_update">
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
	

<script type="text/javascript">
// Run Select2 plugin on elements
function DemoSelect2(){
	$('#s2_with_tag').select2({placeholder: "Select OS"});
	$('#s2_country').select2();
        $('#s2_subcat').select2();
        
}
// Run timepicker
function DemoTimePicker(){
	$('#datepicker1').timepicker({setDate: new Date()});
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
        
       
       var code =   <?php echo $record['code']; ?>;
        var sub_code =   <?php echo $record['sub_code']; ?>;
   //  alert(code);
		if(((sub_code == 12) || (sub_code == 11) || (sub_code == 10)) && (code == 09)) {
		
			$(".slidediv").show();
		}else{
			$(".slidediv").hide();
		}
		
       
});

$(document).ready(function() {
		
    
        
        $('#btn_delelte').click(function(){

		//$.fancybox.showActivity();

		$.ajax({
			type	: "POST",
			cache	: false,
			url		: "/front/ajax/delete.php",
			data	:  $("#update_form").serialize(),
			success: function(data) {
				
			//   parent.jQuery.fancybox.close();
				alert("Delete Success");
                                window.location.href = '/front/ajax/list_data.php';
				//window.location.reload();
				
			}
		});

		return false;
	});

	
        $("form[name='update_form']").submit(function(e) {
        var formData = new FormData($(this)[0]);

        $.ajax({
           url		: "/front/ajax/update_db.php",
            type: "POST",
            data: formData,
            async: false,
            success: function (msg) {
                alert(msg);
                location.reload();
            },
            cache: false,
            contentType: false,
            processData: false
        });

        e.preventDefault();
    });

		
		
	});
</script>
<style type="text/css">  

body {
   
    font-size: 12px;
  
}input[type="text"]{
    font-size: 12px;
} 
.form-control select {
font-size: 12px;
}
</style> 
