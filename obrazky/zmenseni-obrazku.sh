#!/bin/bash

TMP=/tmp
PID=$$
OUT=$TMP/$PID
NAHLEDY=$OUT/nahledy

mkdir -p $OUT
mkdir -p $NAHLEDY

CISLO=0

while [ "$1" != "" ]
do 
	foo=`printf "%4d" $CISLO | sed -e 's/ /0/g'`
	convert -verbose -resize 1024x768\> -auto-orient -strip -depth 8 "$1" $OUT/$foo.jpg
	convert -verbose -resize 128x96\> -auto-orient -strip -depth 8 "$1" $NAHLEDY/$foo.jpg
	let CISLO++
	shift
done
