<?php include('../config.php'); ?>
<div class="clearfix"></div>
<h4 class="page-header" style="padding-top: 30px;">Search Inventory</h4>
<div class="row">
	<div class="col-xs-12 col-sm-12">
		<div class="box">
			
			<div class="box-content">
                          
				
				
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
				</div>       
                                                
                                        
                                   <div class="box-content no-padding">
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
					
						
						<tr>
							<td>74</td>
							<td><img class="img-rounded" src="http://i.forbesimg.com/media/lists/people/antonio-ermirio-de-moraes_50x50.jpg" alt="">Antonio Ermirio de Moraes & family</td>
							<td>$12.7 B</td>
							<td>85</td>
							<td>diversified</td>
							<td>Brazil</td>
						</tr>
						<tr>
							<td>74</td>
							<td><img class="img-rounded" src="http://i.forbesimg.com/media/lists/people/abigail-johnson_50x50.jpg" alt="">Abigail Johnson</td>
							<td>$12.7 B</td>
							<td>52</td>
							<td>money management</td>
							<td>United States</td>
						</tr>
						<tr>
							<td>76</td>
							<td><img class="img-rounded" src="http://i.forbesimg.com/media/lists/people/ray-dalio_50x50.jpg" alt="">Ray Dalio</td>
							<td>$12.5 B</td>
							<td>64</td>
							<td>hedge funds</td>
							<td>United States</td>
						</tr>
						<tr>
							<td>76</td>
							<td><img class="img-rounded" src="http://i.forbesimg.com/media/lists/people/robert-kuok_50x50.jpg" alt="">Robert Kuok</td>
							<td>$12.5 B</td>
							<td>90</td>
							<td>diversified</td>
							<td>Malaysia</td>
						</tr>
						<tr>
							<td>78</td>
							<td><img class="img-rounded" src="http://i.forbesimg.com/media/lists/people/miuccia-prada_50x50.jpg" alt="">Miuccia Prada</td>
							<td>$12.4 B</td>
							<td>64</td>
							<td>Prada</td>
							<td>Italy</td>
						</tr>
						<tr>
							<td>79</td>
							<td><img class="img-rounded" src="http://i.forbesimg.com/media/lists/people/ronald-perelman_50x50.jpg" alt="">Ronald Perelman</td>
							<td>$12.2 B</td>
							<td>71</td>
							<td>leveraged buyouts</td>
							<td>United States</td>
						</tr>
						<tr>
							<td>80</td>
							<td><img class="img-rounded" src="http://i.forbesimg.com/media/lists/people/anne-cox-chambers_50x50.jpg" alt="">Anne Cox Chambers</td>
							<td>$12 B</td>
							<td>94</td>
							<td>media</td>
							<td>United States</td>
						</tr>
						<tr>
							<td>81</td>
							<td><img class="img-rounded" src="http://i.forbesimg.com/media/lists/people/stefan-quandt_50x50.jpg" alt="">Stefan Quandt</td>
							<td>$11.9 B</td>
							<td>47</td>
							<td>BMW</td>
							<td>Germany</td>
						</tr>
						<tr>
							<td>82</td>
							<td><img class="img-rounded" src="http://i.forbesimg.com/media/lists/people/ananda-krishnan_50x50.jpg" alt="">Ananda Krishnan</td>
							<td>$11.7 B</td>
							<td>75</td>
							<td>telecoms</td>
							<td>Malaysia</td>
						</tr>
						<tr>
							<td>82</td>
							<td><img class="img-rounded" src="http://i.forbesimg.com/media/lists/people/alejandro-santo-domingo-davila_50x50.jpg" alt="">Alejandro Santo Domingo Davila</td>
							<td>$11.7 B</td>
							<td>36</td>
							<td>beer</td>
							<td>Colombia</td>
						</tr>
						<tr>
							<td>82</td>
							<td><img class="img-rounded" src="http://i.forbesimg.com/media/lists/people/james-simons_50x50.jpg" alt="">James Simons</td>
							<td>$11.7 B</td>
							<td>75</td>
							<td>hedge funds</td>
							<td>United States</td>
						</tr>
						<tr>
							<td>82</td>
							<td><img class="img-rounded" src="http://i.forbesimg.com/media/lists/people/charoen-sirivadhanabhakdi_50x50.jpg" alt="">Charoen Sirivadhanabhakdi</td>
							<td>$11.7 B</td>
							<td>69</td>
							<td>drinks</td>
							<td>Thailand</td>
						</tr>
						
						<tr>
							<td>91</td>
							<td><img class="img-rounded" src="http://i.forbesimg.com/media/lists/people/rupert-murdoch_50x50.jpg" alt="">Rupert Murdoch & family</td>
							<td>$11.2 B</td>
							<td>82</td>
							<td>News Corp</td>
							<td>United States</td>
						</tr>
						
						<tr>
							<td>98</td>
							<td><img class="img-rounded" src="http://i.forbesimg.com/media/lists/people/lui-che-woo_50x50.jpg" alt="">Lui Che Woo</td>
							<td>$10.7 B</td>
							<td>84</td>
							<td>gaming</td>
							<td>Hong Kong</td>
						</tr>
						<tr>
							<td>98</td>
							<td><img class="img-rounded" src="http://i.forbesimg.com/media/lists/people/laurene-powell-jobs_50x50.jpg" alt="">Laurene Powell Jobs & family</td>
							<td>$10.7 B</td>
							<td>50</td>
							<td>Apple, Disney</td>
							<td>United States</td>
						</tr>
						<tr>
							<td>100</td>
							<td><img class="img-rounded" src="http://i.forbesimg.com/media/lists/people/eike-batista_50x50.jpg" alt="">Eike Batista</td>
							<td>$10.6 B</td>
							<td>57</td>
							<td>mining, oil</td>
							<td>Brazil</td>
						</tr>
					<!-- End: list_row -->
					</tbody>
					
				</table>
			</div>
					           
						
					
                       </div>
				
			</div>
		</div> 

<script type="text/javascript">

	$(document).ready(function() {
		
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






<script type="text/javascript">

	
        
        $(document).ready(function (e){
		$("#search").on('submit',(function(e){
		e.preventDefault();
			$.ajax({
				url: "/front/ajax/search_data.php",
				type: "POST",
                               // dataType: "json",
				data:  new FormData(this),
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
                
                
              

                
	});
	
	
         

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