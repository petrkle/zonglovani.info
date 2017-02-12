<?php

header('HTTP/1.0 404 Not Found');
require_once 'init.php';
require_once 'func.php';

$smarty->assign('titulek', 'Stránka nenalezena');
$trail = new Trail();
$trail->addStep('Neexistující stránka');
$smarty->assign('trail', $trail->path);
$smarty->display('hlavicka.tpl');
$smarty->display('404.tpl');
$smarty->display('paticka.tpl');
