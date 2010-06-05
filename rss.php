<?php
require('init.php');
require('func.php');

define('MAGPIE_INPUT_ENCODING','UTF-8');
define('MAGPIE_OUTPUT_ENCODING','UTF-8');
define('MAGPIE_DETECT_ENCODING',false);
define('MAGPIE_CACHE_DIR',$_SERVER['DOCUMENT_ROOT'].'/tmp/cache.rss');
require('lib/rss_fetch.inc');


$kanaly=array(
'http://'.$_SERVER['SERVER_NAME'].'/ostatni/changelog.rss',
'http://'.$_SERVER['SERVER_NAME'].CALENDAR_URL.'kalendar.rss',
'http://'.$_SERVER['SERVER_NAME'].'/tip/tip.rss',
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

for($foo=0;$foo<10;$foo++){
	$udalost=array_pop($udalosti);
	$udalost['datum_rss2']=date('r',strtotime($udalost['dc']['date']));
	array_push($rssu,$udalost);
}

$smarty->assign('udalosti',array_reverse($rssu));
header('Content-Type: application/rss+xml');

if(isset($_GET['v'])){
	$smarty->display('rss2.tpl');
}else{
	$smarty->display('rss.tpl');
}

function sort_by_rss_date($a, $b)
{
		return ($a['dc']['date'] < $b['dc']['date']) ? -1 : 1;
}
?>
