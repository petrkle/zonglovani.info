<?php
require('../init.php');
require('cal-init.php');

if(isset($_GET['id'])){
	$id=$_GET['id'];
}else{
	$id=false;
}

$now=time();

$udalost=get_event_data($id.".cal");

$smarty->assign('aktDate', date('j. ',$now).date('n. ',$now).date(' Y',$now));

$smarty->assign("titulek","Kalendáø - ".$udalost["title"]);
$smarty->assign("nadpis",$udalost["title"]);
$smarty->assign("udalost",$udalost);
if($udalost["end"]<time()){
	$smarty->assign("stare",true);
}
$smarty->display('hlavicka.tpl');
$smarty->display('kalendar-event.tpl');
$smarty->display('paticka.tpl');


?>
