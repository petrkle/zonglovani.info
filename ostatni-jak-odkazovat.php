<?php

require('init.php');

$smarty->assign("titulek","Jak odkazovat na �ongl�r�v slabik��");

$smarty->display('hlavicka.tpl');
$smarty->display('ostatni-jak-odkazovat.tpl');
$smarty->display('paticka.tpl');

?>
