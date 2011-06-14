<?php
require('../init.php');
require('../func.php');
$titulek='Žonglérův slabikář v mobilu';
$smarty->assign('keywords',make_keywords($titulek).', žonglování');
$smarty->assign('description','Užij si žonglování i v mobilu.');
$smarty->assign('titulek',$titulek);
$trail = new Trail();
$trail->addStep($titulek);
$smarty->assign_by_ref('trail', $trail->path);
$dalsi=array(
	array('url'=>'/download/mobi.html','text'=>'Žonglérův slabikář pro Amazon Kindle','title'=>'Žonglérův slabikář ve formátu mobi.'),
	);
$smarty->assign_by_ref('dalsi',$dalsi);
$smarty->assign('nahled','http://'.$_SERVER['SERVER_NAME'].'/img/m/mobil-optimus-one.s.jpg');
$smarty->display('hlavicka.tpl');
$smarty->display('ostatni-mobil.tpl');
$smarty->display('paticka.tpl');
?>