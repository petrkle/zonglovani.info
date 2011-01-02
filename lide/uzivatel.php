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

$loginy=get_loginy();
$lide=array();
foreach($loginy as $login){
	$lide[$login]=get_name($login);
}
uasort($lide, 'sort_by_jmeno'); 
$pozice=array_keys($lide);
$mojepozice=array_search($id,$pozice);

	$navigace=array();

	if(isset($pozice[$mojepozice+1])){
		$navigace['dalsi']=array('url'=>$pozice[$mojepozice+1].'.html','text'=>$lide[$pozice[$mojepozice+1]],'title'=>'Další žonglér: '.$lide[$pozice[$mojepozice+1]]);
	}else{
		$navigace['dalsi']=array('url'=>$pozice[0].'.html','text'=>$lide[$pozice[0]],'title'=>'Další dovednost: '.$dovednosti[$pozice[0]]);
	}

	if(isset($pozice[$mojepozice-1])){
		$navigace['predchozi']=array('url'=>$pozice[$mojepozice-1].'.html','text'=>$lide[$pozice[$mojepozice-1]],'title'=>'Předchozí žonglér: '.$lide[$pozice[$mojepozice-1]]);
	}else{
		$navigace['predchozi']=array('url'=>$pozice[count($pozice)-1].'.html','text'=>$lide[$pozice[count($pozice)-1]],'title'=>'Předchozí žonglér: '.$lide[$pozice[count($pozice)-1]]);
	}

	$smarty->assign('styly',array('/a.css'));
	$smarty->assign_by_ref('navigace',$navigace);

	$smarty->assign('keywords',make_keywords($uzivatel_props['jmeno'].' '.' žonglér, žonglérka'));
	$smarty->assign('description',$uzivatel_props['jmeno'].' - žonglování');

	$smarty->assign('pusobiste',$pusobiste);
	$smarty->assign('dovednosti',$dovednosti);

	$smarty->assign('titulek',$uzivatel_props['jmeno']);
	$smarty->assign('nadpis','none');
	$smarty->assign('notitle',true);
	$smarty->assign('zverokruh',$zverokruh);
	$smarty->assign('uzivatel_props',$uzivatel_props);
	$smarty->assign('hcard',true);

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
