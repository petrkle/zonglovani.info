#!/bin/bash
# videa která ještě nebyla v tipu týdne

set -e

cd /home/www/zonglovani.info/

for foo in `find video/klip -type f -name "*.xml" | grep -v navod`
do
	NAME=`basename $foo .xml`
	grep -q $NAME tip/tipy.inc 2>/dev/null || echo $NAME
done
