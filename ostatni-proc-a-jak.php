<?php
require('init.php');

$smarty->assign("titulek","Pro� a jak vznikl �ognl�r�v slabik��");

$smarty->display('hlavicka.tpl');
$smarty->display('ostatni-proc-a-jak.tpl');
$smarty->display('paticka.tpl');

?>
