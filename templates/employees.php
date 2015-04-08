



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
          <th>Password</th>
          <th>Authority level</th>
          <th>Sales</th>

        </tr>
      </thead>
      <tbody>
        

      </tbody>
    </table>
  </div>
    <h2 class="sub-header">Add a Customer</h2>
  
  <form class="col-xs-5" action="scripts/php/insert_product.php" method="post">

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
        <input type="text" class="form-control" id="inputDateOfBirth" name="inputDateOfBirth" placeholder="Date of Birth">
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
        <input type="text" class="form-control" id="inputAuthority" name="inputAuthority" placeholder="Authority level">
    </div>

    <div class="form-group">
        <input type="text" class="form-control" id="inputSa" name="inputSa" placeholder="sales">
    </div>

    <button type="submit" class="btn btn-success">Add Customer</button>
</form>
</div>

