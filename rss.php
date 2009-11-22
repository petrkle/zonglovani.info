<?php
require('init.php');
require('func.php');

define('MAGPIE_INPUT_ENCODING','UTF-8');
define('MAGPIE_OUTPUT_ENCODING','UTF-8');
define('MAGPIE_DETECT_ENCODING',false);
require('lib/rss_fetch.inc');


$kanaly=array(
'http://'.$_SERVER['SERVER_NAME'].'/ostatni/changelog.rss',
'http://'.$_SERVER['SERVER_NAME'].CALENDAR_URL.'kalendar.rss',
'http://'.$_SERVER['SERVER_NAME'].OBRAZKY_URL.'obrazky.rss'
	);

$udalosti=array();
$rssu=array();

foreach($kanaly as $kanal){
	$rss = fetch_rss($kanal);
	$items=$rss->items;
	unset($items['O']);
	$udalosti=array_merge($items,$udalosti);
}

usort($udalosti, 'sort_by_rss_date');

#foreach($udalosti as $klic=>$udalost){
#	$udalosti[$klic]['description_iso']=iconv('utf8','iso-8859-2',$udalosti[$klic]['description']);
#	$udalosti[$klic]['title_iso']=iconv('utf8','iso-8859-2',$udalosti[$klic]['title']);
#	$udalosti[$klic]['creator_iso']=iconv('utf8','iso-8859-2',$udalosti[$klic]['dc']['creator']);
#}


for($foo=0;$foo<10;$foo++){
	array_push($rssu,array_pop($udalosti));
}

$smarty->assign("udalosti",array_reverse($rssu));
header('Content-Type: application/rss+xml');
$smarty->display('rss.tpl');

function sort_by_rss_date($a, $b)
{
		return ($a['dc']['date'] < $b['dc']['date']) ? -1 : 1;
}
?>
