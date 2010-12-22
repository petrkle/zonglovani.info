<?php
require('../init.php');
require('cal-init.php');
require('../func.php');

$udalosti=get_future_data();
uasort($udalosti, 'sort_by_zacatek'); 
$udalosti=array_reverse($udalosti);
while(count($udalosti)>3){
	array_pop($udalosti);
}
$smarty->assign('events',$udalosti);
if(isset($_GET['json'])){
	header('Content-Type: application/json');
	$smarty->display('kalendar-next-json.tpl');
}else{
	header('Content-Type: text/javascript');
	$smarty->display('kalendar-next-js.tpl');
}
?>
