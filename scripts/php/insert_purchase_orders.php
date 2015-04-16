<?php
require_once('../../db/config.php');
require_once('../../db/connect.php'); 

//insert query. pulls parameters from form data via POST
$sql_insert = "insert into PURCHASE_ORDERS(EID, orderNumb, numPurchased, pricePurchasedAt, datePurchased, paymentDate) 
									values ('$_POST[inputEmployeeID]',
											'$_POST[inputOrderNumb]',
											'$_POST[inputNumPurchased]',
											'".str_replace(".", "", $_POST['inputPricePurchasedAt'])."',
											'$_POST[inputDatePurchased]',
											'$_POST[inputPaymentDate]',
										)"; 
//if successful return to products page
if(mysql_query($sql_insert)) 
{ 
      header("Location: http://".$_SERVER['HTTP_HOST']."?action=purchase_orders");

//else print error
} else {
   $err = mysql_errno(); 
   if($err == 1062)
   {
      echo "<p>Purchase Orders $_POST[inputOrderNumber] already exists!</p>"; 
   } else {
      echo "<p>MySQL error code $err </p>"; 

   }
}
?>