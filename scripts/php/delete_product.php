<?php
require_once('../../db/config.php');
require_once('../../db/connect.php'); 


$sql_delete = "delete from PRODUCT where number=$_GET[number]"; 

if(mysql_query($sql_delete)) 
{ 
      header("Location: http://".$_SERVER['HTTP_HOST']."?action=products");

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