<?php
require('../init.php');
require('cal-init.php');

#$udalost=get_event_data($id.".cal");

$smarty->assign("titulek","Kalend�� - zadat novou ud�lost");
$smarty->assign("nadpis","none");
$smarty->assign("notitle",true);

$smarty->display('hlavicka.tpl');
$smarty->display('kalendar-add.tpl');
$smarty->display('paticka.tpl');


?>