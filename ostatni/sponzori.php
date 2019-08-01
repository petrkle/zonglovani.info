<?php

require '../init.php';
require '../func.php';

$titulek = 'Vaše příspěvky';
$smarty->assign('titulek', $titulek);
$smarty->assign('keywords', make_keywords($titulek).', žonglování');
$smarty->assign('description', 'Sponzoři žonglérova slabikáře.');

$dalsi = array(
    array('url' => '/jak-odkazovat.html', 'text' => 'Jak odkazovat na žonglérův slabikář', 'title' => 'Přidej odkaz na svůj web'),
    );
$smarty->assign('dalsi', $dalsi);

$smarty->assign('stylwidth', IMG_CSS_WIDTH);
$trail = new Trail();
$trail->addStep($titulek);
$smarty->assign('trail', $trail->path);

$smarty->assign('nahled', 'https://'.$_SERVER['SERVER_NAME'].'/img/p/podporad.png');

$smarty->display('hlavicka.tpl');
$smarty->display('sponzori.tpl');
$smarty->display('paticka.tpl');
