#!/bin/bash

grep -in '{debug}' templates/*.tpl && ( echo "ZAPOMENUTÝ DEBUG!!!" ; exit 3)

ARCHIV=`date "+%Y-%m-%d"`.tar.gz

export LC_ALL=cs_CZ.utf-8

svn log --xml --with-all-revprops > ChangeLog.xml.new

diff ChangeLog.xml ChangeLog.xml.new &>/dev/null || mv ChangeLog.xml.new ChangeLog.xml

rm -f ChangeLog.xml.new $ARCHIV

find . -type f -newer DATE -not -wholename '*templates_c*' -not -wholename '*cache*' -not -wholename '*mapa-stranek.full*' -not -wholename '*data*' -not -iregex '.*\.svn.*' -not -iregex '.*\.\(fig\|bak\)$' | xargs --no-run-if-empty tar -czf $ARCHIV

[ -f $ARCHIV ] && du -hs $ARCHIV
