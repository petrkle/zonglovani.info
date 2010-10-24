#!/bin/bash

wget \
	-e "robots=off" \
	--accept=.html,.php,.xml \
	--recursive \
	--level=500 \
 	--quiet \
	http://zongl.info/ \
