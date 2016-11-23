<?php

require '../init.php';
require '../func.php';

if (isset($_GET['show'])) {
    $show = 'xml/'.$_GET['show'];
} else {
    $show = '';
}

$titulek = 'Diabolo';
$smarty->assign('feedback', true);

$trail = new Trail();
$trail->addStep('Diabolo', '/diabolo/');

if (strlen($show) > 0 and is_file('../'.$show.'.xml')) {
    $trik = nacti_trik($show);
    $smarty->assign('trik', $trik);
    $smarty->assign('titulek', $titulek.' - '.$trik['about']['nazev']);
    $smarty->assign('nadpis', $trik['about']['nazev']);
    $smarty->assign('nahled', get_nahled($trik));
    $smarty->assign('description', get_description($trik));
    $smarty->assign('keywords', make_keywords($titulek.','.$trik['about']['nazev']));
    $trail->addStep($trik['about']['nazev']);
    $smarty->assign('trail', $trail->path);
    $smarty->display('hlavicka.tpl');
    $smarty->display('trik.tpl');
    $smarty->display('paticka.tpl');
} elseif (strlen($show) > 0 and !is_file('../'.$show.'.xml')) {
    require '../404.php';
    exit();
} else {
    $smarty->assign('trail', $trail->path);
    $smarty->assign('titulek', $titulek);
    $smarty->assign('nahled', 'https://'.$_SERVER['SERVER_NAME'].'/img/d/diabolo.png');
    $smarty->assign('description', 'Diabolo je roztočená cívka na provázku.');
    $smarty->assign('keywords', 'diabolo, žonglování, triky');
    $smarty->display('hlavicka.tpl');
    $smarty->display('kuzely-passing.tpl');
    $smarty->display('paticka.tpl');
}
