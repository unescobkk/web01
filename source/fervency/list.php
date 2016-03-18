<?php require_once("config.php"); ?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Send Message to your teacher</title>
<meta name="keywords" content="" />
<meta name="description" content="" />
<link href="http://fonts.googleapis.com/css?family=Source+Sans+Pro:200,300,400,600,700,900" rel="stylesheet" />
<link href="default1.css" rel="stylesheet" type="text/css" media="all" />
<link href="fonts.css" rel="stylesheet" type="text/css" media="all" />

<style type="text/css">

</style>
<!--[if IE 6]><link href="default_ie6.css" rel="stylesheet" type="text/css" /><![endif]-->

	
	

</head>
<body>


<div id="wrapper2">
	<div id="newsletter" class="container">
	
		<div class="content">
			<?php  
			$sql = "SELECT  * FROM wtdmsg  where IsDel = '0' AND Online = '1' order by Msgid DESC";
			
			$result=mssql_query($sql);
			while($rs=mssql_fetch_array($result)){
			?>
			<form name = "list" style = "border-color: #9989">
				<div class = "list"> 
				<div class="row half">
					<div class="6u" align="left">From :
						<input type="text" class="text" name="name" id = "name" value ="<?php echo $rs['SenderName']?>"  />
					</div>
					
				</div>
				<div class="row half">
					<div class="6u" align="left" >To :
						<input type="text" class="text" name="name_recipient" id = "name_recipient" value ="<?php echo $rs['RecipientName']?>"/>
					</div>
					
				</div>
				<div class="row half">
					<div class="12u" align="left">Message text
						<textarea name="message" id = "message" placeholder="Message"><?php echo $rs['Msg']?></textarea>
					</div>
				</div>
				</div>
				<div > ----------------------------------------------------------------------------</div>
			<?php }?>
			
			</form>
		</div>
	</div>
</div>

</body>
</html>
