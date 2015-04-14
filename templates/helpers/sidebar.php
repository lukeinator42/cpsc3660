
<div class="row">
  <div class="col-sm-3 col-md-2 sidebar">
    <ul class="nav nav-sidebar">
      
      <li <?php if( !isset($_GET['action'])||$_GET['action']==='index' ) echo 'class="active"'?> >
      <a href="?action=index">Overview</a>
      </li>

      <li <?php if( isset($_GET['action'])&&
      ($_GET['action']==='pos'||
        $_GET['action']==='edit_invoice'||
      $_GET['action']==='edit_invoice_product') ) echo 'class="active"'?> >
      <a href="?action=pos">Point-of-Sale</a>
      </li>

      <li <?php if( isset($_GET['action'])&&($_GET['action']==='products'||
                          $_GET['action']==='edit_product') ) echo 'class="active"'?> >
      <a href="?action=products">Products</a>
      </li>

      <li <?php if( isset($_GET['action'])&&($_GET['action']==='invoices' ||
                              $_GET['action']==='view_one_invoice')) echo 'class="active"'?> >
      <a href="?action=invoices">Invoices</a>
      </li>

      <li <?php if( isset($_GET['action'])&&$_GET['action']==='purchase_orders' ) echo 'class="active"'?> >
      <a href="?action=purchase_orders">Purchase Orders</a>
      </li>

      <li <?php if( isset($_GET['action'])&&$_GET['action']==='customers' ) echo 'class="active"'?> >
      <a href="?action=customers">Customers</a>
      </li>

      <li <?php if( isset($_GET['action'])&&$_GET['action']==='employees' ) echo 'class="active"'?> >
      <a href="?action=employees">Employees</a>
      </li>

    </ul>
  </div>
</div>