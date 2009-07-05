#!/bin/bash

wget \
	-e "robots=off" \
	--accept=.html,.php \
	--recursive \
 	--quiet \
	http://zongl.info/ \
