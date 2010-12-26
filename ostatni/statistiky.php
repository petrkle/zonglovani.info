<?php
require('../init.php');
require('../func.php');
require('../cron/navstevnost-func.php');

if(isset($_GET['rss'])){
	$navstevnost=nav_load_data();
	asort($navstevnost);
	header('Content-Type: application/rss+xml');
	$smarty->assign_by_ref('navstevnost', $navstevnost);
	$smarty->display('statistiky.rss.tpl');
}else{
$titulek='Statistiky';
$smarty->assign('titulek',$titulek);
$smarty->assign('keywords',make_keywords($titulek).', žonglování');
$smarty->assign('description','Statistiky žonglérova slabikáře.');

$smarty->assign('styly',array('/s.css'));

$dalsi=array(
	array('url'=>'/jak-odkazovat.html','text'=>'Jak odkazovat na žonglérův slabikář','title'=>'Přidej odkaz na svůj web'),
	array('url'=>'/rss.html','text'=>'RSS kanály','title'=>'RSS kanály žonglérova slabikáře'),
	array('url'=>'/changelog.html','text'=>'Seznam změn','title'=>'Seznam změn v žonglérově slabikáři'),

	);
$smarty->assign_by_ref('dalsi',$dalsi);

$diskuse_pocet=0;
$adr=opendir(DISKUSE_DATA);
while (false!==($file = readdir($adr))) {
	if (preg_match('/.+\.txt$/',$file)){
		$diskuse_pocet++;
	};
};
closedir($adr); 

$video_pocet=0;
$adr=opendir('../video/klip');
while (false!==($file = readdir($adr))) {
	if (preg_match('/.+\.xml$/',$file)){
		$video_pocet++;
	};
};
closedir($adr); 

$testy_pocet=0;
$adr=opendir('../scripts/tests');
while (false!==($file = readdir($adr))) {
	if (preg_match('/.+\.t$/',$file)){
		$test=file_get_contents("../scripts/tests/$file");
		$pocet=preg_replace('/([^0-9]*)/','',preg_replace('/.*More tests ([^;]*).*/s','\1',$test));
		$testy_pocet=$testy_pocet+$pocet;
	};
};
closedir($adr); 

$kal_pocet=0;
$adr=opendir(CALENDAR_DATA);
while (false!==($file = readdir($adr))) {
	if (preg_match('/.+\.cal$/',$file)){
		$kal_pocet++;
	};
};
closedir($adr); 

$filename = $_SERVER['DOCUMENT_ROOT'].'/data/dump.sql.bz2';
if (file_exists($filename)) {
  $fupdate=date('j. n. Y G.i', filectime($filename));
}else{
	$fupdate='?';
}


$stat=array();
$navstevnost=nav_load_data();
arsort($navstevnost);

$stat['aktualizace']=date('j. n. Y G.i', filectime('../ChangeLog'));
$stat['pocet_lide']=count(get_loginy())-1;
$stat['pocet_diskuse']=$diskuse_pocet;
$stat['pocet_kalendar']=$kal_pocet;
$stat['pocet_video']=$video_pocet;
$stat['fupdate']=$fupdate;
$stat['testy']=$testy_pocet;
$stat['navstevnost']=$navstevnost;
$stat['navstevnost_dni']=count($navstevnost);

$trail = new Trail();
$trail->addStep($titulek);
$smarty->assign_by_ref('trail', $trail->path);
$smarty->assign_by_ref('stat', $stat);

$smarty->display('hlavicka.tpl');
$smarty->display('statistiky.tpl');
$smarty->display('paticka.tpl');
}
?>
