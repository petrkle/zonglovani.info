#!/bin/bash
ZSDIR="zongleruv-slabikar/"
DATUM=`date "+%-d. %-m. %Y %k:%M:%S"`
DATUM_S=`date "+%-d.\&nbsp;%-m.\&nbsp;%Y"`

for foo in `find $ZSDIR -name '*.html'`; 

do
	LEVEL=`echo $foo | sed "s/[^\/]*//g;s/\//..\//g;s/^.//;"`
	cp -f $foo $foo.bat
	cat $foo.bat |\
	sed s/' onclick="_gaq[^"]*);"'/''/gi |\
	sed s#'. <a href=".*mapa-stranek.html" accesskey="." title="Mapa stránek zonglovani.info">Mapa stránek</a> '#''#i |\
	sed s#'<a href=".*index.html" title="Žonglérův slabikář - Úvodní stránka">Úvodní stránka</a> .'#''#i |\
	sed s#'rel="stylesheet" type="text/css" href="/'#"rel=\"stylesheet\" type=\"text/css\" href=\"$LEVEL"#gi |\
	sed /'<!-- start -->'/,/'<!-- stop -->'/d |\
	sed /'<!--\[if lt IE 9\]>'/,/'<!\[endif\]-->'/d |\
	sed /'.*stylesheet" media="print" type="text\/css" href=".*zt.css.*'/d |\
	sed /'.*stylesheet" media="screen and (min-width: 610px)" type="text\/css" href=".*z.css.*'/d |\
	sed /'.*<link rel="alternate".*'/d |\
	sed /'.*<link rel="search".*'/d |\
	sed /'.*<meta name="msapplication.*'/d |\
	sed s/'.*meta name="robots".*'/'<meta name="robots" content="noindex,nofollow" \/>'/ |\
	sed s/'zongl\.info'/'zonglovani.info'/ |\
	sed s/"<body>"/"<body>\n<!--\nadmin(zavináč)zonglovani(tečka)info\n$DATUM\n$MACHTYPE\n-->"/ |\
	sed s/'<div id="hlavicka">'/'<div id="hlavicka"><\/div>'/ \
 	> $foo
	rm -f $foo.bat
done

ZSDIR=`echo $ZSDIR | sed 's#/##g'`

sed -i /'<h3>Další informace'/,/'<!-- MOB -->'/d $ZSDIR/index.html
sed -i "s/<li><h4>Úvodní stránka<\/h4><\/li>//"  $ZSDIR/index.html
sed -i "s/<strong>Úvodní stránka<\/strong> . //"  $ZSDIR/index.html

rm $ZSDIR/mapa-stranek.html
rm $ZSDIR/img/t/tel-*
rm $ZSDIR/vanoce*
rm $ZSDIR/pf-*
rm $ZSDIR/changelog*
rm $ZSDIR/w-*.css
rm $ZSDIR/ww-*.css
rm $ZSDIR/fb.css
rm $ZSDIR/fba.css
rm $ZSDIR/img/e/exkurze*
rm -rf $ZSDIR/novinky*
rm -rf $ZSDIR/ostatni
rm -rf $ZSDIR/*.odt
find $ZSDIR/img/ -name "*.jpg" -size +50k -exec rm \{\} \;
find $ZSDIR/ -name "*.rss" -exec rm \{\} \;
find $ZSDIR/ -name "*.xml" -exec rm \{\} \;

cp config.xml $ZSDIR
cp ../LICENCE.txt $ZSDIR
