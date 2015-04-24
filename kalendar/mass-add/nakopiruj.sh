#!/bin/bash

USER=foo

OUT=out

VLOZENO=`date +%s`

[ -d $OUT ] || mkdir $OUT


for foo in `cat dny.txt`
do
	FILE=$foo-$foo-$USER-$VLOZENO
	echo "title:Název události
desc:Popis události
misto:Falešná 123, Někde
url:https://zonglovani.info
mapa:http://mapy.cz
time_start:16:30
time_end:19:00
img:$FILE.png" > $OUT/$FILE.cal

cp -v sablona.png $OUT/$FILE.png

done
