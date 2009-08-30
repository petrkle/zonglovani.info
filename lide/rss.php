<?php
require('../init.php');
require('../func.php');

$uzivatele=get_loginy();
$podrobnosti=array();
foreach($uzivatele as $login){
	array_push($podrobnosti,get_user_props($login));
}
$smarty->assign("uzivatele",$podrobnosti);
$smarty->display('lide-rss.tpl');
?>
