#!/bin/bash

wget \
	-e "robots=off" \
	--accept=.html,.php,.xml \
	--recursive \
 	--quiet \
	http://zongl.info/ \
