#!/bin/bash

rsync -e ssh --recursive \
	--rsync-path='nice rsync' \
	--stats \
	--times \
	--update \
	vps.kle.cz:/home/www/zonglovani.info/data/ \
	/home/www/zonglovani.info/data/
