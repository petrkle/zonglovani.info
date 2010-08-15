#!/bin/bash

for foo in *.gif
do
	NAME=`basename "$foo" .gif`
	echo $NAME
	VELIKOST=`identify "$NAME.gif[0]" | cut -d" " -f3`
	echo convert -delay 10 -page $VELIKOST -dispose background "$NAME-*.png" -loop 0 "$NAME.gif"
	convert "$NAME.gif" "$NAME-%03d.png"
	convert -delay 10 -page $VELIKOST -dispose background "$NAME-*.png" -loop 0 "$NAME.gif"
	rm *.png
done
