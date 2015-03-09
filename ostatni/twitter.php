<?php
require('../init.php');
require('../func.php');
$titulek='Twitter - žonglování';
$smarty->assign('keywords',make_keywords($titulek));
$smarty->assign('description','Žonglování na twitteru');
$smarty->assign('titulek',$titulek);
$smarty->assign('nadpis','Twitter');
$smarty->assign('nahled','https://'.$_SERVER['SERVER_NAME'].'/img/t/twitter.png');
$dalsi=array(
	array('url'=>'http://facebook.com/zongleruv.slabikar','text'=>'Žonglérův slabikář na Facebooku','title'=>'Facebook'),
	array('url'=>'/rss.html','text'=>'RSS kanály','title'=>'RSS kanály žonglérova slabikáře'),
	);
$smarty->assign('dalsi',$dalsi);
$trail = new Trail();
$trail->addStep($titulek);
$smarty->assign('trail', $trail->path);
$smarty->display('hlavicka.tpl');
$smarty->display('twitter.tpl');
$smarty->display('paticka.tpl');
