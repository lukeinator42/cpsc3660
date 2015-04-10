<?php
//connect script
require_once(ROOT.'/db/connect.php'); 

//query to populate form for editing
$sql_query = "SELECT * from PRODUCT WHERE number=$_GET[number]";


?>

<!--form that submits to update product script. The value of each part is initially set to
its current value in database-->
<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
  <h1 class="page-header">Point of Sale</h1>
 


</div>

