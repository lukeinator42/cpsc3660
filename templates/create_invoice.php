<?php
//connect script
require_once(ROOT.'/db/connect.php'); 

//query to populate form for editing
$sql_query = "SELECT Cname from CUSTOMER WHERE Cname='$_POST[inputName]'";

$result = mysql_query($sql_query);

if($result) {
	$row = mysql_fetch_row($result);
	$name = $row[0];

	if(!$name) {
		header("Location: http://".$_SERVER['HTTP_HOST'].
			"?action=error&error=name%20does%20not%20exist&return_url=%3Faction=pos");
	} else {
		$today = getdate();

		$date = $today[mday]."/".$today[mon]."/".$today[year];


		$sql_insert = "INSERT into INVOICE(customerID, tax_amount, date)
				values('$name',
						5,
						'$date')";

		$result = mysql_query($sql_insert);

		$id = mysql_insert_id();

		header("Location: http://".$_SERVER['HTTP_HOST']."?action=edit_invoice&id=$id");

	}
}


?>

<!--form that submits to update product script. The value of each part is initially set to
its current value in database-->
<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
  <h1 class="page-header">Point of Sale</h1>
 
 <?php  echo "<h1 class=\"page-header\">Name: $name</h1>"; ?>

 <h1><?php echo $id ?></h1>


</div>

