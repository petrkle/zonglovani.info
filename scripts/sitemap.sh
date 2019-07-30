#!/bin/bash

cd /home/www/zonglovani.info

TMP=/tmp
WEB=$TMP/zs.sitemap

nice -19 ionice -c 3 rm -rf $WEB 2>/dev/null

./scripts/stahni.sh

nice -19 ionice -c 3 ./scripts/tree.pl $WEB \
	| sed "s/index\.html//g" \
	| sed 's/Diskuse a komentáře - .*\. stránka/Diskuse a komentáře/g' \
	> $TMP/mapa-stranek.inc && mv $TMP/mapa-stranek.inc /home/www/zonglovani.info/mapa-stranek.inc

nice -19 ionice -c 3 ./scripts/tree-full.pl $WEB \
	| sed "s/index\.html//g" \
	| ./scripts/sitemap.php \
	> $TMP/sitemap.xml && mv $TMP/sitemap.xml /home/www/zonglovani.info/sitemap.xml

nice -19 ionice -c 3 ./scripts/sitemap-trik-img.sh

nice -19 ionice -c 3 rm -rf $WEB $TMP/sitemap.xml $TMP/mapa-stranek.inc 2>/dev/null

nice -19 ionice -c 3 ./scripts/sitemap-obrazky.sh
