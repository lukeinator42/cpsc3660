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

$sql_insert_Employee = "insert into EMPLOYEE(Ename, authority, sales) 
                           values ('$_POST[inputName]',
                                 $_POST[inputAuthorityLvl],
                                 $_POST[inputsales]
                                 );"; 

//if successful return to Employees page
if(mysql_query($sql_insert_person) && mysql_query($sql_insert_Employee)) 
{ 

      header("Location: http://".$_SERVER['HTTP_HOST']."?action=employees");

//else print error
} else {
   $err = mysql_errno(); 
   if($err == 1062)
   {
      echo "<p>Employee $_POST[inputName] already exists!</p>"; 
   } else {
      echo "<p>MySQL error code $err </p>"; 

   }
}
?>