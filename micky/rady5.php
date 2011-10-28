<?php
require('../init.php');
require('../func.php');

$titulek='Jak na žonglování s pěti míčky';
$smarty->assign('titulek',$titulek);
$smarty->assign('feedback',true);

$smarty->assign('keywords',make_keywords($titulek));
$smarty->assign('description','Rady pro žonglování s pěti míčky.');

$trik=nacti_trik('micky-rady5');
$smarty->assign('trik',$trik);

$smarty->display('hlavicka.tpl');
$smarty->display('trik.tpl');
$smarty->display('paticka.tpl');

?>
