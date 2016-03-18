<?php include('../config.php');
function display_cat($code,$sub_code){

	 $sql_cat = "SELECT * FROM inv_code WHERE code = {$code} AND sub_code = {$sub_code}";
	$result_cat = mysql_query($sql_cat);
	$res_cat = mysql_fetch_array($result_cat);
	return $res_cat['description'];
}	
?>

<div class="row">
	<div id="breadcrumb" class="col-xs-12">
		
		<ol class="breadcrumb pull-left">
			<li><a href="index.html">Tables</a></li>
			<li><a href="#">Inventory</a></li>
		</ol>
		
	</div>
</div>
	<div class="row">		<div class="box-content no-padding table-responsive">
				<table id="example" class="display" cellspacing="0" width="100%">
					<thead>
						<tr>
                                                  	<th><label>ID</label></th>
							<th><label>Category</label></th>
							<th><label>Inv. No</label></th>
							<th><label>Brand/Model</label></th>
							<th><label>Unit/Officer</label></th>
                                                        <th><label>Purchase Order</label></th>
                                                        <th><label>Amount Paid</label></th>
						</tr>
					</thead>
					<tbody>
                                                    <?php
                                                    $where = "WHERE 1 = 1";
                                                echo    $query = "SELECT  * FROM inventory {$where} ";
                                                    $result = mysql_query($query);
						$sum = 0;$sum_us = 0;$us_1 = 0;
                                               
						while ( $record = mysql_fetch_array($result) )
						{
							//var_dump($record);
							$seria = "(S/N:".$record["sn"].")";
							$originalDate = $record["po_date"];
							$po_date = date("d M Y", strtotime($originalDate));
							$originalDate1 = $record["dv_date"];
							$dv_date = date("d M Y", strtotime($originalDate1));
							$us_1 += $record["cost_us"];
							$sum += $record["cost"]; $i == 1;
                                                    ?>
                                            <tr >
                                                
                                                <td align = "center"> <?php echo  $record["id"]; ?></td>
							<td > <?php echo "[".$record["code"].$record["sub_code"]."]  ".display_cat($record["code"],$record["sub_code"]); ?></td>
							<td ><a  target="_blank" href="#ajax/edit.php?id=<?=$record["id"]?>&get=<?=$excel?>" id="id_inv"><?=$record["code"].$record["sub_code"].".".$record["inv_no"]; ?></a></td>
							
							<td ><?=$record["brand"]." ".$record["model"]." ".$seria; ?></td>
							<td align = "center"><?=$record["unit"]."<br>".$record["officer"]; ?></td>
						
						
							<td align = "center"><?=$record["po_no"]; echo "<br>"; echo $po_date; ?></td>
					
							<td align = "center"><font color = 'red'><?php echo $record["cost"].$record["currency"]; ?></td>
						</tr>
                                                
                                                <?php  $i++;} ?>
                                                
                                                
                                        </tbody>
						
					<tfoot>
						<tr>
							<th><label>ID</label></th>
							<th><label>Category</label></th>
							<th><label>Inv. No</label></th>
							<th><label>Brand/Model</label></th>
							<th><label>Unit/Officer</label></th>
                                                        <th><label>Purchase Order</label></th>
                                                        <th><label>Amount Paid</label></th>
						</tr>
					</tfoot>
				</table>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript">

	$(document).ready(function() {
		//$( "#example" ).hide();
		// Setup - add a text input to each footer cell
		/*$('#example tfoot th').each( function () {
			var title = $('#example thead th').eq( $(this).index() ).text();
			$(this).html( '<input type="text" placeholder="Filter '+title+'" />' );
		} );

		// DataTable
		var table = $('#example').DataTable();
		
		// Apply the filter
		$("#example tfoot input").on( 'keyup change', function () {
			table
				.column( $(this).parent().index()+':visible' )
				.search( this.value )
				.draw();
		} );*/
		

		 $('#example').dataTable( {
		          "order": [[ 0, "desc" ]]
		 } );
	} );
	

	</script>
<style type="text/css">  
#example { font-size: 0.9em; }
#datatable-2 { font-size: 0.9em; }
body {
   
    font-size: 13px;
  
}
</style> 
