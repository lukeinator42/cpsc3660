<?php
//connect script
require_once('../../db/config.php');
require_once('../../db/connect.php'); 

$sql_query = "(SELECT name from PRODUCT 
where name like '%".$_GET[number]."%')
union
(SELECT UPC from PRODUCT where UPC like '%".$_GET[number]."%')";

$sql = $sql = mysql_query($sql_query);

$array = array();


while ($row = mysql_fetch_row($sql)) {
$array[] = $row[0];
}
echo json_encode ($array); 
?>