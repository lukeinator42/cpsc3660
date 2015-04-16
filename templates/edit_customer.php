<?php
//connect script
require_once(ROOT.'/db/connect.php'); 

//query to populate form for editing
$name = $_GET[customer_name];

$sql_query = 
"SELECT 
Pname,streetAddress, billingAddress, DOB, phone, email, password, creditLimit
 from PEOPLE p, CUSTOMER c
where p.Pname = '$name'";


$result = mysql_query($sql_query);

if (!$result) {
echo "DB Error, could not list tables. ";
echo 'MySQL Error: ' . mysql_error();
exit;
}
//get data for form
$row = mysql_fetch_row($result);

?>

<!--form that submits to update Customer script. The value of each part is initially set to
its current value in database-->
<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
  <h1 class="page-header">Edit Customer Info</h1>
 
  <form class="col-xs-5" action="scripts/php/update_Customer.php" method="post">

    <input type="hidden" name="number" value="<?php echo $row[0]?>" />

    <div class="form-group">
        <label for="inputName">Name</label>
        <input type="text" class="form-control" id="inputName" name="inputName" placeholder="Name" 
         value="<?php echo $row[0]?>">
    </div>

    <div class="form-group">
        <label for="inputStreetAdress">Street Address</label>
        <input type="text" class="form-control" id="inputStreetAdress" name="inputStreetAdress" placeholder="Street_adress"
        value="<?php echo $row[1]?>">
    </div>

    <div class="form-group">
        <label for="inputBillingAddress">Billing Address</label>
        <input type="text" class="form-control" id="inputBillingAddress" name="inputBillingAddress" placeholder="billing_address"
        value="<?php echo $row[2]?>">
    </div>

    <div class="form-group">
        <label for="inputDateOfBirth">Date Of Birth</label>
        <input type="text" class="form-control" id="inputDateOfBirth" name="inputDateOfBirth" placeholder="DD/MM/YY"
        value="<?php echo $row[3]?>">
    </div>

    <div class="form-group">
        <label for="inputphone">Phone Number</label>
        <input type="text" class="form-control" id="inputphone" name="inputphone" placeholder="Phone"
        value="<?php echo $row[4]?>">
    </div>

    <div class="form-group">
        <label for="inputEmail">Email</label>
        <input type="text" class="form-control" id="inputEmail" name="inputEmail" 
                                                                            placeholder="email#hotmail.com"
                                                                            value="<?php echo $row[5]?>">
    </div>

    <div class="form-group">
        <label for="inputpassword">Password</label>
        <input type="text" class="form-control" id="inputpassword" name="inputpassword" 
                                                                    placeholder="password"
                                                                    value="<?php echo $row[6]?>">

    <div class="form-group">
        <label for="inputCredit">Credit Limit</label>
        <input type="text" class="form-control" id="inputCredit" name="inputCredit" 
                                                                    placeholder="Credit Limit"
                                                                    value="<?php echo $row[7]?>">


    </div>
    <a href="?action=customers" class="btn btn-primary" role="button">Go Back</a>
    <button type="submit" class="btn btn-success">Update Customer</button>
</form>

</div>

