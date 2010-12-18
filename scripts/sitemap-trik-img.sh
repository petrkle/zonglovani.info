#!/bin/bash

export IFS='
'

./scripts/stahni.sh

pocet=0
echo '<?xml version="1.0" encoding="UTF-8"?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9" xmlns:image="http://www.google.com/schemas/sitemap-image/1.1">' > img/triky.xml.new
for foo in `find zongl.info -type f -name "*.html" -not -wholename '*/obrazky/*'`
	do
		pocetobrazku=0
		url=`echo $foo | sed "s/zongl.info/http:\/\/zonglovani.info/;s/index\.html//"`
		part_sitemap=""
		for brk in `grep "<img" $foo | grep -v -e logo.gif -e komentar.png -e animace.png -e zavinac.serif`
		do
			IMG=`echo $brk | sed 's/.*src="\([^"]*\)".*/\1/;s/^/http:\/\/zonglovani.info/'`
			part_sitemap="$part_sitemap<image:image><image:loc>$IMG</image:loc></image:image>
"
			let pocetobrazku++
		done
	if [ $pocetobrazku -gt 0 ]
	then

		echo "<url>
<loc>$url</loc>
$part_sitemap</url>" >> img/triky.xml.new
	let pocet++

	fi
	done
echo '</urlset>' >> img/triky.xml.new

diff img/triky.xml img/triky.xml.new &>/dev/null || mv img/triky.xml.new img/triky.xml
rm -f img/triky.xml.new

rm -rf zongl.info