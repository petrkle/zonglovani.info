<?php
require('../init.php');
require('../func.php');
require('dovednosti.php');
require('pusobiste.php');
$smarty->assign('dovednosti',$dovednosti);
$smarty->assign('pusobiste',$pusobiste);

if(isset($_GET['filtr'])){
	$filtr=$_GET['filtr'];
	if(isset($dovednosti[$filtr])){
		$smarty->assign('titulek','Žonglování - '.$dovednosti[$filtr]['nazev']);
		$smarty->assign('description','Žongléři kteří umí '.$dovednosti[$filtr]['umi'].'.');
		$smarty->assign('nadpis',$dovednosti[$filtr]['nazev']);
		$smarty->assign('keywords',make_keywords('žonglování,'.$dovednosti[$filtr]['nazev']));
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
				$misto=get_user_pusobiste($login);
				$uzivatele[$login]=get_user_props($login);
				$uzivatele[$login]['dovednosti']=$foo;
				$uzivatele[$login]['pusobiste']=$misto;
		}
	}

	$smarty->assign('umi',$dovednosti[$filtr]['umi']);
	
	if(count($uzivatele)>0){
		$smarty->assign('uzivatele',$uzivatele);
	}
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
