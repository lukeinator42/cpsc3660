<?php
require_once('../../db/config.php');
require_once('../../db/connect.php'); 

//update query. 
$sql_update = "UPDATE PURCHASE_ORDER SET
              employeeID='".$_POST['inputName']."',
            tax_amount='".$_POST['inputTax']."',
            date='".$_POST['inputDate']."'
                  WHERE ordernum=".$_POST['id']."
                  "; 
//if successful return to edit invoice page. 
if(mysql_query($sql_update)) 
{ 
      header("Location: http://".$_SERVER['HTTP_HOST']."?action=edit_purchase_orders&id=$_POST[id]");

//else print error
} else {

   $err = mysql_errno();
   $msg = mysql_error(); 

   if($err == 1452)
   {
      $err = "employee does not exist";
   }

   header("Location: http://".$_SERVER['HTTP_HOST'].
         "?action=error&error={$err}&return_url=%3Faction=edit_purchase_orders%26id={$_POST[id]}");

}
?>