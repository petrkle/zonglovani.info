<?php
require('../init.php');
require('../func.php');
require('dovednosti.php');
require('dovednosti-links.php');
require('pusobiste.php');
$smarty->assign('dovednosti',$dovednosti);
$smarty->assign('pusobiste',$pusobiste);

$trail = new Trail();
$trail->addStep('Seznam žonglérů',LIDE_URL);

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
		$smarty->assign('styly',array('/a.css','/d.css'));
		$klice=array_keys($dovednosti);
		$pozice=array_search($filtr,$klice);
		if(isset($dovednosti_link[$filtr])){
			$smarty->assign_by_ref('dovednost_link',$dovednosti_link[$filtr]);
		}
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

	$navigace=array();
	if(isset($klice[$pozice+1])){
		$navigace['dalsi']=array('url'=>$klice[$pozice+1].'.html','text'=>$dovednosti[$klice[$pozice+1]]['nazev'],'title'=>'Další dovednost: '.$dovednosti[$klice[$pozice+1]]['nazev']);
	}else{
		$navigace['dalsi']=array('url'=>$klice[0].'.html','text'=>$dovednosti[$klice[0]]['nazev'],'title'=>'Další dovednost: '.$dovednosti[$klice[0]]['nazev']);
	}

	if(isset($klice[$pozice-1])){
		$navigace['predchozi']=array('url'=>$klice[$pozice-1].'.html','text'=>$dovednosti[$klice[$pozice-1]]['nazev'],'title'=>'Předchozí dovednost: '.$dovednosti[$klice[$pozice-1]]['nazev']);
	}else{
		$navigace['predchozi']=array('url'=>$klice[count($klice)-1].'.html','text'=>$dovednosti[$klice[count($klice)-1]]['nazev'],'title'=>'Předchozí dovednost: '.$dovednosti[$klice[count($klice)-1]]['nazev']);
	}


	$smarty->assign('umi',$dovednosti[$filtr]['umi']);
	
	if(count($uzivatele)>0){
		uasort($uzivatele, 'sort_by_jmeno_zonglera'); 
		$smarty->assign_by_ref('uzivatele',$uzivatele);
	}
	$smarty->assign_by_ref('navigace',$navigace);
	$trail->addStep('Podle dovedností',LIDE_URL.'dovednost/');
	$trail->addStep($dovednosti[$filtr]['nazev']);
	$smarty->assign_by_ref('trail', $trail->path);
	$smarty->display('hlavicka.tpl');
	$smarty->display('lide-dovednost.tpl');
	$smarty->display('paticka.tpl');
}else{
	$trail->addStep('Podle dovedností',LIDE_URL.'dovednost/');
	$smarty->assign_by_ref('trail', $trail->path);
	$smarty->assign('titulek','Žongléři podle dovedností');
	$smarty->assign('description','Seznam žonglérů podle dovedností.');
	$smarty->display('hlavicka.tpl');
	$smarty->display('lide-dovednosti.tpl');
	$smarty->display('paticka.tpl');
}

?>
