<?php

	require_once(ROOT.'/db/config.php');

	mysql_connect(DATABASE_HOST, DATABASE_USER, DATABASE_PASS)
	or die("<p>Connection error".mysql_error()."</p>");

	mysql_select_db(DATABASE_NAME)
	or die("<p>Error selecting database</p>");

//	require_once('/db/create_tables.php');

?>
