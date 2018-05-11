<?php

require '../init.php';
require '../func.php';

$titulek = 'Ohnivé kužely';
$smarty->assign('feedback', true);

$smarty->assign('titulek', $titulek);

$smarty->assign('keywords', make_keywords($titulek).', fireshow');
$smarty->assign('description', 'Žonglování s ohnivými kužely.');
$smarty->assign('nahled', 'https://'.$_SERVER['SERVER_NAME'].'/img/k/kuzely-firea.png');

$trail = new Trail();
$trail->addStep('Kužely', '/kuzely/');
$trail->addStep($titulek);

$dalsi = array(
    array('url' => '/kuzely/passing/', 'text' => 'Passing s kužely', 'title' => 'S ohněm jde i passovat'),
    array('url' => '/obrazky/klamovka-20080422/stranka2/0023.html', 'text' => 'Obrázky žonglování s ohněm', 'title' => 'Tohle doma rozhodně nezkoušejte'),
    array('url' => '/obrazky/carodejnice-klamovka-20080422/0008.html', 'text' => 'Plivání ohně - obrázky', 'title' => 'Tohle doma NIKDY nezkoušejte!'),
    );

$smarty->assign('dalsi', $dalsi);
$smarty->assign('trail', $trail->path);
$smarty->assign('stylwidth', IMG_MAX_WIDTH);
$smarty->display('hlavicka.tpl');
$smarty->display('kuzely-ohen.tpl');
$smarty->display('paticka.tpl');
