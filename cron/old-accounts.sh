#!/bin/bash

set -e

DATADIR=/home/www/zonglovani.info/data

for foo in `find $DATADIR/lide -type f -name LOCKED -printf '%P\n'`
do
	UCET=`dirname $foo`
	MAIL=`basename $DATADIR/lide/$UCET/*.mail .mail`
	DOMAIN=`echo $MAIL | sed "s/.*@//"`
	FL=`echo $MAIL | sed "s/^\(.\).*/\1/"`
	rm -rf $DATADIR/lide/$UCET $DATADIR/lide.by.mail/$DOMAIN/$FL/$MAIL
done
