#!/bin/bash
echo -n "Název galerie: "
read TITLE

echo -n "Název adresáøe: "
read OUTPUT

TMP=/tmp
PID=$$
OUT=$TMP/$OUTPUT
IMGTN=$OUT/nahledy
EXIF=$OUT/exif
IN=$1

mkdir $OUT
mkdir $IMGTN
mkdir $EXIF

echo "$IN -> $OUT"

CISLO=0

for foo in $IN/*.jpg
do
	HCISLO=`printf "%4d" $CISLO | sed -e 's/ /0/g'`
	identify -verbose "$foo" > $EXIF/$HCISLO.text
	ROTATION=""
	grep "Orientation: 6" $EXIF/$HCISLO.text &>/dev/null && ROTATION=" -rotate 90 "
	grep "Orientation: 8" $EXIF/$HCISLO.text &>/dev/null && ROTATION=" -rotate -90 "
	convert -resize 1024x768\> -strip $ROTATION -depth 8 "$foo" $OUT/$HCISLO.jpg
	convert -resize 128x96\> -strip $ROTATION -depth 8 "$foo" $IMGTN/$HCISLO.jpg
	let CISLO++
done

rm -rf $EXIF
echo "title:$TITLE" > $OUT/index.txt
