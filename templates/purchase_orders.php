

<!--Container for table amd form-->
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
          <th>Product</th>
          <th>Price</th>
          <th>Purchase Date</th>
		  <th>Payment Date</th>
		  <th>Tax</th>
        </tr>
      </thead>
    </table>
  </div>
  
    <!--Form to add purchase order. Submits to insert_purchase_orders script-->
  <h2 class="sub-header">Add a Purchase Order</h2>
  
  <form class="col-xs-5" action="scripts/php/insert_purchase_orders.php" method="post">
  
  <div class="form-group">
        <input type="text" class="form-control" id="inputProductNum" name="inputProductNumber" placeholder="Product Number">
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

