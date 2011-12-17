#!/bin/bash
ZSDIR="zongleruv-slabikar/"
DATUM=`date "+%-d. %-m. %Y %k:%M:%S"`
DATUM_S=`date "+%-d.\&nbsp;%-m.\&nbsp;%Y"`

for foo in `find $ZSDIR -name '*.html'`; 

do
	LEVEL=`echo $foo | sed "s/[^\/]*//g;s/\//..\//g;s/^.//;"`
	cp -f $foo $foo.bat
	cat $foo.bat |\
	sed s/' onclick="_gaq.*);"'/''/gi |\
	sed s#'rel="stylesheet" type="text/css" href="/'#"rel=\"stylesheet\" type=\"text/css\" href=\"$LEVEL"#gi |\
	sed /'<!-- start -->'/,/'<!-- stop -->'/d |\
	sed /'.*<link rel="alternate".*'/d |\
	sed /'.*<link rel="search".*'/d |\
	sed s/'.*meta name="robots".*'/'<meta name="robots" content="noindex,nofollow" \/>'/ |\
	sed s/'zongl\.info'/'zonglovani.info'/ |\
	sed s/'<html xmlns="http:\/\/www.w3.org\/1999\/xhtml" xml:lang="cs" lang="cs">'/'<!-- saved from url=(0023)http:\/\/zonglovani.info\/ -->\n<html xmlns="http:\/\/www.w3.org\/1999\/xhtml" xml:lang="cs" lang="cs">'/ |\
	sed s/"<body>"/"<body>\n<!--\nadmin(zavináč)zonglovani(tečka)info\n$DATUM\n$MACHTYPE\n-->"/ |\
	sed s/'<div id="hlavicka">'/'<div id="hlavicka"><div id="ucet">Aktuální verze na internetu: <a href="http:\/\/zonglovani.info" title="Aktuální verze žonglérova slabikáře na internetu." class="external">www.zonglovani.info<\/a><\/div>'/ \
 	> $foo
	rm -f $foo.bat
done

cp LICENCE.txt $ZSDIR
