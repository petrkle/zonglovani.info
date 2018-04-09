<?php

require '../init.php';
require '../func.php';

$titulek = 'Novinky';
$trail = new Trail();
$trail->addStep($titulek);

if (isset($_GET['rss'])) {
    $rss = $_GET['rss'];
} else {
    $rss = false;
}

$smarty->assign('trail', $trail->path);

$smarty->assign('styly', 'r');
$smarty->assign('keywords', 'novinky, žonglování, rss');
$smarty->assign('description', 'Novinky ze světa žonglování');

$dalsi = array(
    array('url' => '/tip/', 'text' => 'Tip týdne', 'title' => 'Žonglérský tip týdne'),
    array('url' => '/rss.html', 'text' => 'RSS kanály žonglérova slabikáře', 'title' => 'RSS kanály žonglérova slabikáře'),
    array('url' => CALENDAR_URL.'rss-a-icalendar.html#rss', 'text' => 'Jak nastavit RSS', 'title' => 'Jak nastavivt RSS čtečku'),
    );

$novinky = array();
$novinky[0] = array(
    'time_mr' => 'Mon, 9 Apr 2018 12:00:00 +0200',
    'time_hr' => '9. 4. 2018',
    'url' => 'https://'.$_SERVER['SERVER_NAME'],
    'titulek' => 'RSS kanál ukončen',
    'description' => 'Nové akce najdete na stránkách https://'.$_SERVER['SERVER_NAME'].CALENDAR_URL,
    'guid' => 'rssagragatorend',
);

$smarty->assign('dalsi', $dalsi);
$smarty->assign('novinky', $novinky);

if ($rss) {
    header('Content-Type: application/xml');
    $smarty->display('rss-agregator.xml.tpl');
    exit();
}

$smarty->assign('titulek', $titulek);
$smarty->display('hlavicka.tpl');
$smarty->display('rss-agregator.tpl');
$smarty->display('paticka.tpl');
