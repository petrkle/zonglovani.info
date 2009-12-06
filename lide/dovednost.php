<?php
require('../init.php');
require('../func.php');
require('dovednosti.php');
$smarty->assign('dovednosti',$dovednosti);

if(isset($_GET['filtr'])){
	$filtr=$_GET['filtr'];
	if(isset($dovednosti[$filtr])){
		$smarty->assign('titulek',$dovednosti[$filtr]['nazev']);
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
		$foo=get_user_dovednosti($login);
		if(is_array($foo) and isset($foo[$filtr]) and $login!='pek'){
				$uzivatele[$login]=get_user_props($login);
				$uzivatele[$login]['dovednosti']=$foo;
		}
	}
	if(count($uzivatele)>0){
		$smarty->assign('uzivatele',$uzivatele);
	}
	$smarty->assign("robots",'noindex,follow');
	$smarty->display('hlavicka.tpl');
	$smarty->display('lide-dovednost.tpl');
	$smarty->display('paticka.tpl');
}else{
	$smarty->assign('titulek','Žongléři podle dovedností');
	$smarty->display('hlavicka.tpl');
	$smarty->display('lide-dovednosti.tpl');
	$smarty->display('paticka.tpl');
}

?>

