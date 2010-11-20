#!/bin/bash

PERPAGE=`grep perPage obrazky/index.php | sed "s/[^0-9]*//g"`

for foo in `find obrazky -type d -mindepth 1 -maxdepth 1`
do
	DIR=`basename $foo`
		if [ ! -f $foo/imgmap.xml ]
		then
			rm obrazky/imgmapmap.xml -f

echo '<?xml version="1.0" encoding="UTF-8"?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9" xmlns:image="http://www.google.com/schemas/sitemap-image/1.1">' > $foo/imgmap.xml

	for baz in `find $foo -type f -mindepth 1 -maxdepth 1 -name "*.jpg" -o -name "*.gif" -o -name "*.png" | sort -n`
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
		URL="http://zonglovani.info/obrazky/$DIR/$STRANKA$FILE.html"
		IMG="http://zonglovani.info/obrazky/$DIR/$FILENAME"
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

if [ ! -f obrazky/imgmapmap.xml ]
then
echo '<?xml version="1.0" encoding="UTF-8"?>
<sitemapindex xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">' > obrazky/imgmapmap.xml
	for foo in `find obrazky -type f -mindepth 2 -maxdepth 2 -name "imgmap.xml"`
	do
echo "<sitemap><loc>http://zonglovani.info/$foo</loc></sitemap>" >> obrazky/imgmapmap.xml
	done
echo '</sitemapindex>' >> obrazky/imgmapmap.xml
fi
