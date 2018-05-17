<?php

require '../init.php';
require '../func.php';

$titulek = 'juggling.tv';
$smarty->assign('feedback', true);
$smarty->assign('titulek', $titulek);

$smarty->assign('keywords', 'video, juggling.tv');
$smarty->assign('description', 'Podrobný popis stránek juggling.tv.');
$smarty->assign('nahled', 'https://'.$_SERVER['SERVER_NAME'].'/img/j/jtv.jpg');

$dalsi = array(
    array('url' => '/video/', 'text' => 'Žonglérská videa', 'title' => 'Výběr žonglérských videí'),
    array('url' => '/animace/', 'text' => 'Animace žonglování', 'title' => 'Animace triků s míčky'),
    );
$smarty->assign('dalsi', $dalsi);

$smarty->assign('stylwidth', IMG_CSS_WIDTH);
$trail = new Trail();
$trail->addStep($titulek);
$smarty->assign('trail', $trail->path);
$smarty->display('hlavicka.tpl');
$smarty->display('juggling.tv.tpl');
$smarty->display('paticka.tpl');
