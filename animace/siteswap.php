<?php
require('../init.php');
require('../func.php');

if(isset($_GET['id'])){
	$id=$_GET['id'];
}else{
	$id=false;
}

$nazvy=array(
	'tri'=>'Tři míčky',
	'ctyri'=>'Čtyři míčky',
	'ctyri-sync'=>'Čtyři míčky synchronně',
	'pet'=>'Pět míčků',
	'pet-sync'=>'Pět míčků synchronně',
	'n'=>'Mnoho míčků'
	);

$titulek='Siteswap';
$trail = new Trail();
$trail->addStep('Animace žonglování','/animace/');
$trail->addStep('Siteswap','/animace/siteswap/');

$smarty->assign('styly',array('a'));

$animace=get_siteswap($nazvy);

$dalsi=array(
	array('url'=>'/animace/','text'=>'Česky pojmenované animace','title'=>'Česky pojmenované animace žonglování'),
	array('url'=>'/animace/en/','text'=>'Anglicky pojmenované animace','title'=>'Anglicky pojmenované animace žonglování')
);

if($id){
	if(isset($animace[$id])){
		$klice=array_keys($animace);
		$pozice=array_search($id,$klice);
		if(isset($klice[$pozice+1])){
			$dalsi_trik=$animace[$klice[$pozice+1]];
			$dalsi_trik['id']=$klice[$pozice+1];
		}else{
			$dalsi_trik=$animace[$klice[0]];
			$dalsi_trik['id']=$klice[0];
		}

		if(isset($klice[$pozice-1])){
			$predchozi_trik=$animace[$klice[$pozice-1]];
			$predchozi_trik['id']=$klice[$pozice-1];
		}else{
			$predchozi_trik=$animace[$klice[count($klice)-1]];
			$predchozi_trik['id']=$klice[count($klice)-1];
		}

		$navigace=array();
		$navigace['popis']=array('url'=>'/siteswap.html','text'=>'Siteswap - podrobný návod','title'=>'Podrobné vysvětlení siteswapů.');

		$navigace['dalsi']=array('url'=>$dalsi_trik['id'].'.html','text'=>$dalsi_trik['siteswap'],'title'=>'Siteswap '.$dalsi_trik['siteswap']);
		$navigace['predchozi']=array('url'=>$predchozi_trik['id'].'.html','text'=>$predchozi_trik['siteswap'],'title'=>'Siteswap '.$predchozi_trik['siteswap']);

		$trail->addStep($animace[$id]['skupina'],'/animace/siteswap/#'.$animace[$id]['pocet']);
		$trail->addStep($id);
		$smarty->assign('trail', $trail->path);
		$smarty->assign('keywords',$id.', animace, žonglování, siteswap, juggleanim, návod');
		$smarty->assign('description','Siteswap '.$id);
		$smarty->assign('titulek',$id.' - siteswap');
		$smarty->assign('nahled','https://'.$_SERVER['SERVER_NAME'].'/animace/nahledy/'.$id.'.png');
		$smarty->assign('nadpis',$id);
		$smarty->assign('navigace',$navigace);
		$smarty->assign('animace',$animace[$id]);
		$smarty->assign('stylwidth', $animace[$id]['sirka']);
		$smarty->display('hlavicka.tpl');
		$smarty->display('animace-siteswap.tpl');
		$smarty->display('paticka.tpl');
	}else{
	require('../404.php');
	exit();
	}

}else{
	$smarty->assign('nazvy', $nazvy);
	$smarty->assign('trail', $trail->path);
	$smarty->assign('keywords','animace, žonglování, siteswap, juggleanim');
	$smarty->assign('description','Animace žonglování siteswapů s míčky.');
	$smarty->assign('titulek',$titulek);
	$smarty->assign('dalsi',$dalsi);
	$smarty->assign('animace',$animace);
	$smarty->assign('nahled','https://'.$_SERVER['SERVER_NAME'].'/img/a/animace-panacek.png');
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
	return $navrat;
}
