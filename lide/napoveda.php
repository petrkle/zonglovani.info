<?php

require '../init.php';

//$udalost=get_event_data($id.".cal");

$smarty->assign('titulek', 'Nápověda k vytvoření nového účtu');

$smarty->display('hlavicka.tpl');
$smarty->display('napoveda-formular.tpl');
$smarty->display('paticka.tpl');
