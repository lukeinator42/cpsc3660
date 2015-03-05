<?php
  
          require_once(ROOT.'/db/connect.php'); 

          $sql_query = "SELECT * from PRODUCT";

          $result = mysql_query($sql_query);

?>


<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
  <h1 class="page-header">Products</h1>


  <h2 class="sub-header">Current Products</h2>
  <div class="table-responsive">
    <table class="table table-striped">
      <thead>
        <tr>
          <th>Product #</th>
          <th>Name</th>
          <th>UPC</th>
          <th>Stock</th>
          <th>Unit</th>
          <th>Price</th>
          <th>Description</th>
          <th>Category</th>
        </tr>
      </thead>
      <tbody>
        <?php
          if (!$result) {
            echo "DB Error, could not list tables. ";
            echo 'MySQL Error: ' . mysql_error();
            exit;
          }

          while ($row = mysql_fetch_row($result)) {
            echo "<tr>
                  <td>".str_pad($row[0], 6, "0", STR_PAD_LEFT)."</td>
                  <td>{$row[1]}</td>
                  <td>{$row[2]}</td>
                  <td>{$row[3]}</td>
                  <td>{$row[4]}</td>
                  <td>$".($row[5]/100).".".str_pad(($row[5]%100), 2, "0")."</td>
                  <td>{$row[6]}</td>
                  <td>{$row[7]}</td>
                  <td><a href=\"?action=edit_product&number={$row[0]}\" 
                        class=\"btn btn-primary\" role=\"button\">Edit</a></td>

                  <td><a href=\"scripts/php/delete_product.php?number={$row[0]}\" 
                        class=\"btn btn-danger\" role=\"button\" 
                        onclick=\"return confirm('Delete Product?')\">Delete</a></td>
                  </tr>";
          }
        ?>
      </tbody>
    </table>
  </div>
  
  <h2 class="sub-header">Add a Product</h2>
  
  <form class="col-xs-5" action="scripts/php/insert_product.php" method="post">

    <div class="form-group">
        <input type="text" class="form-control" id="inputName" name="inputName" placeholder="Name">
    </div>

    <div class="form-group">
        <input type="text" class="form-control" id="inputUPC" name="inputUPC" placeholder="UPC">
    </div>

    <div class="form-group">
        <input type="text" class="form-control" id="inputStock" name="inputStock" placeholder="Stock">
    </div>

    <div class="form-group">
        <input type="text" class="form-control" id="inputUnit" name="inputUnit" placeholder="Unit">
    </div>

    <div class="form-group">
        <input type="text" class="form-control" id="inputPrice" name="inputPrice" placeholder="Price">
    </div>

    <div class="form-group">
        <input type="text" class="form-control" id="inputDescription" name="inputDescription" 
                                                                            placeholder="Description">
    </div>

    <div class="form-group">
        <input type="text" class="form-control" id="inputCategory" name="inputCategory" 
                                                                    placeholder="Category">
    </div>

    <button type="submit" class="btn btn-primary">Add Product</button>
</form>

</div>

