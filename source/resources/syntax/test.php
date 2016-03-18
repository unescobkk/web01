<?php
$objConnect = mssql_connect("172.24.67.14","sa","")
	  or die('Could not connect to the server!');
	mssql_select_db('promis') 
		or die('Could not select a database');
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="shortcut icon" type="image/ico" href="http://www.datatables.net/favicon.ico">
	<meta name="viewport" content="initial-scale=1.0, maximum-scale=2.0">

	<title>DataTables example - Individual column filtering (text inputs)</title>
	<link rel="stylesheet" type="text/css" href="../../media/css/jquery.dataTables.css">
	<link rel="stylesheet" type="text/css" href="../resources/syntax/shCore.css">
	<link rel="stylesheet" type="text/css" href="../resources/demo.css">
	<style type="text/css" class="init">

	</style>
	<script type="text/javascript" language="javascript" src="../../media/js/jquery.js"></script>
	<script type="text/javascript" language="javascript" src="../../media/js/jquery.dataTables.js"></script>
	<script type="text/javascript" language="javascript" src="../resources/syntax/shCore.js"></script>
	<script type="text/javascript" language="javascript" src="../resources/demo.js"></script>
	<script type="text/javascript" language="javascript" class="init">


$(document).ready(function() {
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
</head>

<body class="dt-example">
	<div class="container">
		<section>
			<h1>Inventory Report <span>Individual column filtering (text inputs)</span></h1>
			

			<table id="example" class="display" cellspacing="0" width="100%">
				<thead>
					<tr>
						<th>Inv. No</th>
						<th>Brand/Model</th>
						<th>Unit/Officer</th>
						<th>Budget/Bus. Area</th>
						<th>Purchase Order</th>
						<th>Voucher</th>
						
				</thead>

				<tfoot>
					<tr>
						<th>Inv. No</th>
						<th>Brand/Model</th>
						<th>Unit/Officer</th>
						<th>Budget/Bus. Area</th>
						<th>Purchase Order</th>
						<th>Voucher</th>
					
					</tr>
				</tfoot>
				
				
				<?php
					$query = "SELECT TOP 10 * FROM inventory";
					$result = mssql_query($query);
					while ( $record = mssql_fetch_array($result) )
					{
						var_dump($record);
				?><tbody>
					<tr>
						<td><?=$record["code"].$record["sub_code"].".".$record["inv_no"]; ?></td>
						<td><?=$record["brand"].$record["model"]; ?></td>
						<td><?php echo $record["code"]; ?></td>
						<td><?php echo $record["code"]; ?></td>
						<td><?php echo $record["code"]; ?></td>
						<td><?php echo $record["code"]; ?></td>
					</tr>
					</tbody>
					<?php
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