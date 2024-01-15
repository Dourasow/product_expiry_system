<div class="row show-grid">
            <!-- Customer ROW -->
            <div class="col-md-3">
            <!-- Customer record -->
            <div class="col-md-12 mb-3">
              <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-0">
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Customers</div>
                      <div class="h6 mb-0 font-weight-bold text-gray-800">
                        <?php 
                        $query = "SELECT COUNT(*) FROM customer";
                        $result = mysqli_query($db, $query) or die(mysqli_error($db));
                        while ($row = mysqli_fetch_array($result)) {
                            echo "$row[0]";
                          }
                        ?> Record(s)
                      </div>
                    </div>
                      <div class="col-auto">
                        <i class="fas fa-users fa-2x text-gray-300"></i>
                      </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Supplier record -->
            <div class="col-md-12 mb-3">
              <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-0">
                      <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Supplier</div>
                      <div class="h6 mb-0 font-weight-bold text-gray-800">
                        <?php 
                        $query = "SELECT COUNT(*) FROM supplier";
                        $result = mysqli_query($db, $query) or die(mysqli_error($db));
                        while ($row = mysqli_fetch_array($result)) {
                            echo "$row[0]";
                          }
                        ?> Record(s)
                      </div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-users fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

          </div>
            <!-- Employee ROW -->
          <div class="col-md-3">
            <!-- Employee record -->
            <div class="col-md-12 mb-3">
              <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-0">
                      <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Employees</div>
                      <div class="h6 mb-0 font-weight-bold text-gray-800">
                        <?php 
                        $query = "SELECT COUNT(*) FROM employee";
                        $result = mysqli_query($db, $query) or die(mysqli_error($db));
                        while ($row = mysqli_fetch_array($result)) {
                            echo "$row[0]";
                          }
                        ?> Record(s)
                      </div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-users fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>


            <!-- User record -->
            <div class="col-md-12 mb-3">
              <div class="card border-left-danger shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-0">
                      <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">Registered Account</div>
                      <div class="h6 mb-0 font-weight-bold text-gray-800">
                        <?php 
                        $query = "SELECT COUNT(*) FROM users WHERE TYPE_ID=2";
                        $result = mysqli_query($db, $query) or die(mysqli_error($db));
                        while ($row = mysqli_fetch_array($result)) {
                            echo "$row[0]";
                          }
                        ?> Record(s)
                      </div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-user fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

          </div>
          <!-- PRODUCTS ROW -->
          <div class="col-md-3">
            <!-- Product record -->
            <div class="col-md-12 mb-3">
              <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">

                    <div class="col mr-0">
                      <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Products</div>
                      <div class="row no-gutters align-items-center">
                        <div class="col-auto">
                          <div class="h6 mb-0 mr-3 font-weight-bold text-gray-800">
                          <?php 
                          $query = "SELECT COUNT(*) FROM products_tbl where status=1";
                          $result = mysqli_query($db, $query) or die(mysqli_error($db));
                          while ($row = mysqli_fetch_array($result)) {
                              echo "$row[0]";
                            }
                          ?> Item(s)
                          </div>
                        </div>
                      </div>
                    </div>



                    <div class="col-auto">
                      <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                    </div>



                  </div>

                </div>

              </div>

            </div>

            <div class="col-md-12 mb-3">
              <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-0">
                      <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Expiring Soon</div>
                      <div class="h6 mb-0 font-weight-bold text-gray-800">
                        <?php 
                        $query = "SELECT COUNT(*) FROM product where DATE_STOCK_IN between '$tdate' and '$newdates' and STATUS=1 group by NAME";
                        $result = mysqli_query($db, $query) or die(mysqli_error($db));
                        while ($row = mysqli_fetch_array($result)) {
                            echo "$row[0]";
                          }
                        ?> Item(s)
                      </div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-users fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div></div>

            



 <!-- User record -->

 
         


            
 
            

            
          <!-- RECENT PRODUCTS -->
                <div class="col-lg-3">
                    <div class="card shadow h-100">
                      <div class="card-body">
                       

                          <div class="col-auto">
                            <i class="fa fa-th-list fa-fw"></i> Expiring in 60 Days
                          </div><br>

                        
                        
                        <!-- <div class="col-auto">
                          <div class="h6 mb-0 mr-0 text-gray-800"> -->
                            <style type="text/css">
                              .col{
                                color: white;
                              }

                            </style>
                        <!-- /.panel-heading -->
                        
                        <div class="panel-body">
                            <div class="list-group">
                              <?php 
                              $tdate =date('Y-m-d');
                              $aged=60;
                                            $exdate = date('Y-m-d');
$newdate = strtotime ( $aged.' day' , strtotime ( $exdate ) ) ;
$newdates = date ( 'Y-m-d' , $newdate );

                                $sqli = "SELECT* FROM product WHERE EXPIRY between '$tdate' and '$newdates' AND STATUS=1  group by NAME";



                                                               $result = mysqli_query($db, $sqli) or die(mysqli_error($db));
                                while ($row = mysqli_fetch_array($result)) {
                                  
                                   
                                   $n=$row['NAME'];
                                   

                                   $sqli2 = "SELECT*, sum(QTY_STOCK) as qty FROM product WHERE NAME='$n' AND STATUS=1  group by NAME";



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
                                                border-radius: 15px;
                                                color: white;

                                              }

                                              .mybtn{
                                                border-radius: 15px;
                                                background-color: white;
                                                border: 1px solid brown;
                                                color: brown;
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
                            </div>
                            <!-- /.list-group -->
                            <a href="expiring.php" class="btn mybtn btn-block">View More</a><br><hr><hr>

                              <div class="col-auto">
                            <i class="fa fa-th-list fa-fw"></i> To be Restocked
                          </div><br>

                           <?php
                           $querycc = 'SELECT PRODUCT_ID, PRODUCT_CODE,STATUS, NAME, SUM(`QTY_STOCK`) AS "QTY_STOCK",  DATE_STOCK_IN,EXPIRY FROM product WHERE STATUS=1 GROUP BY PRODUCT_CODE HAVING SUM(QTY_STOCK) <=5 LIMIT 5';



                                $resultcc = mysqli_query($db, $querycc) or die(mysqli_error($db));
                                while ($row = mysqli_fetch_array($resultcc)) {

                                  $namep=$row['NAME'];
                                  $qtyp =$row['QTY_STOCK'];
                                  
                                  ?>
                            <table class="table bg-success tbl ">
                       
              

              <tr>
                <td style="color: white;"><?php echo $namep ?></td>
              <td style="color: white;"><?php echo $qtyp ?></td>
                
              </tr>

            </table>
            <?php
              }
              ?>
              <a href="restock.php" class="btn mybtn btn-block">View More</a><br>
                        </div>
                        <!-- /.panel-body -->
                    </div></div></div><!-- </div></div> -->
          

          </div>