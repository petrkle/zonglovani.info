<?php

require_once 'init.php';
require_once 'func.php';

$_SERVER['SERVER_NAME'] = ZS_DOMAIN;
$_SERVER['DOCUMENT_ROOT'] = ZS_DIR;

$smarty->assign('titulek', 'Služba je dočasně nedostupná');

$trail = new Trail();
$trail->addStep('Dočasně nedostupné');
$smarty->assign('trail', $trail->path);
$smarty->display('hlavicka.tpl');
$smarty->display('503.tpl');
$smarty->display('paticka.tpl');
