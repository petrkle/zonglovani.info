<?php

require_once 'init.php';
require_once 'func.php';

$_SERVER['SERVER_NAME'] = ZS_DOMAIN;
$_SERVER['DOCUMENT_ROOT'] = ZS_DIR;

$smarty->assign('titulek', 'Přístup zakázán');

$smarty->assign('custom_headers', array('<link rel="stylesheet" media="screen" type="text/css" href="/photo-'.CSS_CHKSUM.'.css" />'));
$trail = new Trail();
$trail->addStep('Zakázaná stránka');
$smarty->assign('trail', $trail->path);

$smarty->display('hlavicka.tpl');
$smarty->display('403.tpl');
$smarty->display('paticka.tpl');
