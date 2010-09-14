<?php
require('../init.php');
require('../func.php');

$titulek='Žonglování s míčky';
$smarty->assign('feedback',true);
$smarty->assign('titulek',$titulek);
$smarty->assign('description','Míčky jsou nejjednodušší žonglérské náčiní. Snadno se hážou i chytají. I ty se můžeš naučit žonglovat za pár minut.');

$trail = new Trail();
$trail->addStep('Míčky');
$smarty->assign_by_ref('trail', $trail->path);

$smarty->display('hlavicka.tpl');
$smarty->display('micky.tpl');
$smarty->display('paticka.tpl');

?>