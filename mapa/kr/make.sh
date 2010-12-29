#!/bin/bash

export IFS='
'

for foo in `cat ../kraje.txt`
do
	STAT=`echo $foo | cut -d: -f1`
	ID=`echo $foo | cut -d: -f2`
	NAZEV=`echo $foo | cut -d: -f3`
	if [ -f $STAT.$ID.json ]
	then
		LAT=`grep "location" $STAT.$ID.json -A 2 | head -2 | grep lat | sed "s/.*: \(.*\),.*/\1/"`
		LNG=`grep "location" $STAT.$ID.json -A 3 | head -3 | grep lng | sed "s/.*: \(.*\).*/\1/"`
	else
		LAT=""
		LNG=""
	fi

	echo "$STAT:$ID:$NAZEV:$LAT:$LNG"

done
