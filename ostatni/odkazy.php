<?php
require('../init.php');
require('../func.php');

$titulek='Žonglování na síti';
$smarty->assign('titulek',$titulek);

$smarty->assign('keywords',make_keywords($titulek).', odkazy');
$smarty->assign('description','Odkazy na další dobré stránky o žonglování.');

$dalsi=array(
	array('url'=>LIDE_URL.'dovednost/shop.html','text'=>'Žonglérské obchody','title'=>'Seznam žonglérských obchodů'),
	array('url'=>'/literatura.html','text'=>'Literatura o žonglování','title'=>'Čtení o žonglování'),
	);
$smarty->assign_by_ref('dalsi',$dalsi);

$trail = new Trail();
$trail->addStep('Informace o žonglování','/ostatni.html');
$trail->addStep('Odkazy');
$smarty->assign('nahled','http://'.$_SERVER['SERVER_NAME'].'/img/w/www.png');

$smarty->assign_by_ref('trail', $trail->path);
$smarty->display('hlavicka.tpl');
$smarty->display('ostatni-odkazy.tpl');
$smarty->display('paticka.tpl');

?>
