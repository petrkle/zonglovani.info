<?php
require('../init.php');
require('../func.php');
require('pusobiste.php');
$smarty->assign('pusobiste',$pusobiste);

if(isset($_GET['filtr'])){
	$filtr=$_GET['filtr'];
	if(isset($pusobiste[$filtr])){
		$smarty->assign('titulek',$pusobiste[$filtr]['nazev']);
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
		$smarty->assign('uzivatele',$uzivatele);
	}
	$smarty->assign("robots",'noindex,follow');
	$smarty->display('hlavicka.tpl');
	$smarty->display('lide-misto.tpl');
	$smarty->display('paticka.tpl');
}else{
	$smarty->assign('titulek','Žongléři podle místa působení');
	$smarty->display('hlavicka.tpl');
	$smarty->display('lide-pusobiste.tpl');
	$smarty->display('paticka.tpl');
}

?>

