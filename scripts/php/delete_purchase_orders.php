<?php
//connect script
require_once('../../db/config.php');
require_once('../../db/connect.php'); 

//delete query
$name = $_GET[purchase_orders_name];
$sql_delete_purchase_orders = "delete from PURCHASE_ORDERS where Ename = '$name'";

//if successful return to purchase_orders page
if(mysql_query($sql_delete_purchase_orders)) 
{ 
      header("Location: http://".$_SERVER['HTTP_HOST']."?action=purchase_orders");
//else print error
} 
else 
{
   $err = mysql_errno(); 
   if($err == 1062)
   {
      echo "<p>Purchase order $_GET[orderNum] cannot be deleted!</p>"; 
   } else {
      echo "<p>MySQL error code $err </p>"; 

   }
}

?>