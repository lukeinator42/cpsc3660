<?php
//connect script
require_once('../../db/config.php');
require_once('../../db/connect.php'); 

//delete query
$sql_delete_products = "delete from PO_PRODUCTS where ordernum = $_GET[id]"; 

//delete query
$sql_delete = "delete from PURCHASE_ORDER where ordernum = $_GET[id]"; 

//if successful return to products page
if(mysql_query($sql_delete_products)&&mysql_query($sql_delete)) 
{ 
      header("Location: http://".$_SERVER['HTTP_HOST']."?action=purchase_orders");

//else print error
} else {
   $err = mysql_errno(); 

      header("Location: http://".$_SERVER['HTTP_HOST'].
         "?action=error&error={$err}&return_url=%3Faction=edit_purchase_orders%26id={$_POST[id]}");
   if($err == 1062)
   {
      echo "<p>Product $_GET[number] cannot be deleted!</p>"; 
   } else {
      echo "<p>MySQL error code $err </p>"; 

   }
}
?>