#!/bin/bash

for foo in zdroj/*
do
	SOUBOR=`basename $foo`
	for VELIKOST in 1*
	do
		convert -verbose -strip -resize "$VELIKOST^" -gravity south -crop "$VELIKOST+0+0" +repage \
		 -pointsize 20 -gravity SouthEast\
	   -stroke '#000C' -strokewidth 4 -annotate +4+2 "www.zonglovani.info" \
	   -stroke  none   -fill white    -annotate +4+2 "www.zonglovani.info" \
		"zdroj/$SOUBOR" "$VELIKOST/$SOUBOR"
		exiftool -copyright='www.zonglovani.info' -imagedescription='www.zonglovani.info' -comment='www.zonglovani.info' "$VELIKOST/$SOUBOR"
	done
done
