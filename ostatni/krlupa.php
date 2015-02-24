<?php
require('../init.php');
require('../func.php');
$titulek='Křišťálová lupa';
$smarty->assign('keywords',make_keywords($titulek).', žonglování, nominace');
$smarty->assign('description','Nominujte žonglérův slabikář do Křišťálové lupy 2011.');
$smarty->assign('titulek',$titulek);
$smarty->assign('nahled','https://'.$_SERVER['SERVER_NAME'].'/img/l/lupa2011.png');
$trail = new Trail();
$trail->addStep($titulek);
$dalsi=array(
	array('url'=>'http://kristalova.lupa.cz/nominace/','text'=>'Formulář pro nominaci','title'=>'Formulář pro nominaci žonglérova slabikáře do Křišťálové lupy.'),
	array('url'=>'/podporte-zongleruv-slabikar.html','text'=>'Další možnosti podpory žonglérova slabikáře','title'=>'Vložení odkazu na web a tak.')
	);
$smarty->assign_by_ref('dalsi',$dalsi);
$smarty->assign_by_ref('trail', $trail->path);
$smarty->display('hlavicka.tpl');
$smarty->display('ostatni-krlupa.tpl');
$smarty->display('paticka.tpl');
