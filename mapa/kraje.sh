#!/bin/bash

export IFS='
'

for foo in `cat kraje.txt`
do
	#ID=`echo "$foo" | cstocs utf8 ascii | awk '{print tolower($0)}' | sed "s/ kraj//;s/^/kraj-/"`
	#echo "$ID:$foo"
	#ID=`echo $foo | cut -d: -f1`
	#JMENO=`echo $foo | cut -d: -f2`
	#sed -i "s/$JMENO/$ID/" mista.txt
	STAT=`echo $foo | cut -d: -f1`
	ID=`echo $foo | cut -d: -f2`
	NAZEV=`echo $foo | cut -d: -f3`
	echo "$STAT $ID $NAZEV"
	wget -O - "http://maps.googleapis.com/maps/api/geocode/json?address=$NAZEV+$STAT&sensor=false" > kr/$STAT.$ID.json
	sleep 45
done
