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
?>
    
    

<script type="text/javascript">
// using JSON.parse on the output of json_encode
var books = JSON.parse( '<?php echo json_encode($books); ?>' );

console.log( books );

// how to access
console.log( books[1].author ); // David Flanagan
</script>  
    
    
<h1>Using JavaScript's JSON.parse</h1>

<p>To see the PHP, open this file in an editor. To see the resulting JavaScript, view the source code of this page using browser menu commands.</p>


<p class="end"><a href="../">Back to Index</a></p>
    


</body>
</html>