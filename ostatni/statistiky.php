<?php
require('../init.php');
require('../func.php');

$titulek='Statistiky';
$smarty->assign('titulek',$titulek);

$smarty->assign('keywords',make_keywords($titulek).', žonglování');
$smarty->assign('description','Statistiky žonglérova slabikáře.');

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

$filename = $_SERVER['DOCUMENT_ROOT'].'/data/dump.sql.bz2';
if (file_exists($filename)) {
  $fupdate=date('j. n. Y G.i', filectime($filename));
}else{
	$fupdate='?';
}


$stat=array();

$stat['aktualizace']=date('j. n. Y G.i', filectime('../ChangeLog'));
$stat['pocet_lide']=count(get_loginy());
$stat['pocet_diskuse']=$diskuse_pocet;
$stat['pocet_kalendar']=$kal_pocet;
$stat['fupdate']=$fupdate;

$trail = new Trail();
$trail->addStep($titulek);
$smarty->assign_by_ref('trail', $trail->path);
$smarty->assign_by_ref('stat', $stat);

$smarty->display('hlavicka.tpl');
$smarty->display('statistiky.tpl');
$smarty->display('paticka.tpl');

?>
