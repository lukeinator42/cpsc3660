<?php
//database connection
require_once(ROOT.'/db/connect.php'); 

//query to get data for products
$sql_query = "SELECT * from PURCHASE_ORDERS";
$result = mysql_query($sql_query);

?>

<!--Container for table and form-->
<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
  <h1 class="page-header">Purchase Orders</h1>

<!--Table to display purchase orders-->
  <h2 class="sub-header">Current Purchase Order</h2>
  <div class="table-responsive">
    <table class="table table-striped">
      <thead>
        <tr>
          <th>Order #</th>
          <th>Employee</th>
		  <th>Quantity</th>
          <th>Product</th>
          <th>Price</th>
          <th>Purchase Date</th>
		  <th>Payment Date</th>
		  <th>Tax</th>
        </tr>
      </thead>
	  <tbody class="searchable">
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
                  <td>{$row[1]}</td>
                  <td>{$row[2]}</td>
                  <td>{$row[3]}</td>
                  <td>{$row[4]}</td>
                  <td>{$row[5]}</td>
                  <td>{$row[6]}</td>
                  <td>{$row[7]}</td>
                  <td><a href=\"?action=edit_purchase_orders&ordernum={$row[0]}\" 
                        class=\"btn btn-primary\" role=\"button\">Edit</a></td>

                  <td><a href=\"scripts/php/delete_purchase_orders.php?ordernum={$row[0]}\" 
                        class=\"btn btn-danger\" role=\"button\" 
                        onclick=\"return confirm('Delete Product?')\">Delete</a></td>
                  </tr>";
          }
        ?>
		</tbody>
    </table>
  </div>
  
    <!--Form to add purchase order. Submits to insert_purchase_orders script-->
  <h2 class="sub-header">Add a Purchase Order</h2>
  
  <form class="col-xs-5" action="scripts/php/insert_purchase_orders.php" method="post">
  
  <div class="form-group">
		<input type="type" class="form-control" id="inputEmployeeID" name="inputEmployeeID" placeholder="Employee Number">
		</div>
  
  <div class="form-group">
        <input type="text" class="form-control" id="inputProductNum" name="inputProductNum" placeholder="Product Number">
    </div>

    <div class="form-group">
        <input type="text" class="form-control" id="inputNumPurchased" name="inputNumPurchased" placeholder="Number Purchased">
    </div>

    <div class="form-group">
        <input type="text" class="form-control" id="inputPricePurchasedAt" name="inputPricePurchasedAt" placeholder="Price Purchased At">
    </div>

    <div class="form-group">
        <input type="text" class="form-control" id="inputDatePurchased" name="inputDatePurchased" placeholder="Date Purchased">
    </div>

    <div class="form-group">
        <input type="text" class="form-control" id="inputPaymentDate" name="inputPaymentDate" placeholder="Payment Date">
    </div>

    <div class="form-group">
        <input type="text" class="form-control" id="inputTaxAmount" name="TaxAmount" placeholder="Tax Amount">
    </div>


    <button type="submit" class="btn btn-success">Add Purchase Order</button>
</form>

</div>

