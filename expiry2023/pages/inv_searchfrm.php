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
    
$query2 = 'SELECT NAME FROM product p join category c on p.CATEGORY_ID=c.CATEGORY_ID where PRODUCT_CODE ='.$_GET['id'].' limit 1';
        $result2 = mysqli_query($db, $query2) or die (mysqli_error($db));
?>
            
            <div class="card shadow mb-4">
            <div class="card-header py-3">
              <?php
              $pc=$_GET['id'];
                  $sql="SELECT PRODUCT_CODE, SUM(QTY_STOCK) AS zi FROM product where STATUS=1 AND PRODUCT_CODE='$pc' ";
                    $result=mysqli_query($db,$sql);
                        while ($row=$result->fetch_assoc()) {
                          $qty=$row['zi'];
                        
                 
                }  ?>
                

                   
              <h4 class="m-2 font-weight-bold text-primary">Inventory History for : <?php while ($row = mysqli_fetch_assoc($result2)) { echo $row['NAME']; } ?> (<?php echo $qty ?>)</h4>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0"> 
               <thead>
                   <tr>
                     <th>Product Code</th>
                     <th>Name</th>
                     <th>Activity</th>
                     <th>Quantity</th>
                     <th>Balance</th>
                     <!-- <th>Balance</th> -->
                     
                     <th>Date</th>
                     <th>Expiry</th>
                     <th>Operator</th>
                     
                   </tr>
               </thead>
          <tbody>

<?php   
$id=$_GET['id'];
$query = "SELECT PRODUCT_ID, PRODUCT_CODE, NAME, QTY_STOCK,STATUS,NATURE,tdate, DATE_STOCK_IN,EXPIRY,operator FROM product where product.STATUS=1 AND PRODUCT_CODE ='$id' AND STATUS='1' order by PRODUCT_ID DESC";
        $result = mysqli_query($db, $query) or die (mysqli_error($db));
            while ($row = mysqli_fetch_assoc($result)) {

              $pcode=$row['PRODUCT_CODE'];
              $pname=$row['NAME'];
              $nature=$row['NATURE'];
              $pqty=$row['QTY_STOCK'];
              
              $tdate=$row['tdate'];
              $pid=$row['PRODUCT_ID'];
              $operator=$row['operator'];

              ?>
                <tr>
              <td><?php echo $pcode ?></td>
              <td><?php echo $pname ?></td>
              <td><?php echo $nature ?></td>
              <td><?php echo $pqty ?></td>
              

              
                <td>

<?php
$query2 = "(SELECT*, SUM(QTY_STOCK) AS zigi  from product WHERE product.STATUS=1 AND PRODUCT_ID BETWEEN '1' AND '$pid' AND PRODUCT_CODE='$pcode'  )
              ";

              $result2 = mysqli_query($db, $query2) or die (mysqli_error($db));

              if (mysqli_num_rows($result2) > 0) {
                while ($row =$result2->fetch_assoc() ) {

                $rec=$row['zigi'];
                  $loneqty=$qty-$pqty;

                echo $rec;


                 ?></td>
              
              <td><?php echo $tdate ?></td>


             
                
               <td align="right">
                      
                          </div></td>
                          <td><?php echo $operator ?></td>
               </tr>

               <?php
                        }}}
?> 
                                    
                                </tbody>
                            </table>
                        </div>
                    </div>
                  </div>

<?php
include'../includes/footer.php';
?>
