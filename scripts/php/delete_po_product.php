<?php
//connect script
require_once('../../db/config.php');
require_once('../../db/connect.php'); 

//delete query
$sql_delete = "delete from PO_PRODUCTS where productnum=$_GET[number] and ordernum = $_GET[id]"; 

//if successful return to products page
if(mysql_query($sql_delete)) 
{ 
      header("Location: http://".$_SERVER['HTTP_HOST']."?action=edit_purchase_orders&id=$_GET[id]");

//else print error
} else {
   $err = mysql_errno(); 
   if($err == 1062)
   {
      echo "<p>Product $_GET[number] cannot be deleted!</p>"; 
   } else {
      echo "<p>MySQL error code $err </p>"; 

   }
}
?>