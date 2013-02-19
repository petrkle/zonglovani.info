#!/bin/bash

rm -rf /home/www/zonglovani.info/static/zongl.info 2>/dev/null
CSS_CHKSUM=`grep CSS_CHKSUM ../init.php | cut -d, -f2 | sed "s/[^0-9]//g"`

wget \
	-e "robots=off" \
	--quiet \
	--html-extension \
	--convert-links \
	--page-requisites \
	--no-parent \
	--recursive \
	http://zongl.info/ \
	http://zongl.info/z-$CSS_CHKSUM.css \
	http://zongl.info/plain-$CSS_CHKSUM.css \
	http://zongl.info/zt-$CSS_CHKSUM.css \
	http://zongl.info/img/t/telo.gif \
	http://zongl.info/img/o/okraje.png \
	http://zongl.info/img/m/micky-logo.gif \
	http://zongl.info/img/k/kruhy-logo.gif \
	http://zongl.info/img/l/logo.gif \
	http://zongl.info/img/d/diabolo-logo.gif \
	http://zongl.info/img/e/external.png \
	http://zongl.info/img/k/kuzely-logo.gif \
	http://zongl.info/img/o/odkazy-slabikar.png \
	--reject pdf \
	-X animace,video,obrazky,mapa,kalendar,ulita,lide,diskuse,obrazky-na-plochu,navody,scripts,horoskop,vyhledavani,tip,rss,download,olympiada,mdz,g,odkazy.html

mv zongl.info zongleruv-slabikar
cp ../img/t/tel-*.png zongleruv-slabikar/img/t
