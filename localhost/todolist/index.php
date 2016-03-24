<!DOCTYPE html>
<head>
    <meta charset="utf-8">
    <title>TODO List</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Shadows+Into+Light+Two' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
	<div class="list">
		<h1 class="header">To do</h1>
		<ul class="items">
			<li>
				<span class="item">Slipping</span>
				<a class="done-button" href="#">Mark as Done</a>
			</li>
			<li>
				<span class="item done">Wolking</span>
			</li>
		</ul>

		<form class="item-add" action="add.php" method="post">
			<input type="text" name="name" placeholder="Type a new item here" class="input" autocomplete="off" required>
			<input type="submit" value="Add" class="subbmit">
		</form>
	</div>
</body>
</html>