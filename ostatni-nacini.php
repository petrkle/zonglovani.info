<?php
require('init.php');

$smarty->assign("titulek","�ongl�rsk� n��in�");

$smarty->display('hlavicka.tpl');
$smarty->display('ostatni-nacini.tpl');
$smarty->display('paticka.tpl');

?>
