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
	<link rel="stylesheet" href="css/animate.css">
	<div id="fb-root"></div>	
</head>
<body data-id="<?= $phrase_id; ?>">
	<!-- <a href="https://github.com/jorgechavz/SublimeTextQuotes" target="_blank" id="forkme" title="Fork me"><img src="img/forkme.png" alt="Fork me"></a> -->
	<div id="window">
		<div id="top">
			<a href="#"></a>
			<a href="#"></a>
			<a href="#"></a>
		</div>
		<div id="space">
			<div id="lines">
				<?php 
				for($i = 1; $i < 16;$i++){
					echo "<span>".$i."</span>";
					} 
				?>
			</div>
			<div id="phrase">
				<h1 class="animated fadeIn">
					<img src="img/first_quote.png">
					<?= $obj->getNicePhrase($phrase); ?>
					<img src="img/last_quote.png">
				</h1>
				<p id="author" class="animated fadeIn">- <?= $author; ?></p>
				<?php if($img_src){ ?>
				<div id="img-author" class="animated bounceIn" style="background-image: url('<?= $img_src; ?>');">
				</div>
				<?php } ?>
				<!-- <div class="fb-like" data-href="https://developers.facebook.com/docs/plugins/" data-layout="button" data-action="like" data-show-faces="false" data-share="true"></div> -->
			</div>
		</div>
	</div>

	<!-- <a href="#" title="Add new quote" id="new-quote">+</a> -->
	<script src="js/jquery.js" type="text/javascript" charset="utf-8"></script>
	<script src="js/script.js" type="text/javascript" charset="utf-8" async defer></script>
	<script>(function(d, s, id) {
	  var js, fjs = d.getElementsByTagName(s)[0];
	  if (d.getElementById(id)) return;
	  js = d.createElement(s); js.id = id;
	  js.src = "//connect.facebook.net/es_LA/sdk.js#xfbml=1&appId=131923847009565&version=v2.0";
	  fjs.parentNode.insertBefore(js, fjs);
	}(document, 'script', 'facebook-jssdk'));</script>
</body>
</html>