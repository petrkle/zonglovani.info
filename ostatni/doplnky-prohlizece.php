<?php
require('../init.php');
require('../func.php');

$titulek='Doplňky do prohlížeče';
$smarty->assign('feedback',true);

$smarty->assign('keywords',make_keywords($titulek).', žonglérské, žonglování');
$smarty->assign('description','Žonglérská rozšíření do internetových prohlížečů. Personas pro firefox, vyhledávací box pro internet explorer.');

$smarty->assign('titulek',$titulek);

$trail = new Trail();
$trail->addStep($titulek);
$smarty->assign('nahled','https://www.'.$_SERVER['SERVER_NAME'].'/img/b/browsers.png');

$smarty->assign_by_ref('trail', $trail->path);
$smarty->display('hlavicka.tpl');
$smarty->display('doplnky-prohlizece.tpl');
$smarty->display('paticka.tpl');
