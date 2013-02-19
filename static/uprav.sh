#!/bin/bash
ZSDIR="zongleruv-slabikar/"
DATUM=`date "+%-d. %-m. %Y %k:%M:%S"`
DATUM_S=`date "+%-d.\&nbsp;%-m.\&nbsp;%Y"`

for foo in `find $ZSDIR -name '*.html'`; 

do
	LEVEL=`echo $foo | sed "s/[^\/]*//g;s/\//..\//g;s/^.//;"`
	cp -i $foo $foo.bat
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

ZSDIR=`echo $ZSDIR | sed 's#/##g'`

cp LICENCE.txt $ZSDIR

rm $ZSDIR/img/t/tel-*
rm $ZSDIR/w-*.css
rm $ZSDIR/ww-*.css
rm $ZSDIR/fb-*.css
rm $ZSDIR/fba-*.css
rm $ZSDIR/img/e/exkurze*
rm $ZSDIR/img/f/fire-?.jpg
rm $ZSDIR/img/t/tenisak.jpg
rm $ZSDIR/img/s/sity.jpg
rm $ZSDIR/img/g/gumovy.jpg
rm $ZSDIR/img/s/stage.jpg
rm $ZSDIR/img/t/trany.jpg
rm $ZSDIR/img/b/balonky.jpg
rm $ZSDIR/img/h/hakysak.jpg
rm $ZSDIR/img/b/baseball.jpg
rm $ZSDIR/img/p/pomeranc.jpg
rm $ZSDIR/img/v/velky-mic.jpg
rm $ZSDIR/img/u/uchyt.jpg
rm $ZSDIR/img/c/chuda.jpg
rm $ZSDIR/img/j/jtv-*
rm $ZSDIR/img/b/browser*
rm $ZSDIR/img/b/budik.jpg
rm $ZSDIR/img/d/diabolo-sipek.s.jpg
rm $ZSDIR/img/d/downloada.png
rm $ZSDIR/img/h/horoskop.png
rm $ZSDIR/img/j/juggling.tv.png
rm $ZSDIR/img/m/mobil*
rm $ZSDIR/img/o/odkazy-*
rm $ZSDIR/img/s/snehulacek.png
rm $ZSDIR/img/s/snehulak.png
rm $ZSDIR/img/z/zvonya.jpg
rm $ZSDIR/img/v/vanoce.png
rm $ZSDIR/img/v/vanocni-kometa.s.jpg
rm $ZSDIR/img/p/pf-*
rm $ZSDIR/img/p/pek.jpg
rm $ZSDIR/odkazy.html
rm -rf $ZSDIR/novinky*
rm -rf $ZSDIR/ostatni
rm -rf $ZSDIR/*.odt
rm -rf $ZSDIR/img/q
rm -rf $ZSDIR/navody
rm -rf $ZSDIR/tip
rm $ZSDIR/pf-*
rm $ZSDIR/vanoce-*
rm $ZSDIR/changelog-*

find $ZSDIR/img/ -name "*.jpg" -size +50k -exec rm \{\} \;
find $ZSDIR/ -name "*.rss" -exec rm \{\} \;
find $ZSDIR/ -name "*.xml" -exec rm \{\} \;
