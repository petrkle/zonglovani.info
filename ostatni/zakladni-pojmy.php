<?php
require('../init.php');
require('../func.php');

$titulek='Žonglování - základní pojmy';
$smarty->assign('titulek',$titulek);
$smarty->assign('feedback',true);

$smarty->assign('keywords',make_keywords($titulek).', žonglování');
$smarty->assign('description','Základní žonglérská terminologie.');

$smarty->assign('nahled','https://'.$_SERVER['SERVER_NAME'].'/img/z/zongler.png');

$trail = new Trail();
$trail->addStep('Informace o žonglování','/ostatni.html');
$trail->addStep('Základní pojmy');

$smarty->assign_by_ref('trail', $trail->path);
$smarty->display('hlavicka.tpl');
$smarty->display('ostatni-zakladni-pojmy.tpl');
$smarty->display('paticka.tpl');
