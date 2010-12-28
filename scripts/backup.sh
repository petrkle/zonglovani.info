#!/bin/bash

BACK_DIR=/mnt/crypto/zalohy
PROJECT_DIR=/home/www/zonglovani.info
ARCHIV=zonglovani.info.`date "+%Y-%m-%d-%H.%M"`.tar.gz

rm -f $PROJECT_DIR/tmp/templages_c/*
tar zcf $BACK_DIR/$ARCHIV $PROJECT_DIR
