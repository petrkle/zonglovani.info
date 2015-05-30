#!/bin/bash

fig2dev -j -L png -b 5 -S 4 -m 8 m/micky-logo.fig micky.png
convert -transparent white -resize 512x512 micky.png micky.png
