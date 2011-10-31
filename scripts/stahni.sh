#!/bin/bash

wget \
	-e "robots=off" \
	--reject='*prihlaseni.php*' \
	--accept=.html,.php,.xml \
	--recursive \
	--level=500 \
 	--quiet \
	http://zongl.info/ \
