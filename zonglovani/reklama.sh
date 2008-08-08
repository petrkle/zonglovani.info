#!/bin/bash

TIME=`date +%s`
for foo in *.php; 

do
	echo -ne "upravuji $foo "
	
	cp -f $foo $foo.$TIME.zaloha
	cp -f $foo $foo.bat
	cat $foo.bat | sed s/'<!--WZ-REKLAMA-1.0IZ-->'/'<!--WZ-REKLAMA-1.0-STRICT-->'/g > $foo
	echo -ne "."
	
	
	rm -f $foo.bat
	
	echo -ne " hotovo\n"

done
