<?php

if(eregi('index\.php$',$_SERVER['REQUEST_URI'])){
	header('HTTP/1.1 301 Moved Permanently');
	header('Location: /');
	exit();
}

require('init.php');
require('func.php');

$smarty->assign('titulek','Žonglérův slabikář - žonglování s míčky, kruhy a kužely');
$smarty->assign('rsslink','http://'.$_SERVER['SERVER_NAME'].'/zonglovani.rss');
$smarty->assign('nadpis','');
$smarty->assign('description','Žonglování s míčky, kruhy a kužely. Seznamu žonglérů, kalendář žongléřských srazů a obrázky žonlgování.');
$smarty->assign('notitle',true);
$smarty->assign('tip',array_pop(get_tipy()));

$smarty->display('hlavicka.tpl');
$smarty->display('index.tpl');
$smarty->display('paticka.tpl');

?>
