<?php
require('init.php');
require('func.php');

$titulek='Podpořte žonglérův slabikář';
$smarty->assign('titulek',$titulek);

$trail = new Trail();
$trail->addStep($titulek);
$smarty->assign_by_ref('trail', $trail->path);
$smarty->display('hlavicka.tpl');
$smarty->display('ostatni-podporte-zongleruv-slabikar.tpl');
$smarty->display('paticka.tpl');

?>
