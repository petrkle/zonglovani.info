<?php

require '../init.php';
require '../func.php';

if (is_logged()) {
    header('Location: https://'.$_SERVER['SERVER_NAME'].'/lide/odhlaseni.php');
    exit();
}

$smarty->assign('titulek', 'Odhlášení');
$smarty->assign('nadpis', 'Odhlášení proběhlo úspěšně');

$smarty->assign('stylwidth', IMG_CSS_WIDTH);
$trail = new Trail();
$trail->addStep('Odhlášení');
$smarty->assign('trail', $trail->path);

$smarty->display('hlavicka.tpl');
$smarty->display('lide-odhlaseni-ok.tpl');
$smarty->display('paticka.tpl');
