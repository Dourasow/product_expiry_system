<?php
include'../includes/connection.php';

if (isset($_POST['upcomp'])){
                $a= $_POST['comp_name'];
                $b=$_POST['address'];
                $c=$_POST['phone'];
                $d=$_POST['email'];
                $e=$_POST['website'];
                $f=$_POST['city'];
                $g=$_POST['state'];
                $h=$_POST['tag'];    


   $sql="UPDATE company_tbl SET 
                  comp_name = '$a',
                   address = '$b',
                    phone = '$c',
                     email = '$d',
                      website = '$e',
                       city = '$f',
                        state = '$g',
                        tag = '$h'

                    WHERE comp_id= '1' "; 
                   $result = mysqli_query($db, $sql) or die(mysqli_error($db)); 
  
}

?>