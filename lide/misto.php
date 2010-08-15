<?php
require('../init.php');
require('../func.php');
require('pusobiste.php');
$smarty->assign('pusobiste',$pusobiste);

$trail = new Trail();
$trail->addStep('Seznam žonglérů',LIDE_URL);
$smarty->assign('feedback',true);

if(isset($_GET['filtr'])){
	$filtr=$_GET['filtr'];
	if(isset($pusobiste[$filtr])){
		$smarty->assign('titulek','Žonglování - '.$pusobiste[$filtr]['nazev']);
		$smarty->assign('nadpis','Žongléři '.$pusobiste[$filtr]['odkud']);
		$smarty->assign('description','Žongléři a žonglérky působící '.$pusobiste[$filtr]['kde'].'.');
		$smarty->assign('keywords','žonglování, '.$pusobiste[$filtr]['nazev'].', žongléři, žonglérky, žonglér, žonglérka');
	}else{
		require('../404.php');
		exit();
	}
}else{
	$filtr=false;
}

if($filtr){
	$uzivatele=array();
	foreach(get_loginy() as $login){
		$foo=get_user_pusobiste($login);
		if(is_array($foo) and in_array($filtr,$foo) and $login!='pek'){
				$uzivatele[$login]=get_user_props($login);
				$uzivatele[$login]['pusobiste']=$foo;
		}
	}
	if(count($uzivatele)>0){
		uasort($uzivatele, 'sort_by_jmeno_zonglera'); 
		$smarty->assign('uzivatele',$uzivatele);
	}
	$trail->addStep('Podle místa',LIDE_URL.'misto/');
	$trail->addStep($pusobiste[$filtr]['nazev']);
	$smarty->assign_by_ref('trail', $trail->path);

	$smarty->assign('misto',$pusobiste[$filtr]['odkud']);
	$smarty->display('hlavicka.tpl');
	$smarty->display('lide-misto.tpl');
	$smarty->display('paticka.tpl');
}else{
	$trail->addStep('Podle místa',LIDE_URL.'misto/');
	$smarty->assign_by_ref('trail', $trail->path);
	$smarty->assign('titulek','Žongléři podle místa působení');
	$smarty->display('hlavicka.tpl');
	$smarty->display('lide-pusobiste.tpl');
	$smarty->display('paticka.tpl');
}

?>

