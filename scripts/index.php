<?php
require('../init.php');
require('../func.php');

$titulek='Skripty';
$smarty->assign('titulek',$titulek);
$smarty->assign('description','Skripty pro správu žonglérova slabikáře');

$vypis=array();
$adr=opendir('.');
while (false!==($file = readdir($adr))) {
	if (preg_match('/.+\.(sh|pl)$/',$file)){
		$vypis[$file]='/scripts/'.$file;
	};
};
closedir($adr); 

$vypis['Makefile']='/Makefile';
$vypis['fig2png']='/img/fig2png.sh';

ksort($vypis);

$dalsi=array(
	array('url'=>'/toolbox.html','text'=>'Použitý software','title'=>'Seznam použitých programů'),
	array('url'=>'/css/','text'=>'Kaskádové styly','title'=>'Seznam kaskádových stylů')
	);
$smarty->assign_by_ref('dalsi',$dalsi);

$trail = new Trail();
$trail->addStep($titulek);
$smarty->assign_by_ref('trail', $trail->path);
$smarty->assign_by_ref('vypis', $vypis);

$smarty->display('hlavicka.tpl');
$smarty->display('scripts.tpl');
$smarty->display('paticka.tpl');
