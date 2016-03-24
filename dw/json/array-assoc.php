<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8" />
<title>Demo</title>
<link rel="stylesheet" href="../css/demo.css" type="text/css" />
</head>
<body>

<?php
$book = array(
    "title" => "JavaScript: The Definitive Guide",
    "author" => "David Flanagan",
    "edition" => 6
);

// can convert array to json string here
$json = json_encode($book, JSON_PRETTY_PRINT);
//echo "<pre>$json</pre>";
?>

<script type="text/javascript">
// can use json_encode here to pass $book to JavaScript array
var book = <?php echo json_encode($book, JSON_PRETTY_PRINT) ?>;

//alert(book.title);
</script>



<h1>Pass Associative PHP Array to JSON and JavaScript with json_encode</h1>

<p>To see the PHP, open this file in an editor. To see the resulting JavaScript, view the source code of this page using browser menu commands.</p>


<p class="end"><a href="../">Back to Index</a></p>


</body>
</html>