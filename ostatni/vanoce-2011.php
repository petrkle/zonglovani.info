<?php
require('../init.php');
require('../func.php');
$titulek='Veselé Vánoce';
$smarty->assign('titulek',$titulek.' 2011');
$smarty->assign('nadpis',$titulek);
$smarty->assign('keywords',make_keywords($titulek).', žonglování');
$smarty->assign('description','Veselé Vánoce 2011 všem žonglérkám a žonglérům.');
$trail = new Trail();
$trail->addStep('Tip týdne','/tip');
$trail->addStep($titulek);
$smarty->assign_by_ref('trail', $trail->path);

$dalsi=array(
	array('url'=>'/obrazky/zongleruv-slabikar-na-papire-20111218/','text'=>'Žonglérův slabikář na papíře','title'=>'Obrázky'),
	);

$smarty->assign_by_ref('dalsi',$dalsi);
$smarty->display('hlavicka.tpl');
$smarty->display('ostatni-vanoce-2011.tpl');
$smarty->display('paticka.tpl');