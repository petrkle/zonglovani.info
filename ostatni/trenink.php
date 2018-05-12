<?php

require '../init.php';
require '../func.php';

$titulek = 'Trénink';
$smarty->assign('feedback', true);
$smarty->assign('nahled', 'https://'.$_SERVER['SERVER_NAME'].'/img/t/trenink-navodh.png');

$smarty->assign('keywords', make_keywords($titulek).', žonglování');
$smarty->assign('description', 'Postupy a triky jak trénovat žonglování.');

$smarty->assign('titulek', $titulek);

$trail = new Trail();
$trail->addStep('Informace o žonglování', '/ostatni.html');
$trail->addStep('Jak trénovat');

$smarty->assign('trail', $trail->path);

$trik = nacti_trik('ostatni-trenink');
$smarty->assign('trik', $trik);

$smarty->assign('stylwidth', IMG_MAX_WIDTH);
$smarty->display('hlavicka.tpl');
$smarty->display('trik.tpl');
$smarty->display('paticka.tpl');
