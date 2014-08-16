#!/bin/bash

URL=zongl.info
SLOWDOWN=""

[ $HOSTNAME = "vps" ] && URL=zonglovani.info SLOWDOWN="--random-wait --wait 1"

wget \
	$SLOWDOWN \
	-e "robots=off" \
	--directory-prefix=/tmp/zs.sitemap \
	--no-host-directories \
	--reject='*prihlaseni.php*' \
	--accept=.html,.php,.xml \
	--recursive \
	--level=900 \
 	--quiet \
	http://$URL/
