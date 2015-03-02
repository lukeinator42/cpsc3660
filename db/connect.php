<?php
	require_once './config.php';

	mysql_connect(DATABASE_HOST, DATABASE_USER, DATABASE_PASS)
	or die("<p>Connection error".mysql_error()."</p>");

	echo "<p>connected</p>";

	mysql_select_db(DATABASE_NAME)
	or die("<p>Error selecting database</p>");

	echo "<p>database selected</p>";

?>