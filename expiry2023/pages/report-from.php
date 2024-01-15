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
            <style type="text/css">
      .blocky{
        display: inline-block;
        margin-left: 420px;

      }
    </style>
            <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h4 class="m-2 font-weight-bold text-primary blocky">Send Expiry Report</h4>
              
              <br>
              

                  
                
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <form class="blocky" method="post" action="../includes/cron/30report.php">
                  
                      
                      <button name="enter" class="form-control bg-primary text-white">Send Products Expiring in 30 Days Report</button>
                  </form>

                  <form class="blocky" method="post" action="../includes/cron/60report.php">
                  
                      
                      <button name="enter" class="form-control bg-primary text-white">Send Products Expiring in 60 Days Report</button>
                  </form>


<form class="blocky" method="post" action="../includes/cron/90report.php">
                  
                      
                      <button name="enter" class="form-control bg-primary text-white">Send Products Expiring in 90 Days Report</button>
                  </form>


                        </div>
                    </div>
                  </div>

<?php
include'../includes/footer.php';
?>
