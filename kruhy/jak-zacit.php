<?php

require('../init.php');
require('../func.php');
$titulek='Jak začít žonglovat s kruhy';
$smarty->assign('feedback',true);

$smarty->assign('keywords',make_keywords($titulek));
$smarty->assign('description','Obrázkový návod na žonglování s kruhy');
$smarty->assign('nahled','https://www.'.$_SERVER['SERVER_NAME'].'/img/k/kruhy-zacatekc.png');

$trail = new Trail();
$trail->addStep('Kruhy','/kruhy/');
$smarty->assign('titulek',$titulek);
$smarty->assign('keywords',make_keywords($titulek));
$trail->addStep($titulek);
$smarty->assign_by_ref('trail', $trail->path);

$trik=nacti_trik('kruhy-jak-zacit');
$smarty->assign('trik',$trik);

$smarty->display('hlavicka.tpl');
$smarty->display('trik.tpl');
$smarty->display('paticka.tpl');
