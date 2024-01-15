<?php 
include'../includes/connection.php';
if (isset($_GET['CUST_ID'])){
            $id = $_GET['CUST_ID'];
            $nos=0;

            $sql="UPDATE customer SET 
							    status = '$nos'
							   		WHERE CUST_ID='$id'"; 

   if (mysqli_query($db,$sql) === TRUE) {
  
  
   header('Location:customer.php');
}}

if (isset($_GET['EMPLOYEE_ID'])){
            $id = $_GET['EMPLOYEE_ID'];
            $nos=0;

            $sql="UPDATE employee SET 
							    status = '$nos'
							   		WHERE EMPLOYEE_ID='$id'"; 

   if (mysqli_query($db,$sql) === TRUE) {
  
  
   header('Location:employee.php');
}}

if (isset($_GET['pcode'])){
            $id = $_GET['pcode'];
            $nos=0;

            $sql="UPDATE products_tbl SET 
							    status = '$nos'
							   		WHERE pcode='$id'"; 

   if (mysqli_query($db,$sql) === TRUE) {
  
  
   header('Location:product.php');
}}

if (isset($_GET['ex_id'])){
            $id = $_GET['ex_id'];
           

            $sql="DELETE from expense_tbl where ex_id='$id' 
                         "; 

   if (mysqli_query($db,$sql) === TRUE) {
  
  
   header('Location:expenses.php');
}}

if (isset($_GET['SUPPLIER_ID'])){
            $id = $_GET['SUPPLIER_ID'];
            $nos=0;

            $sql="UPDATE supplier SET 
                         STATUS = '$nos'
                              WHERE SUPPLIER_ID='$id'"; 

   if (mysqli_query($db,$sql) === TRUE) {
  
  
   header('Location:supplier.php');
}}

if (isset($_GET['CATEGORY_ID'])){
            $id = $_GET['CATEGORY_ID'];

            $nos=0;

            $sql="UPDATE category SET 
                         STATUS = '$nos'
                              WHERE CATEGORY_ID='$id'"; 

   if (mysqli_query($db,$sql) === TRUE) {
           

           
  
   header('Location:category.php');
}}

?>