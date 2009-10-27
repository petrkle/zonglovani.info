#!/bin/bash

ARCHIV=`date "+%Y-%m-%d"`.tar.gz

export LC_ALL=cs_CZ.utf-8

svn log > ChangeLog

[ -f $ARCHIV ] && rm $ARCHIV

find . -type f -newer DATE -not -wholename '*templates_c*' -not -wholename '*data*' -not -iregex '.*\.svn.*' -not -iregex '.*\.\(fig\|bak\)$' | xargs -r tar -czf $ARCHIV

[ -f $ARCHIV ] && du -h $ARCHIV
