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

$nazvy=array(
	'jeden'=>'Jeden míček',
	'dva'=>'Dva míčky',
	'tri'=>'Tři míčky',
	'ctyri'=>'Čtyři míčky',
	'pet'=>'Pět míčků',
	'n'=>'Mnoho míčků'
	);

$smarty->assign_by_ref('nazvy', $nazvy);
$animace=get_animace($nameless);
$smarty->assign('feedback',true);

$titulek='Animace žonglování';
$trail = new Trail();
$trail->addStep($titulek,'/animace/');

$smarty->assign('styly',array('a'));

$dalsi=array(
	array('url'=>'/animace/siteswap/','text'=>'Animace siteswapů','title'=>'Animace žonglérských siteswapů'),
	);

if($nameless){
	$titulek='Animace žonglování - anglické názvy';
	$smarty->assign('description','Animace žonglování s míčky - anglické názvy.');
	$smarty->assign('nadpis','Animace žonglování');
	$trail->addStep('Anglické názvy','/animace/en/');
	unset($nazvy['jeden']);
	array_push($dalsi,array('url'=>'/animace/','text'=>'Česky pojmenované animace','title'=>'Česky pojmenované animace žonglování'));
}else{
	$smarty->assign('description','Animace žonglování s míčky.');
	array_push($dalsi,array('url'=>'/animace/en/','text'=>'Anglicky pojmenované animace','title'=>'Anglicky pojmenované animace žonglování'));
}

$smarty->assign('nameless',$nameless);

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
		$navod=get_link($id);
		if($navod){
			$navigace['navod']=$navod;
		}
		$navigace['dalsi']=array('url'=>$dalsi_trik['id'].'.html','text'=>$dalsi_trik['popis'],'title'=>'Další trik '.$dalsi_trik['popis']);
		$navigace['predchozi']=array('url'=>$predchozi_trik['id'].'.html','text'=>$predchozi_trik['popis'],'title'=>'Předchozí trik '.$predchozi_trik['popis']);
		if($nameless){
			$trail->addStep($nazvy[$animace[$id]['pocet']],'/animace/en/#'.$animace[$id]['pocet']);
		}else{
			$trail->addStep($nazvy[$animace[$id]['pocet']],'/animace/#'.$animace[$id]['pocet']);
		}
		$trail->addStep($animace[$id]['popis']);
		$smarty->assign_by_ref('trail', $trail->path);
		$smarty->assign('keywords',$animace[$id]['popis'].', animace, žonglování, siteswap, juggleanim, návod');
		$smarty->assign('description',$animace[$id]['popis'].' - animace žonglování s míčky');
		$smarty->assign('titulek',$animace[$id]['popis'].' - animovaný návod na žonglování');
		$smarty->assign('nahled','http://'.$_SERVER['SERVER_NAME'].'/animace/nahledy/'.$id.'.png');
		$smarty->assign('nadpis',$animace[$id]['popis']);
		$smarty->assign_by_ref('navigace',$navigace);
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
	$foo=file('animace.txt');
	$navrat=array();
	foreach($foo as $radek){
		$radek=trim($radek);
		$radek=preg_split('/\*/',$radek);
		if(!$nameless){
			if(count($radek)==6){
				$link=basename($radek[4],'.gif');
				$navrat[$link]['pocet']=$radek[0];
				$navrat[$link]['siteswap']=$radek[1];
				$navrat[$link]['sirka']=$radek[2];
				$navrat[$link]['vyska']=$radek[3];
				$navrat[$link]['img']=$radek[4];
				$navrat[$link]['obalka']=basename($radek[4],'.gif').'.png';
				$navrat[$link]['popis']=$radek[5];
			}
		}else{
			if(count($radek)==5){
				$link=basename($radek[4],'.gif');
				$navrat[$link]['pocet']=$radek[0];
				$navrat[$link]['siteswap']=$radek[1];
				$navrat[$link]['sirka']=$radek[2];
				$navrat[$link]['vyska']=$radek[3];
				$navrat[$link]['img']=$radek[4];
				$navrat[$link]['obalka']=basename($radek[4],'.gif').'.png';
				$navrat[$link]['popis']=preg_replace('/[-_]/',' ',basename($radek[4],'.gif'));
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
