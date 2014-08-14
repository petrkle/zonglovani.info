#!/bin/bash

rsync -e ssh --recursive \
	--rsync-path='nice rsync' \
	--stats \
	--verbose \
	--times \
	--update \
	vps.kle.cz:/home/www/zonglovani.info/data/ \
	/home/www/zonglovani.info/data/
