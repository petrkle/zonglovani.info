<?php
require('../init.php');
require('../func.php');

if (isset($_GET['show'])) {
  $show='xml/'.$_GET['show'];
}else{
	$show='';
}

$titulek='Passing';
$smarty->assign('feedback',true);

$trail = new Trail();
$trail->addStep('Kužely','/kuzely/');
$trail->addStep($titulek,'/kuzely/passing/');

if(strlen($show)>0 and is_file('../'.$show.'.xml')){
	$trik=nacti_trik($show);
	$smarty->assign('trik',$trik);
	$smarty->assign('titulek',$titulek.' - '.$trik['about']['nazev']);
	$smarty->assign('nadpis',$trik['about']['nazev']);
	$smarty->assign('nahled',get_nahled($trik));
	$smarty->assign('description',get_description($trik));
	$smarty->assign('keywords',make_keywords($titulek.','.$trik['about']['nazev']));
	$trail->addStep($trik['about']['nazev']);
	$smarty->assign_by_ref('trail', $trail->path);
	$smarty->display('hlavicka.tpl');
	$smarty->display('trik.tpl');
	$smarty->display('paticka.tpl');

}elseif(strlen($show)>0 and !is_file('../'.$show.'.xml')){
	require('../404.php');
	exit();
}else{
	$smarty->assign_by_ref('trail', $trail->path);
	$smarty->assign('titulek',$titulek);
	$smarty->assign('nahled','http://'.$_SERVER['SERVER_NAME'].'/img/k/kuzely-passing-introb.png');
	$smarty->assign('description','Passing s kužely. Královská disciplína žonglování. Užiješ si při ní nejvíc legrace.');
	$smarty->assign('keywords','žonglování, passing, kužely, triky');
	$smarty->display('hlavicka.tpl');
	$smarty->display('kuzely-passing.tpl');
	$smarty->display('paticka.tpl');
}
?>
