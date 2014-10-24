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
	<title>Sublime Text Quotes</title>
	<link href='http://fonts.googleapis.com/css?family=Chau+Philomene+One' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" href="css/styles.css">
</head>
<body>
	<div id="window">
		<div id="top">
			<a href="#"></a>
			<a href="#"></a>
			<a href="#"></a>
		</div>
		<div id="space">
			<div id="lines">
				<?php 
				for($i = 1; $i < 15;$i++){
					echo "<span>".$i."</span>";
					} 
				?>
			</div>
			<div id="phrase">
				<h1>
					<img src="img/first_quote.png">
					<?= $obj->getNicePhrase($phrase); ?>
					<img src="img/last_quote.png">
				</h1>
				<p id="author">- <?= $author; ?></p>
				<?php if($img_src){ ?>
				<div id="img-author" style="background-image: url('<?= $img_src; ?>');">
				</div>
				<?php } ?>
			</div>
		</div>
	</div>
	<script src="js/jquery.js" type="text/javascript" charset="utf-8"></script>
	<script src="js/script.js" type="text/javascript" charset="utf-8" async defer></script>
</body>
</html>