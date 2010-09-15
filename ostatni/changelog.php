<?php
require('../init.php');
require('../func.php');

#nastavení linku
#svn propset --revprop -r 206 svn:link "/horoskop/"
$titulek='Změny v žonglérově slabikáři';
$smarty->assign('keywords','změny, žonglérův slabikář, changelog');
$smarty->assign('description','Seznam změn v žonglérově slabikáři.');
$smarty->assign('feedback',true);
$smarty->assign('titulek',$titulek);

$dalsi=array(
	array('url'=>'/proc-a-jak.html','text'=>'Proč a jak vznikl žonglérův slabikář','title'=>'Proč a jak vznikl žonglérův slabikář'),
	array('url'=>'/podporte-zongleruv-slabikar.html','text'=>'Podpoř žonglérův slabikář','title'=>'Jak podpořit žonglérův slabikář'),
	array('url'=>'/toolbox.html','text'=>'Použitý software','title'=>'Seznam programů použitých při vytváření žonglérova slabikáře'),
	array('url'=>'/statistiky.html','text'=>'Statistiky','title'=>'Statistiky žonglérova slabikáře')
	);
$smarty->assign_by_ref('dalsi',$dalsi);

$trail = new Trail();
$trail->addStep($titulek);

$smarty->assign_by_ref('trail', $trail->path);
$smarty->display('hlavicka.tpl');

$smarty->assign('zmeny',get_changelog());
$smarty->display('ostatni-changelog.tpl');

$smarty->display('paticka.tpl');
?>
