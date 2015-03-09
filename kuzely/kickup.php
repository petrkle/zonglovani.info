<?php
require('../init.php');
require('../func.php');

$titulek='Zvednutí kuželu nohou';
$smarty->assign('feedback',true);

$smarty->assign('keywords',make_keywords($titulek));
$smarty->assign('description','Vykopnutí spadlého žonglovacího kuželu zpátky do vzduchu.');
$smarty->assign('nahled','https://'.$_SERVER['SERVER_NAME'].'/img/k/kuzely-kickupb.png');

$smarty->assign('titulek',$titulek);

$trail = new Trail();
$trail->addStep('Kužely','/kuzely/');
$trail->addStep($titulek);

$smarty->assign('trail', $trail->path);
$smarty->display('hlavicka.tpl');
$smarty->display('kuzely-kickup.tpl');
$smarty->display('paticka.tpl');
