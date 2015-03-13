<?php
//connect script
require_once(ROOT.'/db/connect.php'); 

//query to populate form for editing
$sql_query = "SELECT * from PRODUCT WHERE number=$_GET[number]";
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
  <h1 class="page-header">Edit Product</h1>
 
  <form class="col-xs-5" action="scripts/php/update_product.php" method="post">

    <input type="hidden" name="number" value="<?php echo $row[0]?>" />

    <div class="form-group">
        <label for="inputName">Product Name</label>
        <input type="text" class="form-control" id="inputName" name="inputName" placeholder="Name" 
         value="<?php echo $row[1]?>">
    </div>

    <div class="form-group">
        <label for="inputUPC">UPC</label>
        <input type="text" class="form-control" id="inputUPC" name="inputUPC" placeholder="UPC"
        value="<?php echo $row[2]?>">
    </div>

    <div class="form-group">
        <label for="inputStock">Stock</label>
        <input type="text" class="form-control" id="inputStock" name="inputStock" placeholder="Stock"
        value="<?php echo $row[3]?>">
    </div>

    <div class="form-group">
        <label for="inputUnit">Unit</label>
        <input type="text" class="form-control" id="inputUnit" name="inputUnit" placeholder="Unit"
        value="<?php echo $row[4]?>">
    </div>

    <div class="form-group">
        <label for="inputPrice">Price</label>
        <input type="text" class="form-control" id="inputPrice" name="inputPrice" placeholder="Price"
        value="<?php echo number_format((floatval($row[5])/100), 2) ?>">
    </div>

    <div class="form-group">
        <label for="inputDescription">Description</label>
        <input type="text" class="form-control" id="inputDescription" name="inputDescription" 
                                                                            placeholder="Description"
                                                                            value="<?php echo $row[6]?>">
    </div>

    <div class="form-group">
        <label for="inputCategory">Category</label>
        <input type="text" class="form-control" id="inputCategory" name="inputCategory" 
                                                                    placeholder="Category"
                                                                    value="<?php echo $row[7]?>">
    </div>
    <a href="?action=products" class="btn btn-primary" role="button">Go Back</a>
    <button type="submit" class="btn btn-success">Update Product</button>
</form>

</div>

