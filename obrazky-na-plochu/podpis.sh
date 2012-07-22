#!/bin/bash

for foo in `find . -mindepth 1 -maxdepth 1 -type d -name "1*"`
do
	SOUBOR=bolo-more.jpg
		convert -verbose -strip \
		 -pointsize 20 -gravity SouthEast\
	   -stroke '#000C' -strokewidth 4 -annotate +4+2 "www.zonglovani.info" \
	   -stroke  none   -fill white    -annotate +4+2 "www.zonglovani.info" \
		"$foo/$SOUBOR" "$foo/$SOUBOR"
		exiftool -copyright='www.zonglovani.info' -imagedescription='www.zonglovani.info' -comment='www.zonglovani.info' "$foo/$SOUBOR"
done
