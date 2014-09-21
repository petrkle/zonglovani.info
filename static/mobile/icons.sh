#!/bin/bash

fig2dev -j -L gif -b 5 -S 4 -m 40 -t white ../../img/m/micky-logo.fig micky.gif

convert micky.gif -gravity Center -crop 4000x4000+0+0 m.png

mv m.png micky.png

rm micky.gif

for foo in 512 256 128 90 64 60 48 32 16
do
	convert micky.png -resize ${foo}x${foo} zongleruv-slabikar/icon-${foo}.png
done

rm micky.png
