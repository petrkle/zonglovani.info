#!/bin/bash

[ -d img ] || cp -r ../../img/ .

for foo in `find img -type f -name "*.png"`
do
	name=`echo $foo | sed "s/\.png$//"`
	if [ -f "../../$name.fig" ] ; then
		fig2dev -L png -b 5 -S 4 -m 2 "../../$name.fig" "$name.png"
		convert -type Grayscale -border 2x2 -bordercolor "#000000" $foo $foo
	else
		convert -type Grayscale -border 1x1 -bordercolor "#000000" $foo $foo
	fi
done

for foo in `find img -type f -name "*.jpg"`
do
	convert -type Grayscale -border 1x1 -bordercolor "#000000" $foo $foo
done
