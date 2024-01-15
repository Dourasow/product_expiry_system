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

        $query = "SELECT* from company_tbl WHERE comp_id =1";
        $result = mysqli_query($db, $query) or die(mysqli_error($db));
          while($row = mysqli_fetch_array($result))
          {  
                $zz= $row['comp_id'];
                $a= $row['comp_name'];
                $b=$row['address'];
                $c=$row['phone'];
                $d=$row['email'];
                $e=$row['website'];
                $f=$row['city'];
                $g=$row['state'];
                $h=$row['tag'];
                $re1=$row['report1'];
                $re2=$row['report2'];
                $re3=$row['report3'];
                $re4=$row['report4'];
                
          }
            $id = $_GET['id'];

 if (isset($_POST['upcomp'])){
                $a= $_POST['comp_name'];
                $b=$_POST['address'];
                $c=$_POST['phone'];
                $d=$_POST['email'];
                $e=$_POST['website'];
                $f=$_POST['city'];
                $g=$_POST['state'];
                $h=$_POST['tag'];
                $re1=$_POST['re1'];
                $re2=$_POST['re2'];
                $re3=$_POST['re3'];
                $re4=$_POST['re4'];    


   $sql="UPDATE company_tbl SET 
                  comp_name = '$a',
                   address = '$b',
                    phone = '$c',
                     email = '$d',
                      website = '$e',
                       city = '$f',
                        state = '$g',
                        tag = '$h',
                        report1 = '$re1',
                        report2 = '$re2',
                        report3 = '$re3',
                        report4 = '$re4'

                    WHERE comp_id= 1 "; 
  if (mysqli_query($db,$sql) === TRUE) {

}}

      ?>

  <center><div class="card shadow mb-4 col-xs-12 col-md-8 border-bottom-primary">
            <div class="card-header py-3">
              <h4 class="m-2 font-weight-bold text-primary">Edit Company Info</h4>
            </div><a  type="button" class="btn btn-primary bg-gradient-primary btn-block" href="user.php?"> <i class="fas fa-flip-horizontal fa-fw fa-share"></i> Back </a>
            <div class="card-body">
      

            <form role="form" method="post" action="">
              <input type="hidden" name="id" value="<?php echo $zz; ?>" />

              <div class="form-group row text-left text-warning">
                <div class="col-sm-3" style="padding-top: 5px;">
                 Company Name:
                </div>
                <div class="col-sm-9">
                  <input class="form-control" placeholder="Company Name" name="comp_name" value="<?php echo $a; ?>" required>
                </div>
              </div>

              <div class="form-group row text-left text-warning">
                <div class="col-sm-3" style="padding-top: 5px;">
                 Address:
                </div>
                <div class="col-sm-9">
                  <input class="form-control" placeholder="Address" name="address" value="<?php echo $b; ?>" required>
                </div>
              </div>

              <div class="form-group row text-left text-warning">
                <div class="col-sm-3" style="padding-top: 5px;">
                 Phone Number:
                </div>
                <div class="col-sm-9">
                  <input class="form-control" placeholder="Phone Number" name="phone" value="<?php echo $c; ?>" required>
                </div>
              </div>

              <div class="form-group row text-left text-warning">
                <div class="col-sm-3" style="padding-top: 5px;">
                 Email Address:
                </div>
                <div class="col-sm-9">
                  <input class="form-control" placeholder="Email Address" name="email" value="<?php echo $d; ?>" required>
                </div>
              </div>

              <div class="form-group row text-left text-warning">
                <div class="col-sm-3" style="padding-top: 5px;">
                 Website:
                </div>
                <div class="col-sm-9">
                  <input class="form-control" placeholder="Website" name="website" value="<?php echo $e; ?>" required>
                </div>
              </div>

              <div class="form-group row text-left text-warning">
                <div class="col-sm-3" style="padding-top: 5px;">
                 City:
                </div>
                <div class="col-sm-9">
                  <input class="form-control" placeholder="City" name="city" value="<?php echo $f; ?>" required>
                </div>
              </div>

              <div class="form-group row text-left text-warning">
                <div class="col-sm-3" style="padding-top: 5px;">
                 State:
                </div>
                <div class="col-sm-9">
                  <input class="form-control" placeholder="State or Province" name="state" value="<?php echo $g; ?>" required>
                </div>
              </div>

               <div class="form-group row text-left text-warning">
                <div class="col-sm-3" style="padding-top: 5px;">
                 Tagline:
                </div>
                <div class="col-sm-9">
                  <input class="form-control" placeholder="Tagline" name="tag" value="<?php echo $h; ?>" required>
                </div>
              </div>

               <div class="form-group row text-left text-warning">
                <div class="col-sm-3" style="padding-top: 5px;">
                 Report Email (1):
                </div>
                <div class="col-sm-9">
                  <input type="email" class="form-control" placeholder="Report Email 1" name="re1" value="<?php echo $re1; ?>" required>
                </div>
              </div>

               <div class="form-group row text-left text-warning">
                <div class="col-sm-3" style="padding-top: 5px;">
                 Report Email (2):
                </div>
                <div class="col-sm-9">
                  <input type="email" class="form-control" placeholder="Report Email 2" name="re2" value="<?php echo $re2; ?>" required>
                </div>
              </div>

               <div class="form-group row text-left text-warning">
                <div class="col-sm-3" style="padding-top: 5px;">
                 Report Email (3):
                </div>
                <div class="col-sm-9">
                  <input type="email" class="form-control" placeholder="Report Email 3" name="re3" value="<?php echo $re3; ?>" required>
                </div>
              </div>

               <div class="form-group row text-left text-warning">
                <div class="col-sm-3" style="padding-top: 5px;">
                 Report Email (4):
                </div>
                <div class="col-sm-9">
                  <input type="email" class="form-control" placeholder="Report Email 4" name="re4" value="<?php echo $re4; ?>" required>
                </div>
              </div>





              
              <hr>

                <button type="submit" class="btn btn-warning btn-block" name="upcomp"><i class="fa fa-edit fa-fw"  ></i>Update</button>    
              </form>  
            </div>
          </div></center>

<?php
include'../includes/footer.php';
?>