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
              <h4 class="m-2 font-weight-bold text-primary">Products Expiring in 60 Days</h4>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0"> 
               <thead>
                   <tr>
                    <th>SN</th>
                     <th>Product Code</th>
                     <th>Name</th>
                     <th>Expiry Date 1</th>
                                          <th>Expiry Date 1</th>
                     <th>Expiry Date 3</th>
                     <th>Action</th>
                   </tr>
               </thead>
          <tbody>

<?php    



     $tdate =date('Y-m-d');
                              $aged=60;
                                            $exdate = date('Y-m-d');
$newdate = strtotime ( $aged.' day' , strtotime ( $exdate ) ) ;
$newdates = date ( 'Y-m-d' , $newdate );
$sn=1;

 $sqli = "SELECT * FROM products_tbl WHERE exp1 between '$tdate' and '$newdates' or exp2 between '$tdate' and '$newdates' or exp3 between '$tdate' and '$newdates' AND status=1  group by pcode";



                                                               $result = mysqli_query($db, $sqli) or die(mysqli_error($db));
                                
        
      
            while ($row = mysqli_fetch_assoc($result)) {


                                 
                echo '<tr>';
                 echo '<td>'. $sn++ .'</td>';
                echo '<td>'. $row['pcode'].'</td>';
                echo '<td>'. $row['name'].'</td>';
              
               
               
               
               echo '<td>'. $row['exp1'].'</td>';
                echo '<td>'. $row['exp2'].'</td>';
                echo '<td>'. $row['exp3'].'</td>';
                      echo '<td align="right">
                              <a type="button" class="btn btn-primary bg-gradient-primary" href="inv_searchfrm.php?action=edit & id='.$row['pcode'] . '"><i class="fas fa-fw fa-th-list"></i> View</a>
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
