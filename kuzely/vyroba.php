<?php

require '../init.php';
require '../func.php';

$trail = new Trail();
$trail->addStep('Kužely', '/kuzely/');
$trail->addStep('Jak vyrobit kužel na žonglování');

$smarty->assign('trail', $trail->path);

$smarty->assign('keywords', 'kužel, výroba, žonglování');
$smarty->assign('description', 'Návod na výrobu žonglovacích kuželů.');
$smarty->assign('nahled', 'https://'.$_SERVER['SERVER_NAME'].'/img/k/kuzely-vyrobae.png');

$dalsi = array(
    array('url' => '/kuzely/jak-zacit.html', 'text' => 'Jak začít žonglovat s kužely', 'title' => 'Rychlý návod na žonglování s kužely'),
    array('url' => '/micky/vyroba.html', 'text' => 'Výroba míčků na žonglování', 'title' => 'Míčky na žonglování snadno a rychle'),
    array('url' => '/kruhy/vyroba.html', 'text' => 'Jak vyrobit kruhy na žonglování', 'title' => 'Návod na výrobu kruhů z novin.'),
    );
$smarty->assign('dalsi', $dalsi);

$smarty->assign('titulek', 'Výroba kuželů');
$smarty->assign('stylwidth', IMG_CSS_WIDTH);
$smarty->display('hlavicka.tpl');
$smarty->display('kuzely-vyroba.tpl');
$smarty->display('paticka.tpl');
