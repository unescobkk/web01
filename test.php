<?php

error_reporting(E_ALL);
 ini_set("display_errors", 1);
	$objConnect = mssql_connect("172.24.67.14","sa","");
	if($objConnect)
	{
		
		echo "Database Connected.";
	}
	else
	{
		echo "Database Connect Failed.";
	}

	mssql_select_db('promis') 
		or die('Could not select a database');
	$query = "SELECT TOP 10 * FROM inventory";
	$result = mssql_query($query);
	?>
	<table>
	<tr>
						<th>Inv. No</th>
						<th>Brand/Model</th>
						
					
	</tr>
	<?php
	while ( $record = mssql_fetch_array($result) )
	{
		
	?>
		<tr>
			<td><?php echo $record["code"]; ?> </td>
			<td><?php echo $record["code"]; ?> </td>
		</tr>
	<?php
	}
	
	?>
	
	</table>
