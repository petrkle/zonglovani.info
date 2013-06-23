<?php
require('../init.php');
require('../func.php');

$titulek='Mapa stránek';
$smarty->assign('titulek',$titulek);
$smarty->assign('keywords',make_keywords($titulek).', žonglování');
$smarty->assign('description','Seznam všech stránek v žonglérově slabikáři.');
$smarty->assign('nahled','http://'.$_SERVER['SERVER_NAME'].'/img/k/kompas.png');

$trail = new Trail();
$trail->addStep('Mapa stránek');
$smarty->assign_by_ref('trail', $trail->path);

$dalsi=array(
	array('url'=>'/vyhledavani/','text'=>'Vyhledávání v žonglérově slabikáři','title'=>'Fulltext'),
	);
$smarty->assign_by_ref('dalsi',$dalsi);

$smarty->display('hlavicka.tpl');
$smarty->display('mapa-stranek.tpl');
$mapa=$_SERVER['DOCUMENT_ROOT'].'/mapa-stranek.inc';
if(is_readable($mapa)){
	include($mapa);
}
$smarty->display('paticka.tpl');
