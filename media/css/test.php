<?php
require_once("config.php");

	
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="shortcut icon" type="image/ico" href="http://www.datatables.net/favicon.ico">
	<meta name="viewport" content="initial-scale=1.0, maximum-scale=2.0">

	<title>DataTables example - Individual column filtering (text inputs)</title>
	<link rel="stylesheet" type="text/css" href="../../media/css/jquery.dataTables.css">
	<link rel="stylesheet" type="text/css" href="../../media/css/form.css">
	<link rel="stylesheet" type="text/css" href="../resources/syntax/shCore.css">
	<link rel="stylesheet" type="text/css" href="../resources/demo.css">

	<script type="text/javascript" language="javascript" src="../../media/js/jquery.js"></script>
	<script type="text/javascript" language="javascript" src="../../media/js/jquery.dataTables.js"></script>
	<script type="text/javascript" language="javascript" src="../resources/syntax/shCore.js"></script>
	<script type="text/javascript" language="javascript" src="../resources/demo.js"></script>
	<script type="text/javascript" language="javascript" class="init"></script>
	
	<!---------------------------------- Fancy Box------------------------------------->
	<!-- Add jQuery library -->
	


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
	
	
	<script type="text/javascript">
	$('.fancybox').fancybox();
	$(document).ready(function() {
		//$( "#example" ).hide();
		// Setup - add a text input to each footer cell
		$('#example tfoot th').each( function () {
			var title = $('#example thead th').eq( $(this).index() ).text();
			$(this).html( '<input type="text" placeholder="Search '+title+'" />' );
		} );

		// DataTable
		var table = $('#example').DataTable();
		
		// Apply the filter
		$("#example tfoot input").on( 'keyup change', function () {
			table
				.column( $(this).parent().index()+':visible' )
				.search( this.value )
				.draw();
		} );
	} );
	</script>
	<script type="text/javascript">
	$(document).ready(function() {
		$('#btn_search').click(function() {
			  $.fancybox.close(); 
			  $('#search').submit();
			//  alert('xxxx');
			/*   $.ajax({
                url: 'test.php',
                type: 'POST',
                data: $('#search').serialize(),
               success : function(data)//ถ้าส่งค่าสำเร็จ
					{
						alert('send data OK');//ให้แสดงกล่อง alert
						alert(data);
						$('#example').show();
						$('#example').html(data);//แสดงข้อมูล output ที่ Return มาใน div showdata
					}                  
            });*/
		});
	});
	</script>
	
	<script type="text/javascript">
		
	/*	$(document).ready(function() {
			
			
			$("#fancybox-manual-b").click(function() {
				$.fancybox.open({
					href : 'update_form.php',
					type : 'iframe',
					width			: 900,
					height			: 500,
				

					iframe: {
					scrolling : 'no',
					preload   : true
					}
				});
			});
			


		});*/
		$(document).ready(function() {
		//	var myVar ="something";
	 
			$("#id_inv").click(function(e){
			  e.preventDefault();
			  var myVar = $(this).attr('href');
			  var Href = 'update_from.php?id=' + myVar;
			  alert(Href)
			  $.fancybox.open({
				href: Href,
				type: 'iframe'
			  });
			});
			
			
		});
		
		$(document).ready(function() {
			var tds = "";
			var table = $('#example').DataTable();
		 
			$('#example tbody').on( 'click', 'tr', function () {
				
				if ( $(this).hasClass('selected') ) {
					$(this).removeClass('selected');
				}
				else {
					var values = '';
					table.$('tr.selected').removeClass('selected');
					 tds = $(this).addClass('selected').find('td').attr('id');
					
					/* $.each(tds, function(index, item) {
						alert(item.innerHTML);
						values = values + 'td' + (index + 1) + ':' + item.innerHTML + '<br/>';
						alert(values);
					});*/
						
				}
			
				
			} );
			function myHandler( event ) {
				alert( event.data.foo );
			}
			
			$( "#button" ).on( "click", { foo: tds }, myHandler );
			
			/*$('#button').click( function () {
				if (tds != null && tds !== undefined && tds != "") {
					alert(tds);
					var url = "delete.php"; // success.php
					var dataSet = { id: tds };
					$.post(url,dataSet,function(data){  
						alert("Delete Success");  
						var tds = "";
					 }); 
					
					table.row('.selected').remove().draw( false );
				}
				else{
					alert("Choose one row for delete");
					
				}
			} );*/
		} );

	</script>
	
</head>


<body class="dt-example">
	<div class="container">
		<section>
			<h1>Inventory Report </h1>
			<p>
		
			<li><a class="fancybox" href="#inline1" title="Lorem ipsum dolor sit amet">Inline</a></li>
			<input type = "button" name = "test" id = "test" value = "click">
			<button id="button">Delete selected row</button>
			<div id="inline1" style="width:900px;display: none;">
				
				<form action="" method="post" class="basic-grey" id = "search">
					<h1>Inventory Form  </h1>
					<label>
						<span width = "10px;">Year :</span>
						<?php
						$sql= "SELECT DISTINCT YEAR(po_date) AS yr FROM inventory ORDER BY yr DESC";
						$result=mssql_query($sql);
						?>
						<select name="year">
						<option value="">-------ALL-------</option>
						<?
							while ($array = mssql_fetch_array($result)) {
						?>
							<option value="<?=$array['yr'];?>"><?=$array['yr'];?></option>
						<? } ?>
						</select>
					   
					 </label>	
					 <label>
					<span>Status :</span>
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
						<span>Unit :</span>
						<?php
						$sql= "SELECT DISTINCT unit FROM inventory WHERE (unit IS NOT NULL) ORDER BY unit ASC";
						$result=mssql_query($sql);
						?>
						<select name="unit">
						<option value="">-------ALL-------</option>
						<?
							while ($array = mssql_fetch_array($result)) {
						?>
							<option value="<?=$array['unit'];?>"><?=$array['unit'];?></option>
						<? } ?>
						</select>
					   
					</label>
					
					<label>
						<span>Officer :</span>
						<?php
						$sql= "SELECT DISTINCT officer FROM inventory  WHERE (officer IS NOT NULL) ORDER BY officer ASC";
						$result=mssql_query($sql);
						?>
						<select name="unit">
						<option value="">-------ALL-------</option>
						<?
							while ($array = mssql_fetch_array($result)) {
						?>
							<option value="<?=$array['officer'];?>"><?=$array['officer'];?></option>
						<? } ?>
						</select>
					</label> 
					<p>
					 <label>
						<span>Category :</span>
						 <?php
						$sql= "SELECT * FROM inv_code ORDER BY code,sub_code ASC";
						$result=mssql_query($sql);
						?>
						<select name="category">
						<option value="">-------ALL-------</option>
						<?
							while ($array = mssql_fetch_array($result)) {
						?>
							<option value="<?=$array['code'].$array['sub_code'];?>"><?=$array['code'].$array['sub_code']."-".$array['description'];?></option>
						<? } ?>
						</select>
					</label> 
					<label>
						<span>Cost($): >=</span>
						<input id="cost" type="text" name="cost" placeholder="0" />
					</label>  	
					<p>
					 <label>
						<span>&nbsp;</span> 
						<input type="button" class="button" value="Search" id = "btn_search" /> 
					</label>    
				</form>
			</div>
			<table id="example" class="display" cellspacing="0" width="100%">
				<thead>
					<tr>
						<th></th>
						<th>Inv. No</th>
						<th>Brand/Model</th>
						<th>Unit/Officer</th>
						<th>Budget/Bus. Area</th>
						<th>Purchase Order</th>
						<th>Voucher</th>
						<th>Amount Paid</th>
						
				</thead>

				<tfoot>
					<tr>
						<th></th>
						<th>Inv. No</th>
						<th>Brand/Model</th>
						<th>Unit/Officer</th>
						<th>Budget/Bus. Area</th>
						<th>Purchase Order</th>
						<th>Voucher</th>
						<th>Amount Paid</th>
					
					</tr>
				</tfoot>
				
				<tbody>
				
				<?php
					$where = "WHERE 1 = 1";
					if($_POST){
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
						if($_POST['cost'])
						{
							$where .= " AND cost LIKE '%{$_POST['cost']}%'";
						}
						
							$query = "SELECT  * FROM inventory {$where}";
					
						$result = mssql_query($query);
						while ( $record = mssql_fetch_array($result) )
						{
							//var_dump($record);
							$seria = "(S/N:".$record["sn"].")";
							$originalDate = $record["po_date"];
							$po_date = date("d M Y", strtotime($originalDate));
							$originalDate1 = $record["dv_date"];
							$dv_date = date("d M Y", strtotime($originalDate1));
							
					?>
						<tr >
							<td id = "<?=$record["id"]?>" width = "5%"><input type = "checkbox" value = "<?=$record["id"]?>"></td>
							<td><a class="iframe_maps button-link" href="<?=$record["id"]?>" id="id_inv"><?=$record["code"].$record["sub_code"].".".$record["inv_no"]; ?></a></td>
							<td><?=$record["brand"]." ".$record["model"]." ".$seria; ?></td>
							<td><?=$record["unit"]." ".$record["officer"]; ?></td>
							<td><?=$record["budget_code"].$record["busa"].".".$record["ob_no"]; ?></td>
						
							<td><?=$record["po_no"]; echo "<br>"; echo $po_date; ?></td>
							<td><?=$dv_date; ?></td>
							<td><?=$record["unit"]." ".$record["officer"]; ?></td>
						</tr>
						
						<?php
						}
					}	
					?>
				</tbody>
			</table>


		
		</section>
	</div>

	<section>
		<div class="footer">
			<div class="gradient"></div>

			<div class="liner">
				<h2>Other examples</h2>

				<div class="toc">
					<div class="toc-group">
						<h3><a href="../basic_init/index.html">Basic initialisation</a></h3>
						
							<a href="../basic_init/zero_configuration.html">Zero configuration</a><p>
							<a href="../basic_init/filter_only.html">Feature enable / disable</a>
					
					</div>


				

					
					
				</div>

				<div class="epilogue">
					<p>Please refer to the <a href="http://www.datatables.net">DataTables documentation</a> for full
					information about its API properties and methods.<br>
					Additionally, there are a wide range of <a href="http://www.datatables.net/extras">extras</a> and
					<a href="http://www.datatables.net/plug-ins">plug-ins</a> which extend the capabilities of
					DataTables.</p>

					<p class="copyright">DataTables designed and created by <a href=
					"http://www.sprymedia.co.uk">SpryMedia Ltd</a> &#169; 2007-2014<br>
					DataTables is licensed under the <a href="http://www.datatables.net/mit">MIT license</a>.</p>
				</div>
			</div>
		</div>
	</section>
</body>
</html>