#!/bin/bash

WGET=${WGET:-wget}

rm -rf /home/www/zonglovani.info/static/mobile/zongl.info 2>/dev/null

$WGET \
	-e "robots=off" \
	--quiet \
	--html-extension \
	--no-parent \
	--recursive \
	--no-check-certificate \
	--ca-directory=/noexist \
	https://zongl.info/ \
	https://zongl.info/img/e/external.png \
	--reject '*.pdf,odkazy.html,mobil.html,vanoce-*.html,pf-*.html,odkazy.html,navody.html,jak-odkazovat.html,toolbox.html' \
	-X animace/siteswap,animace/en,ulita,navody,scripts,vyhledavani,download,olympiada,mdz,g,valentyn \
	--convert-links \
	--page-requisites

rm -rf zongleruv-slabikar
mv zongl.info zongleruv-slabikar
