<?php
require('../init.php');
require('../func.php');
$titulek='ISBN';
$smarty->assign('keywords',make_keywords($titulek).', žonglování, žonglérův slabikář');
$smarty->assign('description','ISBN - žonglérův slabikář');
$smarty->assign('titulek',$titulek);
$smarty->assign('feedback',true);
$smarty->assign('nahled','https://'.$_SERVER['SERVER_NAME'].'/img/s/slovnik.jpg');
$trail = new Trail();
$trail->addStep('ISBN');
$trail->addStep($titulek);

$dalsi=array(
	array('url'=>'http://aleph.nkp.cz/F/?func=direct&doc_number=002609718&local_base=NKC','text'=>'Záznam v databázi Národní knihovny ČR','title'=>'Záznam v katalogu NK ČR'),
	array('url'=>'http://search.mlp.cz/cz/titul/zongleruv-slabikar/4131041/','text'=>'Záznam v katalogu Městské knihovny v Praze','title'=>'Ke stažení'),
	array('url'=>'/download/pdf.html','text'=>'Žonglérův slabikář v PDF','title'=>'Vhodné pro oboustranný tisk.'),
	array('url'=>'/g/android.app','text'=>'Žonglérův slabikář pro Android','title'=>'Žonglérův slabikář pro systém Android'),
	array('url'=>'/odborne-texty.html','text'=>'Odborné texty o žonglování','title'=>'Odborné texty věnované žonglování a příbuzným oborům'),
	);
$smarty->assign('dalsi',$dalsi);

$smarty->assign('trail', $trail->path);
$smarty->display('hlavicka.tpl');
$smarty->display('isbn.tpl');
$smarty->display('paticka.tpl');
