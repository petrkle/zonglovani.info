#!/bin/bash

IMGDIR=../img
OUT=zonglerske-pexeso

[ -d $OUT ] || mkdir $OUT

for foo in `ls *.fig | grep -v pexeso`
do
	FL=`echo $foo | sed 's/^\(.\).*/\1/'`
	SOUBOR=`echo $foo | sed 's/\(.*\)\.fig$/\1/'`
	echo $IMGDIR/$FL/$foo
	fig2dev -j -L png -b 5 -S 4 -m 8 $IMGDIR/$FL/$foo $OUT/$SOUBOR.png
	convert bg.png $OUT/$SOUBOR.png -gravity center -composite $OUT/$SOUBOR.png
done
