<?php
require_once('../../db/config.php');
require_once('../../db/connect.php'); 


$sql_insert = "insert into PRODUCT(name, UPC, stock, measurement, price, description, category) 
									values ('$_POST[inputName]',
											'$_POST[inputUPC]',
											'$_POST[inputStock]',
											'$_POST[inputUnit]',
											'".str_replace(".", "", $_POST['inputPrice'])."',
											'$_POST[inputDescription]',
											'$_POST[inputCategory]')"; 

if(mysql_query($sql_insert)) 
{ 
      header("Location: http://".$_SERVER['HTTP_HOST']."?action=products");

} else {
   $err = mysql_errno(); 
   if($err == 1062)
   {
      echo "<p>Product $_POST[inputName] already exists!</p>"; 
   } else {
      echo "<p>MySQL error code $err </p>"; 

   }
}
?>