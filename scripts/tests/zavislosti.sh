#!/bin/bash

T=scripts/tests

grep -h "^use" $T/*.{t,pl} | grep -v -e strict -e warnings | sed "s/use //;s/ .*//;s/;//" | sort | uniq > $T/pm.txt.new

diff $T/pm.txt $T/pm.txt.new &>/dev/null || mv $T/pm.txt.new $T/pm.txt

rm -f $T/pm.txt.new
