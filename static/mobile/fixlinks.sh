#!/bin/bash
ZSDIR="zongleruv-slabikar"

export IFS='
'

for foo in `find $ZSDIR -name '*.html'`; 
do
	LEVEL=`echo $foo | sed "s/[^\/]*//g;s/\//..\//g;s/^.//;"`
	DIR=`dirname $foo`
	sed -i 's#https://zongl.info#https://zonglovani.info#g' $foo
	sed -i 's#class="external"##g' $foo
	for baz in `grep -o "<a [^>]*href=[^>]*>" $foo | sort | uniq`
	do
		FILE="`echo $baz | sed 's/<a.*href="\([^"]*\)".*/\1/;s/#.*//'`"
		if [ ! -f $DIR/$FILE ]
		then
			if grep -q '^\(http\|ftp\|https\|mailto\)' <<< $FILE
			then
				# externí odkaz
				sed -i "s#href=\"$FILE\"#href=\"$FILE\" class=\"external\" #g" $foo
			else
				# interní odkaz
				sed -i "s#href=\"$FILE\"#href=\"https:\/\/zonglovani.info\/$FILE\" class=\"external\" #g" $foo
			fi
		fi
	done
done

for foo in `find $ZSDIR -name '*.html'`; 
do
	sed -i 's#class="external"\s\{2,\}class="external"#class="external"#g;s#class="external"\s\{2,\}class="external"#class="external"#g' $foo
done

find $ZSDIR -name "*.html" -exec sed -i 's/^Jste zde:.*//;s/class="external"/class="external" target="_blank"/g' \{\} \;
