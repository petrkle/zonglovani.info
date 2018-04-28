#!/bin/bash

rm -rf /home/www/zonglovani.info/static/mobile/zongl.info 2>/dev/null

wget \
	-e "robots=off" \
	--quiet \
	--html-extension \
	--convert-links \
	--page-requisites \
	--no-parent \
	--recursive \
	--no-check-certificate \
	--ca-directory=/noexist \
	https://zongl.info/ \
	https://zongl.info/img/e/external.png \
	--reject 'pdf,juggling-tv.html,doplnky-prohlizece.html,odkazy.html,mobil.html,exkurze.html,vanoce-*.html,pf-*.html,changelog*.html,statistiky.html,odkazy.html,navody.html,changelog.html,rss.html,tip.html,jak-odkazovat.html' \
	-X animace/siteswap,animace/en,video,obrazky,mapa,kalendar,ulita,lide,diskuse,obrazky-na-plochu,navody,scripts,horoskop,vyhledavani,tip,rss,download,olympiada,mdz,g,valentyn

rm -rf zongleruv-slabikar
mv zongl.info zongleruv-slabikar
