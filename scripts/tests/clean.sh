#!/bin/bash

ZONGL=/home/www/zonglovani.info

chmod -R oug+w $ZONGL/{tmp,data}
rm -f $ZONGL/tmp/templages_c/*
sed -i "/WWW-Mechanize/d" $ZONGL/data/lide/pek/prihlaseni.txt
find $ZONGL/ -user apache -exec rm -rf \{\} \; 2>/dev/null
rm -f /home/fakemail/*
/etc/rc.d/rc.fakemail restart
