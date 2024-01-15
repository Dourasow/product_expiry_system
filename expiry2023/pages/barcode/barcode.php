<html>
<head>
<style>
p.inline {display: inline-block;}
span { font-size: 13px;}
</style>
<style type="text/css" media="print">
    @page 
    {
        size: auto;   /* auto is the initial value */
        margin: 0mm;  /* this affects the margin in the printer settings */

    }
</style>
</head>
<body onload="window.print();">
	<div style="margin-left: 5%">
		<?php
		if (isset($_POST['send'])) {
		include 'barcode128.php';
		$product_id = $_POST['pid'];
		$price = $_POST['price'];
		$qty=1;

		for($i=1;$i<=$qty;$i++){
			echo "<p class='inline'>".bar128(stripcslashes($_POST['pid']))."N"." ".number_format($_POST['price'])."</p>&nbsp&nbsp&nbsp&nbsp";
		}
}
		?>
	</div>
	<script type="text/javascript">
  function PrintPage() {
    window.print();
    document.location.href = "../product.php";
  }
  document.loaded = function(){
    
  }
  window.addEventListener('DOMContentLoaded', (event) => {
      PrintPage()
    setTimeout(function(){ window.close() },750)
  });
</script>
</body>
</html>