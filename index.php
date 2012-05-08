<?php
if(preg_match('/index\.php$/',$_SERVER['REQUEST_URI'])){
	header('HTTP/1.1 301 Moved Permanently');
	header('Location: /');
	exit();
}

require('init.php');
require('func.php');

$smarty->assign('titulek','Žonglérův slabikář - žonglování s míčky, kruhy a kužely');
$smarty->assign('nadpis','');
$smarty->assign('keywords','žonglování, míčky, kruhy, kužely, seznam žonglérů');
$smarty->assign('description','Žonglování s míčky, kruhy a kužely. Seznamu žonglérů, kalendář žongléřských srazů a obrázky žonglování.');
$smarty->assign('nahled','http://'.$_SERVER['SERVER_NAME'].'/img/m/micky-logo.gif');
$smarty->assign('notitle',true);
$smarty->assign('tip',array_shift(get_tipy()));

$smarty->display('hlavicka.tpl');
$smarty->display('index.tpl');
$smarty->display('paticka.tpl');
