<?php
require('init.php');
require('func.php');

$titulek='Žonglérská videa';
$smarty->assign('titulek',$titulek);
$trail = new Trail();
$trail->addStep($titulek,'/video/');

$smarty->assign('feedback',true);
$smarty->assign_by_ref('trail', $trail->path);
$smarty->assign('videa',get_videa('./video.inc'));
$smarty->display('hlavicka.tpl');
$smarty->display('video-index.tpl');
$smarty->display('paticka.tpl');

?>
