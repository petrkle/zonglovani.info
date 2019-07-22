<?php

require '../init.php';
require '../func.php';

$titulek = 'Pirueta';

$smarty->assign('keywords', make_keywords($titulek).', žonglování');
$smarty->assign('description', 'Pirueta při žonglování s míčky.');

$smarty->assign('titulek', $titulek);

$dalsi = array(
    array('url' => '/micky/3/blesk.html', 'text' => 'Blesk', 'title' => 'Rychlé vyhození tří míčků'),
    array('url' => '/kuzely/passing/rychla-otocka.html', 'text' => 'Rychlá otočka', 'title' => 'Rychlá otočka při passování s kužely'),
    );

$smarty->assign('dalsi', $dalsi);
$trail = new Trail();
$trail->addStep('Míčky', '/micky/');
$trail->addStep($titulek);

$smarty->assign('trail', $trail->path);
$smarty->display('hlavicka.tpl');
$smarty->display('micky-pirueta.tpl');
$smarty->display('paticka.tpl');
