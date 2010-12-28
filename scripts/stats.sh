#!/bin/bash

ST=ostatni/stat.txt
S=$ST.new

echo "obrazky*"`find obrazky -type f -not -wholename "*nahledy*" \( -name "*.jpg" -o -name "*.png" \) | wc -l` > $S

echo "galerie*"`find obrazky -mindepth 1 -maxdepth 1 -type d | wc -l` >> $S

echo "video*"`find video/klip/ -type f -name "*.xml" | wc -l` >> $S

echo "testy*"`grep -h "^use Test::More.*" scripts/tests/*.t | sed 's/\([^0-9]*\)//g' | awk '{ total += $1 } END { print total }'` >> $S

FUPDATE=`bzcat data/dump.sql.bz2 | tail -1 | sed "s/.*completed on //"`
echo "fulltext_update*"`date +%s -d "$FUPDATE"` >> $S

LUPDATE=`cat DATE`
echo "last_update*"`date +%s -d "$LUPDATE"` >> $S

echo "animated_gif*"`find animace/img/ -type f -name "*.gif" | wc -l` >> $S

echo "animated_siteswaps*"`find animace/siteswap -type f -name "*.gif" | wc -l` >> $S

echo "img*"`find img/ rss/ikonky/ ulita/img/ kalendar/img/ -type f -name "*.jpg" -o -name "*.png" -o -name "*.gif" | wc -l` >> $S

diff $S $ST &>/dev/null || mv $S $ST

rm -f $S
