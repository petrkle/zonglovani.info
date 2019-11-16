<?php

require '../init.php';
require '../func.php';

$titulek = 'Jak odkazovat na žonglérův slabikář';
$smarty->assign('titulek', $titulek);

$smarty->assign('keywords', make_keywords($titulek));
$smarty->assign('description', 'Připravené kusy html kódu pro vytváření odkazů na žonglérův slabikář.');

$smarty->assign('nahled', 'https://'.$_SERVER['SERVER_NAME'].'/img/p/podporaa.png');

$dalsi = array(
    array('url' => '/podpor-zongleruv-slabikar.html', 'text' => 'Podpoř žonglérův slabikář', 'title' => 'Jak dál podpoři žonglérův slabikář'),
    array('url' => '/opensource.html', 'text' => 'Zdrojový kód žonglérova slabikáře', 'title' => 'github.com'),
    array('url' => '/isbn.html', 'text' => 'ISBN žonglérova slabikáře', 'title' => 'ISBN 978-80-260-6534-0'),
    );
$smarty->assign('dalsi', $dalsi);

$trail = new Trail();
$trail->addStep($titulek);
$smarty->assign('trail', $trail->path);
$smarty->display('hlavicka.tpl');
$smarty->display('ostatni-jak-odkazovat.tpl');
$smarty->display('paticka.tpl');
