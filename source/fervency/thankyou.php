<meta http-equiv="X-UA-Compatible" content="IE=edge" />
<?php
include("config.php");
//var_dump($_POST);
$today = date("Y-m-d H:i:s"); 
$today = $today." 000";
 $sql = "INSERT INTO wtdmsg ( SenderName
								  ,SenderEmail
								  ,RecipientName
								  ,RecipientEmail
								  ,Msg
								  ,CardNo
								  ,WaitSendMail
								  ,SaveDate
								  ,IsDel
								  ,Online
								)
					VALUES ('{$_POST['name']}'
							,'{$_POST['email']}'
							,'{$_POST['name_recipient']}'
							,'{$_POST['email_recipient']}'
							,'{$_POST['message']}'
							,'{$_POST['ecard']}'
							,'0'
							,'{$today}'
							,'0'
							,'0'
							)";
					
$result = mssql_query($sql)or die('Error querying MSSQL database');

?>


</head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Send Message to your teacher</title>
<meta name="keywords" content="" />
<meta name="description" content="" />
<link href="http://fonts.googleapis.com/css?family=Source+Sans+Pro:200,300,400,600,700,900" rel="stylesheet" />
<link href="default.css" rel="stylesheet" type="text/css" media="all" />
<link href="fonts.css" rel="stylesheet" type="text/css" media="all" />
<body>
<div id="header-wrapper">
	<div id="header" class="container">
		<div id="logo">
			<span class="icon icon-fire"></span>
			<h1><a href="#">E-CARDS</a></h1>
			<span>UNESCO BKK <a href="www.unescobkk.org">Unescobkk.org</a></span> </div>
		
	</div>
</div>

<div id="wrapper3">
	<div id="portfolio" class="container">
		<div class="title">
			<h2>Thank you for sharing your message to your teacher with us</h2>
			<p><p><p><p><p><p><p><p><p><p><p><p><p><p><p><p>
			<span class="byline">Write a short message of appreciation to your teacher - we will post it on the UNESCO Bangkok website and send it as e-postcard on 5 October!</span> </div>
		
		
	</div>
</div>
<div id="wrapper2">
	<div id="newsletter" class="container">
		
		<div class="content">
		
				
				<div class="row">
					
				</div>
			
			
		
		</div>
	</div>
</div>

</body>
</html>
