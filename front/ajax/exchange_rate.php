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
</div><button id="addRow">Add new row</button>
	<div class="row">		<div class="box-content no-padding table-responsive">
				<table class="table table-bordered table-striped table-hover table-heading table-datatable" id="datatable-1">
					<thead>
						<tr>
							<th><label><input type="text" name="search_rate" value="Search rate" class="search_init" /></label></th>
							<th><label><input type="text" name="search_name" value="Search distro" class="search_init" /></label></th>
							<th><label><input type="text" name="search_votes" value="Search votes" class="search_init" /></label></th>
							<th><label><input type="text" name="search_homepage" value="Search homepage" class="search_init" /></label></th>
							<th><label><input type="text" name="search_version" value="Search versions" class="search_init" /></label></th>
                                                        	
						</tr>
					</thead>
					<tbody>
                                                    <?php
                                                  $sql= "SELECT  * FROM exrate  ORDER BY year desc";
					
						$result=mysql_query($sql);
						$i = 1;
						while ( $record = mysql_fetch_array($result) )
						{ 
							
                                                    ?>
                                           <tr >
							<td align = "left"><?php echo"Exchage rate ";?></td>
							<td align = "left"><?=$record['month'];?></td>
							<td align = "left"><?=$record['year'];?></td>
							<td align = "left"><?=$record['rate'];?></td>
							<td align="center" ><a class="iframe_maps" href="del_exchagerate.php?id=<?=$record["id"]?>"  onclick="return confirm('Are your sure to delete?');"><img src = "../../media/images/del1.png" border = "0"></a></td>
							
						</tr>
                                                
                                                <?php } ?>
                                                
                                                
                                        </tbody>
						
					<tfoot>
						<tr>
							<th>Rate</th>
							<th>Distro</th>
							<th>Votes</th>
							<th>Homepage</th>
							<th>Version</th>
                                                       
						</tr>
					</tfoot>
				</table>
			</div>
		</div>
	</div>
</div>

<style type="text/css">  

#datatable-1 { font-size: 0.9em; }
</style> 

<script type="text/javascript">
	$(document).ready(function() {
    var td = $('#datatable-1').DataTable();
    var counter = <?=$num ;?>
 
    $('#addRow').on( 'click', function () {
        td.row.add( [
            counter+'Row',
            '<td align = "center" ><select name="month[]" id = "month[]"><option value="">-------ALL-------</option><option value="January">January</option><option value="February">February</option><option value="March">March</option><option value="Apirl">Apirl</option><option value="May">May</option><option value="June">June</option><option value="July">July</option><option value="August">August</option><option value="September">September</option><option value="October">October</option><option value="November">November</option><option value="December">December</option></select></td>',
           '<td  align = "center">   <input id="year[]" type="text" name="year[]" value = ""  /></td>',
            '<td  align = "center"> <input id="rate[]" type="text" name="rate[]" value = ""  /></td>',
			 '<td  align = "center"> </td>'
		
           
        ] ).draw();
 
        counter++;
    } );
 
    // Automatically add a first row of data
    $('#addRow').click();
} );
	</script>
