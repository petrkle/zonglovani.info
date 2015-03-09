<?php
require('../init.php');
require('../func.php');

$titulek='Chůdy';

$smarty->assign('titulek',$titulek);

$smarty->assign('keywords','chůdy, návod, dřevěné chůdy, chůdaři, chůdař, žonglování');
$smarty->assign('description','Návod na výrobu chůd a žonglování na chůdách.');

$trail = new Trail();
$trail->addStep($titulek);

$smarty->assign('trail', $trail->path);
$smarty->display('hlavicka.tpl');
$smarty->display('chudy.tpl');
$smarty->display('paticka.tpl');
