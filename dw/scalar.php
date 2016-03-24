<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8" />
<title>Demo</title>
<link rel="stylesheet" href="css/demo.css" type="text/css" />
<?php
$bool = false;

$num = 3 + 4;

$str = "A string here";
?>
<script type="text/javascript">
var bool = "<?php echo $bool ?>"; // boolean outputs "" if false, "1" if true

// numeric value, both with and without quotes
var num = <?php echo $num ?>;
var str_num = "<?php echo $num ?>";

var str = "<?php echo $str ?>";
</script>
</head>
<body>

<h1>Passing PHP Variables to JavaScript</h1>

<p>This example declares variables in PHP and outputs them in JavaScript.</p>

<p>To see the PHP, open this file in an editor. To see the resulting JavaScript, view the source code of this page using browser menu commands.</p>


<p class="end"><a href=".">Back to Index</a></p>

</body>
</html>