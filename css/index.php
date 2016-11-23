<?php

require '../init.php';
require '../func.php';

$titulek = 'Kaskádové styly';
$smarty->assign('titulek', $titulek);
$smarty->assign('description', 'Kaskádové styly použité v žonglérově slabikáři');

$vypis = array();
$adr = opendir('.');
while (false !== ($file = readdir($adr))) {
    if (preg_match('/.+\.css$/', $file)) {
        array_push($vypis, basename($file, '.css'));
    }
}
closedir($adr);
sort($vypis);

$dalsi = array(
    array('url' => '/toolbox.html', 'text' => 'Použitý software', 'title' => 'Seznam použitých programů'),
    array('url' => '/scripts/', 'text' => 'Skripty', 'title' => 'Skripty pro správu webu'),
    );
$smarty->assign('dalsi', $dalsi);

$trail = new Trail();
$trail->addStep($titulek);
$smarty->assign('trail', $trail->path);
$smarty->assign('vypis', $vypis);

$smarty->display('hlavicka.tpl');
$smarty->display('css.tpl');
$smarty->display('paticka.tpl');
