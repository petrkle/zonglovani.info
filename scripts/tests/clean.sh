#!/bin/bash

chmod -R oug+w /home/www/zonglovani.info/{tmp,data}
sed -i "/WWW-Mechanize/d" /home/www/zonglovani.info/data/lide/pek/prihlaseni.txt
find /home/www/zonglovani.info/ -user apache -exec rm -rf \{\} \; 2>/dev/null
rm -f /home/fakemail/*
/etc/rc.d/rc.fakemail restart
