<?php
require('../init.php');
require('../func.php');

$titulek='Literatura';
$smarty->assign('feedback',true);

$smarty->assign('titulek','Simulátory žonglování');
$smarty->assign('keywords',make_keywords($titulek));
$smarty->assign('description','Programy pro animaci žonglování na počítači.');
$smarty->assign('nahled','https://'.$_SERVER['SERVER_NAME'].'/img/j/jugglinglab.png');

$dalsi=array(
	array('url'=>'/literatura.html','text'=>'Knížky o žonglování','title'=>'Seznam knížek o žonglování.'),
	array('url'=>'/siteswap.html','text'=>'Siteswap','title'=>'Zápis žonglování pomocí čísel')
	);
$smarty->assign('dalsi',$dalsi);

$trail = new Trail();
$trail->addStep('Informace o žonglování','/ostatni.html');
$trail->addStep('Software');

$smarty->assign('trail', $trail->path);
$smarty->display('hlavicka.tpl');
$smarty->display('ostatni-software.tpl');
$smarty->display('paticka.tpl');
