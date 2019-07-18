#!/bin/bash
ZSDIR="zongleruv-slabikar/"
DATUM=`date "+%-d. %-m. %Y %k:%M:%S"`
DATUM_S=`date "+%-d.\&nbsp;%-m.\&nbsp;%Y"`
CSS_CHKSUM=`grep CSS_CHKSUM ../../init.php | cut -d, -f2 | sed "s/[^0-9]//g"`

find $ZSDIR -name "*.html.tmp.html" -delete

for foo in `find $ZSDIR -name '*.html'`; 

do
	LEVEL=`echo $foo | sed "s/[^\/]*//g;s/\//..\//g;s/^.//;"`
	cp -f $foo $foo.bat
	cat $foo.bat |\
	sed 's/\.html\.tmp\.html/.html/gi' |\
	sed s#'. <a href=".*mapa-stranek.html" accesskey="." title="Mapa stránek zonglovani.info">Mapa stránek</a> '#''#i |\
	sed s#'<a href=".*index.html" title="Žonglérův slabikář - Úvodní stránka">Úvodní stránka</a> .'#''#i |\
	sed s#'rel="stylesheet" type="text/css" href="/'#"rel=\"stylesheet\" type=\"text/css\" href=\"$LEVEL"#gi |\
	sed /'<!-- start -->'/,/'<!-- stop -->'/d |\
	sed /'.*stylesheet" media="print" type="text\/css" href=".*zt-.*.css.*'/d |\
	sed "/.*stylesheet\" media=\"screen and (min-width: .*px)\" type=\"text\/css\" href=\".*z-$CSS_CHKSUM.css.*"/d |\
	sed /'.*<link rel="alternate".*'/d |\
	sed /'.*<link rel="search".*'/d |\
	sed /'.*<meta name="msapplication.*'/d |\
	sed s/'.*meta name="robots".*'/'<meta name="robots" content="noindex,nofollow" \/>'/ |\
	sed 's/media="only screen and (-webkit-min-device-pixel-ratio: 2)"/media="screen"/' |\
	sed s/'zongl\.info'/'zonglovani.info'/ \
 	> $foo
	rm -f $foo.bat
done

ZSDIR=`echo $ZSDIR | sed 's#/##g'`

sed -i /'<h3>Další informace'/,/'<!-- MOB -->'/d $ZSDIR/index.html
sed -i "s/<li><h4>Úvodní stránka<\/h4><\/li>//"  $ZSDIR/index.html
sed -i "s/<strong>Úvodní stránka<\/strong> . //"  $ZSDIR/index.html

rm $ZSDIR/mapa-stranek.html
rm -rf $ZSDIR/navody
rm $ZSDIR/r-*.css
rm $ZSDIR/z-*.css
rm $ZSDIR/zt-*.css
rm $ZSDIR/img/e/exkurze*
rm $ZSDIR/img/j/jtv-*
rm $ZSDIR/img/b/browser*
rm $ZSDIR/img/b/budik.jpg
rm $ZSDIR/img/d/downloada.png
rm $ZSDIR/img/k/kompas.png
rm $ZSDIR/img/j/juggling.tv.png
rm $ZSDIR/img/m/mobil*
rm $ZSDIR/img/o/odkazy-*
rm -rf $ZSDIR/img/q
rm -rf $ZSDIR/novinky*
rm -rf $ZSDIR/ostatni
rm -rf $ZSDIR/*.odt
find $ZSDIR/ -name "*.rss" -exec rm \{\} \;
find $ZSDIR/ -name "*.xml" -exec rm \{\} \;
