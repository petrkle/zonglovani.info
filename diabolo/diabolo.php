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
    if ($trik['img_maxwidth'] > IMG_RESPONSIVE_WIDTH) {
        $smarty->assign('stylwidth', $trik['img_maxwidth']);
    }
    $smarty->display('hlavicka.tpl');
    $smarty->display('trik.tpl');
    $smarty->display('paticka.tpl');
} else {
    http_response_code(404);
    exit();
}
