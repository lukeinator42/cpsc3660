<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Sales Terminal</title>

   <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">

    <!-- Custom styles for this template -->
    <link href="../css/dashboard.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="../css/login.css" rel="stylesheet">


    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
   <script src="scripts/js/typeahead.min.js"></script>
       <!-- Latest compiled and minified holder -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/holder/2.5.2/holder.min.js"></script>
    <!-- Latest compiled and minified Bootstrap JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="../scripts/js/ie10-viewport-bug-workaround.js"></script>
  </head>

  <body>

    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="?action=index">Sales Terminal</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">
            
          <?php
            if(isset($_GET['action'])&&$_GET['action']!='login') {
            echo "<li><a href=\"?action=logout\">Logout</a></li>";
            }
          ?>
      <li>
      <a href="?action=pos">Point-of-Sale</a>
      </li>

      <li>
      <a href="?action=products">Products</a>
      </li>

      <li>
      <a href="?action=customers">Customers</a>
      </li>

      <li>
      <a href="?action=view_purchase_orders">Purchase Orders</a>
      </li>

          </ul>
 
        </div>
      </div>
    </nav>
     <div class="container-fluid">
     