#!/bin/bash

export IFS='
'

SITE=zongl.info

[ $HOSTNAME = "vps" ] && SITE=zonglovani.info

WEB=/tmp/zs.sitemap

echo '<?xml version="1.0" encoding="UTF-8"?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9" xmlns:image="http://www.google.com/schemas/sitemap-image/1.1">' > img/triky.xml.new
for foo in `find $WEB -type f -name "*.html"`
	do
		pocetobrazku=0
		url=`echo $foo | sed "s#$WEB#https://$SITE#;s/index\.html//"`
		part_sitemap=""
		for brk in `grep "<img" $foo | grep -v -e logo.gif -e komentar.png -e animace.png -e zavinac.serif`
		do
			IMG=`echo $brk | sed "s/.*src=\"\([^\"]*\)\".*/\1/;s/^/https:\/\/$SITE/"`
			part_sitemap="$part_sitemap<image:image><image:loc>$IMG</image:loc></image:image>
"
			let pocetobrazku++
		done
	if [ $pocetobrazku -gt 0 ]
	then

		echo "<url>
<loc>$url</loc>
$part_sitemap</url>" >> img/triky.xml.new

	fi
	done
echo '</urlset>' >> img/triky.xml.new

diff img/triky.xml img/triky.xml.new &>/dev/null || mv img/triky.xml.new img/triky.xml
rm -f img/triky.xml.new
