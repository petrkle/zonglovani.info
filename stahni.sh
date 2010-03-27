#!/bin/bash

wget \
	-e "robots=off" \
	--accept=.html,.php,.rss \
	--recursive \
 	--quiet \
	http://zongl.info/ \
