<?php

require 'init.php';
require 'func.php';

$smarty->assign('titulek', 'Žonglérův slabikář - žonglování s míčky, kruhy a kužely');
$smarty->assign('nadpis', '');
$smarty->assign('keywords', 'žonglování, míčky, kruhy, kužely, seznam žonglérů');
$smarty->assign('description', 'Žonglování s míčky, kruhy a kužely. Seznamu žonglérů, kalendář žongléřských srazů a obrázky žonglování.');
$smarty->assign('notitle', true);
$tipy = get_tipy();
$smarty->assign('tip', array_shift($tipy));

$smarty->display('hlavicka.tpl');
$smarty->display('index.tpl');
$smarty->display('paticka.tpl');
