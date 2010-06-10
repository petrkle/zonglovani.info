<?php

require('init.php');
require('func.php');
$titulek='Jak začít žonglovat s kruhy';
$smarty->assign('feedback',true);

$smarty->assign('keywords',make_keywords($titulek));
$smarty->assign('description','Obrázkový návod na žonglování s kruhy');

$dalsi=array(
	array('url'=>'/kruhy/3/kaskada.html','text'=>'Kaskáda se třemi kruhy','title'=>'Nejjednodušší způsob žonglování'),
	array('url'=>'/kruhy/vyroba.html','text'=>'Výroba žonglovacích kruhů','title'=>'Jak vyrobit pěkné a levné kruhy na žonglování'),
	);
$smarty->assign_by_ref('dalsi',$dalsi);

$trail = new Trail();
$trail->addStep('Kruhy','/kruhy/');
$smarty->assign('titulek',$titulek);
$smarty->assign('keywords',make_keywords($titulek));
$trail->addStep($titulek);
$smarty->assign_by_ref('trail', $trail->path);
$smarty->display('hlavicka.tpl');
$smarty->display('kruhy-jak-zacit.tpl');
$smarty->display('paticka.tpl');

?>
