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

$uzivatel_props=get_user_props($id);

if($uzivatel_props){

if($uzivatel_props['login']=='pek' and isset($_SESSION['uzivatel']['login']) and $_SESSION['uzivatel']['login']!='pek'){
	header('HTTP/1.1 301 Moved Permanently');
	header('Location: /kontakt.html');
	exit();
}

$dov=get_user_dovednosti($id);
if($dov){
	$uzivatel_props['dovednosti']=$dov;
	$smarty->assign('dovednosti',$dovednosti);
}

$pus=get_user_pusobiste($id);
if($pus){
	$uzivatel_props['pusobiste']=$pus;
	$smarty->assign('pusobiste',$pusobiste);
}

if($uzivatel_props['status']=='ok'){
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
