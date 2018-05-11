#!/bin/bash

export LANG=cs_CZ

while [ "$1" != "" ]
		
do 

	SOUBOR=`basename $1 .fig`
	PP=`echo $SOUBOR | sed "s/\(^.\).*/\1/"`

	fig2dev -j -L png -b 5 -S 4 -m 2.5 $PP/$SOUBOR.fig $PP/$SOUBOR.png

	echo -ne "."

	convert -filter box -type optimize -strip -quantize rgb -depth 8 -quality 100 -colors 64 -treedepth 4 $PP/$SOUBOR.png $PP/$SOUBOR.png
	
	echo -ne "."	
	
	shift

done
echo -ne "\n"

# xfig
#
# LC_LANG=cs_CZ.ISO-8859-2
# LC_ALL=cs_CZ.ISO-8859-2


# .Xresources
#
#Fig.international: true
#Fig.inputStyle: Root
#Fig.eucEncoding: true
#Fig.latinKeyboard: true
