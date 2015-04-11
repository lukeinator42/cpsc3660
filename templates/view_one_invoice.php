<?php
//database connection
require_once(ROOT.'/db/connect.php'); 

//query to get data for products
$sql_query = "SELECT * from INVOICE";
$result = mysql_query($sql_query);

?>

<!--Container for table and form-->
<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
  <h1 class="page-header">Invoices</h1>

  <div class="table-responsive">
    <table class="table table-striped">
      <thead>
        <tr>
          <th>Order Number</th>
          <th>Customer Name</th>
          <th>Tax Amount</th>
          <th>Date</th>
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
            echo "
                  <tr>
                  <td><a href=\"?view_invoice&id={$row[0]}\">"
                  .str_pad($row[0], 6, "0", STR_PAD_LEFT)."</a></td>
                  <td>{$row[1]}</td>
                  <td>{$row[2]}%</td>
                  <td>{$row[3]}</td>
                  </tr>";
          }
        ?>
      </tbody>
    </table>
  </div>

</div>

