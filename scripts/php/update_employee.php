<?php
require_once('../../db/config.php');
require_once('../../db/connect.php'); 

//update query. 
$sql_update_employee = "UPDATE EMPLOYEE SET
                  authority='".$_POST['inputAuthorityLvl']."'
                  sales='".$_POST['inputsales']."'
                  WHERE Cname='".$_POST['inputName']."'
                  "; 

$sql_update_people = "UPDATE PEOPLE SET
   					StreetAddress='".$_POST['inputStreetAdress']."',
   					billingAddress='".$_POST['inputBillingAddress']."',
   					DOB='".$_POST['inputDateOfBirth']."',
   					phone='".$_POST['inputphone']."',
   					email='".$_POST['inputEmail']."',
   					password='".$_POST['inputpassword']."'

                  WHERE Pname='".$_POST['inputName']."'
                  "; 


//if successful return to products page. 
if(mysql_query($sql_update_people) && mysql_query($sql_update_employee)) 
{ 
      header("Location: http://".$_SERVER['HTTP_HOST']."?action=employees");

//else print error
} else {

   $err = mysql_errno();
   $msg = mysql_error(); 
   if($err == 1062)
   {
      echo "<p>Employee $_POST[inputName] already exists!</p>"; 
   } else {
      echo "<p>MySQL error code $err </p>"; 
     echo $_POST['number'];

   }
}
?>


