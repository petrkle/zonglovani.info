#!/bin/bash

wget \
	-e "robots=off" \
	--reject='*prihlaseni.php?next=*' \
	--accept=.html,.php,.xml \
	--recursive \
	--level=500 \
 	--quiet \
	http://zongl.info/ \
