#!/usr/bin/php
<?php

$sitemap=file('mapa-stranek.inc');

print '<?xml version="1.0" encoding="UTF-8"?>
<?xml-stylesheet type="text/xsl" href="sitemap.xsl"?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
';

$znamkovani=array();
array_push($znamkovani,array('vzor'=>'^\/$','priorita'=>1,'zmena'=>'weekly'));
array_push($znamkovani,array('vzor'=>'^\/tip\/$','priorita'=>0.8,'zmena'=>'weekly'));
array_push($znamkovani,array('vzor'=>'^\/(micky|kruhy|kuzely)\/$','priorita'=>0.9,'zmena'=>'monthly'));
array_push($znamkovani,array('vzor'=>'^\/(obrazky|kalendar|lide|diskuse)\/$','priorita'=>0.9,'zmena'=>'weekly'));
array_push($znamkovani,array('vzor'=>'^\/ostatni.html$','priorita'=>0.8,'zmena'=>'yearly'));
array_push($znamkovani,array('vzor'=>'^\/video\/$','priorita'=>0.7,'zmena'=>'monthly'));
array_push($znamkovani,array('vzor'=>'^\/(micky|kruhy|kuzely)\/[2345]\/.+\.html$','priorita'=>0.8,'zmena'=>'yearly'));
array_push($znamkovani,array('vzor'=>'^\/(micky|kruhy|kuzely)\/[^\/]+\.html$','priorita'=>0.7,'zmena'=>'yearly'));
array_push($znamkovani,array('vzor'=>'^\/kuzely\/passing\/$','priorita'=>0.9,'zmena'=>'monthly'));
array_push($znamkovani,array('vzor'=>'^\/kuzely\/passing\/.+\.html$','priorita'=>0.8,'zmena'=>'yearly'));
array_push($znamkovani,array('vzor'=>'^\/horoskop.*$','priorita'=>0.2,'zmena'=>'daily'));
array_push($znamkovani,array('vzor'=>'^\/[^\/]+\.html$','priorita'=>0.7,'zmena'=>'monthly'));
array_push($znamkovani,array('vzor'=>'^\/changelog.html$','priorita'=>0.4,'zmena'=>'weekly'));
array_push($znamkovani,array('vzor'=>'^\/mapa-stranek.html$','priorita'=>0.4,'zmena'=>'weekly'));

foreach($sitemap as $radek){
	$radek=trim($radek);
	if(preg_match('/<a href=/',$radek)){
		$url=preg_replace('/.*<a href="([^"]+)".*/','\1',$radek);
		$zmena='monthly';
		$priorita='0.4';
		foreach($znamkovani as $kriterium){
			if(preg_match('/'.$kriterium['vzor'].'/',$url)){
				$zmena=$kriterium['zmena'];	
				$priorita=$kriterium['priorita'];	
			}
		}
		print '
   <url>
      <loc>http://zonglovani.info'.$url.'</loc>
      <changefreq>'.$zmena.'</changefreq>
      <priority>'.$priorita.'</priority>
   </url>
			';
	}
}

print '
</urlset>';
