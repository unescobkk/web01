
<?php include('../config.php');

?>
<div class="row">
	<div id="breadcrumb" class="col-xs-12">
		
		<ol class="breadcrumb pull-left">
			<li><a href="index.html">Forms</a></li>
			<li><a href="#">Category</a></li>
		</ol>
		
	</div>
</div>

<h4 class="page-header">Category</h4>
<div class="row">
	
			<div class="col-xs-12">
				<div class="row">
					<div class="col-xs-12">
						<div class="box">
							<div class="box-content">
						<form id = "add_cat" name = "add_cat" method="post" action="" class="form-horizontal">
				
                                                    <fieldset>
                                                            <legend>Regular expression based validators</legend>
                                                            <div class="form-group">
                                                                    <label class="col-sm-3 control-label">Code</label>
                                                                    <div class="col-sm-5">
                                                                            <input type="text" class="form-control" name="code" id = "code"/>
                                                                    </div>
                                                            </div>
                                                            <div class="form-group">
                                                                    <label class="col-sm-3 control-label">Sub code</label>
                                                                    <div class="col-sm-5">
                                                                            <input type="text" class="form-control" name="sub_code"id="sub_code" />
                                                                    </div>
                                                            </div>
                                                            <div class="form-group">
                                                                    <label class="col-sm-3 control-label">Description </label>
                                                                    <div class="col-sm-5">
                                                                            <input type="text" class="form-control" id="description" name="description"/>
                                                                    </div>
                                                            </div>
                                                            <div class="form-group">
                                                                    <label class="col-sm-3 control-label">Asseet Class  </label>
                                                                    <div class="col-sm-3">
                                                                            <input type="text" class="form-control"id="asset_class"name="asset_class"/>
                                                                    </div>
                                                            </div>
                                                         
                                                    </fieldset>
                                                   
					<div class="form-group">
						<div class="col-sm-9 col-sm-offset-3">
							<button type="submit" class="btn btn-primary"  value="ADD CATEGORY" id = "btn_update">Submit</button>
						</div>
					</div>
				</form>
							</div>
						</div>
					</div>
				</div>
			
			</div>
		
	
</div>
<script type="text/javascript">
// Run Datables plugin and create 3 variants of settings
function AllTables(){
	TestTable1();
	TestTable2();
	TestTable3();
	LoadSelect2Script(MakeSelect2);
}
function MakeSelect2(){
	
	$('.dataTables_filter').each(function(){
		$(this).find('label input[type=text]').attr('placeholder', 'Search');
	});
}
$(document).ready(function() {
	// Load Datatables and run plugin on tables 
	LoadDataTablesScripts(AllTables);
	// Add Drag-n-Drop feature
	WinMove();
});
</script>
<script type="text/javascript">
$(document).ready(function(){
	
	
	
	$('#btn_update').click(function(){

		//$.fancybox.showActivity();

		$.ajax({
			type	: "POST",
			cache	: false,
			url		: "/front/ajax/add_category_db.php",
			data	:  $("#add_cat").serialize(),
			success: function(data) { 
				
				alert("Add new category success");
				
			}
		});

		return false;
	});
	
	
	


});

</script>