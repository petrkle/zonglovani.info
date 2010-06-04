<?php
require('../init.php');
require('../func.php');

$uzivatele=get_loginy();
$podrobnosti=array();
foreach($uzivatele as $login){
	array_push($podrobnosti,get_user_props($login));
}

usort($podrobnosti, 'sort_by_reg');

$smarty->assign('uzivatele',$podrobnosti);
header('Content-Type: application/rss+xml');
if(isset($_GET['v'])){
	$smarty->display('lide-rss2.tpl');
}else{
	$smarty->display('lide-rss.tpl');
}

function sort_by_reg($a, $b)
{
		return ($a['registrace'] > $b['registrace']) ? -1 : 1;
}


?>
