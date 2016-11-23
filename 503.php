<?php

header('HTTP/1.0 503 Service Unavailable');
require_once 'init.php';
require_once 'func.php';

$smarty->assign('titulek', 'Služba je dočasně nedostupná');
$trail = new Trail();
$trail->addStep('Dočasně nedostupné');
$smarty->assign('trail', $trail->path);
$smarty->display('hlavicka.tpl');
$smarty->display('503.tpl');
$smarty->display('paticka.tpl');
