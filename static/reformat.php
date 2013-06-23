#!/usr/bin/php
<?php

$html=array();
$fp = fopen('php://stdin', 'r');

while($line = fgets($fp, 4096)){
	array_push($html,$line);
}

foreach($html as $key=>$radek){
	if(preg_match('/img/',$radek)){
		$sirka=preg_replace('/.*width="([^"]*)".*/','\1',$radek);
		if($sirka>350){
			print preg_replace('/<\/td><td>/','<br/>',$radek);
		}else{
			print $radek;
		}
	}else{
		print $radek;
	}

}
