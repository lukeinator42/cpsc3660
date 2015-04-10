<?php
//connect script
require_once('../../db/config.php');
require_once('../../db/connect.php'); 

$sql = mysql_query("SELECT * FROM CUSTOMER WHERE Cname LIKE '%". $_GET['name'] ."%'");
$array = array();


while ($row = mysql_fetch_row($sql)) {
$array[] = $row[0];
}
echo json_encode ($array); 
?>