<?php
require_once('../../db/config.php');
require_once('../../db/connect.php'); 

//insert query. pulls parameters from form data via POST

$sql_insert_person = "insert into PEOPLE(Pname, StreetAddress, billingAddress, DOB, phone, email, password) 
									values ('$_POST[inputName]',
											'$_POST[inputStreetAdress]',
											'$_POST[inputBillingAddress]',
											'$_POST[inputDateOfBirth]',
											'$_POST[inputphone]',
											'$_POST[inputEmail]',
											'$_POST[inputpassword]'
                                 )"; 

$sql_insert_Customer = "insert into CUSTOMER(Cname, creditLimit) 
                           values ('$_POST[inputName]',
                                 $_POST[inputCredit]
                                 );"; 

//if successful return to products page
if(mysql_query($sql_insert_person) && mysql_query($sql_insert_Customer))// && mysql_query($sql_insert_Customer)) 
{ 

      header("Location: http://".$_SERVER['HTTP_HOST']."?action=customers");

//else print error
} else {
   $err = mysql_errno(); 
   if($err == 1062)
   {
      echo "<p>Customer $_POST[inputName] already exists!</p>"; 
   } else {
      echo "<p>MySQL error code $err </p>"; 

   }
}
?>