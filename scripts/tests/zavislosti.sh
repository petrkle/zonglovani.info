#!/bin/bash

export IFS='
'

echo -n "cpan"
for foo in `grep -h "^use" scripts/tests/*.t | grep -v strict | sed "s/use //;s/ .*//;s/;//" | sort | uniq`
do
	echo -n " $foo"
done
echo ""
