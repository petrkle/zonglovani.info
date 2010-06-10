<?php
require('init.php');
require('func.php');

$titulek='Jak na žonglování s pěti míčky';
$smarty->assign('titulek',$titulek);
$smarty->assign('feedback',true);

$smarty->assign('keywords',make_keywords($titulek));
$smarty->assign('description','Rady pro žonglování s pěti míčky.');

$dalsi=array(
	array('url'=>'/micky/5/kaskada.html','text'=>'Kaskáda s pěti míčky','title'=>'Návod na kaskádu s pěti míčky'),
	array('url'=>'/micky/5/kaskada-reverzni.html','text'=>'Reverzní kaskáda s pěti míčky','title'=>'Návod na reverzní kaskádu s pěti míčky'),
	);

$smarty->assign_by_ref('dalsi',$dalsi);
$smarty->display('hlavicka.tpl');
$smarty->display('micky-rady-5.tpl');
$smarty->display('paticka.tpl');

?>
