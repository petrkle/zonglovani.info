<?php

require('init.php');
require('func.php');
$titulek="Jak začít žonglovat s kruhy";

$smarty->assign("titulek",$titulek);
$smarty->assign("keywords",make_keywords($titulek));

$smarty->display('hlavicka.tpl');
$smarty->display('kruhy-jak-zacit.tpl');
$smarty->display('paticka.tpl');

?>
