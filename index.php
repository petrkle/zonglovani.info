<?php

if(eregi("index\.php$",$_SERVER["REQUEST_URI"])){
	header("HTTP/1.1 301 Moved Permanently");
	header("Location: /");
	exit();
}

require('init.php');

$smarty->assign("titulek","�ongl�r�v slabik��");
$smarty->assign("nadpis","Obr�zkov� u�ebnice �onglov�n�");
$smarty->assign("notitle",true);

$smarty->display('hlavicka.tpl');
$smarty->display('index.tpl');
$smarty->display('paticka.tpl');

?>
