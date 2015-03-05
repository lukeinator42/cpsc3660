<?php
require_once('../../db/config.php');
require_once('../../db/connect.php'); 


$sql_update = "UPDATE PRODUCT SET
									      name='".$_POST['inputName']."',
											UPC='".$_POST['inputUPC']."',
											stock=".$_POST['inputStock'].",
											measurement='".$_POST['inputUnit']."',
											price=".str_replace(".", "", $_POST['inputPrice']).",
											description='".$_POST['inputDescription']."',
											category='".$_POST['inputCategory']."'
                                 WHERE number=".$_POST['number']."
                                 "; 

if(mysql_query($sql_update)) 
{ 
      header("Location: http://".$_SERVER['HTTP_HOST']."?action=products");

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