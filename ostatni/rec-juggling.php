<?php
require('../init.php');
require('../func.php');

$titulek='rec.juggling';
$smarty->assign('titulek',$titulek);
$smarty->assign('feedback',true);

$smarty->assign('keywords',make_keywords($titulek).', žonglování');
$smarty->assign('description','Celosvětová diskusní skupina o žonglování - rec.juggling');

$dalsi=array(
	array('url'=>'/odkazy.html','text'=>'Žonglování na síti','title'=>'Odkazy na stránky věnované žonglování'),
	array('url'=>'/aczslovnicek.html','text'=>'Žonglérský slovníček','title'=>'Anglicko-český žonglérský slovníček'),
	);
$smarty->assign_by_ref('dalsi',$dalsi);

$trail = new Trail();
$trail->addStep('Informace o žonglování','/ostatni.html');
$trail->addStep($titulek);
$smarty->assign_by_ref('trail', $trail->path);

$smarty->display('hlavicka.tpl');
$smarty->display('ostatni-rec-juggling.tpl');
$smarty->display('paticka.tpl');

?>
