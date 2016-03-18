<?php include('../config.php'); ?>

<div class="clearfix"></div>
<h4 class="page-header" style="padding-top: 30px;">Search Inventory</h4>
<div class="row">
	<div class="col-xs-12 col-sm-12">
		<div class="box">
			
			<div class="box-content">
                          
				
				
                                  <form action="" method="get"  class="form-horizontal"  id = "search" name = "search" enctype="multipart/form-data" >  
                                   
                                    
					
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
                                                  <!-- <label class="col-sm-2 control-label">Cost: >= </label>
						<div class="col-sm-2">
							<input type="text" class="form-control" placeholder="Cost" name = "cost" id = "cost">
							
						</div>
                                                   <div class="col-sm-2">
							  <select id="status"class="form-control" name = "currency">
                                                                   <option value="">-----currency-----</option>
                                                                   <option value="THB">THB</option>
                                                                    <option value="USD">USD</option>
                                                                 
                                                            </select>
							
						</div>-->
                                            </div>
					
					
                                      
                                  
					<div class="form-group">
						
						<div class="col-sm-offset-2 col-sm-2">
							<button type="submit" class="btn btn-primary btn-label-left"  id = "btn_update">
							<span><i class="fa fa-clock-o"></i></span>
								Submit
							</button>
                                                    
						</div>
                                           <div class="col-sm-2">
						<a id ="myLink" href="" target="_blank">	<button   class="btn btn-success btn-label-left" id = "export">
							<span><i class="fa fa-print"></i></span>
                                                        Export Excel 
                                                    </button></a>
						</div>
					</div>        
                                        </form>        
				</div>       
                                                
                                        
                                   <div class="box-content no-padding">
                                       <div id="dvData">
				<table id="example" class="display" cellspacing="0" width="100%">
					<thead>
						<tr>
							<th>Category</th>
							<th>Inv. No</th>
							<th>Brand/Model</th>
                                                        <th>Unit/Officer</th>
							<th>Purchase Order</th>
							<th>Amount Paid</th>
						</tr>
					</thead>
					
					<tbody>
					<!-- Start: list_row -->
					
                                                
						
					<!-- End: list_row -->
					</tbody>
					
				</table>
                                       </div>
			</div>
					           
						
					
                       </div>
				
			</div>
		</div> 

<script type="text/javascript">

	$(document).ready(function() {
		
		 $('#example').dataTable( {
		          "order": [[ 0, "desc" ]],
                           "paging":   false,
                           bFilter: false, bInfo: false,
                         
                       
                        buttons: [
        'excel'
    ]
                     
                           
                       
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



<script type="text/javascript">
document.getElementById("myLink").onclick = function(e) {
  // Do some processing here, maybe 
  window.location = this.href
  // Return false to prevent the default action if you did redirect with script
  return false;
}
	
    /* $("#export").on('su',(function(e){
              
                 var str = $("form").serialize();
                alert(str);
		e.preventDefault();
			$.ajax({
				url: "/front/ajax/export_excel.php",
				type: "POST",
                               // dataType: "json",
				data: str,
				//contentType: false,
				
				success: function(data){
				alert(data);
				 
				//location.reload();
					//parent.jQuery.fancybox.close()
					
				
				},
				error: function(){} 	        
			});
		}));*/
	
	
         

</script>


<script type="text/javascript">

	
        
      //$(document).ready(function (e){
		$("#search").on('submit',(function(e){
              var link = "/front/ajax/export_excel.php?";
                 var str = $("form").serialize();
                 var link1 = link+str;
            $("a#myLink").attr("href", link1)
		e.preventDefault();
			$.ajax({
				url: "/front/ajax/search_data.php",
				type: "POST",
                               // dataType: "json",
				data: str,
				//contentType: false,
				cache: false,
				processData:false,
				success: function(response){
				//alert(response);
				 $('table#example tbody').html(response);
				//location.reload();
					//parent.jQuery.fancybox.close()
					
				
				},
				error: function(){} 	        
			});
		}));
                
                
              

                
	//});
	
	
         

</script>
<script type="text/javascript">
/*$(document).keypress(function(event){
    var keycode = (event.keyCode ? event.keyCode : event.which);
    if(keycode == '13'){
        alert('You pressed a "enter" key in somewhere');  
        
         $("#search").on('submit',(function(event){
		//e.preventDefault();
			$.ajax({
				url: "/front/ajax/search_data.php",
				type: "POST",
				data:  new FormData(this),
				contentType: false,
				cache: false,
				processData:false,
				success: function(response){
				
				  $('table#resultTable tbody').html(response);
				//location.reload();
					//parent.jQuery.fancybox.close()
					
				
				},
				error: function(){} 	        
			});
                        
                        
                        
        
        
           }));
        
        
       
    }
});*/
        
         $(document).keypress(function(event){
             var keycode = (event.keyCode ? event.keyCode : event.which);
            if( keycode == 13 ){
                 
                     $("#search").submit();
         
            }
            

    });
</script>