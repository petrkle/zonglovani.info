#!/bin/bash

export IFS='
'

if [ "$1" = "" ]
then
	echo "Pouziti: $0 VERSION"
	exit 1
else
	VERSION=$1
fi

for foo in `cat url.3`
do
	./xml2tex.php $foo
done > tri-micky.tex

for foo in `cat url.4`
do
	./xml2tex.php $foo
done > ctyri-micky.tex

for foo in `cat url.5`
do
	./xml2tex.php $foo
done > pet-micku.tex

cp sablona.tex zongleruv-slabikar-$VERSION.tex

sed -i "s/VERSION/$VERSION/g" zongleruv-slabikar-$VERSION.tex
