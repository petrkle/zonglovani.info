#!/bin/bash

fig2dev -j -L png -b 5 -S 4 -m 6 m/micky.fig micky.png
convert -transparent white -resize 350x350 micky.png micky.png
