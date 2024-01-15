<?php
include'../includes/connection.php';
include'../includes/sidebar.php';
$idd=$_GET['id'];
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
    window.location = "purchase.php";
  </script>
<?php
  }           
}
 $query = "SELECT *, COMPANY_NAME, PHONE_NUMBER, transaction.DATE AS ddate
              FROM transaction
              INNER JOIN supplier ON transaction.ven_id=supplier.SUPPLIER_ID
              INNER JOIN transaction_details ON transaction_details.TRANS_D_ID=transaction.TRANS_D_ID
              WHERE transaction.TRANS_ID =$idd";
        $result = mysqli_query($db, $query) or die (mysqli_error($db));
        while ($row = mysqli_fetch_assoc($result)) {
          $fname = $row['COMPANY_NAME'];
          // $lname = $row['LAST_NAME'];
          $pn = $row['PHONE_NUMBER'];
          $date = $row['ddate'];
          $tid = $row['TRANS_D_ID'];
          $cash = $row['CASH'];
          $bank = $row['BANK'];
          $pos = $row['POS'];
          $credit = $row['CREDIT'];
          $sub = $row['SUBTOTAL'];
          $less = $row['LESSVAT'];
          $net = $row['NETVAT'];
          $add = $row['ADDVAT'];
          $grand = $row['GRANDTOTAL'];
          $role = $row['EMPLOYEE'];
          $roles = $row['ROLE'];
        }
if (isset($_POST['reverse'])){
    
   $sql= "UPDATE transaction SET 
                  STATUS = 0
                    WHERE TRANS_D_ID='$tid' "; 
if (mysqli_query($db,$sql) === TRUE) {
  $sql= "UPDATE transaction_details SET 
                  STATUS = 0
                    WHERE TRANS_D_ID='$tid' "; 

                    if (mysqli_query($db,$sql) === TRUE) {
  $sql= "DELETE FROM payments_tbl WHERE trans_id='$tid' "; 
  
if (mysqli_query($db,$sql) === TRUE) {
  $sql= "DELETE FROM product WHERE TRANS_D_ID='$tid' "; 
if (mysqli_query($db,$sql) === TRUE) {
  echo ("<script LANGUAGE='JavaScript'>
    window.alert('Purchase Reveresed!');
    window.location.href='transaction.php';
    </script>"); 
  }}
}
}}

 $sql = "SELECT * FROM company_tbl WHERE comp_id =1 ";
$query = mysqli_query($db,$sql);
    if(mysqli_num_rows($query)>0){
        $row = mysqli_fetch_assoc($query);
             $a= $row['comp_name'];
                $b=$row['address'];
                $c=$row['phone'];
                $d=$row['email'];
                $e=$row['website'];
                $f=$row['city'];
                $g=$row['state'];
                $h=$row['tag'];

              }
?>
            
          <div class="card shadow mb-4">
            <div class="card-body">
              <div class="form-group row text-left mb-0">
                <div class="col-sm-9">
                  <h3 class="font-weight-bold">
                    <?php echo $a ?>
                  </h3>

                  <h6 class="font-weight-light">
                    <?php echo $b." ".$f." ".$g ?>
                  </h6>

                  <h6 class="font-weight-light">
                    <?php echo $c ?>
                  </h6>

                   <h6 class="font-weight-light">
                    <?php echo $h ?>
                  </h6>
                </div>
                <div class="col-sm-3 py-1">
                  <h6>
                    Date: <?php echo $date; ?>
                  </h6>
                </div>
              </div>
<hr>
              <div class="form-group row text-left mb-0 py-2">
                <div class="col-sm-4 py-1">
                  <h6 class="font-weight-bold">
                    <?php echo $fname; ?> 
                  </h6>
                  <h6>
                    Phone: <?php echo $pn; ?>
                  </h6>
                </div>
                <div class="col-sm-4 py-1"></div>
                <div class="col-sm-4 py-1">
                  <h6>
                    Transaction #<?php echo $tid; ?>
                  </h6>
                  <h6 class="font-weight-bold">
                    Encoder: <?php echo $role; ?>
                  </h6>
                  <h6>
                    <?php echo $roles; ?>
                  </h6>
                </div>
              </div>
          <table class="table table-bordered" width="100%" cellspacing="0">
            <thead>
              <tr>
                <th>Products</th>
                <th width="8%">Qty</th>
                <th width="20%">Cost</th>
                <th width="20%">Subtotal</th>
              </tr>
            </thead>
            <tbody>
<?php  
           $query = 'SELECT *
                     FROM transaction_details
                     WHERE TRANS_D_ID ='.$tid;
            $result = mysqli_query($db, $query) or die (mysqli_error($db));
            while ($row = mysqli_fetch_assoc($result)) {
              $Sub =  $row['QTY'] * $row['COST'];
                echo '<tr>';
                echo '<td>'. $row['PRODUCTS'].'</td>';
                echo '<td>'. $row['QTY'].'</td>';
                echo '<td>'. $row['COST'].'</td>';
                echo '<td>'. $Sub.'</td>';
                echo '</tr> ';
                        }
?>
            </tbody>
          </table>
            <div class="form-group row text-left mb-0 py-2">
                <div class="col-sm-4 py-1"></div>
                <div class="col-sm-3 py-1"></div>
                <div class="col-sm-4 py-1">
                  
                  <h4>
                    Total: NGN <?php echo number_format($cash+$bank+$pos+$credit, 2); ?>
                  </h4>
                  
                  <table width="100%">
                    <tr>
                      <td class="font-weight-bold">Amount Paid</td>
                      <td class="text-right">NGN <?php echo number_format($cash+$bank+$pos, 2); ?></td>
                    </tr>
                    <tr>
                      <td class="font-weight-bold">Amount Due/Credits</td>
                      <td class="text-right">


                        NGN <?php 
                          if ($credit>0) {
                            echo number_format($credit);
                          }else{
                            echo "0";
                          }

                         ?></td>
                    </tr>
                    
                    
                  </table>
                  <form method="post" action="">
                  <button type="submit" class="btn btn-primary" name="reverse">Reverse Purchase</button>
                      <a href="printo.php?receipt=<?php echo $tid?>" class="btn btn-primary text-white" name="reverse">Reprint Bill</a>
                   </form>
                </div>
                <div class="col-sm-1 py-1"></div>
              </div>
            </div>
          </div>


<?php
include'../includes/footer.php';
?>
