<?php

require '../init.php';
require '../func.php';
require 'datumy.php';

if (preg_match('/^\/ulita\/\?.*201.+$/', $_SERVER['REQUEST_URI'])) {
    header('Location: /ulita/');
    exit();
}

$titulek = 'Žonglování v Ulitě';
$smarty->assign('titulek', $titulek);
$smarty->assign('nahled', 'https://'.$_SERVER['SERVER_NAME'].'/img/u/ulita.cz.png');
$smarty->assign('description', 'Pravidelné nedělní žonglování v DDM Ulita. Přijít mohou začínající i zkušení žongléři a žonglérky. Pro širokou veřejnost jsou k dispozici míčky a kužely k zapůjčení. Žonglovat se může naučit opravdu každý.');
$smarty->assign('icbm', '50.094605, 14.481742');

$trail = new Trail();
$trail->addStep($titulek);
$smarty->assign('trail', $trail->path);

$dalsi = array(
    array('url' => '/ulita/cesta.html', 'text' => 'Jak se dostat do Ulity', 'title' => 'Popis cesty'),
    array('url' => CALENDAR_URL, 'text' => 'Kalendář žonglérských akcí', 'title' => 'Kam jít žonglovat'),
    );
$smarty->assign('dalsi', $dalsi);

$smarty->assign('podzim', to_ulita($podzim));
$smarty->assign('jaro', to_ulita($jaro));
$smarty->assign('stylwidth', IMG_CSS_WIDTH);

$smarty->display('hlavicka.tpl');
$smarty->display('ulita.tpl');
$smarty->display('paticka.tpl');
