<?php
include 'includes/db.php';
include 'lib/phrases.php';
$obj = new Phrases();
$phrase = $obj->getRandomPhrase();
if(count($phrase) == 0){
	header("Location: quote.php");
}
extract($phrase);
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Sublime Text Quotes</title>
	<?php include 'includes/head.php'; ?>
</head>
<body data-id="<?= $phrase_id; ?>">
	<a href="https://github.com/jorgechavz/SublimeTextQuotes" target="_blank" id="forkme" title="Fork me"><img src="public/img/forkme.png" alt="Fork me"></a>
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
					<img src="public/img/first_quote.png">
					<?= $obj->getNicePhrase($phrase); ?>
					<img src="public/img/last_quote.png">
				</h1>
				<p id="author" class="animated fadeIn">- <?= $author; ?></p>
				<?php if($img_src){ ?>
				<div id="img-author" class="animated bounceIn" style="background-image: url('<?= $img_src; ?>');">
				</div>
				<?php } ?>
				<div class="fb-like" data-href="https://www.facebook.com/SublimeTextQuotes" data-layout="button" data-action="like" data-show-faces="false" data-share="true"></div>
			</div>

			<div id="phone">
				<img src="public/img/mockup.png" alt="Mockup Sublime Text Quotes" />
				<div class="badges">
					<a href="https://play.google.com/store/apps/details?id=com.xpressa.jorge.climita" target="_blank"><img src="public/img/badge.png" /></a>
				</div>
			</div>
		</div>
	</div>

	<a href="#" title="Info" id="new-quote"><i class="fa fa-question-circle"></i><span id="instructions">R = Random Quote | <i class="fa fa-arrow-left"></i> = Prev Quote | <i class="fa fa-arrow-right"></i> = Next Quote</span></a>

	<script src="public/js/jquery.js" type="text/javascript" charset="utf-8"></script>
	<script src="public/js/script.js" type="text/javascript" charset="utf-8"></script>
	<script>(function(d, s, id) {
	  var js, fjs = d.getElementsByTagName(s)[0];
	  if (d.getElementById(id)) return;
	  js = d.createElement(s); js.id = id;
	  js.src = "//connect.facebook.net/es_LA/sdk.js#xfbml=1&appId=131923847009565&version=v2.0";
	  fjs.parentNode.insertBefore(js, fjs);
	}(document, 'script', 'facebook-jssdk'));</script>
	<script>
	  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
	  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
	  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
	  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

	  ga('create', 'UA-63260011-1', 'auto');
	  ga('send', 'pageview');

	</script>

</body>
</html>
