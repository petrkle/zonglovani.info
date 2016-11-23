<?php

require '../init.php';
require '../func.php';

$titulek = 'Konstrukce kuželu';
$smarty->assign('feedback', true);

$smarty->assign('titulek', $titulek);
$smarty->assign('keywords', make_keywords($titulek).', kužel, žonglování');
$smarty->assign('description', 'Jak vypadá kužel na žonglování uvnitř.');

$trail = new Trail();
$trail->addStep('Kužely', '/kuzely/');
$trail->addStep($titulek);

$dalsi = array(
    array('url' => '/kuzely/jak-zacit.html', 'text' => 'Jak začít žonglovat s kužely', 'title' => 'Rychlý návod pro začátečníky'),
    array('url' => '/kuzely/vyroba.html', 'text' => 'Výroba kuželů na žonglování', 'title' => 'Jak vyrobit kužel na žonglování z novin'),
    );
$smarty->assign('dalsi', $dalsi);

$smarty->assign('trail', $trail->path);
$smarty->display('hlavicka.tpl');
$smarty->display('kuzely-konstrukce.tpl');
$smarty->display('paticka.tpl');
