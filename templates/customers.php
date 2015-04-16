<?php
//database connection
require_once(ROOT.'/db/connect.php'); 
//query to get data for Customers
$sql_query = 
"SELECT 
Pname,streetAddress, billingAddress, DOB, phone, email, password, creditLimit
 from PEOPLE p, CUSTOMER c
where p.Pname = c.Cname";
$result = mysql_query($sql_query);
?>
<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
  <h1 class="page-header">Customers</h1>


  <h2 class="sub-header">Section title</h2>
  <div class="table-responsive">
    <table class="table table-striped">
      <thead>
        <tr>
          <th>Name</th>
          <th>street Address</th>
          <th>Billing Address</th>
          <th>Date of Birth</th>
          <th>Phone #</th>
          <th>Email</th>
          <th> credit limit</th>
        </tr>
      </thead>
      <tbody>
        
                <!--prints each row of table-->
        <?php
          if (!$result) {
            echo "DB Error, could not list tables. ";
            echo 'MySQL Error: ' . mysql_error();
            exit;
          }
          //echos each row of table. 
          //edit button links to edit form.
          //delete button links to delete script 
          while ($row = mysql_fetch_row($result)) {
            echo "<tr>
                  <td>{$row[0]}</td>
                  <td>{$row[1]}</td>
                  <td>{$row[2]}</td>
                  <td>{$row[3]}</td>
                  <td>{$row[4]}</td>
                  <td>{$row[5]}</td>
                  <td>{$row[7]}</td>


         
                  <td><a href=\"?action=edit_customer&customer_name={$row[0]}\" 
                        class=\"btn btn-primary\" role=\"button\">Edit</a></td>

                  <td><a href=\"scripts/php/delete_Customer.php?customer_name={$row[0]}\" 
                        class=\"btn btn-danger\" role=\"button\" 
                        onclick=\"return confirm('Delete Customer?')\">Delete</a></td>
                  </tr>";
          }
        ?>

      </tbody>
    </table>
  </div>
    <h2 class="sub-header">Add a Customer</h2>
  
  <form class="col-xs-5" action="scripts/php/insert_Customer.php" method="post">

    <div class="form-group">
        <input type="text" class="form-control" id="inputName" name="inputName" placeholder="Name">
    </div>

    <div class="form-group">
        <input type="text" class="form-control" id="inputStreetAdress" name="inputStreetAdress" placeholder="Street_adress">
    </div>

    <div class="form-group">
        <input type="text" class="form-control" id="inputBillingAddress" name="inputBillingAddress" placeholder="Billing_Address">
    </div>

    <div class="form-group">
        <input type="text" class="form-control" id="inputDateOfBirth" name="inputDateOfBirth" placeholder="DD/MM/YY">
    </div>

    <div class="form-group">
        <input type="text" class="form-control" id="inputphone" name="inputphone" placeholder="Phone Number">
    </div>

    <div class="form-group">
        <input type="text" class="form-control" id="inputEmail" name="inputEmail" placeholder="Email">
    </div>

    <div class="form-group">
        <input type="text" class="form-control" id="inputpassword" name="inputpassword" placeholder="Password">
    </div>

        <div class="form-group">
        <input type="text" class="form-control" id="inputCredit" name="inputCredit" placeholder="Credit Limit">
    </div>

    <button type="submit" class="btn btn-success">Add Customer</button>
</form>
</div>

