<?php
require('../init.php');
require('../func.php');

$titulek='Literatura o žonglování';

$smarty->assign('titulek',$titulek);
$smarty->assign('feedback',true);

$smarty->assign('keywords',make_keywords($titulek).', žonglování, tisk, pdf');
$smarty->assign('description','Česká a anglická literatura o žonglování. Volně ke stažení - formát pdf, vhodný pro tisk.');

$smarty->assign('nahled','https://'.$_SERVER['SERVER_NAME'].'/img/e/etitb.s.jpg');

$trail = new Trail();
$trail->addStep('Informace o žonglování','/ostatni.html');
$trail->addStep('Literatura');

$dalsi=array(
	array('url'=>'/navody/','text'=>'Návody na žonglování v pdf','title'=>'Formát vhodný k tisku'),
	array('url'=>'/odkazy.html','text'=>'Žonglování na síti','title'=>'Odkazy na žonglérské stránky'),
	array('url'=>'/download/','text'=>'Soubory ke stažení','title'=>'Off-line verze žonglérova slabikáře'),
	array('url'=>'/odborne-texty.html','text'=>'Odborné texty o žonglování','title'=>'Odborné texty o žonglování'),
	array('url'=>'/isbn.html','text'=>'ISBN žonglérova slabikáře','title'=>'ISBN 978-80-260-6534-0'),
	);
$smarty->assign('dalsi',$dalsi);

$smarty->assign('trail', $trail->path);
$smarty->display('hlavicka.tpl');
$smarty->display('ostatni-literatura.tpl');
$smarty->display('paticka.tpl');
