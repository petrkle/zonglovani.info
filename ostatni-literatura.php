<?php
require('init.php');
require('func.php');

$titulek='Literatura';

$smarty->assign('titulek',$titulek);
$smarty->assign('feedback',true);

$smarty->assign('keywords',make_keywords($titulek).', žonglování, tisk, pdf');
$smarty->assign('description','Česká a anglická literatura o žonglování. Volně ke stažení - formát pdf, vhodný pro tisk.');

$trail = new Trail();
$trail->addStep('Informace o žonglování','/ostatni.html');
$trail->addStep($titulek);

$dalsi=array(
	array('url'=>'/odkazy.html','text'=>'Žonglování na síti','title'=>'Odkazy na žonglérské stránky'),
	array('url'=>'/aczslovnicek.html','text'=>'žonglérský slovníček','title'=>'Anglicko-český žonglérský slovníček')
	);
$smarty->assign_by_ref('dalsi',$dalsi);

$smarty->assign_by_ref('trail', $trail->path);
$smarty->display('hlavicka.tpl');
$smarty->display('ostatni-literatura.tpl');
$smarty->display('paticka.tpl');

?>
