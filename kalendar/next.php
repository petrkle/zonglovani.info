<?php
require('../init.php');
require('cal-init.php');
require('../func.php');

#header('Content-Type: text/javascript');
header('Content-Type: text/html');
$udalosti=get_future_data();
uasort($udalosti, 'sort_by_zacatek'); 
$udalosti=array_reverse($udalosti);
$smarty->assign('events',$udalosti);
$smarty->display('kalendar-next-js.tpl');
?>
