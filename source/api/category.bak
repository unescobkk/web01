
<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);
require_once("config.php");
if($_SESSION["user"] == ""){
echo '<script type="text/javascript">
		
         window.location.replace("index.html");
      </script>';
}

	
?>
<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
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
	
	<script type="text/javascript">
	$('.fancybox').fancybox();
	$(document).ready(function() {
		
		var table = $('#example').DataTable();
	
	} );
	</script>
	<script type="text/javascript">
	
	
	
	$(document).ready(function() {
		var table = $('#example').DataTable();
		 $('.update').click( function() {
            $.blockUI(); 
            $.ajax({
				type	: "POST",
				cache	: false,
				url		: "update_category.php",
				data	: table.$('input, select').serialize(),
				success: function(data) { 
				
					$.unblockUI(); 
					alert("Update Success");
					window.location.reload();
					
					
					
				}
			});
        }); 
	});

	</script>
	
	<script type="text/javascript">
		$(document).ready(function() {
		$(".iframe_maps").click(function(){
			alert('xx');
			var data = (this.id) ; // button ID 
			var r = confirm("Want to deleted cateogry code "+data);
			  if (r == true) {
				return true;
			 }else{
				return false;
			  }
		});
		});
		
	/*	$(document).ready(function() {
		//	var myVar ="something";
	 
			$(".iframe_maps").click(function(e){
			  e.preventDefault();
				 var myVar = $(this).attr('href');
				 //var Href = 'delete.php?id=' + myVar;
			  
				var data = (this.id) ; // button ID 
				var dataSet = {data:(this.id)};
				
			   var r = confirm("Want to delteted cateogry code "+data);
			  if (r == true) {
				$.post("del_category.php",dataSet,function(result){
					//$('#'+myVar).hide();
					alert("Delete Success");
				 });
				  
			  }else{
				return false;
			  }
				
			
			});
			
			
		});*/
		
		$(document).ready(function() {
		//	var myVar ="something";
			
			  $("a.add_item").fancybox({
					'width'     : '50%',
					'height'    : '85%',
					'autoScale'    : false,
					'titleShow' : false,
					'transitionIn'  : 'no',
					'transitionOut' : 'no',
					'scrolling'     : 'no',
					'type'          : 'iframe',
					afterClose   : function() {
						
						window.location.reload();
					}
				
	   
			});
			
			/*$(".add_item").click(function(){
			
			  var Href = 'add_category.php';
			 // alert(Href)
			  $.fancybox.open({
				href: Href,
				type: 'iframe'
			  });
			  window.location.reload();
			});*/
			
			
		});
		
		

	</script>
	
</head>


<body class="dt-example">
	<div class="container">
		<section>
			<h1><a href = "home.php"><img src = "../../media/images/home.png" border = "0"></a><span  style = "padding-left:35px;font-size:40px;" border = "0">PROGRAMME OF MONITORING AND INFORMATON SYSTEM </span></h1>
				<p  ><label><font color = "red"><a href = "logout.php"><?php echo $_SESSION["user"];?> </a></font> is login</label></p>
			<p>
			<p>
			<span  style = "padding-left:40px;"><a class="add_item" href="add_category.php" title="Add Category"><img src = "../../media/images/add_database.png" border = "0"></a>
			<span  style = "padding-left:40px;"><a class="update" href="#inline1" title="Update Category"><img src = "../../media/images/refresh.png" border = "0"></a>
			
			<form action="post.php" method="post" class="" id = "search">
			<table id="example" class="display" cellspacing="0" width="100%">
				<thead>
					<tr>
						
						<th>ID</th>
						<th>Code</th>
						<th>Sub Code</th>
						<th>Description</th>
						<th>Asset Class</th>
						<th></th>
						
						
				</thead>

				<tfoot>
					<tr>
						
						<th>ID</th>
						<th>Code</th>
						<th>Sub Code</th>
						<th>Description</th>
						<th>Asset Class</th>
						<th></th>
					
					</tr>
				</tfoot>
				
				<tbody>
				<?  $sql= "SELECT  code,sub_code, description,asset_class FROM inv_code  ORDER BY code ASC ";
					$result=mssql_query($sql);
					$i = 1;
					while ( $record = mssql_fetch_array($result) )
						{
				?>
				<tr id ="<?=$record["code"].$record["sub_code"]?>" >	
						<td align="right" ><input type="text"  style="border:none; background-color:transparent" id="id[]" name="id[]" value="<?=$record['code'].$record['sub_code'] ?>"></td>
						<td align="right" ><input type="text"  style="border:none; background-color:transparent" id="code[]" name="code[]" value="<?=$record['code']?>"></td>
						<td align="right" ><input type="text"  style="border:none; background-color:transparent" id="sub_code[]" name="sub_code[]" value="<?=$record['sub_code'] ?>"></td>
						
						<td align="center" ><input type="text" id="description" name="description[]" value="<?=$record['description'] ?>"></td>
						<td align="center" ><input type="text" id="asset_class" name="asset_class[]" value="<?=trim($record['asset_class'])?>"></td>
						<td align="center" ><a class="iframe_maps" href="del_category.php?code=<?=$record["code"]?>&sub_code=<?=$record["sub_code"]?>" id="<?=$record["code"].$record["sub_code"]?>"  onclick="return confirm('Are your sure to delete?');"><img src = "../../media/images/del1.png" border = "0"></a>
						</td>
				</tr>
				<?php $i++;}?>
				</tbody>
			</table>

			</form>
		
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