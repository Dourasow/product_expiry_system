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
// JOB SELECT OPTION TAB
$sql = "SELECT DISTINCT TYPE, TYPE_ID FROM type";
$result = mysqli_query($db, $sql) or die ("Bad SQL: $sql");

$opt = "<select class='form-control' name='type'>";
  while ($row = mysqli_fetch_assoc($result)) {
    $opt .= "<option value='".$row['TYPE_ID']."'>".$row['TYPE']."</option>";
  }

$opt .= "</select>";

$id=$_GET['id'];

        $query = "SELECT* from expense_tbl WHERE ex_id ='$id'";
        $result = mysqli_query($db, $query) or die(mysqli_error($db));
          while($row = mysqli_fetch_array($result))
          {  
                $zz= $row['ex_id'];
                $a= $row['account'];
                $b=$row['amount'];
                $c=$row['exdesc'];
                $d=$row['date'];
                
                
          }
           

 if (isset($_POST['upexp'])){
                $a= $_POST['account'];
                $b=$_POST['amount'];
                $c=$_POST['exdesc'];
                $d=$_POST['date']; 


   $sql="UPDATE expense_tbl SET 
                  account = '$a',
                   amount = '$b',
                    exdesc = '$c',
                     date = '$d'
                      

                    WHERE ex_id= '$id' "; 
  if (mysqli_query($db,$sql) === TRUE) {

}}

      ?>

  <center><div class="card shadow mb-4 col-xs-12 col-md-8 border-bottom-primary">
            <div class="card-header py-3">
              <h4 class="m-2 font-weight-bold text-primary">Edit Expense</h4>
            </div><a  type="button" class="btn btn-primary bg-gradient-primary btn-block" href="expenses.php?"> <i class="fas fa-flip-horizontal fa-fw fa-share"></i> Back </a>
            <div class="card-body">
      

            <form role="form" method="post" action="">
              <input type="hidden" name="id" value="<?php echo $zz; ?>" />

              <div class="form-group row text-left text-warning">
                <div class="col-sm-3" style="padding-top: 5px;">
                 Account:
                </div>
                <div class="col-sm-9">
                    <select class="form-control" name="account">
                      <option><?php echo $a; ?></option>
                      <option>Cash</option>
                      <option>Bank</option>
                    </select>

                
                </div>
              </div>

              <div class="form-group row text-left text-warning">
                <div class="col-sm-3" style="padding-top: 5px;">
                 Amount:
                </div>
                <div class="col-sm-9">
                  <input class="form-control" placeholder="Amount" name="amount" value="<?php echo $b; ?>" required>
                </div>
              </div>

              <div class="form-group row text-left text-warning">
                <div class="col-sm-3" style="padding-top: 5px;">
                 Description:
                </div>
                <div class="col-sm-9">
                    <textarea class="form-control" name="exdesc"><?php echo $c; ?></textarea>

                                  </div>
              </div>

              <div class="form-group row text-left text-warning">
                <div class="col-sm-3" style="padding-top: 5px;">
                 Date:
                </div>
                <div class="col-sm-9">

                  <input type="text" onfocus="(this.type='date')" onblur="(this.type='text')" class="form-control" placeholder="Date" name="date" value="<?php echo $d; ?>" required>

                 
                </div>
              </div>

              





              
              <hr>

                <button type="submit" class="btn btn-warning btn-block" name="upexp"><i class="fa fa-edit fa-fw"  ></i>Update</button>    
              </form>  
            </div>
          </div></center>

<?php
include'../includes/footer.php';
?>