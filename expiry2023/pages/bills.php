<?php
include'../includes/connection.php';
include'../includes/sidebar.php';
  $query = 'SELECT ID, t.TYPE
            FROM users u
            JOIN type t ON t.TYPE_ID=u.TYPE_ID WHERE ID = '.$_SESSION['MEMBER_ID'].'';
  $result = mysqli_query($db, $query) or die (mysqli_error($db));
  
  while ($row = mysqli_fetch_assoc($result)) {
            $Aa = $row['TYPE'];
                   
  if ($Aa=='Userxx'){
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
            <style type="text/css">
      .blocky{
        display: inline-block;
        margin-left: 420px;

      }
    </style>
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
              <h4 class="m-2 font-weight-bold text-primary blocky">All Purchase Transactions</h4>
              

              <br>
              

                
                
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0"> 
               <thead>
                   <tr>
                    <th width="5%">SN</th>
                     <th width="5%">Transaction Number</th>
                     <th>Date</th>
                     <th>Vendor</th>
                     <th>No. of Items</th>
                     
                     <th>Amount</th>
                      <th>Bill Status</th>
                     <th width="13%">Cashier</th>
                     <th width="11%">Action</th>
                   </tr>
               </thead>
          <tbody>

<?php    
$tdate=date('Y-m-d');
$sn=1;


    $query = "SELECT *, transaction.DATE AS DATE, SUM(COST*QTY) AS PRICE from transaction inner join transaction_details on transaction.TRANS_D_ID=transaction_details.TRANS_D_ID inner join supplier ON transaction.ven_id=supplier.SUPPLIER_ID WHERE  transaction.STATUS=1 AND transaction.type=2 GROUP BY transaction.TRANS_ID
              ORDER BY transaction.TRANS_ID DESC";
        $result = mysqli_query($db, $query) or die (mysqli_error($db));
      
            while ($row = mysqli_fetch_assoc($result)) {
              $trid=$row['TRANS_D_ID'];
              $cus=$row['COMPANY_NAME'];
              $product=$row['NUMOFITEMS'];
              
              $price=$row['COST'];
              $qty=$row['QTY'];
              $amount=$row['PRICE'];
              $user=$row['EMPLOYEE'];
              $ddate=$row['DATE'];
              $due=$row['CREDIT'];
                          ?>       
               <tr>
                <td> <?php echo $sn++ ?></td>
               <td> <?php echo $row['TRANS_D_ID'] ?></td>
               <td> <?php echo $ddate ?></td>
               <td> 
               <?php echo $cus; ?>

               </td>
                                
               <td> 
               <?php echo $product; ?>

               </td>

               

               <td> 
               <?php echo  number_format($amount); ?>

               </td>

                <td> 
                    <?php
                    if ($due>0) {
                      echo "<p style=color:red;>Balance Due</p>";

                    }else{
                      echo "<p style=color:green;>Paid</p>";
                    }


                    ?>

               </td>
              <td> <?php echo $user ?></td>
                     <td align="right">
                              <a type="button" class="btn btn-primary bg-gradient-primary" href="purchase-view.php?action=edit & id=<?php echo $row['TRANS_ID'] ?>"><i class="fas fa-fw fa-th-list"></i> View</a>
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
