<?php

require '../init.php';
require '../func.php';

$titulek = 'Jak začít žonglovat s kužely';

$smarty->assign('titulek', $titulek);

$smarty->assign('keywords', make_keywords($titulek));
$smarty->assign('description', 'Základní návod pro žonglování se třemi kužely.');

$trail = new Trail();
$trail->addStep('Kužely', '/kuzely/');
$trail->addStep($titulek);

$dalsi = array(
    array('url' => '/kuzely/3/kaskada.html', 'text' => 'Kaskáda se třemi kužely', 'title' => 'Nejjednodušší způsob žonglování'),
    array('url' => '/kuzely/vyroba.html', 'text' => 'Výroba kuželů na žonglování', 'title' => 'Jak vyrobit pěkné a levné kužely na žonglování'),
    array('url' => '/trenink.html', 'text' => 'Jak trénovat žonglování', 'title' => 'Tipy a triky pro trénink'),
    );
$smarty->assign('dalsi', $dalsi);

$smarty->assign('trail', $trail->path);
$smarty->assign('stylwidth', IMG_CSS_WIDTH);
$smarty->display('hlavicka.tpl');
$smarty->display('kuzely-jak-zacit.tpl');
$smarty->display('paticka.tpl');
