<?php 
include 'includes/db.php';
include 'lib/phrases.php';
$obj = new Phrases();
$phrase = $obj->getRandomPhrase();
extract($phrase);
 ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Widget Sublime Text Quotes</title>
	<link rel="stylesheet" href="css/widget.css">
</head>
<body>
	<a href="http://sublimetextquotes.com" title="Inspirational quotes">
		<h1>
			<img src="img/first_quote.png">
			<?= $obj->getNicePhrase($phrase); ?>
			<img src="img/last_quote.png">
		</h1>
		<p id="author">- <?= $author; ?></p>
	</a>
</body>
</html>