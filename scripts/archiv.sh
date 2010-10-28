#!/bin/bash

grep -in '{debug}' templates/*.tpl && ( echo "ZAPOMENUTÝ DEBUG!!!" ; exit 3)

ARCHIV=`date "+%Y-%m-%d"`.tar.gz

export LC_ALL=cs_CZ.utf-8

git log --pretty="%h*%at*%s" > ChangeLog.new

diff ChangeLog ChangeLog.new &>/dev/null || mv ChangeLog.new ChangeLog

rm -f ChangeLog.new $ARCHIV

find . -type f -newer DATE -not -wholename '*templates_c*' -not -wholename '*cache*' -not -wholename '*mapa-stranek.full*' -not -wholename '*data*' -not -iregex '.*\.git.*' -not -iregex '.*\.\(fig\|bak\)$' | xargs --no-run-if-empty tar -czf $ARCHIV

[ -f $ARCHIV ] && du -hs $ARCHIV
