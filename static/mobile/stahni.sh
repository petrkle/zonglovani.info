#!/bin/bash

rm -rf /home/www/zonglovani.info/static/mobile/zongl.info 2>/dev/null
CSS_CHKSUM=`grep CSS_CHKSUM ../../init.php | cut -d, -f2 | sed "s/[^0-9]//g"`

wget \
	-e "robots=off" \
	--quiet \
	--html-extension \
	--convert-links \
	--page-requisites \
	--no-parent \
	--recursive \
	http://zongl.info/ \
	http://zongl.info/plain-$CSS_CHKSUM.css \
	http://zongl.info/img/e/external.png \
	--reject 'pdf,juggling-tv.html,doplnky-prohlizece.html,odkazy.html,mobil.html,exkurze.html,vanoce-*.html,pf-*.html,changelog*.html,statistiky.html,odkazy.html,navody.html,changelog.html,rss.html,tip.html,jak-odkazovat.html' \
	-X animace,video,obrazky,mapa,kalendar,ulita,lide,diskuse,obrazky-na-plochu,navody,scripts,horoskop,vyhledavani,tip,rss,download,olympiada,mdz,g,css,valentyn

rm -rf zongleruv-slabikar
mv zongl.info zongleruv-slabikar
