#!/bin/sh
# create animated juggling gif's

IFS='
'

for foo in `cat pat.txt`
do
	NAZEV=`echo -n "$foo" | cut -d* -f1`
	VZOR=`echo -n "$foo" | cut -d* -f2`
	FILENAME=`echo "$NAZEV" | sed "s/ /-/g;s/(/-/g;s/)/-/g;s/\[/-/g;s/\]/-/g;s/+/-/g;s/--/-/g;s/^-//;s/-$//;"`
	echo -n "$NAZEV "
	java -jar JuggleAnim.jar "$VZOR"&
	sleep 3
	wid=`xdotool search --name "JuggleAnim" | head -1`
	xdotool windowactivate $wid
	xdotool mousemove 100 40
	sleep 0.1
	xdotool click 1
	sleep 0.1
	xdotool mousemove_relative 0 90
	sleep 0.1
	xdotool click 1
	sleep 0.1
	xdotool mousemove_relative 0 202
	sleep 0.1
	xdotool click 1
	sleep 0.1
	xdotool type "$FILENAME.gif"
	sleep 0.1
	xdotool key "Return"
	until [ -z "`lsof | grep "\.gif$"`" ]; do echo -n "."; sleep 0.5; done
	pkill java
	echo ""
done
