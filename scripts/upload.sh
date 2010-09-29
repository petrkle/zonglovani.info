#!/bin/bash

svn up
TMP=$HOME/tmp/upload
ARCHIV=`./scripts/archiv.sh | awk '{print $2}'`

[ -n "$ARCHIV" ] || exit 0

rm -rf $TMP &>/dev/null
mkdir -p $TMP &>/dev/null
mv -v $ARCHIV $TMP
cd $TMP
tar vxf $ARCHIV && rm $ARCHIV
lftp -u www.zonglovani.info ftp://zonglovani.info -e "mirror --reverse --depth-first --only-newer --verbose=1 --no-perms --no-umask $TMP /;exit"

[ -f $TMP/sitemap.xml ] && wget -qO /dev/null 'http://www.google.com/webmasters/sitemaps/ping?sitemap=http://zonglovani.info/sitemap.xml'
[ -f $TMP/sitemap.xml ] && wget -qO /dev/null 'http://www.bing.com/webmaster/ping.aspx?siteMap=http://zonglovani.info/sitemap.xml'

rm -rf $TMP &>/dev/null
