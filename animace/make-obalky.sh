#!/bin/bash

for foo in siteswap//*.gif
do
	NAZEV=`basename $foo .gif`
	convert siteswap/$NAZEV.gif[0] obalky/$NAZEV.png
	composite -gravity center ../img/p/prehrat.png obalky/$NAZEV.png obalky/$NAZEV.png
done
