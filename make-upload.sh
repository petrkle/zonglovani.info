#!/bin/bash

svn up
TMP=/home/petr/tmp/upload
ARCHIV=`./make-archiv.sh | awk '{print $2}'`

rm -rf $TMP &>/dev/null
mkdir -p $TMP &>/dev/null
mv -v $ARCHIV $TMP
cd $TMP
tar vxf $ARCHIV && rm $ARCHIV
lftp -u www.zonglovani.info ftp://zonglovani.info -e "mirror --reverse --depth-first --only-newer --verbose=1 --no-perms --no-umask $TMP /;exit"
rm -rf $TMP &>/dev/null
