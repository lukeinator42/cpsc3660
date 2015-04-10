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

//query to get data for products
$query_invoice_products = "SELECT number, name, UPC, measurement, description, price_sold_at, quantity_sold 
from INVOICE_PRODUCTS, PRODUCT where number=productnum and ordernum=$_GET[id]";
$result_invoice_products = mysql_query($query_invoice_products);

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
        <tr><td>Date: <?php echo $row[3]; ?> </td>
        </tr>
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


<div class="clearfix"><br /><br /></div>


    <form class="form-inline" action="scripts/php/insert_invoice_product.php" method="post">

     <input type="hidden" name="id" value="<?php echo $row[0]?>" />

    <div class="form-group">
        <input type="text" class="form-control" id="inputUPC" name="inputUPC" placeholder="UPC/Product Name">
    </div>

    <div class="form-group">
        <input type="text" class="form-control" id="inputQuantity" name="inputQuantity" placeholder="Quantity">
    </div>

    <button type="submit" class="btn btn-success">Add Product</button>
    </form>

<div class="clearfix"><br /></div>

<div class="table-responsive">
    <table class="table table-striped">
      <thead>
        <tr>
          <th>Product #</th>
          <th>Name</th>
          <th>UPC</th>
          <th>Unit</th>
          <th>Description</th>
          <th>Price</th>
          <th>Quantity</th>
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
          while ($row = mysql_fetch_row($result_invoice_products)) {
            echo "<tr>
                  <td>".str_pad($row[0], 6, "0", STR_PAD_LEFT)."</td>
                  <td>{$row[1]}</td>
                  <td>{$row[2]}</td>
                  <td>{$row[3]}</td>
                  <td>{$row[4]}</td>
                  <td>$".number_format((floatval($row[5])/100), 2)."</td>
                  <td>{$row[6]}</td>
                  <td><a href=\"?action=edit_invoice_product&number={$row[0]}&id=$_GET[id]\" 
                        class=\"btn btn-primary\" role=\"button\">Edit</a></td>

                  <td><a href=\"scripts/php/delete_invoice_product.php?number={$row[0]}&id=$_GET[id]\" 
                        class=\"btn btn-danger\" role=\"button\" 
                        onclick=\"return confirm('Delete Product?')\">Delete</a></td>
                  </tr>";
          }
        ?>
      </tbody>
    </table>
  </div>



</div>