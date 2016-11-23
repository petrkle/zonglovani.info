<?php

require '../init.php';
require '../func.php';

$titulek = 'Licence';
$smarty->assign('titulek', $titulek);
$smarty->assign('description', 'Licence souborů ke stažení');

$dalsi = array(
    array('url' => '/download/', 'text' => 'Soubory ke stažení', 'title' => 'Žonglérův slabikář ke stažení'),
    );
$smarty->assign('dalsi', $dalsi);
$trail = new Trail();
$trail->addStep('Soubory ke stažení', '/download/');
$trail->addStep($titulek);

    $smarty->assign('trail', $trail->path);
    $smarty->display('hlavicka.tpl');
    $smarty->display('download.licence.tpl');
    $smarty->display('paticka.tpl');
