<?php
require('../init.php');
require('../func.php');

$titulek='Žonglérské pexeso';

$smarty->assign('titulek',$titulek);

$smarty->assign('keywords','pexeso, žonglování, tisk');
$smarty->assign('description','Speciální žonglérské pexeso');
$smarty->assign('nahled','https://'.$_SERVER['SERVER_NAME'].'/img/z/zonglerske-pexeso.jpg');

$trail = new Trail();
$trail->addStep($titulek);

$smarty->assign('trail', $trail->path);
$smarty->display('hlavicka.tpl');
$smarty->display('pexeso.tpl');
$smarty->display('paticka.tpl');
