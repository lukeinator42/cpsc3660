<?php
//connect script
require_once(ROOT.'/db/connect.php'); 

//query to populate form for editing
$sql_query = "SELECT * from PO_PRODUCTS 
WHERE productnum=$_GET[number] and ordernum = $_GET[id]";
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
  <h1 class="page-header">Update Purchase Order Product</h1>
 
  <form class="col-xs-5" action="scripts/php/update_po_product.php" method="post">

    <input type="hidden" name="number" value="<?php echo $row[1]?>" />
    <input type="hidden" name="id" value="<?php echo $row[0]?>" />


    <div class="form-group">
        <label for="inputQuantity">Quantity</label>
        <input type="text" class="form-control" id="inputQuantity" name="inputQuantity" placeholder="Quantity"
        value="<?php echo $row[3]?>">
    </div>

    <div class="form-group">
        <label for="inputPrice">Price</label>
        <input type="text" class="form-control" id="inputPrice" name="inputPrice" placeholder="Price"
        value="<?php echo number_format((floatval($row[2])/100), 2) ?>">
    </div>



    <a href="<?php echo "?action=edit_invoice&id=$_GET[id]" ?>" class="btn btn-primary" role="button">Go Back</a>
    <button type="submit" class="btn btn-success">Update Product</button>
</form>

</div>

