#!/bin/bash
ZSDIR="zongleruv-slabikar"

export IFS='
'

for foo in `find $ZSDIR -name '*.html'`; 
do
	LEVEL=`echo $foo | sed "s/[^\/]*//g;s/\//..\//g;s/^.//;"`
	DIR=`dirname $foo`
	sed -i '#http://zongl.info#http://zonglovani.info#g' $foo
	for baz in `grep -o "<a [^>]*href=[^>]*>" $foo`
	do
		FILE=`echo $baz | sed 's/<a.*href="\([^"]*\)".*/\1/' | sed 's/#.*//'`
		if [ ! -f $DIR/$FILE ]
		then
			if grep -q '^\(http\|ftp\|https\)' <<< $FILE
			then
				# externí odkaz
				sed -i "s#href=\"$FILE#class=\"external\" href=\"$FILE#g" $foo
			else
				# interní odkaz
				sed -i "s#href=\"$FILE#class=\"external\" href=\"http:\/\/zonglovani.info\/$FILE#g" $foo
			fi
		fi
	done
done
