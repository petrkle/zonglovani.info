<?php
require('../init.php');
require('../func.php');
require($_SERVER['DOCUMENT_ROOT'].'/rss/rss.php');

if(is_logged() and isset($_SESSION['changes']) and is_array($_SESSION['changes']) and count($_SESSION['changes']>0)){

	$dalsi=array(
		array('url'=>'/changelog.html','text'=>'Kompletní seznam změn','title'=>'Kompletní seznam změn v žonglérově slabikáři'),
		array('url'=>'/tip/','text'=>'Žonglérský tip týdne','title'=>'Každý týden aktualizované tipy a rady pro žongléry a žonglérky.'),
		array('url'=>'/podporte-zongleruv-slabikar.html','text'=>'Podpoř žonglérův slabikář','title'=>'Jak podpořit žonglérův slabikář'),
		);
	$smarty->assign_by_ref('dalsi',$dalsi);

	$titulek='Novinky v žonglérově slabikáři';
	$nadpis=$titulek;
	$popis='Seznam novinek v žonglérově slabikáři.';
	$zmeny=$_SESSION['changes'];
	unset($_SESSION['changes_pocet']);
	$trail = new Trail();
	$trail->addStep($titulek,'/changes.html');

	$smarty->assign('nadpis',$nadpis);
	$smarty->assign('keywords','změny, žonglérův slabikář, changelog');
	$smarty->assign('description',$popis);
	$smarty->assign_by_ref('rss_zdroje',$rss_zdroje);
	$smarty->assign('titulek',$titulek);

	$smarty->assign_by_ref('trail', $trail->path);
	$smarty->assign_by_ref('zmeny', $zmeny);
	$smarty->display('hlavicka.tpl');
	$smarty->display('ostatni-changes.tpl');
	$smarty->display('paticka.tpl');
}else{
	header('Location: /novinky/');
	exit();
}
?>
