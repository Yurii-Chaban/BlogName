<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8" />
<title>Demo</title>
<link rel="stylesheet" href="../css/demo.css" type="text/css" />
</head>
<body>

<?php
$BOOKS = array(
    array(
        "title" => "JavaScript: The Definitive Guide",
        "author" => "David Flanagan",
        "publisher" => "O'Reilly Media",
        "pub_date" => "May 13, 2011",
        "edition" => 6,
        // string with line break
        "comments" => "If you are looking for comprehensive and authoritative
            information, this is the book for you!"
    ),
    array(
        "title" => "High Performance JavaScript",
        "author" => "Nicholas C. Zakas",
        "publisher" => "O'Reilly Media",
        "pub_date" => "Mar 30, 2010",
        "edition" => 1,
        "comments" => "A slim but very useful book."
    )
);

// invoke json_encode here so we can clean up the string
// include JSON_HEX_APOS option (for apostrophe in O'Reilly)
$json_books = json_encode($BOOKS, JSON_HEX_APOS);

// replace \\n which would cause errors in JavaScript
$json_books = str_replace("\\n", " ", $json_books);

// to view resulting string
//echo $json_books;

?>

<script type="text/javascript">
// example reviver function
function reviver2(nm, val) {
    if ( nm === 'edition' ) {
        return undefined; // to omit from results
    } else if ( nm === 'pub_date' ) {
        return new Date(val); // restore date object
    } else if ( typeof val === 'string' ) {
        // restore ' (undo JSON_HEX_APOS)
        val = val.replace(/\u0027/g, "'");
        return val.replace(/\s+/g, ' '); // remove extra spaces
    } else {
        return val; // return unchanged
    }
}

// parse the php/json string created above ($json_books)
// using reviver function defined above
var books = JSON.parse( '<?php echo $json_books ?>', reviver2 );

// view/verify results
console.log(books);
console.log( books[0]['comments'] );
console.log( books[0]['publisher'] );
console.log( books[0]['pub_date'] );
console.log( typeof books[0]['pub_date'] );
</script>



<h1>Reviver Function with JSON.parse: Example Two</h1>

<p>To see the PHP, open this file in an editor. To see the resulting JavaScript, view the source code of this page using browser menu commands.</p>


<p class="end"><a href="../">Back to Index</a></p>

</body>
</html>