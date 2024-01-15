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

if (isset($_POST['filter'])){
       $range1=$_POST['range1'];
       $range2=$_POST['range2'];
     }



$result = mysqli_query($db, "SELECT SUM(GRANDTOTAL) AS value_sum FROM transaction WHERE transaction.DATE between '$range1' and '$range2' AND STATUS=1 AND type=1"); 
$row = mysqli_fetch_assoc($result); 
$sumtotal = $row['value_sum'];

$result = mysqli_query($db, "SELECT SUM(CASH) AS value_sum FROM transaction WHERE transaction.DATE between '$range1' and '$range2' AND STATUS=1 AND type=1"); 
$row = mysqli_fetch_assoc($result); 
$sumcash = $row['value_sum'];

$result = mysqli_query($db, "SELECT SUM(BANK) AS value_sum FROM transaction WHERE transaction.DATE between '$range1' and '$range2' AND STATUS=1 AND type=1"); 
$row = mysqli_fetch_assoc($result); 
$sumbank = $row['value_sum'];

$result = mysqli_query($db, "SELECT SUM(CREDIT) AS value_sum FROM transaction WHERE transaction.DATE between '$range1' and '$range2' AND STATUS=1 AND type=1"); 
$row = mysqli_fetch_assoc($result); 
$sumcredit = $row['value_sum'];

$result = mysqli_query($db, "SELECT SUM(cash) AS value_sum FROM receipts_tbl WHERE date between '$range1' and '$range2'"); 
$row = mysqli_fetch_assoc($result); 
$sumpayc = $row['value_sum'];

$result = mysqli_query($db, "SELECT SUM(bank) AS value_sum FROM receipts_tbl WHERE date between '$range1' and '$range2'"); 
$row = mysqli_fetch_assoc($result); 
$sumpayb = $row['value_sum'];

$bal=($sumtotal-$sumbank-$sumcredit) + $sumpayc;

            ?>
            
            <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h4 class="m-2 font-weight-bold text-primary">Sales Report by employee from <?php echo $range1 ?> To <?php echo $range2 ?></h4><a href="transaction.php" type="button" class="btn btn-primary bg-gradient-primary btn-block"> <i class="fas fa-flip-horizontal fa-fw fa-share"></i> Back </a><br>

                  <table class="table">
                    <tr>
                      <td class="text-danger">Total Sales: <?php echo number_format($sumtotal)  ?> </td>
                      <td class="text-danger">Total Cash Sales: <?php echo number_format($sumcash)  ?> </td>
                      <td class="text-danger">Total Bank Sales: <?php echo number_format($sumbank)  ?></td>
                      <td class="text-danger">Total Credit Sales: <?php echo number_format($sumcredit)  ?></td>
                      <td class="text-danger">Debt Paid[Bank: <?php echo number_format($sumpayb)  ?>] [Cash: <?php echo number_format($sumpayc)  ?>]</td>
                      <td class="text-danger">Cash Balance: <?php echo number_format($bal)  ?></td>

                    </tr>

                  </table>
                
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0"> 
               <thead>
                   <tr>
                     <th width="70%">Employee Name</th>
                     <th th width="10%">Total Cash</th>
                     <th width="10%">Total Bank</th>
                     <th width="10%">Total Credit</th>
                   </tr>
               </thead>
          <tbody>

<?php    
$tdate=date('Y-m-d');


    $query = "SELECT*, sum(CASH) as sc,sum(BANK) as sb, sum(POS) as sp , sum(CREDIT) as cr from transaction WHERE transaction.DATE between '$range1' and '$range2' and transaction.STATUS=1 AND transaction.type=1
              GROUP BY emp";
        $result = mysqli_query($db, $query) or die (mysqli_error($db));
      
            while ($row = mysqli_fetch_assoc($result)) {
                $emp=$row['emp'];                 
                echo '<tr>';
                echo '<td>'. $emp.'</td>';
                echo '<td>'. number_format($row['sc']) .'</td>';
                echo '<td>'. number_format($row['sb']).'</td>';
                echo '<td>'. number_format($row['sp']).'</td>';
                 echo '<td>'. number_format($row['cr']).'</td>';
                      
                echo '</tr> ';
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
