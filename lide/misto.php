<?php
require('../init.php');
require('../func.php');
require('pusobiste.php');

$smarty->assign('pusobiste',$pusobiste);

$trail = new Trail();
$trail->addStep('Seznam žonglérů',LIDE_URL);

if(isset($_GET['filtr'])){
	$filtr=$_GET['filtr'];
	if(isset($pusobiste[$filtr])){
		$smarty->assign('id',$filtr);
		$smarty->assign('jmeno',$pusobiste[$filtr]['nazev']);
		$smarty->assign('titulek','Žonglování - '.$pusobiste[$filtr]['nazev']);
		$smarty->assign('nadpis','Žongléři '.$pusobiste[$filtr]['odkud']);
		$smarty->assign('description','Žongléři a žonglérky působící '.$pusobiste[$filtr]['kde'].'.');
		$smarty->assign('keywords','žonglování, '.$pusobiste[$filtr]['nazev'].', žongléři, žonglérky, žonglér, žonglérka');
		$fl=preg_replace('/^(.).*/','\1',$filtr);
		if(is_file('../mapa/static/'.$fl.'/'.$filtr.'.png')){
			$smarty->assign('nahled','https://www.'.$_SERVER['SERVER_NAME'].'/mapa/static/'.$fl.'/'.$filtr.'.png');
		}
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

$pozice=array_keys($pusobiste);
$mojepozice=array_search($filtr,$pozice);

	$navigace=array();

	if(isset($pozice[$mojepozice+1])){
		$navigace['dalsi']=array('url'=>$pozice[$mojepozice+1].'.html','text'=>$pusobiste[$pozice[$mojepozice+1]]['nazev'],'title'=>'Další místo: '.$pusobiste[$pozice[$mojepozice+1]]['nazev']);
	}else{
		$navigace['dalsi']=array('url'=>$pozice[0].'.html','text'=>$pusobiste[$pozice[0]]['nazev'],'title'=>'Další dovednost: '.$dovednosti[$pozice[0]]['nazev']);
	}

	if(isset($pozice[$mojepozice-1])){
		$navigace['predchozi']=array('url'=>$pozice[$mojepozice-1].'.html','text'=>$pusobiste[$pozice[$mojepozice-1]]['nazev'],'title'=>'Předchozí místo: '.$pusobiste[$pozice[$mojepozice-1]]['nazev']);
	}else{
		$navigace['predchozi']=array('url'=>$pozice[count($pozice)-1].'.html','text'=>$pusobiste[$pozice[count($pozice)-1]]['nazev'],'title'=>'Předchozí místo: '.$pusobiste[$pozice[count($pozice)-1]]['nazev']);
	}

	$smarty->assign('feedback',true);
	$smarty->assign('styly',array('a'));
	$smarty->assign_by_ref('navigace',$navigace);
	$smarty->assign('misto',$pusobiste[$filtr]['odkud']);
	$smarty->display('hlavicka.tpl');
	$smarty->display('lide-misto.tpl');
	$smarty->display('paticka.tpl');
}else{
	$smarty->assign('pusobiste',get_large_places($pusobiste));
	$smarty->assign('pusobiste_cz',get_places('CZ',$pusobiste));
	$smarty->assign('pusobiste_sk',get_places('SK',$pusobiste));
	$trail->addStep('Podle místa',LIDE_URL.'misto/');
	$smarty->assign_by_ref('trail', $trail->path);
	$smarty->assign('titulek','Žongléři podle místa působení');
	$smarty->assign('description','Mapa žonglérů a žonglování v České a Slovenské republice. Najdi nejbližšího žongléra.');
	$smarty->assign('keywords','žonglování, mapa, žongléři');
	$smarty->display('hlavicka.tpl');
	$smarty->display('lide-pusobiste.tpl');
	$smarty->display('paticka.tpl');
}
