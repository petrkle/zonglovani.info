#!/bin/bash

rm -rf zongl.info/ 2>/dev/null
./stahni.sh
find zongl.info/ -type f -name "*.html" -exec validate \{\} \;
rm -rf zongl.info/ 2>/dev/null