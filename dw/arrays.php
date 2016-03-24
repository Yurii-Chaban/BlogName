<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8" />
<title>Demo</title>
<link rel="stylesheet" href="css/demo.css" type="text/css" />
<?php
// numerically indexed array
$fruits = array('apple', 'orange', 'mango', 'banana', 'strawberry');

// associative array
$book = array( 
    "title" => "JavaScript: The Definitive Guide",
    "author" => "David Flanagan",
    "edition" => 6
);

// use php implode function to build string for JavaScript array literal (here or in script tags)
$book_keys = '["' . implode('", "', array_keys($book) ) . '"]';
?>
<script type="text/javascript">
var fruits = <?php echo '["' . implode('", "', $fruits) . '"]' ?>;

// output php string here
var book_keys = <?php echo $book_keys; ?>;

var book = <?php echo '["' . implode('", "', $book) . '"]'; ?>;
</script>
</head>
<body>

<h1>Passing Single-Level PHP Arrays to JavaScript</h1>

<p>To see the PHP, open this file in an editor. To see the resulting JavaScript, view the source code of this page using browser menu commands.</p>


<p class="end"><a href=".">Back to Index</a></p>


</body>
</html>