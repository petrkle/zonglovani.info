<?php
require('../init.php');
require('../func.php');
require('admin.func.php');

if(is_logged() and $_SESSION['uzivatel']['login']=='pek'){

$titulek='admin';

$smarty->assign('styly',array('s'));
$trail = new Trail();
$trail->addStep($titulek,'/admin');

$prihlaseni=get_login_stat(get_loginy());
$smarty->assign('prihlaseni', $prihlaseni);

if(isset($_GET['detail'])){
	$detail=$_GET['detail'];
	$smarty->assign('detail',get_login_detail($detail));
	$trail->addStep($detail);
	$smarty->assign('uzivatel',get_user_complete($detail));
	$smarty->assign('titulek',$detail);
	$smarty->assign('trail', $trail->path);
	$smarty->display('hlavicka-w.tpl');
	$smarty->display('admin-detail.tpl');
	$smarty->display('paticka-w.tpl');
	exit();
}

$smarty->assign('trail', $trail->path);
$smarty->assign('titulek',$titulek);
$smarty->display('hlavicka-w.tpl');
$smarty->display('admin.tpl');
$smarty->display('paticka-w.tpl');

}else{
	require('../404.php');
	exit();
}
