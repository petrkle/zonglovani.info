<?php
require('../init.php');
require('../func.php');

if(isset($_GET['id'])){
	$id=$_GET['id'];
}else{
	$id=false;
}

if(isset($_GET['nameless'])){
	$nameless=true;
}else{
	$nameless=false;
}

$animace=get_animace($nameless);

$titulek='Animace žonglování';
$trail = new Trail();
$trail->addStep($titulek,'/animace/');

$dalsi=array(
	array('url'=>'/animace/siteswap/','text'=>'Animace siteswapů','title'=>'Animace žonglérských siteswapů'),
	);

if($nameless){
	$titulek='Animace žonglování - anglické názvy';
	$smarty->assign('description','Animace žonglování s míčky - anglické názvy.');
	$smarty->assign('nadpis','Animace žonglování');
	$trail->addStep('Anglické názvy','/animace/en/');
	array_push($dalsi,array('url'=>'/animace/','text'=>'Česky pojmenované animace','title'=>'Česky pojmenované animace žonglování'));
}else{
	$smarty->assign('description','Animace žonglování s míčky.');
	array_push($dalsi,array('url'=>'/animace/en/','text'=>'Anglicky pojmenované animace','title'=>'Anglicky pojmenované animace žonglování'));
}

$smarty->assign('nameless',$nameless);

if($id){
	if(isset($animace[$id])){
		$trail->addStep($animace[$id]['popis']);
		$smarty->assign_by_ref('trail', $trail->path);
		$smarty->assign('keywords',$animace[$id]['popis'].', animace, žonglování, siteswap, juggleanim, návod');
		$smarty->assign('description',$animace[$id]['popis'].' - animace žonglování s míčky');
		$smarty->assign('titulek',$animace[$id]['popis'].' - animovaný návod na žonglování');
		$smarty->assign('nahled','http://'.$_SERVER['SERVER_NAME'].'/animace/nahledy/'.$id.'.png');
		$smarty->assign('nadpis',$animace[$id]['popis']);
		$smarty->assign('navod',get_link($id));
		$smarty->assign_by_ref('animace',$animace[$id]);
		$smarty->display('hlavicka.tpl');
		$smarty->display('animace.tpl');
		$smarty->display('paticka.tpl');
	}else{
	require('../404.php');
	exit();
	}

}else{
	$smarty->assign_by_ref('dalsi',$dalsi);
	$smarty->assign_by_ref('trail', $trail->path);
	$smarty->assign('keywords','animace, žonglování, siteswap, juggleanim');
	$smarty->assign('titulek',$titulek);
	$smarty->assign_by_ref('animace',$animace);
	$smarty->assign('nahled','http://'.$_SERVER['SERVER_NAME'].'/img/a/animace-panacek.png');
	$smarty->display('hlavicka.tpl');
	$smarty->display('animace-index.tpl');
	$smarty->display('paticka.tpl');
}


function get_link($id){
	$foo=file('odkazy.txt');
	$linky=array();
	$navrat=false;
	foreach($foo as $radek){
		$radek=trim($radek);
		$radek=preg_split('/\*/',$radek);
		if(count($radek)==3){
			$linky[$radek[0]]=array('url'=>$radek[1],'popis'=>$radek[2]);
		}
	}
	if(isset($linky[$id])){
		$navrat=$linky[$id];
	}
	return $navrat;
}

function get_animace($nameless=false){
	$foo=file('popisky.txt');
	$navrat=array();
	foreach($foo as $radek){
		$radek=trim($radek);
		$radek=preg_split('/\*/',$radek);
		if(!$nameless){
			if(count($radek)==4){
				$link=basename($radek[2],'.gif');
				$navrat[$link]['sirka']=$radek[0];
				$navrat[$link]['vyska']=$radek[1];
				$navrat[$link]['img']=$radek[2];
				$navrat[$link]['popis']=$radek[3];
			}
		}else{
			if(count($radek)==3){
				$link=basename($radek[2],'.gif');
				$navrat[$link]['sirka']=$radek[0];
				$navrat[$link]['vyska']=$radek[1];
				$navrat[$link]['img']=$radek[2];
				$navrat[$link]['popis']=basename($radek[2],'.gif');
			}
		}
	}
	uasort($navrat, 'sort_by_nazev');
	return $navrat;
}

function sort_by_nazev($a, $b){
	global $trans;
  $a['popis'] = strtr($a['popis'], $trans);
  $b['popis'] = strtr($b['popis'], $trans);
  return strcmp($a['popis'], $b['popis']);
};

?>
