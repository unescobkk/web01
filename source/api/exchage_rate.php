<meta http-equiv="X-UA-Compatible" content="IE=edge" />
<?php
require_once("config.php");
if($_SESSION["user"] == ""){
echo '<script type="text/javascript">
		
         window.location.replace("index2.html");
      </script>';
}

 $sql= "SELECT  MAX(id) as num FROM exrate ";
					
						$result=mysql_query($sql);
						$record  = mysql_fetch_array($result);
						
						 $num = $record['num']+1;
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
	<link rel="stylesheet" type="text/css" href="../../media/css/jquery.dataTables.css">

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
	
	
	<script type="text/javascript">
	$('.fancybox').fancybox();
	$(document).ready(function() {
		
		var table = $('#example').DataTable();
	
	} );
	</script>
	<script type="text/javascript">
	$(document).ready(function() {
    var td = $('#example').DataTable();
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
	<script type="text/javascript">
	$(document).ready(function() {
		
		var table = $('#example').DataTable();
		$('#update').click( function() {
		
			$.ajax({
				type	: "POST",
				cache	: false,
				url		: "exchangerate_db.php",
				data	: table.$('input, select').serialize(),
				success: function(data) { 
				
				alert("Add Success");
					window.location.reload();
					
					
					
				}
			});
		});
		
	});
	</script>
	

</head>


<body class="dt-example">
	<div class="container">
		<section>
			<h1><a href = "home.php"><img src = "../../media/images/home.png" border = "0"></a><span  style = "padding-left:35px;font-size:40px;">PROGRAMME OF MONITORING AND INFORMATON SYSTEM </span></h1>
				<p  ><label><font color = "red"><a href = "logout.php"><?php echo $_SESSION["user"];?> </a></font> is login</label></p>
			<p>
			<p>
			
			<button id="addRow">Add new row</button>
			<button id="update">Submit</button>
			<form action="post.php" method="post" class="" id = "search">
			
			<table id="example" class="display" cellspacing="0" width="100%">
				<thead>
					<tr>
						<th></th>
						<th>Month</th>
						<th>Year</th>
						<th>Exchage rate</th>
						<th>Del</th>
					</tr>
				</thead>
			 
				<tfoot>
					<tr>
						<th></th>
						<th>Month</th>
						<th>Year</th>
						<th>Exchage rate</th>
						<th>Del</th>
						
					</tr>
				</tfoot>
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
						<?php
						} ?>
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