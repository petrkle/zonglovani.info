<?php
require('../init.php');
require('../func.php');

$titulek='Použitý software';
$smarty->assign('feedback',true);

$smarty->assign('keywords',make_keywords($titulek).', žonglování');
$smarty->assign('description','Programy použité při výrobě žonglérova slabikáře.');
$smarty->assign('nahled','https://'.$_SERVER['SERVER_NAME'].'/img/u/ulamovaci-nuz.s.jpg');

$smarty->assign('titulek',$titulek);

$trail = new Trail();
$trail->addStep($titulek);

$dalsi=array(
	array('url'=>'https://github.com/petrkle/zonglovani.info/','text'=>'github.com/petrkle/zonglovani.info','title'=>'Zdrojové kódy žonglérova slabikáře'),
	array('url'=>'/css/','text'=>'Kaskádové styly','title'=>'Seznam kaskádových stylů'),
	);
$smarty->assign('dalsi',$dalsi);

$smarty->assign('trail', $trail->path);
$smarty->display('hlavicka.tpl');
$smarty->display('toolbox.tpl');
$smarty->display('paticka.tpl');
