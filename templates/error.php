<?php

$error = "errors";

if(isset($_GET[error])) {
	$error = $_GET[error];
}

$return_url = "?action=index";

if(isset($_GET[return_url])) {
	$return_url = $_GET[return_url];
}

?>

<!--Container for table and form-->
<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
  <h1 class="page-header">Error</h1>
 <div class="alert alert-danger" role="alert"><?php echo $error ?></div>

<a href="<?php echo $return_url ?>" class="btn btn-primary" role="button" >Go Back</a>

</div>

