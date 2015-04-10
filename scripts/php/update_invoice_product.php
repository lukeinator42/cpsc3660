<?php
require_once('../../db/config.php');
require_once('../../db/connect.php'); 

//update query. 
$sql_update = "UPDATE INVOICE_PRODUCTS SET
   					price_sold_at=".str_replace(".", "", $_POST['inputPrice']).",
   					quantity_sold=".$_POST['inputQuantity']."
                  WHERE productnum=".$_POST['number']." and ordernum=". $_POST['id'] ."
                  "; 
//if successful return to products page. 
if(mysql_query($sql_update)) 
{ 
      header("Location: http://".$_SERVER['HTTP_HOST']."?action=edit_invoice&id=$_POST[id]");

//else print error
} else {

   $err = mysql_errno();

  header("Location: http://".$_SERVER['HTTP_HOST'].
         "?action=error&error={$err}&return_url=%3Faction=edit_invoice%26id={$_POST[id]}");
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