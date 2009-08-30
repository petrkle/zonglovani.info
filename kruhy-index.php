<?php

require('init.php');
require('func.php');
$titulek="®onglování s kruhy";

$smarty->assign("titulek",$titulek);
$smarty->assign("keywords",make_keywords($titulek));

$smarty->display('hlavicka.tpl');
$smarty->display('kruhy.tpl');
$smarty->display('paticka.tpl');

?>
