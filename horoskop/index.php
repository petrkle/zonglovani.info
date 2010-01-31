<?php
require('../init.php');
require('../func.php');
require_once('horoskop-data.php');
require_once('horoskop.php');


foreach(get_seznam_triku('micky-3') as $klic=>$foo){
	array_push($vety[9][2],'<a href="/micky/3/'.$klic.'.html" title="'.prvni_velke($foo['about']['obtiznost']).'">'.prvni_male($foo['about']['nazev']).'</a>');
	array_push($vety[0][2],'<a href="/micky/3/'.$klic.'.html" title="'.prvni_velke($foo['about']['obtiznost']).'">'.prvni_male($foo['about']['nazev']).'</a>');
	array_push($vety[6][4],'<a href="/micky/3/'.$klic.'.html" title="'.prvni_velke($foo['about']['obtiznost']).'">'.prvni_male($foo['about']['nazev']).'</a>');
}

foreach(get_seznam_triku('kuzely-passing') as $klic=>$foo){
	array_push($vety[4][1],'<a href="/kuzely/passing/'.$klic.'.html" title="'.prvni_velke($foo['about']['obtiznost']).'">'.prvni_male($foo['about']['nazev']).'</a>');
	array_push($vety[2][5],'<a href="/kuzely/passing/'.$klic.'.html" title="'.prvni_velke($foo['about']['obtiznost']).'">'.prvni_male($foo['about']['nazev']).'</a>');
	array_push($vety[5][4],'<a href="/kuzely/passing/'.$klic.'.html" title="'.prvni_velke($foo['about']['obtiznost']).'">'.prvni_male($foo['about']['nazev']).'</a>');
}

if(isset($_GET['znameni'])){$znameni=$_GET['znameni'];}else{$znameni='';};

$znameni=filtr(strtolower(trim($znameni)),$zverokruh);

$smarty->assign('zverokruh',$zverokruh);

if(isset($_GET['zitra'])){
	$nadpis='Horoskop žonglování na zítra';
}else{
	$nadpis='Horoskop žonglování';
}

$trail = new Trail();
$trail->addStep($nadpis,'/horoskop/');

if(isset($_GET['zitra'])){
	$smarty->assign('predpoved',predpoved($znameni,(time()+(24*3600))));
	$smarty->assign('zitra','jo');
}else{
	$smarty->assign('predpoved',predpoved($znameni,time()));
}

$smarty->assign('nahled','http://'.$_SERVER['SERVER_NAME'].'/img/h/horoskop.png');
$smarty->assign('description','Horoskop pro žonglérky a žongléry. Každý den ti poradí co je nejlepší trénovat.');


if($_SERVER['REQUEST_URI']=='/horoskop/' or $_SERVER['REQUEST_URI']=='/horoskop/zitra/'){
	$smarty->assign_by_ref('trail', $trail->path);
	$smarty->assign('titulek',$nadpis);
	$smarty->display('hlavicka.tpl');
	$smarty->display('horoskop-index.tpl');
	$smarty->display('paticka.tpl');
	exit();
}

$titulek=$nadpis.' - '.$zverokruh[$znameni]['popis'];


$trail->addStep($zverokruh[$znameni]['popis'],'/horoskop/');
$smarty->assign_by_ref('trail', $trail->path);
$smarty->assign('nahled','http://'.$_SERVER['SERVER_NAME'].'/img/h/horoskop-'.$znameni.'.png');
$smarty->assign('description','Žonglérský horoskop znamení - '.$znameni);
$smarty->assign("titulek",$titulek);
$smarty->assign("znameni",$znameni);
$smarty->display('hlavicka.tpl');
$smarty->display('horoskop.tpl');
$smarty->display('paticka.tpl');
?>
