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
$sql = "SELECT DISTINCT CNAME, CATEGORY_ID FROM category order by CNAME asc";
$result = mysqli_query($db, $sql) or die ("Bad SQL: $sql");

$opt = "<select class='form-control' name='category' required>
        <option value='' disabled selected hidden>Select Category</option>";
  while ($row = mysqli_fetch_assoc($result)) {
    $opt .= "<option value='".$row['CATEGORY_ID']."'>".$row['CNAME']."</option>";
  }

$opt .= "</select>";

  $query = 'SELECT* from category WHERE CATEGORY_ID ='.$_GET['id'];
  $result = mysqli_query($db, $query) or die(mysqli_error($db));
    while($row = mysqli_fetch_array($result))
    {   
      $zz = $row['CATEGORY_ID'];
      $zzz = $row['CNAME'];
      
    }
      $id = $_GET['id'];

if (isset($_POST['catup'])) {
       
      $zz = $_POST['id'];
      $catname = $_POST['catname'];
      
    
        $query = 'UPDATE category set CNAME="'.$catname.'"
          WHERE
          CATEGORY_ID ="'.$id.'"';
          $result = mysqli_query($db, $query) or die(mysqli_error($db));

          if ($result==TRUE) {
            echo "<script type='text/javascript'>
      alert('Youve Update Product Successfully.');
      window.location = 'category.php';
    </script>";
          }
}
?>

  <center><div class="card shadow mb-4 col-xs-12 col-md-8 border-bottom-primary">
            <div class="card-header py-3">
              <h4 class="m-2 font-weight-bold text-primary">Edit Product Category</h4>
            </div>
            <a href="category.php?action=add" type="button" class="btn btn-primary bg-gradient-primary">Back</a>
            <div class="card-body">

            <form role="form" method="post" action="">
              <input type="hidden" name="id" value="<?php echo $zz; ?>" />
              <div class="form-group row text-left text-warning">
                <div class="col-sm-3" style="padding-top: 5px;">
                 Category Name:
                </div>
                <div class="col-sm-9">
                  <input class="form-control" placeholder="Product Code" name="catname" value="<?php echo $zzz; ?>">
                </div>
              </div>
              
              <hr>

                <button type="submit" name="catup" class="btn btn-warning btn-block"><i class="fa fa-edit fa-fw"></i>Update</button>    
              </form>  
            </div>
          </div></center>

<?php
include'../includes/footer.php';
?>