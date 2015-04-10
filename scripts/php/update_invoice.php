<?php
require_once('../../db/config.php');
require_once('../../db/connect.php'); 

//update query. 
$sql_update = "UPDATE INVOICE SET
   			      customerID='".$_POST['inputName']."',
   					tax_amount='".$_POST['inputTax']."',
   					date='".$_POST['inputDate']."'
                  WHERE ordernum=".$_POST['id']."
                  "; 
//if successful return to edit invoice page. 
if(mysql_query($sql_update)) 
{ 
      header("Location: http://".$_SERVER['HTTP_HOST']."?action=edit_invoice&id=$_POST[id]");

//else print error
} else {

   $err = mysql_errno();
   $msg = mysql_error(); 
   if($err == 1062)
   {
      echo "<p>Product $_POST[inputName] already exists!</p>"; 
   } else {
      echo "<p>MySQL error code $err </p>"; 
     echo $_POST['number'];

   }
}
?>