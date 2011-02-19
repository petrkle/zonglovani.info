#!/bin/bash
ZSDIR="zongleruv-slabikar/"
DATUM=`date "+%-d. %-m. %Y %k:%M:%S"`
DATUM_S=`date "+%-d.\&nbsp;%-m.\&nbsp;%Y"`

for foo in `find $ZSDIR -name '*.html'`; 

do
	cp -f $foo $foo.bat
	cat $foo.bat |\
	sed s/' onclick="pageTracker.*);"'/''/gi |\
	sed /'<!-- start -->'/,/'<!-- stop -->'/d |\
	sed /'.*<link rel="alternate".*'/d |\
	sed /'.*<link rel="search".*'/d |\
	sed s/'.*meta name="robots".*'/'<meta name="robots" content="noindex,nofollow" \/>'/ |\
 	#sed s/'<a href="http:\/\/my-test\/.*Prohlášení o přístupnosti<\/a>'/'Žonglérův slabikář: <a href="http:\/\/petrkle\.wz\.cz\/zonglovani\/" title="Aktuální verze na internetu\." class=\"external\">petrkle\.wz\.cz\/zonglovani<\/a>'/g |\
	sed s/'zongl\.info'/'zonglovani.info'/ |\
	sed s/"<body>"/"<body>\n<!--\nadmin(zavináč)zonglovani(tečka)info\n$DATUM\n$MACHTYPE\n-->"/ |\
	sed s/'<div id="hlavicka">'/'<div id="hlavicka"><div id="ucet">Aktuální verze na internetu: <a href="http:\/\/zonglovani.info" title="Aktuální verze žonglérova slabikáře na internetu." class="external">www.zonglovani.info<\/a><\/div>'/ \
 	> $foo
	rm -f $foo.bat
done
