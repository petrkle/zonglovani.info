<?php
require('../init.php');
require('../func.php');

$titulek='Žonglování na síti';
$smarty->assign('titulek',$titulek);
$smarty->assign('feedback',true);

$smarty->assign('keywords',make_keywords($titulek).', odkazy');
$smarty->assign('description','Odkazy na další dobré stránky o žonglování.');

$trail = new Trail();
$trail->addStep('Informace o žonglování','/ostatni.html');
$trail->addStep('Odkazy');
$smarty->assign('nahled','http://'.$_SERVER['SERVER_NAME'].'/img/w/www.png');

$smarty->assign_by_ref('trail', $trail->path);
$smarty->display('hlavicka.tpl');
$smarty->display('ostatni-odkazy.tpl');
$smarty->display('paticka.tpl');

?>
