<?php
require('init.php');

$smarty->assign("titulek","®onglování s ku¾ely");

$smarty->display('hlavicka.tpl');
$smarty->display('kuzely-jak-zacit.tpl');
$smarty->display('paticka.tpl');

?>
