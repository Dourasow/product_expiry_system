<?php
include('../includes/connection.php');
			$a = $_POST['pcode'];
            $b = $_POST['pname'];
            $c = $_POST['qty'];
            $d = $_POST['expiry'];
            $d1 = $_POST['expiry1'];
            $d2 = $_POST['expiry2'];
            $e= 'Adjustment';
            $tdate=date('Y-m-d');
            $idd = $_POST['prid'];
            $price =$_POST['prico'];
            $cost=$_POST['cost'];
            $pname=$_POST['pname'];
            $ooid=$_POST['ooid'];
            $operator=$_POST['BB'];
            $category=$_POST['category'];
            $bcode=$_POST['bcode'];

		
	 			$query = "INSERT INTO  product (PRODUCT_CODE,NAME,QTY_STOCK,EXPIRY,NATURE,tdate,operator) values ('$a','$b','$c','$d','$e','$tdate','$operator')";
					$result = mysqli_query($db, $query) or die(mysqli_error($db));

					$sql="UPDATE products_tbl SET price='$price', cost='$cost', name='$pname', cat='$category',bcode='$bcode',exp1='$d',exp2='$d1',exp3='$d2' where pcode='$ooid'"; 
						$results=mysqli_query($db,$sql);

						if ($query) {
							 echo ("<script LANGUAGE='JavaScript'>
    window.alert('Operation Successful');
    window.location.href='inv_edit.php?action=edit & id=$idd';
    </script>");
						}

?>	
	