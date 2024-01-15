<style type="text/css">
  
  .block{

    display: inline-block;
  }

</style>
    <?php
    include'../../includes/connection.php';




function RemoveSpecialChar($word)
{
    $res = preg_replace('/[\;\']+/', '', $word);
    return $res;
}

    //Including Database configuration file.
    
    //Getting value of "search" variable from "script.js".
    if (isset($_POST['search'])) {
    //Search box value assigning to $Name variable.
       $Name = RemoveSpecialChar($_POST['search']);
    //Search query.
       $Query = "SELECT*, sum(QTY_STOCK) as rem  FROM products_tbl inner join product on products_tbl.pcode=product.PRODUCT_CODE WHERE product.STATUS=1 AND products_tbl.status='1'AND products_tbl.name LIKE '$Name%' or bcode = '$Name' or pcode='$Name'
         GROUP BY products_tbl.pcode LIMIT 5 ";
    //Query execution
       $ExecQuery = MySQLi_query($db, $Query);
    //Creating unordered list to display result.
       echo '
    <ul>
       ';
       //Fetching result from database.
       while ($product = MySQLi_fetch_array($ExecQuery)) {

           ?>
       <!-- Creating unordered list items.
            Calling javascript function named as "fill" found in "script.js" file.
            By passing fetched result as parameter. -->
       <div class="col-sm-4 col-md-2 block" >
                                      <form method="post" action="pos.php?action=add&id=<?php echo $product['p_id']; ?>">
                                          <div class="products">

                                            
                                              <h5 class="text-info"><?php 
                                                    if ($product['type']==2) {
                                                        echo $product['name']."".'(-)';
                                                   }else{

                                              echo $product['name']."".'('.$product['rem'].')';  } ?></h5>
                                              
                                              <h6>Exp 1: <?php 
                                              $tdate=date('Y-m-d');
                                                    $now = time(); // or your date as well
                                                                                    $your_date = strtotime($product['exp1']);
                                                        $datediff = $now - $your_date;

                                                            $remy= round($datediff / (60 * 60 * 24));

                                                            $your_date2 = strtotime($product['exp2']);
                                                        $datediff2 = $now - $your_date2;

                                                            $remy2= round($datediff2 / (60 * 60 * 24));


                                                            $your_date3 = strtotime($product['exp3']);
                                                        $datediff3 = $now - $your_date3;

                                                            $remy3= round($datediff3 / (60 * 60 * 24));

                                                                $muja=-1;





                                              echo $product['exp1']; ?> <span style="color: red;">(<?php echo $remy*-1 ?> Days Left to Expire!)</span></h6>
                                              <h6>Exp 2: <?php  echo $product['exp2']; ?> <span style="color: red;">(<?php
                                                        if ($remy2*-1>=0) {
                                                            echo $remy2*$muja. "Days Left to Expire!)";

                                                        }else{
                                                            echo "null)</h6>"; 
                                                        } ?>

                                              
                                              <h6>Exp 3: <?php  echo $product['exp3']; ?> <span style="color: red;">(<?php
                                                        if ($remy3*-1>=0) {
                                                            echo $remy3*$muja. "Days Left to Expire!)";

                                                        }else{
                                                            echo "null)"; 
                                                        } ?>

                                              
                                          </div>
                                      </form>
                                  </div>
                                      
                                    </div>
                                </div>
                                            
                                         
                                        <?php
                                        }} 
                                    ?>

                                    </div>
                        </div>
                        </div>
                    </div>
                  </div>