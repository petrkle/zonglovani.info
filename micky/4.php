<?php

require '../init.php';
require '../func.php';

if (isset($_GET['show'])) {
    $show = 'xml/'.$_GET['show'];
} else {
    $show = '';
}

$titulek = 'Žonglování se čtyřmi míčky';

$trail = new Trail();
$trail->addStep('Míčky', '/micky/');
$trail->addStep('4 míčky', '/micky/4/');

if (strlen($show) > 0 and is_file('../'.$show.'.xml')) {
    $trik = nacti_trik($show);
    if ($trik['img_maxwidth'] > IMG_RESPONSIVE_WIDTH) {
        $smarty->assign('stylwidth', $trik['img_maxwidth']);
    }
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
    http_response_code(404);
    exit();
} else {
    $smarty->assign('trail', $trail->path);
    $smarty->assign('titulek', $titulek);
    $smarty->assign('keywords', 'žonglování, čtyři, míčky, návod, tenisáky');
    $smarty->assign('description', 'Obrázkový návod na žonglování se čtyřmi míčky.');
    $smarty->assign('nahled', 'https://'.$_SERVER['SERVER_NAME'].'/img/m/micky-logo.png');
    $smarty->display('hlavicka.tpl');
    $smarty->display('micky-4-pred.tpl');
    $smarty->assign('triky', get_seznam_triku(__FILE__));
    $smarty->display('seznam-triku.tpl');
    $smarty->display('paticka.tpl');
}
