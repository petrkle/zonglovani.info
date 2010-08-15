#!/bin/bash

for foo in `cat siteswap.txt`
do
	MICKY=`echo "$foo" | cut -d'*' -f1`
	JMENO=`echo "$foo" | cut -d'*' -f2`
	ROZMER=`identify "siteswap/$JMENO.gif[0]" | cut -d" " -f3 | sed "s/x/*/"`
	echo "$MICKY*$JMENO*$ROZMER"
done
