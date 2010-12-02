<?php
require('../init.php');
require 'auth.php';
require 'gapi.class.php';
require 'navstevnost-func.php';


$ga = new gapi(ga_email,ga_password);

$datum = date('Y-m-d',time()-(2*24*3600));

$navstevy = nav_get_stat($datum,$ga);

$navstevnost=nav_load_data();

if(!isset($navstevnost[$datum]) or $navstevy['vis']>$navstevnost[$datum]['vis'] or $navstevy['pag']>$navstevnost[$datum]['pag']){
	$foo=fopen(STAT_DATA.'/'.$datum.'.txt','w');
	foreach($navstevy as $name=>$value){
		fwrite($foo,$name.':'.$value."\n");
	}
	fclose($foo);
}

nav_clean_old_data($navstevnost);
?>
