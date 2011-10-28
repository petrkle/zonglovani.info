#!/bin/bash

echo $1
FILE=`echo $1 | sed "s/\.php$//"`

./scripts/tpl2xml.php $FILE.php > $FILE.xml
./scripts/tidy.pl $FILE.xml > a.xml
mv a.xml $FILE.xml
