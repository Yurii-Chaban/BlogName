<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8" />
<title>Demo</title>
<link rel="stylesheet" href="../css/demo.css" type="text/css" />
</head>
<body>

<?php
$products = array(
    // product abbreviation, product name, unit price
    // from PHP Order Form examples (http://www.dyn-web.com/php/order_form/)
    array('choc_cake', 'Chocolate Cake', 15),
    array('carrot_cake', 'Carrot Cake', 12),
    array('cheese_cake', 'Cheese Cake', 20),
    array('banana_bread', 'Banana Bread', 14)
);

// can convert array to json string here
$json = json_encode($products, JSON_PRETTY_PRINT);
//echo "<pre>$json</pre>";
?>

<script type="text/javascript">
// can use json_encode here to pass $products to JavaScript array
var products = <?php echo json_encode( $products ) ?>;

// how to access elements in multi-dimensional array in JavaScript
//alert( products[0][1] ); // Chocolate Cake
</script>

    
<h1>Pass Multidimensional Numerically Indexed PHP Array to JSON and JavaScript with json_encode</h1>

<p>To see the PHP, open this file in an editor. To see the resulting JavaScript, view the source code of this page using browser menu commands.</p>


<p class="end"><a href="../">Back to Index</a></p>

</body>
</html>