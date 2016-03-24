<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8" />
<title>Demo</title>
<link rel="stylesheet" href="../css/demo.css" type="text/css" />
</head>
<body>

<?php
$ar = array('apple', 'orange', 1, false, null, true, 3 + 5);

// can convert array to json string here
$json = json_encode($ar);
//echo $json;
?>

<script type="text/javascript">
// can use json_encode here to pass $ar to JavaScript array
var ar = <?php echo json_encode($ar) ?>;

// access 4th element in array
//alert( ar[3] ); // false
</script>


<h1>Pass Numerically Indexed PHP Array to JSON and JavaScript with json_encode</h1>

<p>To see the PHP, open this file in an editor. To see the resulting JavaScript, view the source code of this page using browser menu commands.</p>


<p class="end"><a href="../">Back to Index</a></p>

</body>
</html>