<!DOCTYPE html>
<html lang="en">

<head>
<!-- Your Name -->
<title>Movie Reviews</title>
<meta charset="utf-8" />
<link rel="stylesheet" type="text/css" href="movies.css">
</head>
<body>

<?php
include 'functions.php';
$folder = $_GET['movie'];

?>

<div  id="banner">
          
		  <p><img src="images/rancidbanner.png" alt="Rancid Tomatoes"> </p>
    </div>
	<h1><?=getName($folder). " " .getYear($folder)?></h1>

<div class="main">
	
	<div id="rottenLarge">
		<img src="images/<?=freshRottenImage($folder)?>large.png" alt=<?=freshRottenImage($folder)?> /><?=getRating($folder)."%"?>
	</div>

	<div id="poster">
		<img src="<?=$folder?>/overview.png" alt="general overview" />
	</div>
	<div id="reviews">
	<div id="leftCol"> 
		<?=leftCol($folder)?>

	
	</div>
	<div id="rightCol">
	<?=rightCol($folder)?>
	</div>
	</div>
	<div id="cast">
	<dl>
		<?=overview($folder)?>
	</dl>
	</div>
</div>

</body>
</html>

