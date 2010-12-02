#!/bin/bash

for foo in `cat navstevy.txt`
do
	DATUM=`echo $foo | cut -d: -f1`
	LIDI=`echo $foo | cut -d: -f2`
	STRANKY=`echo $foo | cut -d: -f3`
	echo -ne "vis:$LIDI\npag:$STRANKY\n" > ../data/stat/$DATUM.txt
done
