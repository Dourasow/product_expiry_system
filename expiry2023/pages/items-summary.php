<?php
include'../includes/connection.php';
include'../includes/sidebar.php';
$tdate=date('Y-m-d');
  $query = 'SELECT ID, t.TYPE
            FROM users u
            JOIN type t ON t.TYPE_ID=u.TYPE_ID WHERE ID = '.$_SESSION['MEMBER_ID'].'';
  $result = mysqli_query($db, $query) or die (mysqli_error($db));
  
  while ($row = mysqli_fetch_assoc($result)) {
            $Aa = $row['TYPE'];
                   
   if ($Aa=='User' or $Aa=='Manager'){
?>
  <script type="text/javascript">
    //then it will be redirected
    alert("Restricted Page! You will be redirected to POS");
    window.location = "pos.php";
  </script>
<?php
  }           
}
$showdate=date('Y-M-d');
$ondate=date('Y-m-d');
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
              <h4 class="m-2 font-weight-bold text-primary blocky">Stock Control Report for <?php echo $showdate ?> </h4>
              <form class="blocky" method="post" action="items-summary-fill.php">
                      Day <input type="text" onfocus="(this.type='date')" onblur="(this.type='text')"  placeholder="mm/dd/yyyy" name="range1" required>
                      To <input type="text" onfocus="(this.type='date')" onblur="(this.type='text')"  placeholder="mm/dd/yyyy" name="range2" required>
                      <button name="filter">Apply</button>
                  </form>

              <br>
              <a href="emp_sales.php"><button class="btn btn-info">Sales Report by Employee Details</button></a>
                                    <a href="printer.php?date1=<?php echo $ondate?>" class="btn btn-primary text-white" name="reverse">Print Report</a>
              <!-- <h4 class="m-2 font-weight-bold text-primary">Inventory Summary</h4> -->
            </div>
            <h6 style="margin-left: 980px;"><a style="color: white; background-color: green; border-radius: 5px;" href="excel/e300.php">  Export to Excel </a></h6>
            <div class="card-body">
              <style type="text/css">
                .mov{
                  width: 90%;
                  font-size: 12px;
                }
              </style>
              <div class="table-responsive">
                <table class=" mov table table-bordered" id="dataTable" width="100%" cellspacing="0"> 
               <thead>
                   <tr>
                     <th style="width:2px;">S/N</th>
                     <th>Name</th>
                     <!-- <th>Category</th> -->
                     <th>O/St</th>
                     <th>N/st</th>
                     <th>Total</th>
                     <th>Issue</th>
                     <th>Bal</th>
                     
                     
                     <th>Dmg or Expired</th>
                     <th>CL/St.</th>
                   </tr>
               </thead>
          <tbody>

<?php    



    $query = "SELECT*, PRODUCT_ID, PRODUCT_CODE, bcode,products_tbl.price, product.NAME, products_tbl.name, SUM(QTY_STOCK) AS QTY_STOCK, DATE_STOCK_IN,EXPIRY FROM product inner join products_tbl on product.PRODUCT_CODE=products_tbl.pcode inner join category on products_tbl.cat=category.CATEGORY_ID WHERE product.STATUS=1 GROUP BY PRODUCT_CODE  order by QTY_STOCK DESC ";
        $result = mysqli_query($db, $query) or die (mysqli_error($db));

        
      $sn=1;
            while ($row = mysqli_fetch_assoc($result)) {
                $pname=$row['name'];
                $cat=$row['CNAME'];
                $pcode=$row['pcode'];
                $os=$row['QTY_STOCK'];
                // $sdept=$row['dept'];
                // $deptfreq=$row['freq'];
                                           


                           ?>      
                <tr>
                <td><?php echo $sn++?></td>
                <td><?php echo $pname ?></td>
                <!-- <td><?php echo $cat ?></td> -->
                <!-- opening stock -->
                <td><?php 
$query5 = "(SELECT*, SUM(QTY_STOCK) AS zigi  from product WHERE product.STATUS=1 AND tdate='$tdate'AND STATUS=1 AND NATURE='Purchase' AND PRODUCT_CODE='$pcode' )
              ";

              $result5 = mysqli_query($db, $query5) or die (mysqli_error($db));

              if (mysqli_num_rows($result5) > 0) {
                while ($row =$result5->fetch_assoc() ) {

                $ns=$row['zigi'];


$query12 = "(SELECT*, SUM(QTY_STOCK) AS zigi  from product WHERE product.STATUS=1 AND tdate='$tdate'AND STATUS=1 AND NATURE='Sales' AND PRODUCT_CODE='$pcode' )
              ";

              $result12 = mysqli_query($db, $query12) or die (mysqli_error($db));

              if (mysqli_num_rows($result12) > 0) {
                while ($row =$result12->fetch_assoc() ) {

                $out=$row['zigi'];

               
$query120 = "(SELECT*, SUM(QTY_STOCK) AS zigi  from product WHERE product.STATUS=1 AND tdate='$tdate'AND STATUS=1 AND NATURE='Adjustment' AND PRODUCT_CODE='$pcode' )
              ";

              $result120 = mysqli_query($db, $query120) or die (mysqli_error($db));

              if (mysqli_num_rows($result120) > 0) {
                while ($row =$result120->fetch_assoc() ) {

                $adj=$row['zigi'];
                


                 
                
                
                $nuu=($os-$ns)-($out+$adj);

                echo $nuu ?></td>
               
               <!-- new stock -->
               <td>

<?php
$query2 = "(SELECT*, SUM(QTY_STOCK) AS zigi  from product WHERE product.STATUS=1 AND tdate='$tdate'AND STATUS=1 AND NATURE='Purchase' AND PRODUCT_CODE='$pcode' )
              ";

              $result2 = mysqli_query($db, $query2) or die (mysqli_error($db));

              if (mysqli_num_rows($result2) > 0) {
                while ($row =$result2->fetch_assoc() ) {

                $rec=$row['zigi'];
                echo $rec;


                 ?></td>

               </td>


<!-- total module -->


                 <td><?php 


                 $total= $nuu+$rec;
echo $total;
               ?></td>

               <!-- issue out module -->
               
                <td>
<?php
$query12 = "(SELECT*, SUM(QTY_STOCK) AS zigi  from product WHERE product.STATUS=1 AND tdate='$tdate'AND STATUS=1 AND NATURE='Sales' AND PRODUCT_CODE='$pcode' )
              ";

              $result12 = mysqli_query($db, $query12) or die (mysqli_error($db));

              if (mysqli_num_rows($result12) > 0) {
                while ($row =$result12->fetch_assoc() ) {

                $out=$row['zigi'];
                echo $out;


                 ?>

                </td>

<!-- Balance module -->


                <td>
                  <?php
                $bal=$total+$out;
                echo $bal;


                ?>

                </td>


               <!--  Dept Modules -->

               
                              <!--  damages module -->
               <td>
                 
                 <?php
$query12 = "(SELECT*, SUM(QTY_STOCK) AS zigi  from product WHERE product.STATUS=1 AND tdate='$tdate'AND STATUS=1 AND NATURE='Adjustment' AND PRODUCT_CODE='$pcode' )
              ";

              $result12 = mysqli_query($db, $query12) or die (mysqli_error($db));

              if (mysqli_num_rows($result12) > 0) {
                while ($row =$result12->fetch_assoc() ) {

                $bad=$row['zigi'];
                echo $bad;


                 ?>
               </td>

               <!-- closing stock -->
               <td>
                 <?php
                  echo $os;


                 ?>
               </td>
                      
                </tr>
                <?php
                        }
                      }}}}

                    }}}}
                  }}
                }}
?> 
                                    
                                </tbody>
                            </table>
                        </div>
                    </div>
                  </div>

<?php
include'../includes/footer.php';
?>
