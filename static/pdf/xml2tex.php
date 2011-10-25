#!/usr/bin/php
<?php

date_default_timezone_set('Europe/Prague');
$lib='../../lib';
$root='../..';
require($lib.'/Smarty.class.php');

$smarty = new Smarty;

$smarty->template_dir = $root.'/templates';
$smarty->config_dir = $lib.'/configs';
$smarty->cache_dir = $root.'/tmp/cache';
$smarty->compile_dir = $root.'/tmp/templates_c';
$smarty->plugins_dir = array($lib.'/plugins',$lib.'/plugins_user');


if(isset($argv[1])){
	$show = $argv[1];
}else{
	$show = 'micky-3-kaskada';
}
$trik=nacti_trik($show);

$smarty->assign('trik',$trik);

$smarty->display('trik.tex.tpl');


function nacti_trik($soubor){
	global $root;
	$xml = simplexml_load_file($root.'/xml/'.basename($soubor).'.xml');
	$trik=array();
	$trik['kroky'] = array();
	$trik['about'] = (array) $xml->about;
	foreach ($xml->krok as $krok){
		$foo=array();
		if($krok->popisek){
			$foo['popisek'] = (string) $krok->popisek;
			$foo['popisek'] = preg_replace('/ /u',' ',$foo['popisek']);
			$foo['popisek'] = preg_replace('/<\/b>/','}',$foo['popisek']);
			$foo['popisek'] = preg_replace('/<b>/','{\bf ',$foo['popisek']);
			$foo['popisek'] = strip_tags($foo['popisek']);
		}
		if($krok->pre){
			$foo['pre'] = (string) $krok->pre;
		}
		if($krok->obrazek){
			$foo['obrazek'] = (string) $krok->obrazek;
			if(!preg_match('/\.(jpg|gif|png)$/',$foo['obrazek'])){
				$foo['obrazek']='img/'.substr($foo['obrazek'],0,1).'/'.$foo['obrazek'].'.png';
			}
			if($krok->obrazek['src']){
				$foo['obrazek_src'] = (string) $krok->obrazek['src'];
				$foo['obrazek_src'] = 'img/'.substr($foo['obrazek_src'],0,1).'/'.$foo['obrazek_src'];
			}
		}
		if($krok->nadpis){
			$foo['nadpis'] = (string) $krok->nadpis;
			if($krok->nadpis['name']){
				$foo['kotva'] = (string) $krok->nadpis['name'];
			}
		}
		if($krok->video or $krok->animace){
			if($krok->video){
				$foo['video'] = (string) $krok->video;
			}
			if($krok->animace){
				$foo['animace'] = (string) $krok->animace;
			}
		}
		array_push($trik['kroky'],$foo);
	}


	#$trik['anim']=get_anim($_SERVER['REQUEST_URI']);
	if(isset($xml->dalsi)){
		$trik['dalsi']=array();
		foreach ($xml->dalsi->link as $odkaz){
			if(isset($odkaz['url'])){
				$url = (string) $odkaz['url'];
				$text= (string) $odkaz;
				$trik['dalsi'][$url]['text']=$text;
				if(isset($odkaz['title'])){
					$trik['dalsi'][$url]['title']= (string) $odkaz['title'];
				}
			}
		}
	}
	return $trik;
}
