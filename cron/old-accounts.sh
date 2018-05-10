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

for foo in `find $DATADIR/lide.by.mail -type f -name login -printf '%P\n'`
do
	LOGIN=`cat $DATADIR/lide.by.mail/$foo`
	DOMAIN=`echo $foo | cut -d/ -f1`
	ADR=`echo $foo | cut -d/ -f3`
	MAIL="$ADR@$DOMAIN"
	[ -f $DATADIR/lide/$LOGIN/$MAIL.mail ] || rm $DATADIR/lide.by.mail/$foo
done

find $DATADIR/lide.by.mail -type d -empty -delete
