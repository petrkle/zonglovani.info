<?php

require('init.php');
require('func.php');
$titulek='Jak začít žonglovat s kruhy';
$smarty->assign('feedback',true);

$trail = new Trail();
$trail->addStep('Kruhy','/kruhy/');
$smarty->assign('titulek',$titulek);
$smarty->assign('keywords',make_keywords($titulek));
$trail->addStep($titulek);
$smarty->assign_by_ref('trail', $trail->path);
$smarty->display('hlavicka.tpl');
$smarty->display('kruhy-jak-zacit.tpl');
$smarty->display('paticka.tpl');

?>
