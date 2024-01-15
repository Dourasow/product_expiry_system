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
       $Query = "SELECT*, sum(QTY_STOCK) as rem  FROM products_tbl inner join product on products_tbl.pcode=product.PRODUCT_CODE WHERE product.STATUS=1 AND products_tbl.status='1'AND products_tbl.name LIKE '%$Name%' or bcode LIKE '$Name%' or pcode LIKE '%$Name'  GROUP BY products_tbl.pcode LIMIT 5 ";
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
                                      <form method="post" action="poso.php?action=add&id=<?php echo $product['p_id']; ?>">
                                          <div class="products">

                                            
                                              <h6 class="text-info"><?php 
                                                    if ($product['type']==2) {
                                                        echo $product['name']."".'(-)';
                                                   }else{

                                              echo $product['name']."".'('.$product['rem'].')';  } ?></h6>
                                              
                                              <h6>NGN <?php echo $product['price']; ?></h6>
                                                <?php
                                                $qtyi=1;


                                                ?>
                                              <input type="number" max="<?php 
if ($product['name']==1) {
    echo $product['rem'];
}

                                               ?>" name="quantity" step="0.01" class="form-control" value="<?php echo $qtyi ?>" onkeypress="return isNumberKey(event)"  />  <input type="hidden" name="squantity" class="form-control" value="1" />  <input type="hidden" name="name" class="form-control" value="<?php echo $product['name']; ?>" />

                                               <input type="hidden" name="tty" class="form-control" value="<?php echo $product['type']; ?>" />

                                              <input type="hidden" name="rem" class="form-control" value="<?php echo $product['rem']; ?>" />


                                              <input type="hidden" name="price" value="<?php echo $product['price']; ?>" class="form-control" />
                                              <input type="hidden" name="cost" value="<?php echo $product['cost']; ?>" class="form-control" />
                                              <input type="hidden" readonly="" min="1" class="form-control" name="qty_stock" value="<?php echo $product['rem']; ?>" />
                                              <input type="hidden" name="cost" value="<?php echo $product['cost']; ?>" />
                                              <input type="hidden" name="cat" value="<?php echo $product['CATEGORY_ID']; ?>" />
  <input type="hidden" name="code" value="<?php echo $product['pcode']; ?>" />
                                              <input type="text" name="price" class="form-control" value="<?php echo $product['price']; ?>" onkeypress="return isNumberKey(event)" />

                                                <?php
                                                if ($product['rem']>0 or $product['type']=='2') {
                                               echo "<input type='submit' name='addpos' style='margin-top:5px;'' class='btn btn-info'
                                                     value='Add' />";

                                                     if ($product['rem']==='1') {
                                                        echo "<input type='hidden' name='quantity' value='1'>";
                                                     }
                                                      

    //                                                 
                                                     }
                                               
                                                  ?>
                                              
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