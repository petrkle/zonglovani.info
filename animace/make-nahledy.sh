#!/bin/bash

for foo in img/*.gif
do
	NAZEV=`basename $foo .gif`
	convert img/$NAZEV.gif[0] nahledy/$NAZEV.png
done
