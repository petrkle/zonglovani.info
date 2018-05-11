#!/bin/bash

export LANG=cs_CZ

while [ "$1" != "" ]
		
do 

	SOUBOR=`basename $1 .fig`
	PP=`echo $SOUBOR | sed "s/\(^.\).*/\1/"`

	fig2dev -j -L svg $PP/$SOUBOR.fig $PP/$SOUBOR.svg

	echo -ne "."	
	
	shift

done
echo -ne "\n"
