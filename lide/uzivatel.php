<?php
require('../init.php');
require('../func.php');
require('dovednosti.php');
require('pusobiste.php');
require('../horoskop/horoskop-data.php');

if(isset($_GET['id'])){
	$id=$_GET['id'];
}else{
	$id='';
}

$trail = new Trail();
$trail->addStep('Seznam žonglérů',LIDE_URL);

$uzivatel_props=get_user_complete($id);

if($uzivatel_props){

if($uzivatel_props['login']=='pek' and $_SESSION['uzivatel']['login']!='pek'){
	header('HTTP/1.1 301 Moved Permanently');
	header('Location: /kontakt.html');
	exit();
}

if($uzivatel_props['status']=='ok'){

	$smarty->assign('pusobiste',$pusobiste);
	$smarty->assign('dovednosti',$dovednosti);

	$smarty->assign('titulek',$uzivatel_props['jmeno']);
	$smarty->assign('nadpis','none');
	$smarty->assign('notitle',true);
	$smarty->assign('zverokruh',$zverokruh);
	$smarty->assign('uzivatel_props',$uzivatel_props);

	$trail->addStep($uzivatel_props['jmeno']);
	$smarty->assign_by_ref('trail', $trail->path);
	$smarty->display('hlavicka.tpl');
	$smarty->display('uzivatel.tpl');
	$smarty->display('paticka.tpl');
}else{
	require('../404.php');
	exit();
}

}else{
	require('../404.php');
	exit();
}


?>
