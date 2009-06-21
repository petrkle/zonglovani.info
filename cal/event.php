<?php
require('../init.php');
require('cal-init.php');

if(isset($_GET['id'])){
	$id=$_GET['id'];
}else{
	$id=false;
}

$udalost=get_event_data($id.".cal");

$smarty->assign("titulek","Kalendáø - ".$udalost["title"]);
$smarty->assign("nadpis",$udalost["title"]);
$smarty->assign("udalost",$udalost);
$smarty->display('hlavicka.tpl');
$smarty->display('kalendar-event.tpl');
$smarty->display('paticka.tpl');


?>
