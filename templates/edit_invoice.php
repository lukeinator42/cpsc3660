<?php
//connect script
require_once(ROOT.'/db/connect.php'); 

//query to populate form for editing
$sql_query = "SELECT * from INVOICE WHERE ordernum=$_GET[id]";
$result = mysql_query($sql_query);

if (!$result) {
echo "DB Error, could not list tables. ";
echo 'MySQL Error: ' . mysql_error();
exit;
}
//get data for form
$row = mysql_fetch_row($result);

?>

<!--form that submits to update product script. The value of each part is initially set to
its current value in database-->
<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
  <h1 class="page-header">Point of Sale</h1>

  <div class="table-responsive col-sm-6">
    <table class="table table-striped">
      <thead>
        <tr>
          <th>Invoice Info</th>
        </tr>
      </thead>
      <tbody class="searchable">
        <!--prints each row of table-->
        <tr><td>Id: <?php echo $row[0]; ?> </td></tr>
        <tr><td>Name: <?php echo $row[1]; ?> </td></tr>
        <tr><td>Tax Amount: <?php echo $row[2]; ?>%</td></tr>
        <tr><td>Date: <?php echo $row[3]; ?> </td></tr>
      </tbody>
    </table>
    </div>




<div class="clearfix"></div>
<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
  Edit Invoice Info
</button>


<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Update Invoice Info</h4>
      </div>
      <div class="modal-footer" style="text-align: left;">
          <form class="col-xs-5" action="scripts/php/update_invoice.php" method="post">

            <input type="hidden" name="id" value="<?php echo $row[0]?>" />

            <div class="form-group">
                <label for="inputName">Customer Name</label>
                <input type="text" class="form-control" id="inputName" name="inputName" placeholder="Name" 
                 value="<?php echo $row[1]?>">
            </div>

            <div class="form-group">
                <label for="inputUPC">Tax</label>
                <input type="text" class="form-control" id="inputTax" name="inputTax" placeholder="Tax"
                value="<?php echo $row[2]?>">
            </div>

            <div class="form-group">
                <label for="inputDate">Date</label>
                <input type="text" class="form-control" id="inputDate" name="inputDate" placeholder="Date"
                value="<?php echo $row[3]?>">
            </div>
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-success">Update Invoice</button>
        </form>
      </div>
    </div>
  </div>
</div>

<h2>Items</h2>


</div>