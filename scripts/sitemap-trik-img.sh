#!/bin/bash

echo '<?xml version="1.0" encoding="UTF-8"?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9" xmlns:image="http://www.google.com/schemas/sitemap-image/1.1">' > img/triky.xml.new
	for foo in xml/*.xml
	do
		baz=`basename $foo .xml`
		url=`echo $baz | sed "s/-/\//g;s/$/.html/"`
		echo "<url>
<loc>http://zonglovani.info/$url</loc>" >> img/triky.xml.new
		for brk in `grep "<obrazek>" $foo`
		do
			IMG=`echo $brk | sed "s/<obrazek>\(.*\)<\/obrazek>/\1/"`
			FL=`echo $IMG | sed "s/^\(.\).*/\1/"`
echo "<image:image>
<image:loc>http://zonglovani.info/img/$FL/$IMG.png</image:loc>
</image:image>" >> img/triky.xml.new
		done
		echo "</url>" >> img/triky.xml.new
	done
echo '</urlset>' >> img/triky.xml.new

diff img/triky.xml img/triky.xml.new &>/dev/null || mv img/triky.xml.new img/triky.xml
rm -f img/triky.xml.new
