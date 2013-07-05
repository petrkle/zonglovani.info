<?php
require('../init.php');
require('../func.php');

$titulek='Odborné texty o žonglování';

$smarty->assign('titulek',$titulek);
$smarty->assign('feedback',true);

$smarty->assign('keywords',make_keywords($titulek).', žonglování, tisk, pdf');
$smarty->assign('description','České odborné práce o žonglování.');

$smarty->assign('nahled','http://'.$_SERVER['SERVER_NAME'].'/img/e/etitb.jpg');

$trail = new Trail();
$trail->addStep('Informace o žonglování','/ostatni.html');
$trail->addStep('Literatura','/literatura.html');
$trail->addStep('Odborné texty');

$dalsi=array(
	array('url'=>'/literatura.html','text'=>'Literatura o žonglování','title'=>'Knížky o žonglovani'),
	);
$smarty->assign_by_ref('dalsi',$dalsi);

$smarty->assign_by_ref('trail', $trail->path);
$smarty->display('hlavicka.tpl');
$smarty->display('ostatni-odborne-texty.tpl');
$smarty->display('paticka.tpl');