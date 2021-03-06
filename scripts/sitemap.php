#!/usr/bin/php
<?php

if (isset($_SERVER['HTTP_HOST'])) {
    exit();
}

echo '<?xml version="1.0" encoding="UTF-8"?>
<?xml-stylesheet type="text/xsl" href="sitemap.xsl"?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
';

$znamkovani = array();
array_push($znamkovani, array('vzor' => '^\/$', 'priorita' => 1, 'zmena' => 'weekly'));
array_push($znamkovani, array('vzor' => '^\/(micky|kruhy|kuzely|diabolo)\/$', 'priorita' => 0.9, 'zmena' => 'monthly'));
array_push($znamkovani, array('vzor' => '^\/ostatni.html$', 'priorita' => 0.8, 'zmena' => 'yearly'));
array_push($znamkovani, array('vzor' => '^\/(micky|kruhy|kuzely)\/[2345]\/.+\.html$', 'priorita' => 0.8, 'zmena' => 'yearly'));
array_push($znamkovani, array('vzor' => '^\/(micky|kruhy|kuzely|diabolo)\/[^\/]+\.html$', 'priorita' => 0.7, 'zmena' => 'yearly'));
array_push($znamkovani, array('vzor' => '^\/kuzely\/passing\/$', 'priorita' => 0.9, 'zmena' => 'monthly'));
array_push($znamkovani, array('vzor' => '^\/kuzely\/passing\/.+\.html$', 'priorita' => 0.8, 'zmena' => 'yearly'));
array_push($znamkovani, array('vzor' => '^\/[^\/]+\.html$', 'priorita' => 0.7, 'zmena' => 'monthly'));
array_push($znamkovani, array('vzor' => '^\/mapa-stranek.html$', 'priorita' => 0.4, 'zmena' => 'weekly'));
array_push($znamkovani, array('vzor' => '^\/animace\/$', 'priorita' => 0.6, 'zmena' => 'yearly'));
array_push($znamkovani, array('vzor' => '^\/animace\/en\/$', 'priorita' => 0.5, 'zmena' => 'yearly'));
array_push($znamkovani, array('vzor' => '^\/animace\/siteswap\/$', 'priorita' => 0.5, 'zmena' => 'yearly'));
array_push($znamkovani, array('vzor' => '^\/animace\/.+\.html$', 'priorita' => 0.4, 'zmena' => 'yearly'));

while (($radek = fgets(STDIN)) !== false) {
    $radek = trim($radek);
    if (preg_match('/<a href=/', $radek)) {
        $url = preg_replace('/.*<a href="([^"]+)".*/', '\1', $radek);
        $zmena = 'monthly';
        $priorita = '0.4';
        foreach ($znamkovani as $kriterium) {
            if (preg_match('/'.$kriterium['vzor'].'/', $url)) {
                $zmena = $kriterium['zmena'];
                $priorita = $kriterium['priorita'];
            }
        }
        echo '
   <url>
      <loc>https://zonglovani.info'.$url.'</loc>
      <changefreq>'.$zmena.'</changefreq>
      <priority>'.$priorita.'</priority>
   </url>';
    }
}

echo '
</urlset>
';
