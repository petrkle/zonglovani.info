<?php

require('init.php');
require('func.php');
$titulek='Žonglování s kruhy';

$smarty->assign('titulek',$titulek);
$smarty->assign('feedback',true);
$smarty->assign('keywords',make_keywords($titulek));

$trail = new Trail();
$trail->addStep('Kruhy','/kruhy/');

$smarty->assign_by_ref('trail', $trail->path);
$smarty->display('hlavicka.tpl');
$smarty->display('kruhy.tpl');
$smarty->display('paticka.tpl');

?>
