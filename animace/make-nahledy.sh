#!/bin/bash

for foo in img/*.gif
do
	NAZEV=`basename $foo .gif`
	convert $foo nahledy/$NAZEV.png
	mv -v nahledy/$NAZEV-0.png nahledy/$NAZEV.png
	rm nahledy/$NAZEV-*.png
	convert -resize 200x nahledy/$NAZEV.png nahledy/$NAZEV.png
done
