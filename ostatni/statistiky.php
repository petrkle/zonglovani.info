<?php
require('../init.php');
require('../func.php');
require('../cron/navstevnost-func.php');

if(isset($_GET['rss'])){
	$navstevnost=nav_load_data();
	asort($navstevnost);
	header('Content-Type: application/xml');
	$smarty->assign_by_ref('navstevnost', $navstevnost);
	$smarty->display('statistiky.rss.tpl');
}else{
$titulek='Statistiky';
$smarty->assign('titulek',$titulek);
$smarty->assign('keywords',make_keywords($titulek).', žonglování');
$smarty->assign('description','Statistiky žonglérova slabikáře.');

$smarty->assign('styly',array('s'));

$dalsi=array(
	array('url'=>'/jak-odkazovat.html','text'=>'Jak odkazovat na žonglérův slabikář','title'=>'Přidej odkaz na svůj web'),
	array('url'=>'/rss.html','text'=>'RSS kanály','title'=>'RSS kanály žonglérova slabikáře'),
	array('url'=>'/changelog.html','text'=>'Seznam změn','title'=>'Seznam změn v žonglérově slabikáři'),
	array('url'=>'/scripts/','text'=>'Skripty','title'=>'Skripty pro správu webu'),
	array('url'=>'/css/','text'=>'Kaskádové styly','title'=>'Seznam kaskádových stylů')
	);
$smarty->assign_by_ref('dalsi',$dalsi);

function load_stats(){
	$sf='stat.txt';
	$navrat=array();
	if(is_file($sf)){
		$stat=file($sf);
		if(is_array($stat)){
			foreach($stat as $radek){
				$radek=preg_split('/\*/',trim($radek));
				if(count($radek)==2){
					$navrat[$radek[0]]=$radek[1];
				}
			}
			if(isset($navrat['last_update'])){
				$navrat['last_update_hr']=date('j. n. Y G.i',$navrat['last_update']);
			}
			if(isset($navrat['fulltext_update'])){
				$navrat['fulltext_update_hr']=date('j. n. Y G.i',$navrat['fulltext_update']);
			}
		}else{
			$navrat=false;
		}
	}else{
		$navrat=false;
	}
	return $navrat;
};

$stats_from_file=load_stats();

$diskuse_pocet=0;
$adr=opendir(DISKUSE_DATA);
while (false!==($file = readdir($adr))) {
	if (preg_match('/.+\.txt$/',$file)){
		$diskuse_pocet++;
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

$live_stat=array();
$live_stat['pocet_lide']=count(get_loginy())-1;
$live_stat['pocet_diskuse']=$diskuse_pocet;
$live_stat['pocet_kalendar']=$kal_pocet;

$navstevnost=nav_load_data();
arsort($navstevnost);

$stats_from_file['navstevnost']=$navstevnost;
$stats_from_file['navstevnost_dni']=count($navstevnost);

$stat=array_merge($live_stat,$stats_from_file);

$trail = new Trail();
$trail->addStep($titulek);
$smarty->assign_by_ref('trail', $trail->path);
$smarty->assign_by_ref('stat', $stat);

$smarty->display('hlavicka.tpl');
$smarty->display('statistiky.tpl');
$smarty->display('paticka.tpl');
}
