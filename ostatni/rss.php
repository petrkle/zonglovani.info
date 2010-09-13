<?php
require('../init.php');
require('../func.php');

$titulek='RSS kanály';
$smarty->assign('feedback',true);

$smarty->assign('keywords','rss, kanály, žonglování, aktuality, nastavení');
$smarty->assign('description','Seznam RSS kanálů žonglérova slabikáře. Informace o novinkách na žonglérské scéně.');

$smarty->assign('titulek',$titulek);

$trail = new Trail();
$trail->addStep($titulek);

$smarty->assign_by_ref('trail', $trail->path);
$smarty->display('hlavicka.tpl');
$smarty->display('ostatni-rss.tpl');
$smarty->display('paticka.tpl');

?>
