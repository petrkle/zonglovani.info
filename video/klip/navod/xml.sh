#!/bin/bash

export IFS='
'

for foo in `cat videa.up.csv`
do
	TITLE=`echo $foo | cut -d\; -f4`
	FILE=`echo $foo | cut -d\; -f5 | sed "s/\.mp4$//"`
	DESC=`echo $foo | cut -d\; -f6`
	DOWN=`echo $foo | cut -d\; -f11`
	KEY=`echo $foo | cut -d\; -f12`
	NAVOD=`echo $foo | cut -d\; -f8 | sed "s#http://zonglovani.info##"`
	LEN=`exiftool /home/petr/zongl.videa/encoded/$FILE.mp4 | grep -i "Track Duration" | sed "s/.*: //;s/\..* s/ s/"`
	SIZE=`exiftool /home/petr/zongl.videa/encoded/$FILE.mp4 | grep -i "File Size" | sed "s/.*: //"`
echo "<?xml version=\"1.0\"?>
<klip>
  <nazev>$TITLE</nazev>
  <link>http://juggling.tv:$KEY</link>
  <typ>juggling.tv</typ>
  <popis>$DESC</popis>
  <download>$DOWN</download>
  <delka>$LEN</delka>
  <rozliseni>640x360</rozliseni>
  <navod>$NAVOD</navod>
  <velikost>$SIZE</velikost>
</klip>" > $FILE.xml
done
