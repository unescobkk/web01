<?php
require_once("config.php");
?>
<style type="text/css">
/* Basic Grey */
.basic-grey {
    width: 900px;

    margin-right: auto;
    margin-left: auto;
    background: #EEE;
    padding: 20px 30px 20px 30px;
    font: 12px Georgia, "Times New Roman", Times, serif;
    color: #888;
    text-shadow: 1px 1px 1px #FFF;
    border:1px solid #DADADA;
}
.basic-grey h1 {
    font: 25px Georgia, "Times New Roman", Times, serif;
    padding: 0px 0px 10px 40px;
    display: block;
    border-bottom: 1px solid #DADADA;
    margin: -10px -30px 30px -30px;
    color: #888;
}
.basic-grey h1>span {
    display: block;
    font-size: 11px;
}
/*.basic-grey label {
    display: block;
    margin: 0px 0px 5px;
}
.basic-grey label>span {
    float: left;
	width: 80px;
    text-align: right;
    padding-right: 10px;
    margin-top: 10px;
    color: #888;
}*/
.basic-grey span{

  display: inline-block;
  width: 70px;

}
.basic-grey input[type="text"], .basic-grey input[type="email"], .basic-grey textarea,.basic-grey select{
    border: 1px solid #DADADA;
    color: #888;
    height: 24px;
    margin-bottom: 16px;
    margin-right: 6px;
    margin-top: 2px;
    outline: 0 none;
    padding: 3px 3px 3px 5px;
    width: 30%;
    font: normal 12px/12px Georgia, "Times New Roman", Times, serif;
}
.basic-grey select {
    background: #FFF url('down-arrow.png') no-repeat right;
    background: #FFF url('down-arrow.png') no-repeat right);
    appearance:none;
    -webkit-appearance:none; 
    -moz-appearance: none;
    text-indent: 0.01px;
    text-overflow: '';
    width: 30%;
    height: 30px;
}
.basic-grey textarea{
    height:100px;
}
.basic-grey .button {
    background: #E48F8F;
    border: none;
    padding: 10px 25px 10px 25px;
    color: #FFF;
}
.basic-grey .button:hover {
    background: #CF7A7A
}
</style>
<form action="" method="post" class="basic-grey">
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
        <select name="unit">
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
		<input id="email" type="email" name="email" placeholder="Valid Email Address" />
    </label>  	
	<p>
     <label>
        <span>&nbsp;</span> 
        <input type="button" class="button" value="Send" /> 
    </label>    
</form>