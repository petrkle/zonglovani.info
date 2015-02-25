#!/usr/bin/php
<?php

if(isset($_SERVER['HTTP_HOST'])){exit();};

print '<?xml version="1.0" encoding="UTF-8"?>
<?xml-stylesheet type="text/xsl" href="sitemap.xsl"?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9" xmlns:geo="http://www.google.com/geo/schemas/sitemap/1.0">
<url>      
	<loc>https://zonglovani.info/mapa/mapa-zongleri.kml</loc>
	<geo:geo>
		<geo:format>kml</geo:format>
	</geo:geo>
</url> 
';

$znamkovani=array();
array_push($znamkovani,array('vzor'=>'^\/$','priorita'=>1,'zmena'=>'weekly'));
array_push($znamkovani,array('vzor'=>'^\/tip\/$','priorita'=>0.8,'zmena'=>'weekly'));
array_push($znamkovani,array('vzor'=>'^\/novinky\/$','priorita'=>0.4,'zmena'=>'daily'));
array_push($znamkovani,array('vzor'=>'^.+\.rss$','priorita'=>0.6,'zmena'=>'weekly'));
array_push($znamkovani,array('vzor'=>'^\/(micky|kruhy|kuzely|diabolo)\/$','priorita'=>0.9,'zmena'=>'monthly'));
array_push($znamkovani,array('vzor'=>'^\/(obrazky|kalendar|lide|diskuse)\/$','priorita'=>0.9,'zmena'=>'weekly'));
array_push($znamkovani,array('vzor'=>'^\/ostatni.html$','priorita'=>0.8,'zmena'=>'yearly'));
array_push($znamkovani,array('vzor'=>'^\/video\/$','priorita'=>0.7,'zmena'=>'monthly'));
array_push($znamkovani,array('vzor'=>'^\/video\/.+\.html$','priorita'=>0.5,'zmena'=>'yearly'));
array_push($znamkovani,array('vzor'=>'^\/video\/stranka.*\.html$','priorita'=>0.6,'zmena'=>'monthly'));
array_push($znamkovani,array('vzor'=>'^\/(micky|kruhy|kuzely)\/[2345]\/.+\.html$','priorita'=>0.8,'zmena'=>'yearly'));
array_push($znamkovani,array('vzor'=>'^\/(micky|kruhy|kuzely|diabolo)\/[^\/]+\.html$','priorita'=>0.7,'zmena'=>'yearly'));
array_push($znamkovani,array('vzor'=>'^\/kuzely\/passing\/$','priorita'=>0.9,'zmena'=>'monthly'));
array_push($znamkovani,array('vzor'=>'^\/kuzely\/passing\/.+\.html$','priorita'=>0.8,'zmena'=>'yearly'));
array_push($znamkovani,array('vzor'=>'^\/horoskop.*$','priorita'=>0.2,'zmena'=>'daily'));
array_push($znamkovani,array('vzor'=>'^\/[^\/]+\.html$','priorita'=>0.7,'zmena'=>'monthly'));
array_push($znamkovani,array('vzor'=>'^\/changelog.html$','priorita'=>0.4,'zmena'=>'weekly'));
array_push($znamkovani,array('vzor'=>'^\/statistiky.html$','priorita'=>0.4,'zmena'=>'daily'));
array_push($znamkovani,array('vzor'=>'^\/changelog-.*.html$','priorita'=>0.4,'zmena'=>'monthly'));
array_push($znamkovani,array('vzor'=>'^\/mapa-stranek.html$','priorita'=>0.4,'zmena'=>'weekly'));
array_push($znamkovani,array('vzor'=>'^\/obrazky\/.+\/$','priorita'=>0.6,'zmena'=>'yearly'));
array_push($znamkovani,array('vzor'=>'^\/obrazky\/.+\.html$','priorita'=>0.4,'zmena'=>'yearly'));
array_push($znamkovani,array('vzor'=>'^\/lide\/.+\.html$','priorita'=>0.6,'zmena'=>'weekly'));
array_push($znamkovani,array('vzor'=>'^\/lide\/dovednost\/.+\.html$','priorita'=>0.6,'zmena'=>'weekly'));
array_push($znamkovani,array('vzor'=>'^\/lide\/misto\/.+\.html$','priorita'=>0.6,'zmena'=>'weekly'));
array_push($znamkovani,array('vzor'=>'^\/lide\/stranka[0-9]+\/$','priorita'=>0.6,'zmena'=>'weekly'));
array_push($znamkovani,array('vzor'=>'^\/kalendar\/.+\.html$','priorita'=>0.6,'zmena'=>'weekly'));
array_push($znamkovani,array('vzor'=>'^\/kalendar\/udalost.+\.html$','priorita'=>0.7,'zmena'=>'monthly'));
array_push($znamkovani,array('vzor'=>'^\/obrazky-na-plochu.*','priorita'=>0.5,'zmena'=>'yearly'));
array_push($znamkovani,array('vzor'=>'^\/pro-novinare.*','priorita'=>0.5,'zmena'=>'yearly'));
array_push($znamkovani,array('vzor'=>'^\/animace\/$','priorita'=>0.6,'zmena'=>'yearly'));
array_push($znamkovani,array('vzor'=>'^\/animace\/en\/$','priorita'=>0.5,'zmena'=>'yearly'));
array_push($znamkovani,array('vzor'=>'^\/animace\/siteswap\/$','priorita'=>0.5,'zmena'=>'yearly'));
array_push($znamkovani,array('vzor'=>'^\/animace\/.+\.html$','priorita'=>0.4,'zmena'=>'yearly'));

while (($radek = fgets(STDIN)) !== false) {
	$radek = trim($radek);
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
      <loc>https://zonglovani.info'.$url.'</loc>
      <changefreq>'.$zmena.'</changefreq>
      <priority>'.$priorita.'</priority>
   </url>';
	}
}

print '
</urlset>
';
