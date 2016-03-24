<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8" />
<title>Demo</title>
<link rel="stylesheet" href="../css/demo.css" type="text/css" />
</head>
<body>
    
<h1>A Few json_encode Examples</h1>

<p>To see the PHP that generated the following output, open this file in an editor.</p>

<?php
$ar = array('apple', 'orange', 'banana', 'strawberry');
//echo json_encode($ar);
//echo json_encode($ar, JSON_FORCE_OBJECT);
$json_obj = json_encode($ar, JSON_FORCE_OBJECT | JSON_PRETTY_PRINT);
echo '<pre>' . $json_obj . '</pre>';

$book = array(
    "title" => "JavaScript: The Definitive Guide",
    "author" => "David Flanagan",
    "edition" => 6
);

//echo json_encode($book);
echo '<pre>' . json_encode($book, JSON_PRETTY_PRINT) . '</pre>';


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

echo '<pre>' . json_encode($books, JSON_PRETTY_PRINT) . '</pre>';

?>


<p class="end"><a href="../">Back to Index</a></p>

</body>
</html>