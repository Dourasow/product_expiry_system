<?php
include'../includes/connection.php';
include'../includes/sidebar.php';
$repdate=date('d-M-Y');
  $query = 'SELECT ID, t.TYPE
            FROM users u
            JOIN type t ON t.TYPE_ID=u.TYPE_ID WHERE ID = '.$_SESSION['MEMBER_ID'].'';
  $result = mysqli_query($db, $query) or die (mysqli_error($db));
  
  while ($row = mysqli_fetch_assoc($result)) {
            $Aa = $row['TYPE'];
                   
  if ($Aa=='User'){
?>
  <script type="text/javascript">
    //then it will be redirected
    alert("Restricted Page! You will be redirected to POS");
    window.location = "pos.php";
  </script>
<?php
  }           
}
            ?>
            
            <div class="card shadow mb-4">
            <div class="card-header py-3">
              <?php
              $query15 = "(SELECT*  from company_tbl WHERE comp_id=1)
              ";

              $result15 = mysqli_query($db, $query15) or die (mysqli_error($db));

              if (mysqli_num_rows($result15) > 0) {
                while ($row =$result15->fetch_assoc() ) {

                $coy=$row['comp_name'];
                  }}
                ?>
                <h3 class="m-2 font-weight-bold text-primary blocky"><?php echo $coy ?> </h3><br>
              <h4 class="m-2 font-weight-bold text-primary">Inventory Report As at <?php echo $repdate ?></h4>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0"> 
               <thead>
                   <tr>
                    <th>SN</th>
                     <th>Product Code</th>
                     <th>Name</th>
                     <th>QTY</th>
                     <th>PRICE</th>
                     <th>VALUATION</th>

                     
                     
                     
                   </tr>
               </thead>
          <tbody>

<?php    



    $query = "SELECT products_tbl.price AS prico, PRODUCT_ID, PRODUCT_CODE, product.type, product.NAME, SUM(`QTY_STOCK`) AS 'QTY_STOCK',  DATE_STOCK_IN,EXPIRY FROM product INNER JOIN products_tbl ON product.PRODUCT_CODE=products_tbl.pcode WHERE product.STATUS=1 AND product.type='1' GROUP BY PRODUCT_CODE";
        $result = mysqli_query($db, $query) or die (mysqli_error($db));

        $sn=1;
        $sumtotal=0;
      
            while ($row = mysqli_fetch_array($result)) {

              $pcode=$row['PRODUCT_CODE'];
              $pname=$row['NAME'];
              $pqty=$row['QTY_STOCK'];
              $price=$row['prico'];
              $pval=$pqty*$price;
              $total=$pqty*$price;

               $sumtotal +=$total;




              ?>

                  <tr>
                    <td><?php echo $sn++ ?></td>
                    <td><?php echo $pcode ?></td>
                    <td><?php echo $pname ?></td>
                    <td><?php echo $pqty ?></td>
                    <td><?php 
                    if ($price>0) {
                      echo number_format($price);
                    }else{
                      echo "0";
                    }

                     ?></td>
                    <td><?php 
                        if ($pval>0) {
                      echo number_format($pval);
                    }else{
                      echo "0";
                    }
                     ?></td>

                  </tr>


                                 
                <?php
                        }

                        
?> 

<h5>Total Inventory Valuation:NGN <?php echo number_format($sumtotal) ?></h5>
                                    
                                </tbody>
                            </table>
                        </div>
                    </div>
                  </div>

<?php
include'../includes/footer.php';
?>
