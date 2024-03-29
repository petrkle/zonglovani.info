<?php

require '../init.php';
require '../func.php';

$titulek = 'Druhy žonglování';
$smarty->assign('titulek', $titulek);
$smarty->assign('keywords', 'žonglování, druhy, bouncing, passing, házení míčků, fireshow');
$smarty->assign('description', 'Popis jednotlivých druhů žonglování. Žonglovat můžeš mnoha různými způsoby.');
$smarty->assign('nahled', 'https://'.$_SERVER['SERVER_NAME'].'/img/d/druhya.png');

$trail = new Trail();
$trail->addStep('Informace o žonglování', '/ostatni.html');
$trail->addStep($titulek);
$smarty->assign('trail', $trail->path);

$dalsi = array(
    array('url' => '/cirkusove-discipliny.html', 'text' => 'Cirkusové disciplíny', 'title' => 'Dovednosti které nemají s žonglováním mnoho společného'),
    array('url' => '/micky/jak-zacit.html', 'text' => 'Jak začít žonglovat s míčky', 'title' => 'Jak začít žonglovat s míčky'),
    );
$smarty->assign('dalsi', $dalsi);

$smarty->assign('stylwidth', IMG_CSS_WIDTH);
$smarty->display('hlavicka.tpl');
$smarty->display('ostatni-druhy-zonglovani.tpl');
$smarty->display('paticka.tpl');
