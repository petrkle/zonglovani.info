<?php
require('../init.php');
require('../func.php');

$titulek='Proč a jak vznikl žonglérův slabikář';
$smarty->assign('feedback',true);

$smarty->assign('keywords',make_keywords($titulek));
$smarty->assign('description','Proč ča jak vzniká žonglérův slabikář.');

$smarty->assign('titulek',$titulek);

$trail = new Trail();
$trail->addStep($titulek);

$smarty->assign_by_ref('trail', $trail->path);
$smarty->display('hlavicka.tpl');
$smarty->display('ostatni-proc-a-jak.tpl');
$smarty->display('paticka.tpl');

?>