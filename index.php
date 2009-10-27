<?php

if(eregi("index\.php$",$_SERVER["REQUEST_URI"])){
	header("HTTP/1.1 301 Moved Permanently");
	header("Location: /");
	exit();
}

require('init.php');

$smarty->assign("titulek","Žonglérův slabikář");
$smarty->assign("rsslink",'http://'.$_SERVER["SERVER_NAME"].'/zonglovani.rss');
$smarty->assign("nadpis","Obrázková učebnice žonglování");
$smarty->assign("notitle",true);

$smarty->display('hlavicka.tpl');
$smarty->display('index.tpl');
$smarty->display('paticka.tpl');

?>
