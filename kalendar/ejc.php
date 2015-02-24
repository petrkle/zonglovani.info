<?php
require('../init.php');
require('../func.php');

$titulek='EJC';
$smarty->assign('titulek',$titulek);
$smarty->assign('nadpis','EJC - evropské setkání žonglérů');

$smarty->assign('keywords','EJC, European juggling convention, evropské setkání žonglérů.');
$smarty->assign('description','Informace o evropském setkání žonglérů.');
$smarty->assign('nahled','https://'.$_SERVER['SERVER_NAME'].'/img/e/ejc2015.png');

$trail = new Trail();
$trail->addStep('Kalendář',CALENDAR_URL);
$trail->addStep($titulek);
$smarty->assign_by_ref('trail', $trail->path);

$smarty->display('hlavicka.tpl');
$smarty->display('kalendar-ejc.tpl');
$smarty->display('paticka.tpl');
