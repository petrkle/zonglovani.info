#!/bin/bash

rm -rf /home/www/zonglovani.info/static/zongl.info 2>/dev/null
CSS_CHKSUM=`grep CSS_CHKSUM ../init.php | cut -d, -f2 | sed "s/[^0-9]//g"`

SITE=zongl.info

URL=https://$SITE

wget \
	-e "robots=off" \
	--quiet \
	--html-extension \
	--convert-links \
	--page-requisites \
	--no-parent \
	--no-check-certificate \
	--ca-directory=/noexist \
	--recursive \
	$URL/ \
	$URL/z-$CSS_CHKSUM.css \
	$URL/plain-$CSS_CHKSUM.css \
	$URL/zt-$CSS_CHKSUM.css \
	$URL/img/t/telo.gif \
	$URL/img/o/okraje.png \
	$URL/img/m/micky-logo.gif \
	$URL/img/k/kruhy-logo.gif \
	$URL/img/z/zs.svg \
	$URL/img/d/diabolo-logo.gif \
	$URL/img/e/external.png \
	$URL/img/k/kuzely-logo.gif \
	$URL/img/o/odkazy-slabikar.png \
	--reject pdf \
	-X animace,video,obrazky,mapa,kalendar,ulita,lide,diskuse,obrazky-na-plochu,navody,scripts,horoskop,vyhledavani,tip,rss,download,olympiada,mdz,g,odkazy.html

mv $SITE zongleruv-slabikar
