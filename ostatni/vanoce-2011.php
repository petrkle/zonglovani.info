<?php
require('../init.php');
require('../func.php');
$titulek='Veselé Vánoce';
$smarty->assign('titulek',$titulek.' 2011');
$smarty->assign('nadpis',$titulek);
$smarty->assign('keywords',make_keywords($titulek).', žonglování');
$smarty->assign('description','Veselé Vánoce 2011 všem žonglérkám a žonglérům.');
$smarty->assign('feedback',true);
$smarty->assign('nahled','https://'.$_SERVER['SERVER_NAME'].'/img/d/diabolo-sipek.s.jpg');
$trail = new Trail();
$trail->addStep('Tip týdne','/tip');
$trail->addStep($titulek);
$smarty->assign('trail', $trail->path);

$dalsi=array(
	array('url'=>'/obrazky/zongleruv-slabikar-na-papire-20111218/','text'=>'Žonglérův slabikář na papíře','title'=>'Obrázky'),
	);

$smarty->assign('dalsi',$dalsi);
$smarty->display('hlavicka.tpl');
$smarty->display('ostatni-vanoce-2011.tpl');
$smarty->display('paticka.tpl');
