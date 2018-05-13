<?php

require '../init.php';
require '../func.php';

$titulek = 'Kontakt';
$smarty->assign('titulek', $titulek);
$smarty->assign('nadpis', $titulek);

$smarty->assign('keywords', make_keywords($titulek.', žonglování'));
$smarty->assign('description', 'Kontakt na autora žonglérova slabikáře.');
$smarty->assign('nahled', 'https://'.$_SERVER['SERVER_NAME'].'/img/m/micky-logo.gif');

$dalsi = array(
    array('url' => '/proc-a-jak.html', 'text' => 'Proč a jak vznikl žonglérův slabikář', 'title' => 'Proč a jak vznikl žonglérův slabikář'),
    array('url' => 'https://github.com/petrkle/zonglovani.info/commits/master', 'text' => 'Seznam změn', 'title' => 'Změny v žonglérově slabikáři'),
    );
$smarty->assign('dalsi', $dalsi);

$smarty->assign('stylwidth', IMG_CSS_WIDTH);
$trail = new Trail();
$trail->addStep($titulek);
$smarty->assign('trail', $trail->path);
$smarty->display('hlavicka.tpl');
$smarty->display('kontakt.tpl');
$smarty->display('paticka.tpl');
