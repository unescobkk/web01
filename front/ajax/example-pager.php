<?php include('../config.php'); ?>
<head>

	<link rel="stylesheet" href="css/jq.css" type="text/css" media="print, projection, screen" />
	
	<script type="text/javascript" src="../front/plugins/tablesorter/jquery-latest.js"></script>
	<script type="text/javascript" src="../front/plugins/tablesorter/jquery.tablesorter.js"></script>
	<script type="text/javascript" src="../front/plugins/tablesorter/addons/pager/jquery.tablesorter.pager.js"></script>
	
	<script type="text/javascript" src="./front/plugins/tablesorter/docs/js/examples.js"></script>
	<script type="text/javascript" src="../front/plugins/tablesorter/docs/js/docs.js"></script>
	<script type="text/javascript">
	$(document).ready(function() {
	$("table").tablesorter();
	$("#append").click(function() {
		// add some html
		var html = "<tr><td>Peter</td><td>Parker</td><td>28</td><td>$9.99</td><td>20%</td><td>Jul 6, 2006 8:14 AM</td></tr>";
		html += "<tr><td>John</td><td>Hood</td><td>33</td><td>$19.99</td><td>25%</td><td>Dec 10, 2002 5:14 AM</td></tr><tr><td>Clark</td><td>Kent</td><td>18</td><td>$15.89</td><td>44%</td><td>Jan 12, 2003 11:14 AM</td></tr>";		
		html += "<tr><td>Bruce</td><td>Almighty</td><td>45</td><td>$153.19</td><td>44%</td><td>Jan 18, 2001 9:12 AM</td></tr>";
		// append new html to table body 
		 $("table tbody").append(html);
		// let the plugin know that we made a update
		$("table").trigger("update");
		// set sorting column and direction, this will sort on the first and third column
		var sorting = [[2,1],[0,0]];
		// sort on the first column
		$("table").trigger("sorton",[sorting]);
		return false;
	});});
	</script>
</head>
<body>

<h4 class="page-header" style="padding-top: 30px;">Search Inventory</h4>
<div class="row">
	<div class="col-xs-12 col-sm-12">
		<div class="box">
				
                          
				
				
                                  <form action="" method="post" role="form" class="form-horizontal"  id = "search" name = "search" enctype="multipart/form-data" >  
                                   
                                    
					
					<div class="form-group">
						<label class="col-sm-2 control-label">Inv. No </label>
						<div class="col-sm-4">
							<input type="text" class="form-control" placeholder="Inv. No " name = "inv_no" id = "inv_no">
						</div>
						<label class="col-sm-2 control-label">Serial NO </label>
						<div class="col-sm-4">
							<input type="text" class="form-control" placeholder="Serial NO" name = "sn" id = "sn">
							
						</div>
					</div>
					
					
					
                                       <div class="form-group">
						<label class="col-sm-2 control-label">Brand</label>
						<div class="col-sm-4">
							<input type="text" id="brand" name="brand"  class="form-control" placeholder="Brand">
						</div>
						
						<label class="col-sm-2 control-label">PO No </label>
						<div class="col-sm-4">
							 	<input type="text" id="po_no" name="po_no"  class="form-control" placeholder="PO.No">
						</div>
						
					</div>
                                      <div class="form-group">
						<label class="col-sm-2 control-label">Year  </label>
						<div class="col-sm-4">
							
                                                    
                                                    
                                                    	<?php
						 $sql= "SELECT DISTINCT YEAR(po_date) AS yr FROM inventory ORDER BY yr DESC";
						$result=mysql_query($sql);
                                               
						?>
						  <select id="year"class="form-control" name = "year">
                                                           
						<option value="">-------ALL-------</option>
						<?php
							while ($array = mysql_fetch_array($result)) {
						?>
							<option value="<?php echo $array['yr'];?>"><?=$array['yr'];?></option>
						<?php } ?>
							   </select>
                                                    
                                                    
                                                    
						</div>
						<label class="col-sm-2 control-label">Category  </label>
						<div class="col-sm-4">
						
                                                     <?php
						$sql= "SELECT * FROM inv_code ORDER BY code,sub_code ASC";
						$result=mysql_query($sql);
						?>
						<select name="category" class="form-control">
						<option value="">-------ALL-------</option>
						<?php
							while ($array = mysql_fetch_array($result)) {
						?>
							<option value="<?=$array['code'].$array['sub_code'];?>"><?=$array['code'].$array['sub_code']."-".$array['description'];?></option>
						<?php } ?>
						</select>
							
						</div>
					</div>
                                      <div class="form-group">
						<label class="col-sm-2 control-label">Officer  </label>
						<div class="col-sm-4">
							
                                                    
                                                    <?php
						$sql= "SELECT DISTINCT officer FROM inventory  WHERE (officer IS NOT NULL) ORDER BY officer ASC";
						$result=mysql_query($sql);
						?>
						<select name="office" class="form-control">
						<option value="">-------ALL-------</option>
						<?
							while ($array = mysql_fetch_array($result)) {
						?>
							<option value="<?=$array['officer'];?>"><?=$array['officer'];?></option>
						<? } ?>
						</select>
                                                    
                                                    
						</div>
						<label class="col-sm-2 control-label">Unit </label>
						<div class="col-sm-4">
							
                                                    
                                                            <?php
                                                        $sql= "SELECT DISTINCT unit FROM inventory WHERE (unit IS NOT NULL) ORDER BY unit ASC";
                                                        $result=mysql_query($sql);
                                                        ?>
                                                        <select name="unit" class="form-control">
                                                        <option value="">-------ALL-------</option>
                                                        <?
                                                                while ($array = mysql_fetch_array($result)) {
                                                        ?>
                                                                <option value="<?=$array['unit'];?>"><?=$array['unit'];?></option>
                                                        <? } ?>
                                                        </select>
							
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
                                                   <label class="col-sm-2 control-label">Cost($): >= </label>
						<div class="col-sm-4">
							<input type="text" class="form-control" placeholder="Cost" name = "cost" id = "cost">
							
						</div>
                                            </div>
					
					
                                      
                                  
					<div class="form-group">
						
						<div class="col-sm-offset-2 col-sm-2">
							<button type="submit" class="btn btn-primary btn-label-left"  id = "btn_update">
							<span><i class="fa fa-clock-o"></i></span>
								Submit
							</button>
						</div>
					</div>        
                                        </form>        
				   
                                                
                                        
            <table cellspacing="1" class="tablesorter">
                <thead>
				<tr>
					<th>First Name</th>
					<th>Last Name</th>
					<th>Age</th>
					<th>Total</th>
					<th>Discount</th>
					<th>Date</th>
				</tr>
			</thead>
            </table>
	<a href="#" id="append">Append new table data</a>
<div id="pager" class="pager">
	<form>
		<img src="../addons/pager/icons/first.png" class="first"/>
		<img src="../addons/pager/icons/prev.png" class="prev"/>
		<input type="text" class="pagedisplay"/>
		<img src="../addons/pager/icons/next.png" class="next"/>
		<img src="../addons/pager/icons/last.png" class="last"/>
		<select class="pagesize">
			<option selected="selected"  value="10">10</option>
			<option value="20">20</option>
			<option value="30">30</option>
			<option  value="40">40</option>
		</select>
	</form>
</div>

</div>
        </div>
</div>
<script src="http://www.google-analytics.com/urchin.js" type="text/javascript"></script>

</body>
</html>

