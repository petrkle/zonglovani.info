<?php

require '../init.php';
require '../func.php';
require $lib.'/Pager/Pager.php';

if (isset($_GET['query']) and strlen(trim($_GET['query'])) > 0) {
    $q = trim($_GET['query']);
}

$trail = new Trail();
$trail->addStep('Vyhledávání', '/vyhledavani/');

if (isset($q) and strlen($q) > 0) {
    $titulek = "$q - prohledávání žonglérova slabikáře";
    $trail->addStep('Výsledky vyhledávání');
} else {
    $titulek = 'Žonglérův slabikář - vyhledávání';
}

$smarty->assign('nahled', 'https://'.$_SERVER['SERVER_NAME'].'/img/h/hledani.png');
$smarty->assign('description', 'Hledání v žonglérově slabikáři');

$smarty->assign('titulek', $titulek);
$smarty->assign('nadpis', 'Vyhledávání');
$smarty->assign('notitle', true);
$smarty->assign('robots', 'noindex,nofollow');

$smarty->assign('trail', $trail->path);

if (isset($q)) {
    $smarty->assign('q', $q);
} else {
    $smarty->display('hlavicka.tpl');
    $smarty->display('vyhledavani.tpl');
    $smarty->display('paticka.tpl');
    exit();
}

if (isset($_GET['p'])) {
    $p = intval(preg_replace('/[^0-9]*/', '', $_GET['p']));
} else {
    $p = 1;
}

$perpage = 15;

try {
    $db = new PDO('mysql:host=127.0.0.1;port=9306;charset=utf8', '', '');
} catch (PDOException $e) {
    $smarty->assign('chyba', 'HTTP 503 [Service Temporarily Unavailable]');
    header('Status: 503 Service Temporarily Unavailable');
    header('Retry-After: 600');
    $smarty->display('hlavicka.tpl');
    $smarty->display('error-db.tpl');
    $smarty->display('paticka.tpl');
    exit();
}

$sth = $db->prepare("SELECT img, url, title, SNIPPET(content, :query, 'around=50', 'limit=180') AS snip FROM zonglovani WHERE MATCH(:query) LIMIT :start, :perpage;");
$start = ($p - 1) * $perpage;
$sth->bindParam(':start', $start, PDO::PARAM_INT);
$sth->bindParam(':perpage', $perpage, PDO::PARAM_INT);
$sth->bindParam(':query', $q);
$sth->execute();
$vysledky = $sth->fetchAll(PDO::FETCH_ASSOC);

$meta = $db->prepare('SHOW META');
$meta->execute();
$meta = $meta->fetchAll();

foreach ($meta as $m) {
    $meta_map[$m['Variable_name']] = $m['Value'];
}

$nalezeno = $meta_map['total'];

$pagerOptions = array(
    'mode' => 'Sliding',
    'delta' => 2,
        'firstLinkTitle' => 'První stránka',
    'perPage' => $perpage,
    'altPrev' => 'Předchozí stránka',
    'altNext' => 'Další stránka',
    'altPage' => 'Stránka',
    'separator' => '&nbsp;',
    'spacesBeforeSeparator' => 1,
    'spacesAfterSeparator' => 1,
        'append' => false,
        'linkClass' => 'pl',
        'firstLinkNull' => false,
        'fileName' => "?query=$q&p=%d",
        'currentPage' => $p,
    'totalItems' => $nalezeno,
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

if (count($vysledky) == 0) {
    $smarty->assign('chyba', 'Nic nenalezeno :-(');
    $smarty->assign('title', $q.' - nic nenalezeno');
    $smarty->display('hlavicka.tpl');
    $smarty->display('vyhledavani.tpl');
    $smarty->display('vyhledavani-nenalezeno.tpl');
    $smarty->display('vyhledavani-kam-dal.tpl');
    $smarty->display('paticka.tpl');
} else {
    $smarty->display('hlavicka.tpl');
    $smarty->assign('total', $nalezeno);
    $smarty->assign('vysledky', $vysledky);
    $smarty->display('vysledky.tpl');
    $smarty->display('paticka.tpl');
}
