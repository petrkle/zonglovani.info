<?php
require('../init.php');
require('../func.php');
require('../cache.php');
http_cache_headers(3600);

$titulek='Jak začít žonglovat s míčky';
$smarty->assign('feedback',true);
$smarty->assign('titulek',$titulek);

$smarty->assign('keywords',make_keywords($titulek));
$smarty->assign('description','Obrázkový návod na žonglování s míčky.');
$smarty->assign('nahled','https://'.$_SERVER['SERVER_NAME'].'/img/z/zonglovania.png');

$trail = new Trail();
$trail->addStep('Míčky','/micky/');
$trail->addStep($titulek);

$trik=nacti_trik('micky-jak-zacit');
$smarty->assign('trik',$trik);

$smarty->assign('trail', $trail->path);
$smarty->display('hlavicka.tpl');
$smarty->display('trik.tpl');
$smarty->display('paticka.tpl');
