<?php
require_once('../../db/config.php');
require_once('../../db/connect.php'); 

//update query. 
$sql_update_purchase_orders = "UPDATE PURCHASE_ORDERS SET
                 EID='".$_POST['inputemployeeID']."',
   					ProductNum='".$_POST['inputproductNumber']."',
   					numPurchates='".$_POST['inputnumPurchased']."',
   					datePurchased='".$_POST['inputpurchaseDate']."',
   					paymentDate='".$_POST['inputpaymaneDate']."',
   					taxAmount='".$_POST['inputtaxAmount']."'
                  "; 

//if successful return to products page. 
if(mysql_query($sql_update_purchase_orders)) 
{ 
      header("Location: http://".$_SERVER['HTTP_HOST']."?action=purchase_orders");

//else print error
} else {

   $err = mysql_errno();
   $msg = mysql_error(); 
   if($err == 1062)
   {
      echo "<p>Purchase Order $_POST[orderNum] already exists!</p>"; 
   } else {
      echo "<p>MySQL error code $err </p>"; 
     echo $_POST['orderNum'];

   }
}
?>


