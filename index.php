<?php

require 'init.php';
require 'func.php';

$smarty->assign('titulek', 'Žonglérův slabikář - žonglování s míčky, kruhy a kužely');
$smarty->assign('nadpis', '');
$smarty->assign('keywords', 'žonglování, míčky, kruhy, kužely');
$smarty->assign('description', 'Žonglování s míčky, kruhy a kužely.');
$smarty->assign('notitle', true);
$smarty->assign('stylwidth', IMG_CSS_WIDTH);

$smarty->display('hlavicka.tpl');
$smarty->display('index.tpl');
$smarty->display('paticka.tpl');
