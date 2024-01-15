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
            ?>
            
            <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h4 class="m-2 font-weight-bold text-primary">Inventory Received History from <?php echo $range1 ?> to <?php echo $range2 ?></h4>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0"> 
               <thead>
                   <tr>
                     <th>Product Code</th>
                     <th>Name</th>
                     <th>QTY</th>
                     <th>Total</th>
                                          <th>Date Stock In</th>
                     <th>Expiry Date</th>
                     <th>Action</th>
                   </tr>
               </thead>
          <tbody>

<?php    


$tdate=date('Y-m-d');


                                $query = "SELECT*, SUM(QTY_STOCK) AS QTY_STOCK FROM product WHERE NATURE='Purchase' AND tdate between '$range1'AND '$range2' GROUP BY PRODUCT_CODE";
        $result = mysqli_query($db, $query) or die (mysqli_error($db));

        
      
            while ($row = mysqli_fetch_assoc($result)) {


                                 
                echo '<tr>';
                echo '<td>'. $row['PRODUCT_CODE'].'</td>';
                echo '<td>'. $row['NAME'].'</td>';
                echo '<td>'. $row['QTY_STOCK'].'</td>';
               
                echo '<td>'. $row['COST']*$row['QTY_STOCK'].'</td>';
               
               
                echo '<td>'. $row['DATE_STOCK_IN'].'</td>';
                echo '<td>'. $row['EXPIRY'].'</td>';
                      echo '<td align="right">
                              <a type="button" class="btn btn-primary bg-gradient-primary" href="inv_searchfrm.php?action=edit & id='.$row['PRODUCT_CODE'] . '"><i class="fas fa-fw fa-th-list"></i> View</a>
                          </div> </td>';
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
