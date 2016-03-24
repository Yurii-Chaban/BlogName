<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8" />
<title>Demo</title>
<link rel="stylesheet" href="../css/demo.css" type="text/css" />
<?php
$book = array(
    "title" => "JavaScript: The Definitive Guide",
    "author" => "David Flanagan",
    "edition" => 6
);
?>

<script type="text/javascript">
// using a simple reviver function with JSON.parse
var book = JSON.parse('<?php echo json_encode($book) ?>', function(name, value) {
        // screen (e.g., based on name or typeof value)
        if (name === 'edition') {
            return undefined; // to remove from parsed result
        }
        // otherwise return value
        return value; 
    });

console.log(book); // verify edition removed from book object
// Object { title="JavaScript: The Definitive Guide", author="David Flanagan"}
</script>
</head>
<body>

<h1>Using a Reviver Function with JSON.parse</h1>

<p>To see the PHP, open this file in an editor. To see the resulting JavaScript, view the source code of this page using browser menu commands.</p>


<p class="end"><a href="../">Back to Index</a></p>

</body>
</html>