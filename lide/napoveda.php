<?php
require('../init.php');

#$udalost=get_event_data($id.".cal");

$smarty->assign("titulek","N�pov�da k vytvo�en� nov�ho ��tu");

$smarty->display('hlavicka.tpl');
$smarty->display('napoveda-formular.tpl');
$smarty->display('paticka.tpl');


?>
