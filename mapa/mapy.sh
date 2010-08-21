#!/bin/bash

export IFS='
'

for foo in `cat cr.txt sk.txt`
do
	MESTO=`echo $foo | cut -d':' -f2`
	STAT=`echo $foo | cut -d':' -f6`
	ID=`echo $foo | cut -d':' -f1`
	LAT=`cat mista/$ID.xml | grep '"location": ' -A 2 | grep lat | sed "s/[^0-9\.]//g"`
	LNG=`cat mista/$ID.xml | grep '"location": ' -A 2 | grep lng | sed "s/[^0-9\.]//g"`
	echo $ID

	[ -f mapy/$ID.png ] ||  sleep 60

	if [ $STAT = "CZ" ]
	then
	[ -f mapy/$ID.png ] ||	wget -qO - "http://maps.google.com/maps/api/staticmap?center=49.94,15.46&zoom=6&size=500x320&sensor=false&markers=icon:http://zonglovani.info/mapa/sipka.png?5|$LAT,$LNG" > mapy/$ID.png
	else
[ -f mapy/$ID.png ] ||	wget -qO - "http://maps.google.com/maps/api/staticmap?center=48.8,19.46&zoom=6&size=500x320&sensor=false&markers=icon:http://zonglovani.info/mapa/sipka.png?5|$LAT,$LNG" > mapy/$ID.png
	fi
done
