<?php
require('../init.php');
require('../func.php');
require('rss.php');

$titulek='RSS agregátor';
$trail = new Trail();
$trail->addStep($titulek);

if(isset($_GET['rss'])){
	$rss=$_GET['rss'];
}else{
	$rss=false;
}

$smarty->assign_by_ref('trail', $trail->path);

$smarty->assign('styly','/rss/r.css');
$smarty->assign('keywords','rss, žonglování, agregátor');
$smarty->assign('description','RSS agregátor novinek z žonglérského světa');

$dalsi=array(
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

function get_news($pocet){
	global $rss_zdroje;
	$dir = opendir(RSS_AGREGATOR_DATA);
	$novinky = array();
	    if ($dir) {
			   while (($filename = readdir($dir)) !== false) {
						if (preg_match('/\.txt$/',$filename)) {
				      array_push($novinky,$filename);
					 }
			   }
		   }
	closedir($dir);
	rsort($novinky,SORT_NUMERIC);
	if(count($novinky)<$pocet){
		$pocet=count($novinky);
	}
	$navrat=array();
	for($foo=0;$foo<$pocet;$foo++){
		$bar=file(RSS_AGREGATOR_DATA.'/'.$novinky[$foo]);
		$baz=preg_split('/\./',$novinky[$foo]);
		$baz=preg_split('/-/',$baz[0]);
		$navrat[$foo]['titulek']=trim($bar[0]);
		$navrat[$foo]['description']=trim($bar[2]);
		$navrat[$foo]['url']=trim($bar[1]);
		$navrat[$foo]['timestamp']=trim($baz[0]);
		$navrat[$foo]['rssid']=trim($baz[1]);
		$navrat[$foo]['rss']=$rss_zdroje[$navrat[$foo]['rssid']];
		$navrat[$foo]['time_hr']=date('j. n. Y G.i',$navrat[$foo]['timestamp']);
		$navrat[$foo]['time_mr']=date('r',$navrat[$foo]['timestamp']);
	}
	return $navrat;
}
?>
