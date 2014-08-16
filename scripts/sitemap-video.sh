#!/bin/bash

SITE=zongl.info

[ $HOSTNAME = "vps" ] && SITE=zonglovani.info

echo '<?xml version="1.0" encoding="UTF-8"?>
<?xml-stylesheet type="text/xsl" href="video.xsl"?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9" xmlns:video="http://www.google.com/schemas/sitemap-video/1.1">' > video/video.xml.new

for foo in video/klip/*.xml video/klip/*/*.xml
do
	TYP=`grep "<typ>" $foo | sed "s/.*<typ>\(.*\)<\/typ>.*/\1/"`
	if [ $TYP == "youtube.com" ] || [ $TYP == "juggling.tv" ]
	then
		echo "<url>" >> video/video.xml.new
		NAZEV=`grep "<nazev>" $foo | sed "s/.*<nazev>\(.*\)<\/nazev>.*/\1/"`
		DELKA=`grep "<delka>" $foo | sed "s/.*<delka>\(.*\)<\/delka>.*/\1/"`
		DELKA_M=`echo $DELKA | cut -d: -f1`
		DELKA_S=`echo $DELKA | cut -d: -f2`
		DELKA=`echo "($DELKA_M*60)+$DELKA_S" | bc`
		POPIS=`grep "<popis>" $foo | sed "s/.*<popis>\(.*\)<\/popis>.*/\1/;s/&lt;/</g;s/&gt;/>/g;s/&quot;/\"/g;s/<[^>]*>//g"`
		ID=`basename $foo .xml`
		LOC=`echo $foo | sed "s/video\/klip\///;s/\.xml//"`
		FL=`echo $ID | sed "s/^\(.\).*/\1/"`
		NAHLED="http://$SITE/video/img/$FL/$ID.jpg"
		URL="http://$SITE/video/$LOC.html"
		echo "<loc>$URL</loc>" >> video/video.xml.new
		echo "<video:video>" >> video/video.xml.new
		echo "<video:thumbnail_loc>$NAHLED</video:thumbnail_loc>" >> video/video.xml.new
		echo "<video:title>$NAZEV</video:title>" >> video/video.xml.new
		echo "<video:description>$POPIS</video:description>" >> video/video.xml.new
		if [ $TYP == "youtube.com" ]
		then
			LINK=`grep "<link>" $foo | sed "s/.*<link>\(.*\)<\/link>.*/\1/" | cut -d= -f2`
			echo "<video:player_loc>http://www.youtube.com/v/$LINK</video:player_loc>" >> video/video.xml.new
		fi
		if [ $TYP == "juggling.tv" ]
		then
			DOWNLOAD=`grep "<download>" $foo | sed "s/.*<download>\(.*\)<\/download>.*/\1/"`
			KEY=`grep "<link>" $foo | sed "s/.*<link>\(.*\)<\/link>.*/\1/" | cut -d: -f3`
			echo "<video:content_loc>http://juggling.tv/nvplayer.swf?config=http://juggling.tv/nuevo/config.php?key=$KEY</video:content_loc>" >> video/video.xml.new
			echo "<video:player_loc>http://juggling.tv/nvplayer.swf?config=http://juggling.tv/nuevo/config.php?key=$KEY</video:player_loc>" >> video/video.xml.new
		fi
		echo "<video:duration>$DELKA</video:duration>" >> video/video.xml.new
		echo "<video:tag>Žonglování</video:tag>" >> video/video.xml.new
		echo "<video:category>Žonglování</video:category>" >> video/video.xml.new
		echo "<video:gallery_loc title=\"Žonglérská videa\">http://$SITE/video/</video:gallery_loc>" >> video/video.xml.new
		echo "<video:requires_subscription>no</video:requires_subscription>" >> video/video.xml.new
		echo "</video:video>" >> video/video.xml.new
		echo "</url>" >> video/video.xml.new
	fi
done

echo '</urlset>' >> video/video.xml.new

diff video/video.xml video/video.xml.new &>/dev/null || mv video/video.xml.new video/video.xml
rm -f video/video.xml.new
