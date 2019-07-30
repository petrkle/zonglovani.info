#!/bin/bash

rm -rf /home/www/zonglovani.info/static/mobile/zongl.info 2>/dev/null

wget \
	-e "robots=off" \
	--quiet \
	--html-extension \
	--no-parent \
	--recursive \
	--no-check-certificate \
	--ca-directory=/noexist \
	https://zongl.info/ \
	https://zongl.info/img/e/external.png \
	--reject '*.pdf,juggling-tv.html,doplnky-prohlizece.html,odkazy.html,mobil.html,exkurze.html,vanoce-*.html,pf-*.html,changelog*.html,statistiky.html,odkazy.html,navody.html,changelog.html,rss.html,tip.html,jak-odkazovat.html,toolbox.html' \
	-X animace/siteswap,animace/en,obrazky,ulita,obrazky-na-plochu,navody,scripts,vyhledavani,download,olympiada,mdz,g,valentyn \
	--convert-links \
	--page-requisites

rm -rf zongleruv-slabikar
mv zongl.info zongleruv-slabikar
