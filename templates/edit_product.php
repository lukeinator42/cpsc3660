<?php
  
          require_once(ROOT.'/db/connect.php'); 

          $sql_query = "SELECT * from PRODUCT WHERE number=$_GET[number]";

          $result = mysql_query($sql_query);

          if (!$result) {
            echo "DB Error, could not list tables. ";
            echo 'MySQL Error: ' . mysql_error();
            exit;
          }

          $row = mysql_fetch_row($result);

?>


<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
  <h1 class="page-header">Edit Product</h1>
 
  <form class="col-xs-5" action="scripts/php/update_product.php" method="post">

    <input type="hidden" name="number" value="<?php echo $row[0]?>" />

    <div class="form-group">
        <input type="text" class="form-control" id="inputName" name="inputName" placeholder="Name" 
         value="<?php echo $row[1]?>">
    </div>

    <div class="form-group">
        <input type="text" class="form-control" id="inputUPC" name="inputUPC" placeholder="UPC"
        value="<?php echo $row[2]?>">
    </div>

    <div class="form-group">
        <input type="text" class="form-control" id="inputStock" name="inputStock" placeholder="Stock"
        value="<?php echo $row[3]?>">
    </div>

    <div class="form-group">
        <input type="text" class="form-control" id="inputUnit" name="inputUnit" placeholder="Unit"
        value="<?php echo $row[4]?>">
    </div>

    <div class="form-group">
        <input type="text" class="form-control" id="inputPrice" name="inputPrice" placeholder="Price"
        value="<?php echo $row[5]?>">
    </div>

    <div class="form-group">
        <input type="text" class="form-control" id="inputDescription" name="inputDescription" 
                                                                            placeholder="Description"
                                                                            value="<?php echo $row[6]?>">
    </div>

    <div class="form-group">
        <input type="text" class="form-control" id="inputCategory" name="inputCategory" 
                                                                    placeholder="Category"
                                                                    value="<?php echo $row[7]?>">
    </div>
    <a href="?action=products" class="btn btn-primary" role="button">Go Back</a>
    <button type="submit" class="btn btn-success">Update Product</button>
</form>

</div>

