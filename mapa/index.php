<?php
require('../init.php');
require('../func.php');

$k_cz=load_kraje('CZ');
$k_sk=load_kraje('SK');
$poloha=false;

if(isset($_GET['kraj'])){
	$kraj='kr-'.$_GET['kraj'];
	if(isset($k_cz[$kraj])){
		$kraj=$k_cz[$kraj];
		$k_cz['kr-'.$kraj['id']]['selected']=true;
	}elseif(isset($k_sk[$kraj])){
		$kraj=$k_sk[$kraj];
		$k_sk['kr-'.$kraj['id']]['selected']=true;
	}else{
		require('../404.php');
		exit();
	}
}else{
	$kraj=false;
}

$titulek='Žonglérská mapa';
$description='Mapa žonglérů v České a Slovenské republice.';
$trail = new Trail();
$trail->addStep($titulek,'/mapa/');

if(isset($_GET['country'])){
	if($_GET['country']=='cr'){
		$country='cr';
		$smarty->assign('cr',true);
		$poloha=array(
		'lat'=>'50.0',
		'lng'=>'15.5',
		'zoom'=>'7',
			);
		$trail->addStep('Česká republika','/mapa/cr.html');
		$description='Žongléři v Čechách, na Moravě a ve Slezsku.';
		$titulek.=' - ČR';
		$smarty->assign('nahled','https://www.'.$_SERVER['SERVER_NAME'].'/mapa/static/m/mapa-cr.png');
	}else{
		$country='sk';
		$smarty->assign('sk',true);
		$poloha=array(
		'lat'=>'49.0',
		'lng'=>'19.5',
		'zoom'=>'7',
			);
		$trail->addStep('Slovenská republika','/mapa/sk.html');
		$description='Žongléři na Slovensku.';
		$titulek.=' - SR';
		$smarty->assign('nahled','https://www.'.$_SERVER['SERVER_NAME'].'/mapa/static/m/mapa-sk.png');
	}
}else{
	$country='false';
}


$dalsi=array(
	array('url'=>'/animace/siteswap/','text'=>'Animace siteswapů','title'=>'Animace žonglérských siteswapů'),
	);

if($kraj){
	if($kraj['country']=='CZ'){
		$trail->addStep('Česká republika','/mapa/cr.html');
	}else{
		$trail->addStep('Slovenská republika','/mapa/sk.html');
	}
	$trail->addStep($kraj['nazev'],'/mapa/kraj/'.$kraj['id'].'/');
	$titulek.=' - '.$kraj['nazev'];
	$description='Mapa žonglování - '.$kraj['nazev'];
	$poloha=array(
	'lat'=>$kraj['lat'],
	'lng'=>$kraj['lng'],
	'zoom'=>'9',
		);
}

if(!$poloha){
	$poloha=array(
	'lat'=>'49.453567975668975',
	'lng'=>'16.816765',
	'zoom'=>'6',
		);
	$smarty->assign('nahled','https://www.'.$_SERVER['SERVER_NAME'].'/mapa/static/m/mapa-crsk.png');
	#$smarty->assign('nahled','https://www.'.$_SERVER['SERVER_NAME'].'/img/m/mapa.png');
}

$smarty->assign_by_ref('dalsi',$dalsi);
$smarty->assign_by_ref('trail', $trail->path);
$smarty->assign_by_ref('poloha',$poloha);
$smarty->assign_by_ref('k_cz',$k_cz);
$smarty->assign_by_ref('k_sk',$k_sk);
$smarty->assign('styly',array('m'));
$smarty->assign('mobilemapa',true);
$smarty->assign('keywords','mapa, žonglování, žongléři');
$smarty->assign('description',$description);
$smarty->assign('titulek',$titulek);
$smarty->display('hlavicka-w.tpl');
$smarty->display('mapa.tpl');
$smarty->display('paticka-w.tpl');

function load_kraje($country){
	$krf='kraje.txt';
if(is_file($krf)){
	$navrat=array();
	$kraje=file($krf);
	foreach($kraje as $foo){
		$foo=preg_split('/:/',trim($foo));
		if(count($foo)==5){
			if($foo[0]==$country){
				$id=preg_split('/-/',$foo[1]);
				$navrat[$foo[1]]=array('country'=>$foo[0],'id'=>$id[1],'nazev'=>$foo[2],'lat'=>$foo[3],'lng'=>$foo[4]);
			}
		}
	}
		return $navrat;;
	}else{
		return false;
	}
}
