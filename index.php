<?php

	$maxNumberOfImages = 32;
	
	$images = array();
	
	if( isset($_GET['numberOfImages']) ) {
		$i = min( $maxNumberOfImages*2, max( 12, intval($_GET['numberOfImages']) ) );
		$numberOfImages = floor($i/2);
		$cols = ceil(sqrt($i));
		$rows = ceil($i/$cols);
		while( count($images)<$numberOfImages ) {
			$rand = rand(1,$maxNumberOfImages);
			if( !in_array($rand,$images) )
				array_push( $images, $rand );
		}
		$images = array_merge($images,$images);
		shuffle($images);
	}

echo '<!doctype html>'
	.'<html>'
		.'<head>'
			.'<meta charset="utf-8">'
			.'<title>Fruity</title>'
			.'<meta name="author" content="Kelvin Nketia-Achiampong">'
			.'<link rel="stylesheet" href="css/game.css" />'
			.'<link rel="stylesheet" href="css/ui-lightness/jquery-ui.css" />'
			.'<script src="js/jquery.js"></script>'
			.'<script src="js/jquery-ui.js"></script>'
			.'<script src="js/game.js"></script>'
		.'</head>'
		.'<body>';

if( !empty($images) ) {
	echo '<div id="game">';
	for( $r=0; $r<$rows; $r++ ) {
		echo '<ul>';
		for( $c=0; $c<$cols; $c++ ) {
			$i = $r*$cols+$c;
			if( isset($images[$i]) )
				echo '<li><div><img src="images/'.$images[$i].'.png"/></div></li>';
		}
		echo '</ul>';
	}
	echo 	'<br class="clear" />'
			.'<p>Pairs found: <span id="s">0</span> of '.$numberOfImages.'</p>'
			.'<p>Attempts: <span id="a">0</span></p>'
			.'<p>Time elapsed: <span id="t">0</span></p>'
		.'</div>';
}

else {
	echo '<form id="game" action="." method="get">'
			.'<fieldset>'
				.'<strong>Play Fruity</strong>'
				.'<p>'
					.'<label for="numberOfImages">Cards:</label>'
					.'<input type="text" id="numberOfImages" name="numberOfImages" value="" />'
					.'<div id="iSlider"></div>'
				.'</p><p>'
					.'<label for="c">Cols:</label>'
					.'<span id="c"></span>'
				.'</p><p>'
					.'<label for="r">Rows:</label>'
					.'<span id="r"></span>'
				.'</p><p class="center">'
					.'<input class="ui-button" type="submit" value="Start game" />'
				.'</p>'
			.'</fieldset>'
		.'</form>';
}

echo '</body>'
	.'</html>';

?>