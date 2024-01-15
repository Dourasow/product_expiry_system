<?php
include'../includes/connection.php';
include'../includes/sidebar.php';
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
              <h4 class="m-2 font-weight-bold text-primary">Inventory Summary</h4>
            </div>
            <h6 style="margin-left: 980px;"><a style="color: white; background-color: green; border-radius: 5px;" href="excel/e300.php">  Export to Excel </a></h6>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0"> 
               <thead>
                   <tr>
                     <th>Product Code</th>
                     <th>Name</th>
                     <th>O/H QTY</th>
                     <th>Price</th>
                     <th>Cost</th>
                     <th>UPC</th>
                     <th>Expiry Date</th>
                     <th>Action</th>
                   </tr>
               </thead>
          <tbody>

<?php    



    $query = 'SELECT PRODUCT_ID, PRODUCT_CODE, bcode,product.type,products_tbl.price, products_tbl.cost AS costo, product.NAME, products_tbl.name, SUM(`QTY_STOCK`) AS "QTY_STOCK",  DATE_STOCK_IN,EXPIRY FROM product inner join products_tbl on product.PRODUCT_CODE=products_tbl.pcode WHERE product.STATUS=1 AND products_tbl.status=1 GROUP BY PRODUCT_CODE ';
        $result = mysqli_query($db, $query) or die (mysqli_error($db));

        
      
            while ($row = mysqli_fetch_assoc($result)) {
                $pname=$row['name'];
                $ptype=$row['type'];
                $costo=$row['costo'];
                    ?>
                                 
              <tr>
              <td><?php echo $row['PRODUCT_CODE'] ?></td>
                <td><?php echo $pname ?></td>
                <td><?php 
                  if ($ptype==2) {
                    echo "-";
                  
                  }else{

                echo $row['QTY_STOCK'];
                  
                  } ?>
                </td>
               
                 <td><?php echo $row['price']?></td>
                 <td><?php echo $costo ?></td>
               
               
                <td><?php echo $row['bcode']?></td>
                <td><?php echo $row['EXPIRY']?></td>
                      <td align="right">
                      
                      <?php
                      if ($Aa=='Admin') {
                        
                      
                      echo "<a type='button' class='btn btn-warning bg-gradient-warning' href='inv_edit.php?action=edit & id=".$row['PRODUCT_CODE']. "'><i class='fas fa-fw fa-edit'></i>Adjust</a>";
                    } ?>
                              <a type="button" class="btn btn-primary bg-gradient-primar" href="inv_searchfrm.php?action=edit & id=<?php echo $row['PRODUCT_CODE']  ?>"><i class="fas fa-fw fa-th-list"></i>History</a>
                          </div> </td>
                </tr>
                <?php
                        }
?> 
                                    
                                </tbody>
                            </table>
                        </div>
                    </div>
                  </div>

<?php
include'../includes/footer.php';
?>
