<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8" />
<title>Demo</title>
<link rel="stylesheet" href="../css/demo.css" type="text/css" />
<?php
$bool = false;

$num = 3 + 4;

$str = 'A "string" here';

$long_str = "A longer string
     with a line break";
?>
<script type="text/javascript">
var bool = <?php echo json_encode($bool); ?>;

var num = <?php echo json_encode($num); ?>;

var str = <?php echo json_encode($str); ?>;

var long_str = <?php echo json_encode($long_str); ?>;
</script>
</head>
<body>

<h1>Using PHP's json_encode with Scalar Data</h1>

<p>To see the PHP, open this file in an editor. To see the resulting JavaScript, view the source code of this page using browser menu commands.</p>

<p class="end"><a href="../">Back to Index</a></p>

</body>
</html>