<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8" />
<title>Demo</title>
<link rel="stylesheet" href="../css/demo.css" type="text/css" />
</head>
<body>

<h1>PHP json_decode Examples</h1>

<p>To see the PHP, open this file in an editor.</p>


<?php

$json1 = '["apple","orange","banana","strawberry"]';
$ar = json_decode($json1);
// access first element of $ar array
//echo $ar[0];


$json2 = '{
    "title": "JavaScript: The Definitive Guide",
    "author": "David Flanagan",
    "edition": 6
}';

$book = json_decode($json2);
// access title of $book object
//echo $book->title;

// pass true to force object to associative array
$book = json_decode($json2, true);
// access using array syntax
//echo $book['author'];


$json3 = '[
    {
        "title": "Professional JavaScript",
        "author": "Nicholas C. Zakas"
    },
    {
        "title": "JavaScript: The Definitive Guide",
        "author": "David Flanagan"
    },
    {
        "title": "High Performance JavaScript",
        "author": "Nicholas C. Zakas"
    }
]';

$books = json_decode($json3);
// array of objects
//echo $books[1]->title;

// pass true to force object to associative array
$books = json_decode($json3, true);
//echo $books[1]['author'];



// errors?
/*
echo json_last_error(); 
echo json_last_error_msg();
//*/
?>


<p class="end"><a href="../">Back to Index</a></p>

</body>
</html>