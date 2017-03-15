#!/bin/bash

set -e

T=scripts/tests

for foo in `grep -h "^use" $T/*.{t,pl} | grep -v -e strict -e warnings | sed "s/use //;s/ .*//;s/;//" | sort | uniq`
do
	echo "requires '$foo';" >> cpanfile.new
done

diff cpanfile cpanfile.new &>/dev/null || mv cpanfile.new cpanfile

rm -f cpanfile.new
