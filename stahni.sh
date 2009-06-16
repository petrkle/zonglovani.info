#!/bin/bash

wget \
	-e "robots=off" \
	--accept=.html \
	--exclude-directories=kalendar/ \
	--recursive \
 	--quiet \
	http://zongl.info/ \
