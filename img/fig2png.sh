#!/bin/bash

while [ "$1" != "" ]
		
do 

	SOUBOR=`basename $1 .fig`
	PP=`echo $SOUBOR | sed "s/\(^.\).*/\1/"`

	fig2dev -L png -b 5 -S 4 -m 2 $PP/$SOUBOR.fig $PP/$SOUBOR.png

	echo -ne "."

	convert -filter box -type optimize -strip -quantize rgb -resize 50% -depth 8 -quality 100 -colors 64 -treedepth 4 $PP/$SOUBOR.png $PP/$SOUBOR.png	
	
	echo -ne "."	
	
	shift

done
echo -ne "\n"
