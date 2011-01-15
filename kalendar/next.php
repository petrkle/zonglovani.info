<?php
require('../init.php');
require('../func.php');
require('cal-init.php');

if(isset($_GET['filtr'])){
	$filtr=$_GET['filtr'];
}else{
	$filtr=false;
}

#$smarty->compile_check = false;
#$smarty->caching = 2;
#$smarty->cache_lifetime = 300;

$udalosti=get_future_data($filtr);

uasort($udalosti, 'sort_by_zacatek'); 
$udalosti=array_reverse($udalosti);
while(count($udalosti)>3){
	array_pop($udalosti);
}
$smarty->assign('events',$udalosti);
if(isset($_GET['json'])){
	if(isset($_GET['callback'])){
  if (preg_match('/\W/', $_GET['callback'])){
    header('HTTP/1.1 400 Bad Request');
    exit();
  }
		$smarty->assign_by_ref('callback',$_GET['callback']);
	}
	header('Content-Type: application/json');
	$smarty->display('kalendar-next-json.tpl');
}else{
	header('Content-Type: text/javascript');
	$smarty->display('kalendar-next-js.tpl');
}
?>
