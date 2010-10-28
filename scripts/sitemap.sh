#!/bin/bash

rm -f mapa-stranek.inc
rm -rf zongl.info/ 2>/dev/null
./scripts/stahni.sh
./scripts/tree.pl /home/www/zonglovani.info/zongl.info | sed "s/index\.html//g" > /home/www/zonglovani.info/mapa-stranek.inc
./scripts/tree-full.pl /home/www/zonglovani.info/zongl.info | sed "s/index\.html//g" > /home/www/zonglovani.info/mapa-stranek.full
rm -rf zongl.info/ 2>/dev/null
./scripts/sitemap.php > sitemap.xml
rm -f mapa-stranek.full
