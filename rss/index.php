<?php
require('../init.php');
require('../func.php');
require('rss.php');

$titulek='RSS agregátor';
$trail = new Trail();
$trail->addStep('RSS kanály','/rss.html');
$trail->addStep($titulek);

if(isset($_GET['rss'])){
	$rss=$_GET['rss'];
}else{
	$rss=false;
}

$smarty->assign_by_ref('trail', $trail->path);

$smarty->assign('styly','/r.css');
$smarty->assign('keywords','rss, žonglování, agregátor');
$smarty->assign('description','RSS agregátor novinek z žonglérského světa');

$dalsi=array(
	array('url'=>'/rss/agregator.xml','text'=>'http://'.$_SERVER['SERVER_NAME'].'/rss/agregator.xml','title'=>'RSS kanál'),
	array('url'=>'/rss.html','text'=>'RSS kanály žonglérova slabikáře','title'=>'RSS kanály žonglérova slabikáře'),
	array('url'=>CALENDAR_URL.'rss-a-icalendar.html#rss','text'=>'Jak nastavit RSS','title'=>'Jak nastavivt RSS čtečku'),
	);
$smarty->assign_by_ref('dalsi',$dalsi);

$smarty->assign_by_ref('rss_zdroje',$rss_zdroje);
$smarty->assign_by_ref('novinky',get_news(40));

if($rss){
	header('Content-Type: application/rss+xml');
	$smarty->display('rss-agregator.xml.tpl');
	exit();
}

$smarty->assign('titulek',$titulek);
$smarty->display('hlavicka.tpl');
$smarty->display('rss-agregator.tpl');
$smarty->display('paticka.tpl');

?>
