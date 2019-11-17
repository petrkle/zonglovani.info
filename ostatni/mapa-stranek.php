<?php

require '../init.php';
require '../func.php';

$titulek = 'Mapa stránek';
$smarty->assign('stylwidth', IMG_CSS_WIDTH);
$smarty->assign('titulek', $titulek);
$smarty->assign('keywords', make_keywords($titulek).', žonglování');
$smarty->assign('description', 'Seznam všech stránek v žonglérově slabikáři.');
$smarty->assign('nahled', 'https://'.$_SERVER['SERVER_NAME'].'/img/k/kompas.png');

$trail = new Trail();
$trail->addStep('Mapa stránek');
$smarty->assign('trail', $trail->path);

$smarty->display('hlavicka.tpl');
$smarty->display('mapa-stranek.tpl');
$mapa = $_SERVER['DOCUMENT_ROOT'].'/mapa-stranek.inc';
if (is_readable($mapa)) {
    include $mapa;
}
$smarty->display('paticka.tpl');
