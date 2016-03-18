<meta http-equiv="X-UA-Compatible" content="IE=edge" />
<?php
require_once("config.php");


?>
	<!---------------------------------- Fancy Box------------------------------------->
	<!-- Add jQuery library -->
	
	<script type="text/javascript" language="javascript" src="../../media/js/jquery.js"></script>

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
	

<link rel="stylesheet" type="text/css" href="../../media/css/form.css">
<script type="text/javascript">
$(document).ready(function(){
	
	/*$('#btn_update').click(function(){
			var url = "update_db.php";
			var data = $("#update").serialize();
			alert(data);
		   
		   var posting = $.post( url, { data1: data } );
 
		  // Put the results in a div
			posting.done(function(data) {
				alert('por');
		  });
	});*/
	
	
	
	$('#btn_update').click(function(){

		//$.fancybox.showActivity();

		$.ajax({
			type	: "POST",
			cache	: false,
			url		: "add_category_db.php",
			data	:  $("#add_cat").serialize(),
			success: function(data) { 
				parent.jQuery.fancybox.close()
				alert("Add new category success");
				
			}
		});

		return false;
	});
	
	
	


});

</script>



</style>
<form action="" method="post" class="basic-grey" id = "add_cat" name = "add_cat">
    <h1>Add New Category  </h1>	
	
    <label>
        <span>Code :</span>
		<input id="code" type="text" name="code" value = "" />
       
	 </label>	
	 
	 <label>
	<span>Sub Code :</span>
      <input id="sub_code" type="text" name="sub_code" value = ""  />
		
    </label>
    <p>
   
    <label>
        <span>Description :</span>
         <textarea id="description" name="description" placeholder="Your description to Us"></textarea>
    </label> 
	<p>
     <label>
        <span>Asseet Class	 :</span>
		  <input id="asset_class" type="text" name="asset_class"  value = ""/>
    </label> 
	
	<p>
	<div align = "center">
     <label>
        <span>&nbsp;</span> 
        <input type="submit" class="button" value="ADD CATEGORY" id = "btn_update" /> 
    </label> 
	
	</div>	
</form>