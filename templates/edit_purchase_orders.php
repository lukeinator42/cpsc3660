<?php
//connect script
require_once(ROOT.'/db/connect.php'); 

//query to populate form for editing
$sql_query = "SELECT * from PURCHASE_ORDERS WHERE number=$_GET[number]";
$result = mysql_query($sql_query);

if (!$result) {
echo "DB Error, could not list tables. ";
echo 'MySQL Error: ' . mysql_error();
exit;
}
//get data for form
$row = mysql_fetch_row($result);

?>

<!--form that submits to update purchase_orders script. The value of each part is initially set to
its current value in database-->
<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
  <h1 class="page-header">Edit Purchase Orders</h1>
 
  <form class="col-xs-5" action="scripts/php/update_purchase_orders.php" method="post">

    <input type="hidden" name="number" value="<?php echo $row[0]?>" />

    <div class="form-group">
        <label for="inputEmployeeID">Employee ID</label>
        <input type="text" class="form-control" id="inputEmployeeID" name="inputEmployeeID" placeholder="Name" 
         value="<?php echo $row[1]?>">
    </div>

    <div class="form-group">
        <label for="inputOrderNumb">Order Number</label>
        <input type="text" class="form-control" id="inputOrderNumb" name="inputOrderNumb" placeholder="OrderNum"
        value="<?php echo $row[2]?>">
    </div>

    <div class="form-group">
        <label for="inputNumPurchased">Quantity</label>
        <input type="text" class="form-control" id="inputNumPurchased" name="inputNumPurchased" placeholder="Quantity"
        value="<?php echo $row[3]?>">
    </div>

    <div class="form-group">
        <label for="inputPricePurchasedAt">Price</label>
        <input type="text" class="form-control" id="inputPricePurchasedAt" name="inputPricePurchasedAt" placeholder="Price"
        value="<?php echo number_format((floatval($row[4])/100), 2) ?>">
    </div>

    <div class="form-group">
        <label for="inputDatePurchased">Date</label>
        <input type="text" class="form-control" id="inputDatePurchased" name="inputDatePurchased" placeholder="Date"
        value="<?php echo $row[5]?>">
    </div>

    <div class="form-group">
        <label for="inputPaymentDate">Payment Date</label>
        <input type="text" class="form-control" id="inputPaymentDate" name="inputPaymentDate" placeholder="Description" 
		value="<?php echo $row[6]?>">
    </div>

    <a href="?action=purchase_orders" class="btn btn-primary" role="button">Go Back</a>
    <button type="submit" class="btn btn-success">Update Purchase Orders</button>
</form>

</div>

