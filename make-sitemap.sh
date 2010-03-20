#!/bin/bash

rm -f mapa-stranek.inc
rm -rf zongl.info/ 2>/dev/null
./stahni.sh
./tree.pl /home/www/zonglovani.info/zongl.info | sed "s/index\.html//g" > /home/www/zonglovani.info/mapa-stranek.inc
./tree-full.pl /home/www/zonglovani.info/zongl.info | sed "s/index\.html//g" > /home/www/zonglovani.info/mapa-stranek.full
rm -rf zongl.info/ 2>/dev/null
./make-sitemap.php > sitemap.xml
