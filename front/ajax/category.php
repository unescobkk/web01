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

                            <div class="row">		
                                <div class="box-content no-padding table-responsive">
				<table id="example" class="display" cellspacing="0" width="100%">
					<thead>
						<tr>
							<th><label>ID</label></th>
							<th><label>Code</label></th>
							<th><label>Sub Code</label></th>
							<th><label>Description</label></th>
							<th><label>Asset Class</label></th>
                                                        <th><label></label></th>
						</tr>
					</thead>
					<tbody>
                                                    <?php
                                                    $sql= "SELECT  id,code,sub_code, description,asset_class FROM inv_code  ORDER BY code ASC ";
                                                    $result=mysql_query($sql);
                                                    $i = 1;
                                                    while ( $record = mysql_fetch_array($result) )
                                                            {
                                            ?>
						
                                                   
                                                <tr >
                                                
                                                        <td > <?php echo  $record["code"].$record["sub_code"]; ?></td>
							<td > <?php echo  $record["code"]; ?></td>
							<td > <?php echo  $record["sub_code"]; ?></td>
							
                                                        
                                                        <td align="center" >
                                                         
                                                            <input type="text" id="<?=$record["code"].$record["sub_code"]?>" name="<?=$record["code"].$record["sub_code"]?>" value="<?=$record['description'] ?>"></td>
						<td align="center" ><input type="text" id="ac_<?=$record["code"].$record["sub_code"]?>" name="asset_class" value="<?=trim($record['asset_class'])?>"></td>
                                                
                                                
						
                                                            <td align="center" >
                                                                <a class="update" href="code=<?=$record["code"]?>&sub_code=<?=$record["sub_code"]?>" id="<?=$record["code"].$record["sub_code"]?>">  <button type="button" class="btn btn-info">Update</button></a>

                                                         
                                                                    <a class="del" href="id=<?=$record["id"]?>"  onclick="return confirm('Are your sure to delete?');">  <button type="button" class="btn btn-danger">Del</button></a>
                                                            </td>
						</tr>
                                                
                                                <?php  $i++;} ?>
                                                
                                                
                                        </tbody>
						
					<tfoot>
						<tr>
							<th>Rate</th>
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
<script type="text/javascript">

	$(function () {
		

		 $('#example').dataTable({
		          "order": [[ 0, "desc" ]]
		 });
	});
	

	</script>
        
        <script type="text/javascript">
	
        
         $(document).ready(function (e){
             
             
		 $('.update').click( function(e){
                     
              
                      var answerid = $(this).attr('id');
                     var tmp = $(this).attr('href').split('&');
                    var code = tmp['0'].split("="); 
                    var subcode = tmp['1'].split("="); 
                    
                     var desc = $('#'+answerid).val();
                    var ass = $('#ac_'+answerid).val();
                   //  alert(desc);   alert(ass); 
                     var mydata = 'id=bla&desc=desc&ass=ass';
                     var myKeyVals = { description : desc, asset_class : ass, code : code['1'], sub_code : subcode['1'] }
                     
                   
		e.preventDefault();
			
                        $.ajax({
                             type: "POST",
                        
                           url: "/front/ajax/update_category.php",
                           data:myKeyVals,
                             success: function (data) {
                                alert('success');
				location.reload();
                             }
                        });
		});
                
                
                 $('.del').click( function(e){
                     
              
                     var tmp = $(this).attr('href').split('=');
          //  alert(tmp);       
 //  alert(tmp['1']);
                   
		e.preventDefault();
			
                     $.ajax({
                             type: "POST",
                        
                           url: "/front/ajax/del_category.php",
                           data:{id:tmp['1']},
                             success: function (data) {
                                alert('success');
				location.reload();
                             }
                        });
		});
	});
        
        
	
	
	</script>
<style type="text/css">  
#example { font-size: 0.9em; }
.dataTable input[type="text"]{
    font-size: 12px;
} 
.dataTable  label {
text-align: center;
}
#datatable-2 { font-size: 0.9em; }
body {
   
    font-size: 12px;
  
}
</style> 
