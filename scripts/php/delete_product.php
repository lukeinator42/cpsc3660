<?php
//connect script
require_once('../../db/config.php');
require_once('../../db/connect.php'); 

//delete query
$sql_delete = "delete from PRODUCT where number=$_GET[number]"; 

//if successful return to products page
if(mysql_query($sql_delete)) 
{ 
      header("Location: http://".$_SERVER['HTTP_HOST']."?action=products");

//else print error
} else {
   $err = mysql_errno(); 
   if($err == 1451)
   {
     
   	  header("Location: http://".$_SERVER['HTTP_HOST'].
         "?action=error&error=Product exists in invoice. Cannot delete.&return_url=%3Faction=products");
 
   } else {
     	  header("Location: http://".$_SERVER['HTTP_HOST'].
         "?action=error&error={$err}&return_url=%3Faction=products");

   }
}
?>