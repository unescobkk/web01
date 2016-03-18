<?php
$objConnect = mssql_connect("172.24.67.14","aa","39211284a")
	  or die('Could not connect to the server!');
	mssql_select_db('wtd2012') 
		or die('Could not select a database');

?>