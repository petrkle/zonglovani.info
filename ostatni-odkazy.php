<?php
require('init.php');

$smarty->assign("titulek","�onglov�n� na s�ti");

$smarty->display('hlavicka.tpl');
$smarty->display('ostatni-odkazy.tpl');
$smarty->display('paticka.tpl');

?>
