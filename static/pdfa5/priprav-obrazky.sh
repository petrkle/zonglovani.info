#!/bin/bash

if [ -d img ] ; then
	exit 0
else
	cp -r ../../img/ .
fi

for foo in `find img -type f -name "*.png"`
do
	name=`echo $foo | sed "s/\.png$//"`
	if [ -f "../../$name.fig" ] ; then
		fig2dev -L png -b 5 -S 4 -m 2 "../../$name.fig" "$name.png"
		convert -type Grayscale $foo $foo
	else
		convert -type Grayscale $foo $foo
	fi
done

for foo in `find img -type f -name "*.jpg"`
do
	convert -type Grayscale $foo $foo
done
