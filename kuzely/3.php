<?php
require('../init.php');
require('../func.php');
require('../cache.php');
http_cache_headers(3600);

if (isset($_GET['show'])) {
  $show='xml/'.$_GET['show'];
}else{
	$show='';
}

$titulek='Žonglování se třemi kužely';
$smarty->assign('feedback',true);

$trail = new Trail();
$trail->addStep('Kužely','/kuzely/');
$trail->addStep('3 kužely','/kuzely/3/');

if(strlen($show)>0 and is_file('../'.$show.'.xml')){
	$trik=nacti_trik($show);
	$smarty->assign('trik',$trik);
	$smarty->assign('titulek',$titulek.' - '.$trik['about']['nazev']);
	$smarty->assign('nadpis',$trik['about']['nazev']);
	$smarty->assign('nahled',get_nahled($trik));
	$smarty->assign('description',get_description($trik));
	$smarty->assign('keywords',make_keywords($titulek.','.$trik['about']['nazev']));
	$trail->addStep($trik['about']['nazev']);
	$smarty->assign('trail', $trail->path);
	$smarty->display('hlavicka.tpl');
	$smarty->display('trik.tpl');
	$smarty->display('paticka.tpl');

}elseif(strlen($show)>0 and !is_file('../'.$show.'.xml')){
	require('../404.php');
	exit();
}else{
	$smarty->assign('trail', $trail->path);
	$smarty->assign('titulek',$titulek);
	$smarty->assign('triky',get_seznam_triku(__FILE__));
	$smarty->assign('nahled','https://'.$_SERVER['SERVER_NAME'].'/img/k/kuzely-logo.png');
	$smarty->assign('description','Návod na žonglování se třemi kužely.');
	$smarty->assign('keywords','žonglování, kužely, triky, návody');
	$smarty->display('hlavicka.tpl');
	$smarty->display('seznam-triku.tpl');
	$smarty->display('kuzely-3-pokrocili.tpl');
	$smarty->display('paticka.tpl');
}
