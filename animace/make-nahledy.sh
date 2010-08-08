#!/bin/bash

for foo in img/*.gif
do
	NAZEV=`basename $foo .gif`
	convert img/$NAZEV.gif[0] nahledy/$NAZEV.png
	convert -resize 200x nahledy/$NAZEV.png nahledy/$NAZEV.png
done
