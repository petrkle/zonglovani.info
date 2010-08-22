<?php
require('../init.php');
require('../func.php');

$mapy=array('zongleri');

if(isset($_GET['file']) and in_array($_GET['file'],$mapy) and is_readable('../data/kml/mapa-'.$_GET['file'].'.kml')){
	$file=preg_replace('/[^a-z]*/','',$_GET['file']);
	header('Content-Type: application/vnd.google-earth.kml+xml');
	print file_get_contents('../data/kml/mapa-'.$file.'.kml');
	exit();
}else{
	require('../404.php');
	exit();
}
?>
