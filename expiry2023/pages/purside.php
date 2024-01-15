<!-- SIDE PART NA SUMMARY -->
        <div class="card-body col-md-3">
        <?php   
        if(!empty($_SESSION['pointofsale'])):  
            
             $total = 0;  
        
             foreach($_SESSION['pointofsale'] as $key => $product): 
        ?>  
        <?php  
                  $total = $total + ($product['quantity'] * $product['cost']);
                  $addvat = $total;
                  

             endforeach;

//DROPDOWN FOR CUSTOMER
$sql = "SELECT SUPPLIER_ID, COMPANY_NAME
        FROM supplier
        order by COMPANY_NAME asc";
$res = mysqli_query($db, $sql) or die ("Error SQL: $sql");

$opt = "<select class='form-control'  style='border-radius: 0px;' name='vendor' required>
        <option value='' disabled selected hidden>Select Vendor</option>";
  while ($row = mysqli_fetch_assoc($res)) {
    $opt .= "<option value='".$row['SUPPLIER_ID']."'>".$row['COMPANY_NAME']."</option>";
  }
$opt .= "</select>";
// END OF DROP DOWN
        ?>  
<?php 
          echo "Today's date is : "; 
          $today = date("Y-m-d"); 
          echo $today; 
?> 
          <input type="hidden" name="date" value="<?php echo $today; ?>">
          <div class="form-group row text-left mb-3">
            <div class="col-sm-12 text-primary btn-group">
            <?php echo $opt; ?>
            <a  href="#" data-toggle="modal" data-target="#poscustomerModal" type="button" class="btn btn-primary bg-gradient-primary" style="border-radius: 0px;"><i class="fas fa-fw fa-plus"></i></a>
            </div>

          </div>
          <div class="form-group row mb-2">

           

          </div>
          <div class="form-group row text-left mb-2">

            <div class="col-sm-5 text-primary">
              <h6 class="font-weight-bold py-2">
                Total
              </h6>
            </div>

            <div class="col-sm-7">
              <div class="input-group mb-2">
                <div class="input-group-prepend">
                  <span class="input-group-text">NGN</span>
                </div>
                <input type="text" class="form-control text-right " value="<?php echo number_format($total, 2); ?>" readonly name="total">
              </div>
            </div>
          </div>
<?php endif; ?>       
          <button type="button" class="btn btn-block btn-success" data-toggle="modal" data-target="#posMODAL">SUBMIT</button>

        <!-- Modal -->
        <div class="modal fade" id="posMODAL" tabindex="-1" role="dialog" aria-labelledby="POS" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h6 class="modal-title py-0" id="exampleModalCenterTitle">SUMMARY OF PURCHASE</h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                  <div class="form-group row text-left mb-2">

                    <div class="col-sm-12 text-center">
                      <h3 class="py-0">
                        GRAND TOTAL
                      </h3>
                      <h3 class="font-weight-bold py-3 bg-light">
                        NGN <?php echo number_format($total, 2); ?>
                        <input type="hidden" class="form-control text-right" id="gt"  onblur="findTotal()" value="<?php echo $addvat ?>">
                      </h3>
                    </div>

                  </div>

                   <div class="col-sm-12 mb-2">
                      <div class="input-group mb-2">
                        <div class="input-group-prepend">
                          <!-- <span class="input-group-text">NGN</span> -->
                        </div>
                          <label>Cash</label>
                          <input class="form-control text-right" id="cash"  onkeyup="findTotal()" type="number" name="cash" placeholder="0" name="cash" value="" onkeypress="return isNumberKey(event)">
                            
                            

                          <label>POS</label>
                          <input class="form-control text-right" id="pos"  onkeyup="findTotal()" type="number"  placeholder="0" name="pos" value="" onkeypress="return isNumberKey(event)">

                            <label>Trf</label>
                          <input class="form-control text-right" id="bank"  onkeyup="findTotal()" type="number"  placeholder="0" name="bank" value="" onkeypress="return isNumberKey(event)">

                        
                           
                    </div>
                    <label>Credit</label>
                          <input class="form-control text-right" id="credit" readonly=readonly onkeyup="findTotal()" type="number"  name="credit" min="0" value="<?php echo $addvat ?>">
                     
                  </div>
              </div>
              <div class="modal-footer">
                <button type="submit" class="btn btn-primary btn-block" name="saveonly">SAVE ONLY</button>
                <button type="submit" class="btn btn-primary btn-block" name="saveprint">SAVE AND PRINT</button>
              </div>
            </div>
          </div>
        </div>

        </form>
      </div> <!-- END OF CARD BODY -->

     </div>

     <script type="text/javascript">
function findTotal(){
    var gt = document.getElementById('gt').value;
    var cash = document.getElementById('cash').value;
     var bank = document.getElementById('bank').value;
     var pos = document.getElementById('pos').value;
     
      

     doo=+cash + +bank + +pos;
   credit =  -doo - -gt;
   if((doo>gt)){
       alert("Amount Cannot be Greater Than Grand Total!");

   }
     document.getElementById('credit').value = credit;
}
    </script>

