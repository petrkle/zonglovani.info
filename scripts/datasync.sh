#!/bin/bash

cd /home/www/zonglovani.info/data
lftp -u www.zonglovani.info ftp://zonglovani.info -e "mirror -x 'dump.sql.bz2' -x 'kml/mapa-zongleri.kml' -x 'lide/pek/foto.jpg' --delete --parallel=6 --depth-first --verbose=1 --no-perms --no-umask data .;exit"
