
<?php require_once("css.php"); ?>

 <?php require_once("../config.php"); ?>
 
 <?php  $val = $_GET['val'];
 		 $sub_code = $_GET['sub_code'];
 ?>

<!-- jQuery Version 1.11.0 -->
	<script src="js/jquery-1.11.0.js"></script>

	<!-- Bootstrap Core JavaScript -->
	<script src="js/bootstrap.min.js"></script>

	<!-- Metis Menu Plugin JavaScript -->
	<script src="js/plugins/metisMenu/metisMenu.min.js"></script>

	<!-- DataTables JavaScript -->
	<script src="js/plugins/dataTables/jquery.dataTables.js"></script>
	<script src="js/plugins/dataTables/dataTables.bootstrap.js"></script>

	<!-- Custom Theme JavaScript -->
	<script src="js/sb-admin-2.js"></script>

	<!-- Page-Level Demo Scripts - Tables - Use for reference -->
	
	<script type="text/javascript" src="fancybox/source/jquery.fancybox.js?v=2.1.5"></script>
	
	<!-- Add Button helper (this is optional) -->
	
	<script type="text/javascript" src="fancybox/source/helpers/jquery.fancybox-buttons.js?v=1.0.5"></script>

	<!-- Add Thumbnail helper (this is optional) -->
	
	<script type="text/javascript" src="fancybox/source/helpers/jquery.fancybox-thumbs.js?v=1.0.7"></script>



<script type="text/javascript">


$(document).ready(function(){

	$('#btn_update').click(function(){
			alert('xxx');
	

	});
});


</script>
<body>

	<div id="wrapper">
		
			<div class="row">
				<div class="col-lg-12">
					<h1 class="page-header">Formsxxxx</h1>
				</div>
				<!-- /.col-lg-12 -->
			</div>
			<!-- /.row -->
			<div class="row">
				<div class="col-lg-12">
					<div class="panel panel-default">
						<form action = "" method = "post">
						
						<div class="panel-body">
							<div class="row">
								<div class="col-lg-6">
									<form name ="form-typology" id = "form-typology" method = "post">
										<div class="form-group">
											<label>Edit Typology</label>
											 <?php  $sql= "SELECT  TYPOLOGY_NAME , SUB_TYPOLOGY_NAME FROM TYPE_TYPOLOGY WHERE TYPOLOGY_CODE =  '{$_GET['val']}' AND SUB_TYPOLOGY_CODE =  '{$_GET['sub_code']}' ";
	
											$result  = mysql_query($sql);
											$rs=mysql_fetch_array($result);
											 ?>
											 <input type = "text" class="form-control"  id = "code" name = "code" value = "<?php echo $rs['TYPOLOGY_NAME'];?>">
										</div>
										
										<div class="form-group">
											<label>Edit Sub Typology</label> 
											 <input type = "text" class="form-control"  id = "code" name = "code" value = "<?php echo $rs['SUB_TYPOLOGY_NAME'];?>">
										</div>
										
										
										<button type="submit" name = "btn_update" id = "btn_update" class="btn btn-default">Submit Button</button>
										
									</form>
								</div>
							
								
							</div>
							<!-- /.row (nested) -->
							</form>
						</div>
						<!-- /.panel-body -->
					</div>
					<!-- /.panel -->
				</div>
				<!-- /.col-lg-12 -->
			</div>
			<!-- /.row -->
		
		<!-- /#page-wrapper -->
	</div>
</body>