#!/bin/bash

rm -f mapa-stranek.inc
rm -rf zongl.info/ 2>/dev/null
./stahni.sh
./tree.pl /home/httpd/html/zonglovani.info/zongl.info | sed "s/index\.html//g" > /home/httpd/html/zonglovani.info/mapa-stranek.inc
rm -rf zongl.info/ 2>/dev/null
