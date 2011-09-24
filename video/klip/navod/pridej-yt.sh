#!/bin/bash

export IFS='
'

exit

for foo in `cat vysledek`
do
	FILE=`echo $foo | cut -d\; -f1 | sed "s/\.mp4$//"`
	ID=`echo $foo | cut -d\; -f2`
	if [ -f $FILE.xml ]
	then
		sed -i "s/<\/typ>/<\/typ>\n  <youtube>$ID<\/youtube>/" $FILE.xml
	fi
done
