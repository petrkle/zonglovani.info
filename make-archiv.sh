#!/bin/bash

grep -in '{debug}' templates/*.tpl && ( echo "ZAPOMENUTÝ DEBUG!!!" ; exit 3)

ARCHIV=`date "+%Y-%m-%d"`.tar.gz

export LC_ALL=cs_CZ.utf-8

svn log --xml --with-all-revprops > ChangeLog.xml

[ -f $ARCHIV ] && rm $ARCHIV

find . -type f -newer DATE -not -wholename '*templates_c*' -not -wholename '*cache*' -not -wholename '*data*' -not -iregex '.*\.svn.*' -not -iregex '.*\.\(fig\|bak\)$' | xargs -r tar -czf $ARCHIV

[ -f $ARCHIV ] && du -h $ARCHIV
