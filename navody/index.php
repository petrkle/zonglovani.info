<?php
require('../init.php');
require('../func.php');

$titulek='Návody na žonglování';
$smarty->assign('nadpis',$titulek);
$smarty->assign('keywords','žonglování, návod, pdf, tisk');
$smarty->assign('description','Návody na žonglování k vytištění - formát pdf.');
$trail = new Trail();
$trail->addStep($titulek,'/navody/');
$smarty->assign('nahled','https://'.$_SERVER['SERVER_NAME'].'/img/n/navod-tisk.png');

$dalsi=array(
	array('url'=>LIDE_URL.'pravidla.php','text'=>'Založení nového účtu','title'=>'Vytvoření účtu v žonglérově slabikáři'),
	array('url'=>'/literatura.html','text'=>'Literatura o žonglování','title'=>'Knížky o žonglování'),
	);
$smarty->assign('dalsi',$dalsi);

$smarty->assign('trail', $trail->path);
$smarty->assign('titulek',$titulek);
$smarty->display('hlavicka.tpl');
$smarty->display('navody.tpl');
$smarty->display('paticka.tpl');
