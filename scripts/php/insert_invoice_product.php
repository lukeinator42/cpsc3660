<?php
require_once('../../db/config.php');
require_once('../../db/connect.php'); 


$sql_select = "SELECT number, price from PRODUCT 
where name = '$_POST[inputUPC]' or UPC = '$_POST[inputUPC]';";



$result = mysql_query($sql_select);

$row = mysql_fetch_row($result);
$number = $row[0];
$price = $row[1];

//insert query. pulls parameters from form data via POST
$sql_insert = "insert into INVOICE_PRODUCTS(ordernum, productnum, price_sold_at, quantity_sold) 
									values ('$_POST[id]',
											'{$number}',
											'{$price}',
											'$_POST[inputQuantity]'
                                 )"; 
//if successful return to products page
if(mysql_query($sql_insert)) 
{ 
      header("Location: http://".$_SERVER['HTTP_HOST']."?action=edit_invoice&id=$_POST[id]");

//else print error
} else {
   $err = mysql_errno();

      if($err == 1452)
   {
      $err = "product does not exist"; 
   } 

  header("Location: http://".$_SERVER['HTTP_HOST'].
         "?action=error&error={$err}&return_url=%3Faction=edit_invoice%26id={$_POST[id]}");


}
?>