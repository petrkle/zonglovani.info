#!/bin/bash

[ -d img ] || cp -r ../../img/ .

find img -type f -name "*.jpg" -o -name "*.png" -exec convert -type Grayscale -border 1x1 -bordercolor "#000000" \{\} \{\} \;
