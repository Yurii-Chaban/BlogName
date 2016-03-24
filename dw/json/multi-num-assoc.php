<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8" />
<title>Demo</title>
<link rel="stylesheet" href="../css/demo.css" type="text/css" />
</head>
<body>

<?php
$books = array(
    array(
        "title" => "Professional JavaScript",
        "author" => "Nicholas C. Zakas"
    ),
    array(
        "title" => "JavaScript: The Definitive Guide",
        "author" => "David Flanagan"
    ),
    array(
        "title" => "High Performance JavaScript",
        "author" => "Nicholas C. Zakas"
    )
);

// can convert array to json string here
$json = json_encode($books, JSON_PRETTY_PRINT);
//echo "<pre>$json</pre>";
?>


<script type="text/javascript">
// can use json_encode here to pass $books to JavaScript array
var books = <?php echo json_encode($books, JSON_PRETTY_PRINT) ?>;

// how to access 
console.log( books[1].author ); // David Flanagan
</script>


<h1>Pass Multidimensional PHP Array to JSON and JavaScript with json_encode</h1>

<p>The example array is numerically indexed at the outer level with associative sub arrays.</p>

<p>To see the PHP, open this file in an editor. To see the resulting JavaScript, view the source code of this page using browser menu commands.</p>


<p class="end"><a href="../">Back to Index</a></p>

</body>
</html>