#!/bin/bash

SITE=zongl.info

[ $HOSTNAME = "vps" ] && SITE=zonglovani.info

PERPAGE=`grep perPage obrazky/index.php | head -1 | sed "s/[^0-9]*//g"`

for foo in `find obrazky -mindepth 1 -maxdepth 1 -type d`
do
	DIR=`basename $foo`
		if [ ! -f $foo/imgmap.xml ]
		then
			rm obrazky/imgmap.xml -f

echo '<?xml version="1.0" encoding="UTF-8"?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9" xmlns:image="http://www.google.com/schemas/sitemap-image/1.1">' > $foo/imgmap.xml

	for baz in `find $foo -mindepth 1 -maxdepth 1 -type f -name "*.jpg" -o -name "*.gif" -o -name "*.png" | sort -n`
	do

		FILENAME=`basename $baz`
		FILE=`echo $FILENAME | cut -d. -f1`
		PRIPONA=`echo $FILENAME | cut -d. -f2`
		PAGE=`echo "$FILE/$PERPAGE" | bc`
		if [ $PAGE = 0 ]
		then
			STRANKA=""
		else
			PG=`echo "$PAGE+1" | bc`
			STRANKA="stranka$PG/"
		fi
		URL="https://$SITE/obrazky/$DIR/$STRANKA$FILE.html"
		IMG="https://$SITE/obrazky/$DIR/$FILENAME"
echo "<url>
   <loc>$URL</loc>
   <image:image>
     <image:loc>$IMG</image:loc>
   </image:image>
</url>" >> $foo/imgmap.xml
	done
echo '</urlset>' >> $foo/imgmap.xml
	fi
done

if [ ! -f obrazky/imgmap.xml ]
then
echo '<?xml version="1.0" encoding="UTF-8"?>
<sitemapindex xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">' > obrazky/imgmap.xml
	for foo in `find obrazky -mindepth 2 -maxdepth 2 -type f -name "imgmap.xml"`
	do
echo "<sitemap><loc>https://$SITE/$foo</loc></sitemap>" >> obrazky/imgmap.xml
	done
echo "<sitemap><loc>https://$SITE/img/triky.xml</loc></sitemap>" >> obrazky/imgmap.xml
echo '</sitemapindex>' >> obrazky/imgmap.xml
fi
