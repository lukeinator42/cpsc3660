<?php
//connect script
require_once('../../db/config.php');
require_once('../../db/connect.php'); 

//delete query        
                                                                                          

$sql_check_pass = "SELECT Pname from PEOPLE
where Pname = '".$_POST['inputUsername']."'
and password = '".$_POST['inputPassword']."'";

$result = mysql_query($sql_check_pass);
$row = mysql_fetch_row($result);


if ("$row[0]" == '')
{
	echo "incorrect username or password";
}
else
{
	session_start();
	$_SESSION["username"] = "$row[0]";
	header("Location: http://".$_SERVER['HTTP_HOST']."?action=customers");
}



?>