<?php

require '../init.php';
require '../func.php';
require_once 'horoskop-data.php';
require_once 'horoskop.php';

foreach (get_seznam_triku('micky-3') as $klic => $foo) {
    array_push($vety[9][2], '<a href="/micky/3/'.$klic.'.html" title="'.prvni_velke($foo['about']['obtiznost']).'">'.prvni_male($foo['about']['nazev']).'</a>');
    array_push($vety[0][2], '<a href="/micky/3/'.$klic.'.html" title="'.prvni_velke($foo['about']['obtiznost']).'">'.prvni_male($foo['about']['nazev']).'</a>');
    array_push($vety[6][4], '<a href="/micky/3/'.$klic.'.html" title="'.prvni_velke($foo['about']['obtiznost']).'">'.prvni_male($foo['about']['nazev']).'</a>');
}

foreach (get_seznam_triku('kuzely-passing') as $klic => $foo) {
    array_push($vety[4][1], '<a href="/kuzely/passing/'.$klic.'.html" title="'.prvni_velke($foo['about']['obtiznost']).'">'.prvni_male($foo['about']['nazev']).'</a>');
    array_push($vety[2][5], '<a href="/kuzely/passing/'.$klic.'.html" title="'.prvni_velke($foo['about']['obtiznost']).'">'.prvni_male($foo['about']['nazev']).'</a>');
    array_push($vety[5][4], '<a href="/kuzely/passing/'.$klic.'.html" title="'.prvni_velke($foo['about']['obtiznost']).'">'.prvni_male($foo['about']['nazev']).'</a>');
}

if (isset($_GET['znameni'])) {
    $znameni = $_GET['znameni'];
} else {
    $znameni = '';
}

$znameni = filtr(strtolower(trim($znameni)), $zverokruh);

$smarty->assign('zverokruh', $zverokruh);

if (isset($_GET['zitra'])) {
    $nadpis = 'Horoskop žonglování na zítra';
} else {
    $nadpis = 'Horoskop žonglování';
}

$trail = new Trail();
$trail->addStep($nadpis, '/horoskop/');

if (isset($_GET['zitra'])) {
    $smarty->assign('predpoved', predpoved($znameni, (time() + (24 * 3600))));
    $smarty->assign('zitra', 'jo');
    $smarty->assign('description', 'Horoskop pro žonglérky a žongléry na zítra. Poradí co je nejlepší trénovat.');
} else {
    $smarty->assign('predpoved', predpoved($znameni, time()));
    $smarty->assign('description', 'Horoskop pro žonglérky a žongléry. Každý den poradí co je nejlepší trénovat.');
}

$smarty->assign('nahled', 'https://'.$_SERVER['SERVER_NAME'].'/img/h/horoskop.png');
$smarty->assign('keywords', 'horoskop, žonglování, trénink');
$smarty->assign('stylwidth', IMG_CSS_WIDTH);

if ($_SERVER['REQUEST_URI'] == '/horoskop/' or $_SERVER['REQUEST_URI'] == '/horoskop/zitra/') {
    $smarty->assign('feedback', true);
    $smarty->assign('trail', $trail->path);
    $smarty->assign('titulek', $nadpis);
    $smarty->display('hlavicka.tpl');
    $smarty->display('horoskop-index.tpl');
    $smarty->display('paticka.tpl');
    exit();
}

$titulek = $nadpis.' - '.$zverokruh[$znameni]['popis'];

$trail->addStep($zverokruh[$znameni]['popis'], '/horoskop/');
$smarty->assign('trail', $trail->path);
$smarty->assign('nahled', 'https://'.$_SERVER['SERVER_NAME'].'/img/h/horoskop-'.$znameni.'.png');
if (isset($_GET['zitra'])) {
    $dodatek = ' na zítra';
} else {
    $dodatek = '';
}
$smarty->assign('description', 'Žonglérský horoskop'.$dodatek.' pro znamení '.mb_convert_case($zverokruh[$znameni]['popis'], MB_CASE_LOWER, 'UTF-8').'.');
$smarty->assign('keywords', 'horoskop, žonglování, '.mb_convert_case($zverokruh[$znameni]['popis'], MB_CASE_LOWER, 'UTF-8'));
$smarty->assign('titulek', $titulek);
$smarty->assign('znameni', $znameni);
$smarty->display('hlavicka.tpl');
$smarty->display('horoskop.tpl');
$smarty->display('paticka.tpl');
