<?php
require('../init.php');
require('../func.php');

$titulek='Náhled do žonglérova slabikáře';
$smarty->assign('feedback',true);
$smarty->assign('titulek',$titulek);

$smarty->assign('keywords','žonglérův slabikář, účet, registrace, funkce');
$smarty->assign('description','Podrobný popis funkcí pro registrované uživatele žonglérova slabikáře.');

$dalsi=array(
	array('url'=>LIDE_URL.'novy-ucet.php','text'=>'Založit účet','title'=>'Vytvoření nového účtu'),
	array('url'=>LIDE_URL,'text'=>'Seznam žongléřů','title'=>'Seznam uživatelů žonglérova slabikáře'),
	array('url'=>'/statistiky.html#navst','text'=>'Statistika návštěvnosti','title'=>'Statistika návštěvnosti žonglérova slabikáře'),
	);
$smarty->assign_by_ref('dalsi',$dalsi);

$trail = new Trail();
$trail->addStep($titulek);
$smarty->assign_by_ref('trail', $trail->path);
$smarty->display('hlavicka.tpl');
$smarty->display('exkurze.tpl');
$smarty->display('paticka.tpl');

?>
