#!/usr/bin/php
<?php
date_default_timezone_set('Europe/Prague');
for($foo=0;$foo<1000;$foo++){
	$bar=strtotime('11/1/2012')+($foo*24*3600);
	if(date('N',$bar)==1){
		print date('Y-m-d',$bar)."\n";
	}
}
