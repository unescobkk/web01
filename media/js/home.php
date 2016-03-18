<?php
require_once("config.php");
if($_SESSION["user"] == ""){
echo '<script type="text/javascript">
		
         window.location.replace("index.html");
      </script>';
}

$where = "1";
					if($_POST){
						if($_POST['status']){
							
							$where .= "&status={$_POST['status']}";
						
						}
						if($_POST['year'])
						{
							$where .= "&po_date={$_POST['year']}";
						}
						if($_POST['unit'])
						{
							$where .= "&unit={$_POST['unit']}";
							
						}
						if($_POST['officer'])
						{
							$where .= "&officer={$_POST['officer']}";
						}
						if($_POST['category'])
						{
							 $code = substr("{$_POST['category']}", 0,2);
							 $sub_code = substr("{$_POST['category']}", 2);
							$where .= "&code={$code}&sub_code={$sub_code}";
							
						}
						if($_POST['cost'])
						{
							$where .= "&cost={$_POST['cost']}";
						}
						
							$excel = "{$where}";
				}
						
					
function display_cat($code,$sub_code){

	 $sql_cat = "SELECT * FROM inv_code WHERE code = {$code} AND sub_code = {$sub_code}";
	$result_cat = mssql_query($sql_cat);
	$res_cat = mssql_fetch_array($result_cat);
	return $res_cat['description'];
}				
	
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="shortcut icon" type="image/ico" href="../../media/images/favicon.ico">
	<meta name="viewport" content="initial-scale=1.0, maximum-scale=2.0">

	<title>INVERNTORY</title>
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
	<script type="text/javascript" language="javascript" src="../resources/jquery.blockUI.js"></script>
	
	
	<style>
    .dotted {border: 1px dotted #ff0000; border-style: none none dotted; color: #fff; background-color: #fff; }
	</style>
	<script type="text/javascript">
	$('.fancybox').fancybox();
	$(document).ready(function() {
		//$( "#example" ).hide();
		// Setup - add a text input to each footer cell
		$('#example tfoot th').each( function () {
			var title = $('#example thead th').eq( $(this).index() ).text();
			$(this).html( '<input type="text" placeholder="Fillter '+title+'" />' );
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
			
		});
	});
	</script>
	
	<script type="text/javascript">
	  function load(){
		
			location.reload();
		
	}
		$(document).ready(function() {
		
			  
			  $("a.iframe_maps").fancybox({
					'width'     : '50%',
					'height'    : '85%',
					'autoScale'    : false,
					'titleShow' : false,
					'transitionIn'  : 'no',
					'transitionOut' : 'no',
					'scrolling'     : 'no',
					'type'          : 'iframe',
					afterClose   : function() {
					/*	 $.blockUI();
						window.location.reload();
						$.unblockUI(); */
					}
				
	   
			});
			
			
		});
		
		$(document).ready(function() {
		//	var myVar ="something";
	 
			$(".add_item").click(function(){
			
			  var Href = 'add_form.php';
			//  alert(Href)
			  $.fancybox.open({
				href: Href,
				type: 'iframe',
				afterClose   : function() {
						 $.blockUI();
						window.location.reload();
						$.unblockUI(); 
					}
			  });
			});
			
			
		});
		
		
	

	</script>
	
</head>


<body class="dt-example">
	<div class="container">
		<section>
			<h1><a href = "home.php"><img src = "../../media/images/home.png"></a><span  style = "padding-left:35px;font-size:40px;">PROGRAMME OF MONITORING AND INFORMATON SYSTEM </span></h1>
			
			<p  ><label><font color = "red"><a href = "logout.php"><?php echo $_SESSION["user"];?> </a></font> is login</label></p>
			<p>
			<p>
			<a class="fancybox" href="#inline1" title="search"><img src = "../../media/images/Search.png"></a>
			<span  style = "padding-left:40px;"><a class="add_item" href="#inline1" title="add item"><img src = "../../media/images/Add.png"></a></span>
			<span  style = "padding-left:40px;"><a class="fancybox" href="category.php" title="add category"><img src = "../../media/images/folder1.png"></a></span>
			<span  style = "padding-left:40px;"><a class="fancybox" href="exchage_rate.php" title="add category"><img src = "../../media/images/exchange.png"></a></span>
			<span  style = "padding-left:50px;"><a class="fancybox" href="export_excel.php?query=<?=$excel?>" title="export to excel"><img src = "../../media/images/excel.png"></a></span> 
			<p>
			<p>
			<p>
			
			<?php
			 
			if($_POST){
				if($_POST['year'] != ""){
					echo "Year :".$_POST['year'].",";
				}else{
					echo "Year : All";
				}
				if($_POST['status'] != ""){
					echo " Status :".$_POST['status'].",";
				}else{
					echo " Status : All,";
				}
				if($_POST['unit'] != ""){
					echo " Unit :".$_POST['unit'].",";
				}else{
					echo " Unit : All,";
				}
				if($_POST['office'] != ""){
					echo " Office :".$_POST['office'].",";
				}else{
					echo " Office : All,";
				}
				if($_POST['category'] != ""){
					echo " Category :".$_POST['category'].",";
				}else{
					echo " Category : All,";
				}
				if($_POST['cost_us'] != ""){
					echo " Cost ≥ ".$_POST['cost_us']."US$";
				}else{
					echo " Cost ≥ 0 US$";
				}
			}
			?>
			<div id="inline1" style="width:900px;display: none;">
				
				<form action="" method="post" class="basic-grey" id = "search">
					<h1>Inventory Form  </h1>
						<label>
						<span width = "10px;">Inv. No :</span>
						<input id="brand" type="text" value="" name="brand">
					   
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
						<select name="office">
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
						<input id="cost" type="text" name="cost_us" />
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
						<th>Category</th>
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
						<th>Category</th>
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
						if($_POST['cost_us'])
						{
							$where .= " AND cost_us >= {$_POST['cost_us']}";
						}
						
							 $query = "SELECT  * FROM inventory {$where} ";
					
						$result = mssql_query($query);
						$sum = 0;$sum_us = 0;$us_1 = 0;
						while ( $record = mssql_fetch_array($result) )
						{
							//var_dump($record);
							$seria = "(S/N:".$record["sn"].")";
							$originalDate = $record["po_date"];
							$po_date = date("d M Y", strtotime($originalDate));
							$originalDate1 = $record["dv_date"];
							$dv_date = date("d M Y", strtotime($originalDate1));
							$us_1 += $record["cost_us"];
							$sum += $record["cost"];
							/*$m = date("F", strtotime($originalDate1));
							$y = date("Y", strtotime($originalDate1));
							 $query_rate = "SELECT  * FROM exrate where year = '{$y}' AND month = '{$m}'";
							$result_rate = mssql_query($query_rate);
							 $us_rate = mssql_fetch_array($result_rate);
							 $tmp =  $record["cost"]/$us_rate["rate"];
							 $us_1 += $tmp;
							
							if($us_rate["rate"] == ""){
								 $us_rate = "-no-rate-";
							}else{
								 $us_rate =  number_format($record["cost"]/$us_rate["rate"],2)." US$";
							}*/
							
							
					?>
						
						<tr >
							<td align = "center"><?echo "[".$record["code"].$record["sub_code"]."]  ".display_cat($record["code"],$record["sub_code"]); ?></td>
							<td align = "center"><a class="iframe_maps" href="update_from.php?id=<?=$record["id"]?>" id="id_inv"><?=$record["code"].$record["sub_code"].".".$record["inv_no"]; ?></a></td>
							
							<td align = "center"><?=$record["brand"]." ".$record["model"]." ".$seria; ?></td>
							<td align = "center"><?=$record["unit"]."<br>".$record["officer"]; ?></td>
							<td align = "center"><?=$record["budget_code"].$record["busa"].".".$record["ob_no"]; ?></td>
						
							<td align = "center"><?=$record["po_no"]; echo "<br>"; echo $po_date; ?></td>
							<td align = "center"><?=$dv_date; ?></td>
							<td align = "center"><font color = 'red'><?php  echo number_format($record["cost_us"],2); ?></font><?php echo "<br>"; echo number_format($record["cost"], 2)." THB"; ?></td>
						</tr>
						
						<?php
							$sum += $record["cost"];
							
						}
					
					}	
					?>
				</tbody>
				<tr>
				<td colspan = "6" align = "center">TOTAL<td>
				<td align = "center"><?= number_format($us_1,2)." US$"?><?php echo "<br>";?><?= number_format($sum,2)." THB"?><td>
				<tr>
			</table>

			
		
		</section>
	</div>

	<section>
		<div class="footer">
			<div class="gradient"></div>

			<div class="liner">
				


				<div class="epilogue">
				<div class="toc-group" style = "text-align:left;">
						<h3>UNESCO Bangkok</h3>
						<ul class="toc">
							Asia-Pacific Regional Bureau for Education <p>
							Mom Luang Pin Malakul Centenary Building
							Mom Luang Pin Malakul Centenary Building<p>
							920 Sukhumvit Road
						Prakanong, Klongtoey
							Bangkok 10110 <p>
							Thailand<p>
						
						</ul>
					</div>

				</div>
			</div>
		</div>
	</section>
</body>
</html>