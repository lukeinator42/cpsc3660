<?php
//connect script
require_once(ROOT.'/db/connect.php'); 
	
	
//query to get data for products
$query_invoice_products = "SELECT number, quantity_sold 
from INVOICE_PRODUCTS, PRODUCT where number=productnum and ordernum=$_GET[id]";
$result = mysql_query($query_invoice_products);



          while ($row = mysql_fetch_row($result)) {
          	
          	$old = mysql_query("select stock from PRODUCT 
          						where number={$row[0]};");

          	

          	$oldQuantity = mysql_fetch_row($old);

          	$new = $oldQuantity[0] - $row[1];


          
          	mysql_query("update PRODUCT set stock = {$new} where number={$row[0]};");

          }


    header("Location: http://".$_SERVER['HTTP_HOST']."?action=view_one_invoice&id=$_GET[id]");
    

?>