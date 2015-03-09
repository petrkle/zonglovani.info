<?php
require('../init.php');
require('../func.php');
require('../cache.php');
require('cal-init.php');

if(isset($_GET['filtr'])){
	$filtr=$_GET['filtr'];
}else{
	$filtr=false;
}

$udalosti=get_future_data($filtr);
http_cache_headers(3600,true);

uasort($udalosti, 'sort_by_zacatek'); 
$udalosti=array_reverse($udalosti);
while(count($udalosti)>3){
	array_pop($udalosti);
}
$smarty->assign('events',$udalosti);
if(isset($_GET['json'])){
	if(isset($_GET['callback'])){
  if (preg_match('/\W/', $_GET['callback'])){
    header('HTTP/1.1 400 Bad Request');
    exit();
  }
		$smarty->assign('callback',$_GET['callback']);
	}
	header('Content-Type: application/json');
	$smarty->display('kalendar-next-json.tpl');
}elseif(isset($_GET['xml'])){
	header('Content-Type: text/xml');
	$smarty->display('kalendar-next-xml.tpl');
}else{
	header('Content-Type: text/javascript');
	$smarty->display('kalendar-next-js.tpl');
}
