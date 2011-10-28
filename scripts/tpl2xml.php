#!/usr/bin/php
<?php

date_default_timezone_set('Europe/Prague');

if(isset($argv[1])){
	$show = $argv[1];
}else{
	$show = 'vyroba-balonky.php';
}

$source=file_get_contents($show);

$sablony=array();
preg_match_all('/\$smarty->display.*;/',$source,$sablony);
if(count($sablony)>0){
	foreach($sablony[0] as $klic=>$sablona){
		$sablona=preg_replace('/.*display\(./','',$sablona);
		$sablona=preg_replace('/.\).*;.*/','',$sablona);
		if($sablona!='hlavicka.tpl' and $sablona!='paticka.tpl'){
			$tpl_file=$sablona;
		}
	}
}

$tpl=file("templates/$tpl_file");

if(preg_match('/\$dalsi/',$source)){
	$dalsi=preg_replace('/.*(\$dalsi=.*)/ms','\1',$source);
	$dalsi=preg_replace('/([^;]*)\);.*/ms','\1);',$dalsi);
	eval($dalsi);
}

print '<?xml version="1.0"?>
<trik>

    <about>
	     <nazev>-</nazev>
		 <pocet>-</pocet>
	     <siteswaps>-</siteswaps>
		 <obtiznost>-</obtiznost>
		 <oblast>micky</oblast>
	</about>
	';

$sablona=array();
foreach($tpl as $line){
	$line=trim($line);
	if(strlen($line)>0){
		array_push($sablona,$line);
	}
}

foreach($sablona as $klic=>$line){
		$line=preg_replace('/<b>/','&lt;b&gt;',$line);
		$line=preg_replace('/<\/b>/','&lt;/b&gt;',$line);
		$line=preg_replace('/<h3>(.*)<\/h3>/','<krok><nadpis>\1</nadpis></krok>',$line);
		if(isset($sablona[($klic+1)]) and preg_match('/.*obrazek.*/',$sablona[($klic+1)])){
			$line=preg_replace('/<p>/','<krok>',$line);
		}else{
			$line=preg_replace('/<p>/','<krok><popisek>',$line);
		}
		$line=preg_replace('/<\/p>/','</popisek></krok>',$line);
		$line=preg_replace('/{jsinlinevideo v=.([^\'"]+).}/','<krok><video>\1</video></krok>',$line);
		$line=preg_replace('/<a href=.\/img\/.\/([^"]+).>{obrazek soubor=.([^"]+). popisek=.([^"]*).}<\/a>/','<obrazek src="\1">\2</obrazek><popisek>',$line);

		$line=preg_replace('/{obrazek soubor=.([^"]+). popisek=.([^"]*).}/','<obrazek>\1</obrazek><popisek>',$line);
		print "$line\n";
}
if(isset($dalsi) and is_array($dalsi)){
	print '<dalsi>'."\n";
	foreach($dalsi as $link){
		print '<link url="'.$link['url'].'" title="'.$link['title'].'">'.$link['text'].'</link>'."\n";
	}
	print '</dalsi>'."\n";
}

print '
</trik>';
