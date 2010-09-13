<?php
require('../init.php');
require('../func.php');


if (isset($_GET['show'])) {
  $show='xml/'.$_GET['show'];
}else{
	$show='';
}

$titulek='Žonglování se třemi kruhy';
$smarty->assign('feedback',true);

$trail = new Trail();
$trail->addStep('Kruhy','/kruhy/');

if(strlen($show)>0 and is_file('../'.$show.'.xml')){
  // vykreslí jeden trik
	
	$trik=nacti_trik($show);
	$smarty->assign('trik',$trik);
	$smarty->assign('titulek',$titulek.' - '.$trik['about']['nazev']);
	$smarty->assign('nadpis',$trik['about']['nazev']);
	$smarty->assign('nahled',get_nahled($trik));
	$smarty->assign('description',get_description($trik));
	$trail->addStep($trik['about']['nazev']);
	$smarty->assign_by_ref('trail', $trail->path);
	$smarty->assign('keywords',make_keywords($titulek.','.$trik['about']['nazev']));
	$smarty->display('hlavicka.tpl');
	$smarty->display('trik.tpl');
	$smarty->display('paticka.tpl');

}else{
  // když není vybrán trik
	header('HTTP/1.1 301 Moved Permanently');
	header('Location: /kruhy/');
	exit();
}
?>
