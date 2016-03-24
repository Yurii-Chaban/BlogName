<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8" />
<title>Demo</title>
<link rel="stylesheet" href="../css/demo.css" type="text/css" />
</head>
<body>

<?php
$food_groups = array(
    'meat' => array(),
    'vegetables' => array(
        'leafy' => array('collard greens', 'kale', 'chard', 'spinach', 'lettuce'),
        'root' => array('radish', 'turnip', 'potato', 'beet'),
        'other' => array('brocolli', 'green beans', 'corn', 'tomatoes')
    ),
    'grains' => array('bread', 'rice', 'oatmeal'),
    'legumes' => array('kidney beans', 'lentils', 'split peas'),
    'fruits' => array('apple', 'raspberry', 'pear', 'banana'),
    'sweets' => array('cookies', 'brownies', 'cake', 'pie'),
);

// can convert array to json string here
$json = json_encode($food_groups, JSON_PRETTY_PRINT);
//echo "<pre>$json</pre>";
?>

<script type="text/javascript">
// using JSON.parse with json_encode
var food_groups = JSON.parse( '<?php echo json_encode($food_groups) ?>' );

// JSON_PRETTY_PRINT not used since it would trigger error with JSON.parse

//console.log( food_groups );

/* output manually formatted so you can read it
{
    "meat":[],
    "vegetables":{
        "leafy":["collard greens","kale","chard","spinach","lettuce"],
        "root":["radish","turnip","potato","beet"],
        "other":["brocolli","green beans","corn","tomatoes"]
    },
    "grains":["bread","rice","oatmeal"],
    "legumes":["kidney beans","lentils","split peas"],
    "fruits":["apple","raspberry","pear","banana"],
    "sweets":["cookies","brownies","cake","pie"]
}
*/

// demonstrating access
console.log( food_groups['vegetables']['leafy'][0] ); // collard greens
console.log( food_groups.sweets[1] ); // brownies
</script>


<h1>Pass Multidimensional PHP Array to JSON and JavaScript with json_encode</h1>

<p>The example array is associative with numerically indexed sub arrays.</p>

<p>To see the PHP, open this file in an editor. To see the resulting JavaScript, view the source code of this page using browser menu commands.</p>


<p class="end"><a href="../">Back to Index</a></p>

</body>
</html>