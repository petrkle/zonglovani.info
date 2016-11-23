<?php

require '../init.php';
require '../func.php';
require 'dovednosti.php';
require $lib.'/Pager/Pager.php';

$smarty->assign('dovednosti', $dovednosti);

if ($_SERVER['REQUEST_URI'] == '/lide/stranka1/') {
    header('HTTP/1.1 301 Moved Permanently');
    header('Location: '.LIDE_URL);
    exit();
}

$loginy = get_zajimeve_loginy();
$lide = array();
foreach ($loginy as $login) {
    $lide[$login] = get_name($login);
}
uasort($lide, 'sort_by_jmeno');

$pagerOptions = array(
    'mode' => 'Sliding',
    'delta' => 2,
        'firstLinkTitle' => 'První stránka',
    'perPage' => 30,
    'altPrev' => 'Předchozí stránka',
    'altNext' => 'Další stránka',
    'altPage' => 'Stránka',
    'separator' => '&nbsp;',
    'spacesBeforeSeparator' => 1,
    'spacesAfterSeparator' => 1,
        'append' => false,
        'linkClass' => 'pl',
        'firstLinkNull' => true,
        'fileName' => 'stranka%d/',
    'itemData' => $lide,
);
$pager = &Pager::factory($pagerOptions);
$data = $pager->getPageData();

$smarty->assign('items', $data);
$smarty->assign('pager_links', $pager->links);
$smarty->assign(
    'page_numbers', array(
        'current' => $pager->getCurrentPageID(),
        'total' => $pager->numPages(),
    )
);

$titulek = 'Seznam žonglérů';
if ($pager->getCurrentPageID() != 1) {
    $titulek .= ' - '.$pager->getCurrentPageID().'. stránka';
}

if ($pager->getCurrentPageID() == $pager->numPages()) {
    $dalsistranka = LIDE_URL;
} else {
    $dalsistranka = LIDE_URL.'stranka'.(($pager->getCurrentPageID()) + 1).'/';
}

if ($pager->getCurrentPageID() == 1) {
    $predchozistranka = LIDE_URL.'stranka'.$pager->numPages().'/';
} else {
    $predchozistranka = LIDE_URL.'stranka'.(($pager->getCurrentPageID()) - 1).'/';
}

$hlavicky = array();
$hlavicky['dalsi'] = '<link rel="next" href="'.$dalsistranka.'" />';
$hlavicky['predchozi'] = '<link rel="previous" href="'.$predchozistranka.'" />';
$hlavicky['obsah'] = '<link rel="contents" href="'.LIDE_URL.'" />';
$hlavicky['prvni'] = '<link rel="first" href="'.LIDE_URL.'" />';
$hlavicky['posledni'] = '<link rel="last" href="'.LIDE_URL.'stranka'.$pager->numPages().'/'.'" />';
$hlavicky['nahoru'] = '<link rel="up" href="/" />';

if (count($hlavicky) > 0) {
    $smarty->assign('custom_headers', $hlavicky);
}

$smarty->assign('nadpis', 'Seznam žonglérů');
$smarty->assign('keywords', 'žonglování, workshop, žongléři, dílna, žonglér, žonglérka, sezna žonglérů, vystoupení, fireshow, akrobacie');
$smarty->assign('description', $pager->getCurrentPageID().'. stránka seznamu žonglérů a žonglérek kteří umí veřejné vystoupení, fireshow i žonglérské dílny.');
$trail = new Trail();
$trail->addStep($titulek, LIDE_URL);
$smarty->assign('feedback', true);

$smarty->assign('trail', $trail->path);
$smarty->assign('titulek', $titulek);
$smarty->display('hlavicka.tpl');
$smarty->display('lide.tpl');
$smarty->display('paticka.tpl');
