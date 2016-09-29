<?php
require('init.php');
require('func.php');

define('MAGPIE_INPUT_ENCODING','UTF-8');
define('MAGPIE_OUTPUT_ENCODING','UTF-8');
define('MAGPIE_DETECT_ENCODING',false);
define('MAGPIE_CACHE_DIR',$_SERVER['DOCUMENT_ROOT'].'/tmp/cache.rss');
require('lib/rss_fetch.inc');

require('cache.php');
http_cache_headers(3600);

$kanaly=array(
'https://'.$_SERVER['SERVER_NAME'].CALENDAR_URL.'kalendar.rss',
'https://'.$_SERVER['SERVER_NAME'].'/tip/tip.rss',
'https://'.$_SERVER['SERVER_NAME'].OBRAZKY_URL.'obrazky.rss'
	);

$udalosti=array();
$rssu=array();

foreach($kanaly as $kanal){
	@$rss = fetch_rss($kanal);
	$items = array();
	@$items = $rss->items;
	if(is_array($items)){
	foreach($items as $key=>$foo){
		if(isset($foo['dc']['date'])){
			$cas = $foo['dc']['date'];
		}else{
			$cas = $foo['updated'];
		}

		$items[$key]['cas'] = $cas;
		$items[$key]['datum_rss2'] = date('r',strtotime($cas));
	}
	$udalosti=array_merge($items,$udalosti);
	}
}

usort($udalosti, 'sort_by_rss_date');

$smarty->assign('udalosti',array_reverse($udalosti));
header('Content-Type: application/xml');

if(isset($_GET['v'])){
	$smarty->display('rss2.tpl');
}else{
	$smarty->display('rss.tpl');
}

function sort_by_rss_date($a, $b)
{
 		return (strtotime($a['cas']) < strtotime($b['cas'])) ? -1 : 1;
}
