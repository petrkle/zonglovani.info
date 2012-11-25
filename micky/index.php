<?php
require('../init.php');
require('../func.php');
require('../cache.php');
http_cache_headers(3600);

$titulek='Žonglování s míčky';
$smarty->assign('feedback',true);
$smarty->assign('titulek',$titulek);
$smarty->assign('description','Míčky jsou nejjednodušší žonglérské náčiní. Snadno se hážou i chytají. I ty se můžeš naučit žonglovat za pár minut.');
$smarty->assign('nahled','http://'.$_SERVER['SERVER_NAME'].'/img/n/nacinia.png');

$trail = new Trail();
$trail->addStep('Míčky');
$smarty->assign_by_ref('trail', $trail->path);

$smarty->display('hlavicka.tpl');
$smarty->display('micky.tpl');
$smarty->display('paticka.tpl');
