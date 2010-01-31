<?php
require('init.php');
require('func.php');

#nastavení linku
#svn propset --revprop -r 206 svn:link "/horoskop/"
$titulek='Změny v žonglérově slabikáři';
$smarty->assign('titulek',$titulek);

$trail = new Trail();
$trail->addStep($titulek);

$smarty->assign_by_ref('trail', $trail->path);
$smarty->display('hlavicka.tpl');

$smarty->assign('zmeny',get_changelog());
$smarty->display('ostatni-changelog.tpl');

$smarty->display('paticka.tpl');
?>
