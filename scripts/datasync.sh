#!/bin/bash

cd /home/www/zonglovani.info/data
lftp -u www.zonglovani.info ftp://zonglovani.info -e "mirror --delete --parallel=6 --depth-first --verbose=1 --no-perms --no-umask data .;exit"
