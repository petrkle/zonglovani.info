<?php

require('init.php');

$smarty->assign("titulek","Podpo�te �ongl�r�v slabik��");

$smarty->display('hlavicka.tpl');
$smarty->display('ostatni-podporte-zongleruv-slabikar.tpl');
$smarty->display('paticka.tpl');

?>
