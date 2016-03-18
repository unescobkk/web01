<?php include('config.php');
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
?>
<div class="clearfix"></div>
<h4 class="page-header" style="padding-top: 30px;">Add new inventory</h4>
<div class="row">
	<div class="col-xs-12 col-sm-12">
		<div class="box">
			
			<div class="box-content">
                            <p class="page-header">New inventory</p>
				
				<form class="form-horizontal" role="form">
					<div class="form-group">
						<label class="col-sm-2 control-label">Category</label>
						<div class="col-sm-4">
							<select id="s2_with_tag" multiple="multiple" class="populate placeholder">
								<option>Linux</option>
								<option>Windows</option>
								<option>OpenSolaris</option>
								<option>FirefoxOS</option>
								<option>MeeGo</option>
								<option>Android</option>
								<option>Sailfish OS</option>
								<option>Plan9</option>
								<option>DOS</option>
								<option>AIX</option>
								<option>HP/UP</option>
							</select>
						</div>
						<label class="col-sm-2 control-label">Sub Category</label>
						<div class="col-sm-4">
							<select class="populate placeholder" name="country" id="s2_subcat">
									<option value="">-- Select a country --</option>
									<option value="fr">France</option>
									<option value="de">Germany</option>
									<option value="it">Italy</option>
									<option value="jp">Japan</option>
									<option value="ru">Russia</option>
									<option value="gb">United Kingdom</option>
									<option value="us">United State</option>
								</select>
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label">Brand </label>
						<div class="col-sm-4">
							<input type="text" class="form-control" value = "<?=$record['brand']?>" >
						</div>
						<label class="col-sm-2 control-label">Model </label>
						<div class="col-sm-4">
							<input type="text" class="form-control"  value = "<?=$record['model']?>" >
							
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label">Serial NO </label>
						<div class="col-sm-4">
							<input type="text" class="form-control" value = "<?=$record['sn']?>" >
						</div>
						<label class="col-sm-2 control-label">Dercription </label>
						<div class="col-sm-4">
								<textarea class="form-control" rows="5" ><?=$record['description']?></textarea>
						</div>
					</div>
					<?php echo date("d F Y", strtotime('2016-01-21'));?>
					<div class="form-group has-error has-feedback">
						<label class="col-sm-2 control-label">PO.Date / No</label>
						<div class="col-sm-2">
							<input id="datepicker" type="text" name="datepicker"   value = "<?=date("d F Y", strtotime($record['po_date']))?>" />
                                            <input id="po_date" type="hidden" name="po_date"   value = "<?=$record['po_date']?>" />
							<span class="fa fa-calendar txt-danger form-control-feedback"></span>
						</div>
						<div class="col-sm-2">
							<input type="text" id="input_time" class="form-control" value = "<?=$record['po_no']?>" >
							
						</div>
						<label class="col-sm-2 control-label">DV.Date / No</label>
						<div class="col-sm-2">
							<input id="datepicker1" type="text" name="datepicker1"  value = "<?=date("d F Y", strtotime($record['dv_date']))?>"/>
		<input id="dv_date" type="hidden" name="dv_date"   value = "<?=$record['dv_date']?>" />
							<span class="fa fa-calendar txt-danger form-control-feedback"></span>
						</div>
						<div class="col-sm-2">
							<input type="text" id="input_time" class="form-control" value = "<?=$record['dv_no']?>" >
							
						</div>
					</div>
                                       <div class="form-group">
						<label class="col-sm-2 control-label">FR.No</label>
						<div class="col-sm-2">
							<input type="text" class="form-control" placeholder="Address">
						</div>
						<div class="col-sm-2">
							<input type="text" id="input_time" class="form-control" placeholder="No">
							
						</div>
						<label class="col-sm-2 control-label">Cost</label>
						<div class="col-sm-2">
							 <div class="input-group">
							  <span class="input-group-addon"><i class="fa fa-money"></i></span>
							  <input type="text" class="form-control" placeholder="Money">
							  <span class="input-group-addon"><i class="fa fa-usd"></i></span>
							</div>
						</div>
						
					</div>
                                    <div class="form-group">
						<label class="col-sm-2 control-label">Budget Cost </label>
						<div class="col-sm-4">
							<input type="text" class="form-control" placeholder="Company">
						</div>
						<label class="col-sm-2 control-label">Bus. Area </label>
						<div class="col-sm-4">
							<input type="text" class="form-control" placeholder="Address">
							
						</div>
					</div>
                                    
                                        <div class="form-group">
                                                    <label class="col-sm-2 control-label">Status</label>
                                                    <div class="col-sm-4">
                                                            <select id="status" multiple="multiple" class="populate placeholder">
                                                                    <option>Linux</option>
                                                                    <option>Windows</option>
                                                                    <option>OpenSolaris</option>
                                                                    <option>FirefoxOS</option>
                                                                    <option>MeeGo</option>
                                                                    <option>Android</option>
                                                                    <option>Sailfish OS</option>
                                                                    <option>Plan9</option>
                                                                    <option>DOS</option>
                                                                    <option>AIX</option>
                                                                    <option>HP/UP</option>
                                                            </select>
                                                    </div>
                                                   
                                            </div>
					
					
                                        
                                        <fieldset>
						<legend>Computer detail</legend>
						
                                                
                                         <div class="form-group">
						<label class="col-sm-2 control-label">CPU Type </label>
						<div class="col-sm-4">
							<input type="text" class="form-control" placeholder="Company">
						</div>
						<label class="col-sm-2 control-label">CPU Speed </label>
						<div class="col-sm-4">
							<input type="text" class="form-control" placeholder="Address">
							
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label">RAM  </label>
						<div class="col-sm-4">
							<input type="text" class="form-control" placeholder="Company">
						</div>
						<label class="col-sm-2 control-label">Harddisk  </label>
						<div class="col-sm-4">
								<input type="text" class="form-control" placeholder="Company">
						</div>
					</div>
                                        <div class="form-group">
						<label class="col-sm-2 control-label">RAM  </label>
                                                        <div class="col-sm-6">
                                                            <div class="checkbox-inline">
                                                                    <label>
                                                                            <input type="checkbox" checked> CD-ROM 
                                                                            <i class="fa fa-square-o"></i>
                                                                    </label>
                                                            </div>
                                                            <div class="checkbox-inline">
                                                                    <label>
                                                                            <input type="checkbox"> DVD-ROM
                                                                            <i class="fa fa-square-o"></i>
                                                                    </label>
                                                            </div>
                                                            <div class="checkbox-inline">
                                                                    <label>
                                                                            <input type="checkbox"> 	Modem 
                                                                            <i class="fa fa-square-o"></i>
                                                                    </label>
                                                            </div>
                                                            <div class="checkbox-inline">
                                                                    <label>
                                                                            <input type="checkbox" checked>  Speaker 
                                                                            <i class="fa fa-square-o"></i>
                                                                    </label>
                                                            </div>
                                                            <div class="checkbox-inline">
                                                                    <label>
                                                                            <input type="checkbox"> 	Microphone
                                                                            <i class="fa fa-square-o"></i>
                                                                    </label>
                                                            </div>
                                                           
                                                        </div>
						
					</div>        
                                           <div class="form-group">
						<label class="col-sm-2 control-label">NIG </label>
						<div class="col-sm-4">
							<input type="text" class="form-control" placeholder="Company">
						</div>
						<label class="col-sm-2 control-label">Station ID </label>
						<div class="col-sm-4">
							<input type="text" class="form-control" placeholder="Address">
							
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label">VGA   </label>
						<div class="col-sm-4">
							<input type="text" class="form-control" placeholder="Company">
						</div>
						<label class="col-sm-2 control-label">Sound   </label>
						<div class="col-sm-4">
								<input type="text" class="form-control" placeholder="Company">
						</div>
					</div>
                                                <div class="form-group">
						<label class="col-sm-2 control-label">OS   </label>
						<div class="col-sm-4">
							<input type="text" class="form-control" placeholder="Company">
						</div>
						
						<label class="col-sm-2 control-label">Remark </label>
						<div class="col-sm-4">
								<textarea class="form-control" rows="5" ></textarea>
						</div>
					</div>
				</div>
				</div>       
                                                
                                        <div class="clearfix"></div>
					<div class="form-group">
						<div class="col-sm-offset-2 col-sm-2">
							<button type="cancel" class="btn btn-default btn-label-left">
							<span><i class="fa fa-clock-o txt-danger"></i></span>
								Cancel
							</button>
						</div>
						
						<div class="col-sm-2">
							<button type="submit" class="btn btn-primary btn-label-left">
							<span><i class="fa fa-clock-o"></i></span>
								Submit
							</button>
						</div>
					</div>        
                                                
                                                
                                                
						
					</fieldset>
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
         $('#status').select2();
}
// Run timepicker
function DemoTimePicker(){
	$('#input_time').timepicker({setDate: new Date()});
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
</script>
