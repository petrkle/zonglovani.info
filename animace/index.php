<?php
require('../init.php');
require('../func.php');

if(isset($_GET['id'])){
	$id=$_GET['id'];
}else{
	$id=false;
}

$animace=get_animace();

$titulek='Animace žonglování';
$trail = new Trail();
$trail->addStep($titulek,'/animace/');

if($id){
	if(isset($animace[$id])){
		$trail->addStep($animace[$id]['popis']);
		$smarty->assign_by_ref('trail', $trail->path);
		$smarty->assign('keywords',$animace[$id]['popis'].', animace, žonglování, siteswap, juggleanim');
		$smarty->assign('description',$animace[$id]['popis'].' - animace žonglování s míčky');
		$smarty->assign('titulek',$animace[$id]['popis'].' - animace');
		$smarty->assign('nadpis',$animace[$id]['popis']);
		$smarty->assign_by_ref('animace',$animace[$id]);
		$smarty->display('hlavicka.tpl');
		$smarty->display('animace.tpl');
		$smarty->display('paticka.tpl');
	}else{
	require('../404.php');
	exit();
	}

}else{
	$smarty->assign_by_ref('trail', $trail->path);
	$smarty->assign('keywords','animace, žonglování, siteswap, juggleanim');
	$smarty->assign('description','Animace žonglování s míčky.');
	$smarty->assign('titulek',$titulek);
	$smarty->assign_by_ref('animace',$animace);
	$smarty->display('hlavicka.tpl');
	$smarty->display('animace-index.tpl');
	$smarty->display('paticka.tpl');
}


$dalsi=array(
	array('url'=>'/obrazky/','text'=>'Obrázky žonglování','title'=>'Obrázky žonglérů a žonglérek'),
	);
$smarty->assign_by_ref('dalsi',$dalsi);


function get_animace(){
	$foo=file('popisky.txt');
	$navrat=array();
	foreach($foo as $radek){
		$radek=trim($radek);
		$radek=preg_split('/\*/',$radek);
		if(count($radek)==4){
			$link=basename($radek[2],'.gif');
			$navrat[$link]['sirka']=$radek[0];
			$navrat[$link]['vyska']=$radek[1];
			$navrat[$link]['img']=$radek[2];
			$navrat[$link]['popis']=$radek[3];
		}
	}
	return $navrat;
}

?>
