<?php

require '../init.php';
require '../func.php';
require '../rss/rss.php';

if (preg_match('/index\.php$/', $_SERVER['REQUEST_URI'])) {
    header('HTTP/1.1 301 Moved Permanently');
    header('Location: /novinky/');
    exit();
}

$titulek = 'Novinky';
$trail = new Trail();
$trail->addStep($titulek);

if (isset($_GET['rss'])) {
    $rss = $_GET['rss'];
} else {
    $rss = false;
}

if (is_logged() and isset($_SESSION['changes']) and is_array($_SESSION['changes']) and count($_SESSION['changes'] > 0)) {
    unset($_SESSION['changes_pocet']);
}

$smarty->assign('trail', $trail->path);

$smarty->assign('styly', 'r');
$smarty->assign('keywords', 'novinky, žonglování, rss');
$smarty->assign('description', 'Novinky ze světa žonglování');
$tipy = get_tipy();
$smarty->assign('tip', array_shift($tipy));

$dalsi = array(
    array('url' => '/tip/', 'text' => 'Tip týdne', 'title' => 'Žonglérský tip týdne'),
    array('url' => '/novinky/agregator.xml', 'text' => 'http://'.$_SERVER['SERVER_NAME'].'/novinky/agregator.xml', 'title' => 'RSS kanál'),
    array('url' => '/rss.html', 'text' => 'RSS kanály žonglérova slabikáře', 'title' => 'RSS kanály žonglérova slabikáře'),
    array('url' => CALENDAR_URL.'rss-a-icalendar.html#rss', 'text' => 'Jak nastavit RSS', 'title' => 'Jak nastavivt RSS čtečku'),
    );
$smarty->assign('dalsi', $dalsi);

$novinky = get_news(40);
$smarty->assign('rss_zdroje', $rss_zdroje);
$smarty->assign('novinky', $novinky);

if ($rss) {
    $novinky = uniqurl($novinky);
    header('Content-Type: application/xml');
    $smarty->display('rss-agregator.xml.tpl');
    exit();
}

function uniqurl($novinky)
{
    $adresy = array();
    foreach ($novinky as $key => $novinka) {
        if (isset($adresy[$novinka['url']])) {
            $novinky[$key]['url'] .= '#'.$adresy[$novinka['url']];
            ++$adresy[$novinka['url']];
        } else {
            $adresy[$novinka['url']] = 1;
        }
    }

    return $novinky;
}

$smarty->assign('titulek', $titulek);
$smarty->display('hlavicka.tpl');
$smarty->display('rss-agregator.tpl');
$smarty->display('paticka.tpl');
