<?php
require('../init.php');
require('../func.php');

$titulek='Video návody';

$smarty->assign('keywords','žonglování, video, návod');
$smarty->assign('description','Video návody k trikům ze žonglérova slabikáře.');

$smarty->assign('titulek',$titulek);

$trail = new Trail();
$trail->addStep('Žonglérská videa','/video/');
$trail->addStep('Triky ze žonglérova slabikáře','/video/navod/');
$trail->addStep('Info');

$smarty->assign('nahled','https://'.$_SERVER['SERVER_NAME'].'/img/v/video.png');

$dalsi=array(
	array('url'=>'/video/navod/','text'=>'Triky ze žonglérova slabikáře - videa','title'=>'Video návody na žonglování'),
	array('url'=>'http://juggling.tv/users/4431/zonglovani.info','text'=>'Žonglérův slabikář na juggling.tv','title'=>'juggling.tv'),
	array('url'=>'http://www.youtube.com/ZongleruvSlabikar','text'=>'Žonglérův slabikář na youtube.com','title'=>'youtube.com'),
	);
$smarty->assign('dalsi',$dalsi);

$smarty->assign('trail', $trail->path);
$smarty->display('hlavicka.tpl');
$smarty->display('navody-info.tpl');
$smarty->display('paticka.tpl');
