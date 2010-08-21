<?php
require('../init.php');
require('../func.php');
require('../lide/pusobiste.php');

$mista=get_places('CZ',$pusobiste);
$zongleri=array();

foreach(get_loginy() as $login){
	$foo=get_user_pusobiste($login);
	if(is_array($foo)){
			$zongleri[$login]=get_user_props($login);
			$zongleri[$login]['pusobiste']=$foo;
			foreach($foo as $misto){
				if(strlen($pusobiste[$misto]['lat'])>0){
					$mista[$misto]['lide'][$login]=$zongleri[$login];
				}
			}
	}
}


$smarty->assign_by_ref('mista',$mista);

$mapa=$smarty->fetch('mapa-cz.tpl');
print '<pre>'.htmlspecialchars($mapa).'</pre>';


$foo=fopen('../mapa/mapa-cz.kml','w');
fwrite($foo,$mapa);
fclose($foo);
?>
