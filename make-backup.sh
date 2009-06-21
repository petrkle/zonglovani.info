#!/bin/bash

BACK_DIR=/mnt/crypto
PROJECT_DIR=/home/www/zonglovani.info
ARCHIV=zonglovani.info.`date "+%Y-%m-%d-%H.%M"`.tar.bz2

SVN_DIR=/home/svn/zonglovani.info
ARCHIV_SVN=svn.zonglovani.info.`date "+%Y-%m-%d-%H.%M"`.tar.bz2

tar jcf $BACK_DIR/$ARCHIV $PROJECT_DIR
tar jcf $BACK_DIR/$ARCHIV_SVN $SVN_DIR
