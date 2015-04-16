<?php
//connect script
require_once('../../db/config.php');
require_once('../../db/connect.php'); 

//delete query
$name = $_GET[employee_name];
$sql_delete_employee = "delete from EMPLOYEE where Ename = '$name'";
$sql_delete_PEOPLE = "delete from PEOPLE where Pname = '$name'";

//if successful return to Customer page
if(mysql_query($sql_delete_employee) && mysql_query($sql_delete_PEOPLE)) 
{ 
      header("Location: http://".$_SERVER['HTTP_HOST']."?action=employees");
//else print error
} 
else 
{
   $err = mysql_errno(); 
   if($err == 1062)
   {
      echo "<p>Employee $_GET[number] cannot be deleted!</p>"; 
   } else {
      echo "<p>MySQL error code $err </p>"; 

   }
}

?>