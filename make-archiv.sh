#!/bin/bash

ARCHIV=`date "+%Y-%m-%d"`.tar.gz

svn log > ChangeLog

[ -f $ARCHIV ] && rm $ARCHIV

find . -type f -newer DATE -not -name '*templates_c*' -not -iregex '.*\.svn.*' -not -iregex '.*\.\(fig\|bak\)$' | xargs -r tar -czf $ARCHIV

[ -f $ARCHIV ] && du -h $ARCHIV
