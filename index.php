<?php
require('init.php');
require('func.php');
require('cache.php');
http_cache_headers(3600);

$smarty->assign('titulek','Žonglérův slabikář - žonglování s míčky, kruhy a kužely');
$smarty->assign('nadpis','');
$smarty->assign('keywords','žonglování, míčky, kruhy, kužely, seznam žonglérů');
$smarty->assign('description','Žonglování s míčky, kruhy a kužely. Seznamu žonglérů, kalendář žongléřských srazů a obrázky žonglování.');
$smarty->assign('nahled','https://'.$_SERVER['SERVER_NAME'].'/img/z/zonglovania.png');
$smarty->assign('notitle',true);
$smarty->assign('tip',array_shift(get_tipy()));

$smarty->display('hlavicka.tpl');
$smarty->display('index.tpl');
$smarty->display('paticka.tpl');
