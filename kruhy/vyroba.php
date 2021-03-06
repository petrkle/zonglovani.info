<?php

require '../init.php';
require '../func.php';

$titulek = 'Výroba kruhů';

$smarty->assign('titulek', $titulek);

$smarty->assign('keywords', make_keywords($titulek).', žonglování');
$smarty->assign('description', 'Jak vyrobit kruhy na žonglování.');

$dalsi = array(
    array('url' => '/micky/vyroba.html', 'text' => 'Výroba žonglovacích míčků', 'title' => 'Jak vyrobit pěkné a levné míčky na žonglování'),
    array('url' => '/kuzely/vyroba.html', 'text' => 'Jak vyrobit kužel na žonglování', 'title' => 'Návod na výrobu kuželu z novin.'),
    );
$smarty->assign('dalsi', $dalsi);

$trail = new Trail();
$trail->addStep('Kruhy', '/kruhy/');
$trail->addStep('Výroba kruhů');
$smarty->assign('titulek', 'Výroba kruhů');

$smarty->assign('trail', $trail->path);
$smarty->assign('stylwidth', IMG_CSS_WIDTH);
$smarty->display('hlavicka.tpl');
$smarty->display('kruhy-vyroba.tpl');
$smarty->display('paticka.tpl');
