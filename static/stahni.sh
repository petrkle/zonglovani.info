#!/bin/bash

rm -rf /home/www/zonglovani.info/static/zongl.info 2>/dev/null

wget \
	-e "robots=off" \
	--quiet \
	--html-extension \
	--convert-links \
	--page-requisites \
	--no-parent \
	--recursive \
	http://zongl.info/ \
	http://zongl.info/z.css \
	http://zongl.info/zt.css \
	http://zongl.info/img/t/telo.gif \
	http://zongl.info/img/o/okraje.png \
	http://zongl.info/img/m/micky-logo.gif \
	http://zongl.info/img/k/kruhy-logo.gif \
	http://zongl.info/img/e/external.png \
	http://zongl.info/img/k/kuzely-logo.gif \
	http://zongl.info/img/o/odkazy-slabikar.png \
	--reject pdf \
	-X animace,video,obrazky,mapa,kalendar,ulita,lide,diskuse,obrazky-na-plochu,navody,scripts,horoskop,vyhledavani,tip,rss

mv zongl.info zongleruv-slabikar
#	'jak-odkazovat.html', \
#	'prihlaseni.php*', \
#	'diskuse*', \
#	'obrazky*.html', \
#	'video*', \
#	'lide*', \
#	'kalendar*', \
#	'mapa*', \
#	'ulita*', \
#	'*obrazky-na-plochu*'
