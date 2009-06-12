#!/bin/bash

ARCHIV=`date "+%Y-%m-%d"`.tar.gz

svn log zonglovani > zonglovani/ChangeLog

[ -f $ARCHIV ] && rm $ARCHIV

find . -type f -newer DATE -not -iregex '.*\.svn.*' -not -iregex '.*\.\(fig\|bak\)$' | xargs -r tar -czf $ARCHIV

[ -f $ARCHIV ] && du -h $ARCHIV
