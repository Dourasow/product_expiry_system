<!DOCTYPE html>
<html>
<head>
   <script type="text/javascript" src="assets/js.js"></script>
       <!-- Including our scripting file. -->
       <script type="text/javascript" src="assets/scripts.js"></script>
  <title></title>
</head>
</html>
<?php
include'../includes/connection.php';
include'../includes/topp.php';

$query = 'SELECT ID, USERNAME, t.TYPE
            FROM users u
            JOIN type t ON t.TYPE_ID=u.TYPE_ID WHERE ID = '.$_SESSION['MEMBER_ID'].'';
  $result = mysqli_query($db, $query) or die (mysqli_error($db));
  
  while ($row = mysqli_fetch_assoc($result)) {
            $Aa = $row['TYPE'];
            $ccc = $row['USERNAME'];

            }
// session_start();
$product_ids = array();
//session_destroy();

//check if Add to Cart button has been submitted
if(filter_input(INPUT_POST, 'addpos')){
    if(isset($_SESSION['pointofsale'])){
    //   $qtyi=[$_POST['quantity']];
    //    $rem=[$_POST['rem']];

    //   if ($qtyi>$rem) {
    //     echo ("<script LANGUAGE='JavaScript'>
    // window.alert('No Sufficient Quantity to Sale');
    // window.location='pos.php';
    // </script>");
      
       
                                                      
        
        //keep track of how mnay products are in the shopping cart
        $count = count($_SESSION['pointofsale']);
        
        //create sequantial array for matching array keys to products id's
        $product_ids = array_column($_SESSION['pointofsale'], 'id');

        if (!in_array(filter_input(INPUT_GET, 'id'), $product_ids)){
        $_SESSION['pointofsale'][$count] = array
            (
                'id' => filter_input(INPUT_GET, 'id'),
                'name' => filter_input(INPUT_POST, 'name'),
                'rem' => filter_input(INPUT_POST, 'rem'),
                'price' => filter_input(INPUT_POST, 'price'),
                'cost' => filter_input(INPUT_POST, 'cost'),
                'quantity' => filter_input(INPUT_POST, 'quantity'),
                'squantity' => filter_input(INPUT_POST, 'squantity'),
                'tty' => filter_input(INPUT_POST, 'tty'),
                'code' => filter_input(INPUT_POST, 'code'),
            'cat' => filter_input(INPUT_POST, 'cat')
            );   
        }
        else { //product already exists, increase quantity
            //match array key to id of the product being added to the cart
            for ($i = 0; $i < count($product_ids); $i++){
                if ($product_ids[$i] == filter_input(INPUT_GET, 'id')){
                    //add item quantity to the existing product in the array
                    $_SESSION['pointofsale'][$i]['quantity'] += filter_input(INPUT_POST, 'quantity');
                    // $_SESSION['pointofsale'][$i]['price'] += filter_input(INPUT_POST, 'price');
                }
            }
        }
        
    }
    else { //if shopping cart doesn't exist, create first product with array key 0
        //create array using submitted form data, start from key 0 and fill it with values
        $_SESSION['pointofsale'][0] = array
        (
            'id' => filter_input(INPUT_GET, 'id'),
            'name' => filter_input(INPUT_POST, 'name'),
            'rem' => filter_input(INPUT_POST, 'rem'),
            'price' => filter_input(INPUT_POST, 'price'),
            'cost' => filter_input(INPUT_POST, 'cost'),
            'quantity' => filter_input(INPUT_POST, 'quantity'),
            'squantity' => filter_input(INPUT_POST, 'squantity'),
            'code' => filter_input(INPUT_POST, 'code'),
            'tty' => filter_input(INPUT_POST, 'tty'),
            'cat' => filter_input(INPUT_POST, 'cat')
        );
    }
}

if(filter_input(INPUT_GET, 'action') == 'delete'){
    //loop through all products in the shopping cart until it matches with GET id variable
    foreach($_SESSION['pointofsale'] as $key => $product){
        if ($product['id'] == filter_input(INPUT_GET, 'id')){
            //remove product from the shopping cart when it matches with the GET id
            unset($_SESSION['pointofsale'][$key]);
        }
    }
    //reset session array keys so they match with $product_ids numeric array
    $_SESSION['pointofsale'] = array_values($_SESSION['pointofsale']);
}

//pre_r($_SESSION);

function pre_r($array){
    echo '<pre>';
    print_r($array);
    echo '</pre>';
}
                ?>
                <div class="row">
                <div class="col-lg-12">
                  <div class="card shadow mb-0">
                  <div class="card-header py-2">
                    
                    <input type="text" id="search" placeholder="Search Item(s) or Product Bar Code" class="form-control" onkeydown="enterfun()" />
                    
                        <script>
                    $("input:text:visible:first").focus();</script>
       <br>
       
       <br />
       <!-- Suggestions will be displayed in below div. -->
       <div id="display"></div>
                  
                        <!-- /.panel-heading -->
         <script>
   

  function enterfun() {
    
    var ev = new KeyboardEvent('keydown', {altKey:false,
      bubbles: true,
      cancelBubble: false, 
      cancelable: true,
      charCode: 0,
      code: "Enter",
      composed: true,
      ctrlKey: false,
      currentTarget: null,
      defaultPrevented: true,
      detail: 0,
      eventPhase: 0,
      isComposing: false,
      isTrusted: true,
      key: "Enter",
      keyCode: 13,
      location: 0,
      metaKey: false,
      repeat: false,
      returnValue: false,
      shiftKey: false,
      type: "keydown",
      which: 13});

    txtbox.dispatchEvent(ev);
  }
</script>               

<!-- TAB PANE AREA - ANG UNOD KA TABS ARA SA TABPANE.PHP -->

<!-- END TAB PANE AREA - ANG UNOD KA TABS ARA SA TABPANE.PHP -->

        <div style="clear:both"></div>  
        <br />  
        <div class="card shadow mb-4 col-md-12">
        <div class="card-header py-3 bg-white">
          <h4 class="m-2 font-weight-bold text-primary">Point of Sale</h4>
          
          </div>
        
      <div class="row">    
      <div class="card-body col-md-9">
        <div class="table-responsive">

        <!-- trial form lang   -->
<form role="form" method="post" action="pos_transac.php?action=add" name="myform" onkeyup="calculate()" >
  <input type="hidden" name="employee" value="<?php echo $ccc; ?>">
  <input type="hidden" name="role" value="<?php echo $_SESSION['JOB_TITLE']; ?>">
  
        <table class="table">    
        <tr>  
             <th width="20%">Product Code</th>
             <th width="35%">Product Name</th>  
             <th width="10%">Quantity</th>  
             <th width="15%">Price</th>  
             <th width="15%">Total</th>  
             <th width="5%">Action</th>  
        </tr>  
        <?php 


        if(!empty($_SESSION['pointofsale'])):  
            
             $total = 0;  
        
             foreach($_SESSION['pointofsale'] as $key => $product): 
                $produx=$product['id']; 
        ?>  
        <tr>  
          <td>
            <input type="hidden" name="code[]" value="<?php echo $product['code']; ?>">
            <input type="hidden" name="rem[]" value="<?php echo $product['rem']; ?>">
            <?php echo $product['code']; ?>
            <input type="hidden" name="cat[]" value="<?php echo $product['cat']; ?>">
            <input type="hidden" name="tty[]" value="<?php echo $product['tty']; ?>">
          </td> 
          <td>
            <input type="hidden" name="name[]" value="<?php echo $product['name']; ?>">
            <?php echo $product['name']; ?>

          </td>  

           <td>
            <input type="hidden" name="quantity[]" value="<?php echo $product['quantity']; ?>">
            <input type="hidden" name="squantity[]" value="<?php echo $product['quantity']*-1; ?>">
            <?php 
                    if ($product['quantity']>$product['rem'] and $product['tty']==1) {
                       echo ("<script LANGUAGE='JavaScript'>
    window.alert('Error! Quantity Exceeded!');
    window.location.href='pos.php?action=delete&id=$produx';
    </script>");
                    }else {
                        echo $product['quantity'];
                    }

             ?>
          </td>  

           <td>
            <input type="hidden" name="price[]" value="<?php echo $product['price']; ?>">
            NGN <?php echo number_format($product['price'],2); ?>
          </td> 

          
            <input type="hidden" name="cost[]" value="<?php echo $product['cost']; ?>">
            
           

           <td>
            <input type="hidden" name="total" value="<?php echo $product['quantity'] * $product['price'],2; ?>">

            <input type="hidden" name="totalcost" value="<?php echo $product['quantity'] * $product['cost']; ?>">

            NGN <?php echo number_format($product['quantity'] * $product['price'], 2); ?></td>  
           <td>
               <a href="pos.php?action=delete&id=<?php echo $product['id']; ?>">
                    <div class="btn bg-gradient-danger btn-danger"><i class="fas fa-fw fa-trash"></i></div>
               </a>
           </td> 

           <td>
               <a href="pos.php?action=add&id=<?php echo $product['id']; ?>">
                    <div class="btn bg-gradient-success btn-success"><i class="fas fa-fw fa-plus"></i></div>
               </a>
           </td> 
        </tr>
        <?php  
                  $total = $total + ($product['quantity'] * ($product['price']));
                  $totalcost = $total + ($product['quantity'] * $product['cost']);
             endforeach;  
        ?>


        <?php  
        endif;
        ?>  
        </table> 
      
         </div>
       </div> 

      

<?php

include'../includes/footer.php';
?>