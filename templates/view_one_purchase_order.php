<?php
//database connection
require_once(ROOT.'/db/connect.php'); 

//query to get data for products
$sql_query = "SELECT ordernum, name, price_sold_at, quantity_sold 
from PO_PRODUCTS, PRODUCT
where ordernum=$_GET[id] and productnum=number";
$result = mysql_query($sql_query);


//query to populate form for editing
$sql_query_invoice = "SELECT * from PURCHASE_ORDER WHERE ordernum=$_GET[id]";
$invoice_result = mysql_query($sql_query_invoice);

if (!$invoice_result) {
echo "DB Error, could not list tables. ";
echo 'MySQL Error: ' . mysql_error();
exit;
}

//get data for form
$invoice_row = mysql_fetch_row($invoice_result);

?>

<!--Container for table and form-->
<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">

  <h1 class="page-header">Purchase Order #<?php echo $_GET[id]?></h1>

<a href="?action=view_purchase_orders" class="btn btn-primary" role="button">Go Back</a>

    <div class="clearfix"><br /></div>

    <div class="table-responsive col-sm-6">
    <table class="table table-striped">
      <thead>
      </thead>
      <tbody class="searchable">
        <!--prints each row of table-->
        <tr><td>Name: <?php echo $invoice_row[1]; ?> </td></tr>
        <tr><td>Tax Amount: <?php echo $invoice_row[2]; ?>%</td></tr>
        <tr><td>Date: <?php echo $invoice_row[3]; ?> </td>
        </tr>
      </tbody>
    </table>
    </div>

    <div class="clearfix"></div>

  <div class="table-responsive">
    <table class="table table-striped">
      <thead>
        <tr>
          <th>Product Name</th>
          <th>Price</th>
          <th>Quantity</th>
          <th>Total</th>
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
          $sum=0;
          while ($row = mysql_fetch_row($result)) {
            echo "
                  <tr>
                  <td>{$row[1]}</td>
                  <td>$".number_format((floatval($row[2])/100), 2)."</td>
                  <td>{$row[3]}</td>
                  <td>$".number_format((floatval($row[2])/100), 2)*$row[3]."</td>
                  </tr>";
                  $sum = $sum + (floatval($row[2])/100)*$row[3];
          }

          $tax = number_format((floatval($invoice_row[2])/100)*$sum, 2);
          
          $grand = number_format($sum+$tax, 2);

          echo ' </tbody>
                </table>
                <hr>
                <div class="clearfix"><br /></div>

                <table class="table table-striped">
                <tbody class="searchable col-sm-4" style="float: right;">
                <tr><td></td><td></td><td></td><th>Grand Total</th></tr>
                <tr><td></td><td></td><td></td><td>$'.$sum.'</td></tr>
                <tr><td></td><td></td><td></td><th>Tax</th></tr>
                <tr><td></td><td></td><td></td><td>$'.$tax.'</td></tr>
                <tr><td></td><td></td><td></td><th>Grand Total + Tax</th></tr>
                <tr><td></td><td></td><td></td><td>$'.$grand.'</td></tr>';
        ?>
      </tbody>
    </table>
  </div>



</div>

