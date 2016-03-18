<?php require_once("config.php");

 $sql = "SELECT  * FROM inv_code  where code = '{$_GET['code']}' ORDER BY sub_code ASC";
if($_GET['code']){
?>
	
	 <option value="">----------SELECT CODE-----------</option>  
<?php 
	 $sql = "SELECT  * FROM inv_code  where code = '{$_GET['code']}' ORDER BY sub_code ASC";
	
	$result=mysql_query($sql);
	while($rs=mysql_fetch_array($result)){ ?>
	<option value="<?=$rs['sub_code']?>">[<?=$rs['sub_code'];?>]<?=$rs['description']?></option>  
	<?php }
} else {?>
	<option value="">----------SELECT CODE-----------</option>  
<?php	
}
?>