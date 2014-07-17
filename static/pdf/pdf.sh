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

for baz in url.*
do
	for foo in `cat $baz`
	do
		./xml2tex.php $foo
	done > `echo $baz | sed "s/.*url\.//"`.tex
done

cp sablona.tex zongleruv-slabikar-$VERSION.tex

sed -i "s/VERSION/$VERSION/g" zongleruv-slabikar-$VERSION.tex
