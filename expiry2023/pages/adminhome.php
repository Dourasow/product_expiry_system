<div id="wrapper">
            
           <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                         <?php
              $query15 = "(SELECT*  from company_tbl WHERE comp_id=1)
              ";

              $result15 = mysqli_query($db, $query15) or die (mysqli_error($db));

              if (mysqli_num_rows($result15) > 0) {
                while ($row =$result15->fetch_assoc() ) {

                $coy=$row['comp_name'];
                  }} ?>
                        <h6 class="h3 mb-0 text-gray-800">Dashboard: <?php echo $coy ?> </h6>
                        <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-dark shadow-sm"><i
                                class="fas fa-calendar fa-sm text-white-50"></i> Date: <?php echo date('d-M-Y'); ?></a>
                    </div>

                    <!-- Content Row -->
                    <div class="row">

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div style="background-color: #C3E0E5" class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                Total Products</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo number_format($items) ?></div>
                                        </div>
                                        <div class="col-auto">
                                            <a href="product.php"><i class="fas fas fa-clipboard-list fa-2x text-gray-300"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div style="background-color: #C3E0E5" class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                Expiring in 30 Days</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo number_format($item30a+$item30b+$item30c) ?></div>
                                        </div>
                                        <div class="col-auto">
                                            <a href="expiring.php"><i class="fas fas fa-clipboard-list fa-2x text-gray-300"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                         <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div style="background-color: #C3E0E5" class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                Expiring in 60 Days</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo number_format($item60a+$item60b+$item60c) ?></div>
                                        </div>
                                        <div class="col-auto">
                                             <a href="expiring60.php"><i class="fas fas fa-clipboard-list fa-2x text-gray-300"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-3 col-md-6 mb-4">
                            <div style="background-color: #C3E0E5" class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                Expiring in 90 Days</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo number_format($item90a+$item90b+$item90c) ?></div>
                                        </div>
                                        <div class="col-auto">
                                            <a href="expiring90.php"><i class="fas fas fa-clipboard-list fa-2x text-gray-300"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Earnings (Monthly) Card Example -->
                        

                        <!-- Pending Requests Card Example -->
                        

                            <!-- Earnings (Monthly) Card Example -->
                       


                       

                       
                                            
                                        
                                        




                    </div>
                    <!-- Content Row -->

                    <div class="row">

                        <!-- Area Chart -->
                        <div class="col-xl-8 col-lg-7">
                            <div class="card shadow mb-4">
                                <!-- Card Header - Dropdown -->
                                <div
                                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">Scan a Product to View Expiry</h6>

                                            <div class="card shadow mb-4">
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0"> 
               <thead>
                   <tr>
                    <th>SN</th>
                     <th>Product Code</th>
                     <th>Name</th>
                     <th>Expiry Date (Batch 1)</th>
                     <th>Expiry Date (Batch 2)</th>
                     <th>Expiry Date (Batch 3)</th>
                     <th>Category</th>
                     <th>UPC</th>
                     <th>Action</th>
                   </tr>
               </thead>
          <tbody>

<?php
      $sn=1;                  
    $query = 'SELECT* FROM products_tbl inner join category on products_tbl.cat=category.CATEGORY_ID where products_tbl.status=1 order by p_id desc  ';
        $result = mysqli_query($db, $query) or die (mysqli_error($db));
      
            while ($row = mysqli_fetch_assoc($result)) {
                                 
                echo '<tr>';
                echo '<td>'. $sn++ .'</td>';
                echo '<td>'. $row['pcode'].'</td>';
                echo '<td>'. $row['name'].'</td>';
                echo '<td>'. $row['exp1'].'</td>';
                echo '<td>'. $row['exp2'].'</td>';
                echo '<td>'. $row['exp3'].'</td>';
                echo '<td>'. $row['CNAME'].'</td>';
                echo '<td>'. $row['bcode'].'</td>';
                      echo '<td align="right"> <div class="btn-group">
                          <form method="POST" action="barcode/barcode.php">
                          <input type="hidden" name="pid" value='.$row['pcode'].'>
                          <input type="hidden" name="price" value='.$row['price'].'>
                      <input type="submit" value="Print UPC" name="send" class="btn btn-warning bg-gradient-" >
                          </form>


                              <a type="button" class="btn btn-primary bg-gradient-primary" href="pro_searchfrm.php?action=edit & id='.$row['p_id'] . '"><i class="fas fa-fw fa-list-alt"></i> Details</a>
                            <div class="btn-group">
                              <a type="button" class="btn btn-primary bg-gradient-primary dropdown no-arrow" data-toggle="dropdown" style="color:white;">
                              ... <span class="caret"></span></a>
                            <ul class="dropdown-menu text-center" role="menu">
                                

                                <li>
                                  <a type="button" class="btn btn-danger bg-gradient-danger btn-block" style="border-radius: 0px;" href="delete.php?pcode='.$row['pcode']. '" onClick="return confirm("Do You want to delete product?")" >
                                    <i class="fas fa-fw fa-delete"></i> Delete
                                  </a>
                                </li>
                            </ul>
                            </div>
                          </div> </td>';
                echo '</tr> ';
                        }
?> 
                                    
                                </tbody>
                            </table>
                        </div>
                    </div>
                  </div>
                                     
                                    

                                </div>
                                <!-- Card Body -->
      


                                    </div>
                                </div>
                            
                        

                        <!-- Pie Chart -->
                        <div class="col-xl-4 col-lg-5">
                            <div class="card shadow mb-4">
                                <!-- Card Header - Dropdown -->
                                <div
                                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">Items Expiring Soon</h6></div>
                                    
                                <!-- Card Body -->
                                <div class="card-body">
                                   

<?php    



     

 $tdate =date('Y-m-d');
                              $aged=60;
                                            $exdate = date('Y-m-d');
$newdate = strtotime ( $aged.' day' , strtotime ( $exdate ) ) ;
$newdates = date ( 'Y-m-d' , $newdate );

                                $sqli = "SELECT* FROM product WHERE EXPIRY between '$tdate' and '$newdates' and type='1' and STATUS=1  group by NAME";



                                                               $result = mysqli_query($db, $sqli) or die(mysqli_error($db));
                                while ($row = mysqli_fetch_array($result)) {
                                  
                                   
                                   $n=$row['NAME'];
                                   

                                   $sqli2 = "SELECT*, sum(QTY_STOCK) as qty FROM product WHERE NAME='$n' and type='1' and STATUS=1  group by NAME";



                                                               $result = mysqli_query($db, $sqli2) or die(mysqli_error($db));
                                while ($row = mysqli_fetch_array($result)) {
                                  
                                   
                                   $qty=$row['qty'];
                                   



                                $query = "SELECT NAME, EXPIRY, QTY_STOCK FROM product WHERE EXPIRY between '$tdate' and '$newdates' and STATUS=1 group by NAME having $qty>0 order by PRODUCT_ID DESC LIMIT 5";



                                                               $result = mysqli_query($db, $query) or die(mysqli_error($db));
                                while ($row = mysqli_fetch_array($result)) {
                                  $namepx=$row['NAME'];
                                   $eppx=$row['EXPIRY'];
                                   
                                            ?>

                                            
                                            <style type="text/css">
                                              .tbl{
                                                height: 5px;
                                                font-size: 10px;
                                                
                                                color: white;

                                              }

                                              .mybtn{
                                                border-radius: 15px;
                                                background-color: white;
                                                border: 1px solid #274472;
                                                color: #274472;
                                              }
                                            </style>
                                              <table class="table bg-danger tbl ">
                       
              

              <tr >
                <td class="text-white"><?php echo  $namepx ?></td>
              <td class="text-white"><?php echo $eppx ?></td>
                
              </tr>

            </table>
            <?php
              }}}
              ?>

                                    
                                 <a href="expiring.php" class="btn mybtn btn-block">View More</a><br><hr>
                            </table>
                        </div>


                       
                                </div>
                            </div>
                        </div>
                    </div>

                    
                <!-- /.container-fluid -->

            </div>