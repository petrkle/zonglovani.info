#!/usr/bin/php
<?php
date_default_timezone_set('Europe/Prague');
for($foo=0;$foo<800;$foo++){
	$bar=strtotime('09/12/2016')+($foo*24*3600);
	if(date('N',$bar)==1){
		print date('Y-m-d',$bar)."\n";
	}
}
