<?php
  require('session.php');
  confirm_logged_in();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <style type="text/css">
#overlay {
  position: fixed;
  display: none;
  width: 100%;
  height: 100%;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background-color: rgba(0,0,0,0.5);
  z-index: 2;
  cursor: pointer;
}
#text{
  position: absolute;
  top: 50%;
  left: 50%;
  font-size: 50px;
  color: white;
  transform: translate(-50%,-50%);
  -ms-transform: translate(-50%,-50%);
}


      .navblue{
        background-color: #274472;
      }

    </style>
</style>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Product Expiry Management System</title>
  <link rel="icon" href="../img/iconz.ico">

  <!-- Custom fonts for this template-->
  <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="../css/sb-admin-2.min.css" rel="stylesheet">

  <!-- Custom styles for this page -->
  <link href="../vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
</head>

<body id="page-top">
        
          
  <!-- Page Wrapper -->
  <div id="wrapper">




    <!-- Sidebar -->
    <ul class="navbar-nav navblue sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      
      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      <li class="nav-item">
        <a class="nav-link" href="index.php">
          <i class="fas fa-fw fa-home"></i>
          <span>Home</span></a>
      </li>
      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
        <h6 style="color: white" class="nav-item"><b>&nbsp;&nbsp;&nbsp;&nbsp;Products</b></h6>
      <!-- Tables Buttons -->

      <li class="nav-item">
        <a class="nav-link" href="pos.php">
          <i class="fas fa-fw fa-user"></i>
          <span>Scan a Product</span></a>
      </li>
      
      
     
       <hr class="sidebar-divider">

      <h6 style="color: white" class="nav-item"><b>&nbsp;&nbsp;&nbsp;&nbsp;Vendor Management</b></h6>

<li class="nav-item">
        <a class="nav-link" href="supplier.php">
          <i class="fas fa-fw fa-cogs"></i>
          <span>Vendor Management</span></a>
      </li>

<li class="nav-item">
        <a class="nav-link" href="purchase.php">
          <i class="fas fa-fw fa-archive"></i>
          <span>Make a Purchase</span></a>
      </li>

     

      <li class="nav-item">
        <a class="nav-link" href="received.php">
          <i class="fas fa-fw fa-archive"></i>
          <span>Purchase History</span></a>
      </li>

      

      

      <hr class="sidebar-divider">

      <h6 style="color: white" class="nav-item"><b>&nbsp;&nbsp;&nbsp;&nbsp;Inventory Management</b></h6>
            
      <li class="nav-item">
        <a class="nav-link" href="product.php">
          <i class="fas fa-fw fa-table"></i>
          <span>Product Management</span></a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="items.php">
          <i class="fas fa-fw fa-table"></i>
          <span>Item Adjustments</span></a>
      </li>

       <li class="nav-item">
        <a class="nav-link" href="items-summary.php">
          <i class="fas fa-fw fa-archive"></i>
          <span>Master Stock</span></a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="category.php">
          <i class="fas fa-fw fa-table"></i>
          <span>Category Management</span></a>
      </li>
      
      

      
       <hr class="sidebar-divider">

       <hr class="sidebar-divider">

      
      

           <li class="nav-item">
        <a class="nav-link" href="inventory.php">
          <i class="fas fa-fw fa-archive"></i>
          <span>Inventory Report</span></a>
      </li>


      <li class="nav-item">
        <a class="nav-link" href="report-from.php">
          <i class="fas fa-fw fa-users"></i>
          <span>Send Expiry Report</span></a>
      </li>
       <hr class="sidebar-divider">

       <h6 style="color: white" class="nav-item"><b>&nbsp;&nbsp;&nbsp;&nbsp;Settings</b></h6>

       <li class="nav-item">
        <a class="nav-link" href="employee.php">
          <i class="fas fa-fw fa-user"></i>
          <span>Employee</span></a>
      </li>
      
      <li class="nav-item">
        <a class="nav-link" href="user.php">
          <i class="fas fa-fw fa-users"></i>
          <span>Accounts</span></a>
      </li>
      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>
    <!-- End of Sidebar -->
    <?php include_once 'topbar.php'; ?>
