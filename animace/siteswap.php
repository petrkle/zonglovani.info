<?php
require('../init.php');
require('../func.php');

if(isset($_GET['id'])){
	$id=$_GET['id'];
}else{
	$id=false;
}

$nazvy=array(
	'3'=>'Tři míčky',
	'4'=>'Čtyři míčky',
	'4-sync'=>'Čtyři míčky synchronně',
	'5'=>'Pět míčků',
	'5-sync'=>'Pět míčků synchronně',
	);

$titulek='Siteswap';
$trail = new Trail();
$trail->addStep('Animace žonglování','/animace/');
$trail->addStep('Siteswap','/animace/siteswap/');

$animace=get_siteswap($nazvy);

$dalsi=array(
	array('url'=>'/animace/','text'=>'Česky pojmenované animace','title'=>'Česky pojmenované animace žonglování'),
	array('url'=>'/animace/en/','text'=>'Anglicky pojmenované animace','title'=>'Anglicky pojmenované animace žonglování')
);

if($id){
	if(isset($animace[$id])){
		$dalsi=array(
			array('url'=>'/siteswap.html','text'=>'Siteswap - podrobný návod','title'=>'Podrobné vysvětlení siteswapů.'),
		);
		$trail->addStep($animace[$id]['skupina'],'/animace/siteswap/#'.$animace[$id]['pocet']);
		$trail->addStep($id);
		$smarty->assign_by_ref('trail', $trail->path);
		$smarty->assign('keywords',$id.', animace, žonglování, siteswap, juggleanim, návod');
		$smarty->assign('description','Siteswap '.$id);
		$smarty->assign('titulek',$id.' - siteswap');
		$smarty->assign('nahled','http://'.$_SERVER['SERVER_NAME'].'/animace/nahledy/'.$id.'.png');
		$smarty->assign('nadpis',$id);
		$smarty->assign_by_ref('dalsi',$dalsi);
		$smarty->assign_by_ref('animace',$animace[$id]);
		$smarty->display('hlavicka.tpl');
		$smarty->display('animace-siteswap.tpl');
		$smarty->display('paticka.tpl');
	}else{
	require('../404.php');
	exit();
	}

}else{
	$smarty->assign_by_ref('nazvy', $nazvy);
	$smarty->assign_by_ref('trail', $trail->path);
	$smarty->assign('keywords','animace, žonglování, siteswap, juggleanim');
	$smarty->assign('description','Animace žonglování siteswapů s míčky.');
	$smarty->assign('titulek',$titulek);
	$smarty->assign_by_ref('dalsi',$dalsi);
	$smarty->assign_by_ref('animace',$animace);
	$smarty->assign('nahled','http://'.$_SERVER['SERVER_NAME'].'/img/a/animace-panacek.png');
	$smarty->display('hlavicka.tpl');
	$smarty->display('animace-siteswap-index.tpl');
	$smarty->display('paticka.tpl');
}

function get_siteswap($nazvy){
	$foo=file('siteswap.txt');
	$navrat=array();
	foreach($foo as $radek){
		$radek=trim($radek);
		$radek=preg_split('/\*/',$radek);
		if(count($radek)==4){
			$link=$radek[1];
			$navrat[$link]['pocet']=$radek[0];
			$navrat[$link]['siteswap']=$radek[1];
			$navrat[$link]['sirka']=$radek[2];
			$navrat[$link]['vyska']=$radek[3];
			$navrat[$link]['skupina']=$nazvy[$radek[0]];
		}
	}
	ksort($navrat);
	return $navrat;
}

?>
