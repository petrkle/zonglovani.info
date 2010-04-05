<?php
require('init.php');

$smarty->assign('titulek','Jak na žonglování s pěti míčky');
$smarty->assign('feedback',true);

$dalsi=array(
	array('url'=>'/micky/5/kaskada.html','text'=>'Kaskáda s pěti míčky','title'=>'Návod na kaskádu s pěti míčky'),
	array('url'=>'/micky/5/kaskada-reverzni.html','text'=>'Reverzní kaskáda s pěti míčky','title'=>'Návod na reverzní kaskádu s pěti míčky'),
	);

$smarty->assign_by_ref('dalsi',$dalsi);
$smarty->display('hlavicka.tpl');
$smarty->display('micky-rady-5.tpl');
$smarty->display('paticka.tpl');

?>
