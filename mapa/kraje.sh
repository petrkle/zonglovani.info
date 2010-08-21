#!/bin/bash

export IFS='
'

for foo in `cat kraje.txt`
do
	#ID=`echo "$foo" | cstocs utf8 ascii | awk '{print tolower($0)}' | sed "s/ kraj//;s/^/kraj-/"`
	#echo "$ID:$foo"
	ID=`echo $foo | cut -d: -f1`
	JMENO=`echo $foo | cut -d: -f2`
	sed -i "s/$JMENO/$ID/" mista.txt
done
