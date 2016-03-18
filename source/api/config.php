
<?php

$link = mysql_connect('192.168.200.153', 'root', 'MaW@155');
if (!$link) {
    die('Not connected : ' . mysql_error());
}

// make foo the current db
$db_selected = mysql_select_db('promis', $link);
if (!$db_selected) {
    die ('Can\'t use foo : ' . mysql_error());
}
session_start();



?>