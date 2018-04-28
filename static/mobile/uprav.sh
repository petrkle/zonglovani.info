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
	sed /'<!--\[if lt IE 9\]>'/,/'<!\[endif\]-->'/d |\
	sed /'.*stylesheet" media="print" type="text\/css" href=".*zt-.*.css.*'/d |\
	sed "/.*stylesheet\" media=\"screen and (min-width: 610px)\" type=\"text\/css\" href=\".*z-$CSS_CHKSUM.css.*"/d |\
	sed /'.*<link rel="alternate".*'/d |\
	sed /'.*<link rel="search".*'/d |\
	sed /'.*<meta name="msapplication.*'/d |\
	sed s/'.*meta name="robots".*'/'<meta name="robots" content="noindex,nofollow" \/>'/ |\
	sed 's/media="only screen and (-webkit-min-device-pixel-ratio: 2)"/media="screen"/' |\
	sed 's/img src="\([^"]*\)" width="\([^"]*\)" height="[^"]*"/img src="\1" style="width:98%;max-width:\2px;"/g' |\
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
rm $ZSDIR/img/d/downloada.png
rm $ZSDIR/img/h/horoskop.png
rm $ZSDIR/img/k/kompas.png
rm $ZSDIR/img/j/juggling.tv.png
rm $ZSDIR/img/m/mobil*
rm $ZSDIR/img/o/odkazy-*
rm -rf $ZSDIR/img/q
rm $ZSDIR/img/z/zvonya.jpg
rm -rf $ZSDIR/novinky*
rm -rf $ZSDIR/ostatni
rm -rf $ZSDIR/*.odt
find $ZSDIR/img/ -name "*.jpg" -size +65k -exec rm \{\} \;
find $ZSDIR/ -name "*.rss" -exec rm \{\} \;
find $ZSDIR/ -name "*.xml" -exec rm \{\} \;
