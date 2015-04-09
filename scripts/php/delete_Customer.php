<?php
//connect script
require_once('../../db/config.php');
require_once('../../db/connect.php'); 

//delete query
$name = $_GET[customer_name];
$sql_delete_customer = "delete from CUSTOMER where Cname = '$name'";
$sql_delete_PEOPLE = "delete from PEOPLE where Pname = '$name'";

//if successful return to Customer page
if(mysql_query($sql_delete_customer) && mysql_query($sql_delete_PEOPLE)) 
{ 
      header("Location: http://".$_SERVER['HTTP_HOST']."?action=customers");
//else print error
} 
else 
{
   $err = mysql_errno(); 
   if($err == 1062)
   {
      echo "<p>Product $_GET[number] cannot be deleted!</p>"; 
   } else {
      echo "<p>MySQL error code $err </p>"; 

   }
}

?>