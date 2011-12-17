#!/bin/bash

OUTDIR=zs
INDIR=zongleruv-slabikar
export IFS='
'
rm -rf $OUTDIR
[ -d $INDIR ] || ./stahni.sh
[ -d $OUTDIR ] || cp -r $INDIR $OUTDIR

cp obalka.png $OUTDIR
cp zaver.html $INDIR
cat aktualizace.html | sed "s/RELEASE_VERSION/$1/;s/RELEASE_DATE/`date '+%d. %m. %Y' | sed "s/^0//;s/\. 0/. /"`/" > $INDIR/aktualizace.html

echo '
<html><head>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	</head>
	<body>' > $OUTDIR/obsah.html

echo '<?xml version="1.0" encoding="UTF-8"?>
<!DOCTYPE ncx PUBLIC "-//NISO//DTD ncx 2005-1//EN"
	"http://www.daisy.org/z3986/2005/ncx-2005-1.dtd">
<ncx xmlns="http://www.daisy.org/z3986/2005/ncx/" version="2005-1" xml:lang="en-US">
<head>
<meta name="dtb:uid" content="zonglovani"/>
<meta name="dtb:depth" content="1"/>
<meta name="dtb:totalPageCount" content="0"/>
<meta name="dtb:maxPageNumber" content="0"/>
</head>
<docTitle><text>Žonglérův slabikář</text></docTitle>
<docAuthor><text>zonglovani.info</text></docAuthor>
  <navMap>
    <navPoint class="toc" id="toc" playOrder="1">
      <navLabel>
        <text>Obsah</text>
      </navLabel>
      <content src="obsah.html"/>
    </navPoint>
	' > $OUTDIR/slabikar.ncx

POCET=`cat kniha.url | wc -l`
PREV=""
POS=1
PO=2
for foo in `cat kniha.url`
do
	PART=`echo $foo | cut -d: -f1`
	FILE=`echo $foo | cut -d: -f2`
	H1="`cat $INDIR/$FILE | grep "<h1>" | sed "s/<h1>\(.*\)<\/h1>/\1/"`"
	if [ "$PART" != "$PREV" ]
	then
		# zmena kapitoly
		[ $POS -ne 1 ] && echo "</ul>" >> $OUTDIR/obsah.html # konec kapitoly
		[ $POS -ne 1 ] && echo "</navPoint>" >> $OUTDIR/slabikar.ncx # konec kapitoly

		echo "<h2>$PART</h2>" >> $OUTDIR/obsah.html
    echo "<navPoint class=\"chapter\" id=\"chapter$PO\" playOrder=\"$PO\"><content src=\"$FILE\" /><navLabel><text>$PART</text></navLabel>" >> $OUTDIR/slabikar.ncx

		[ $POS -ne $POCET ] && echo "<ul>" >> $OUTDIR/obsah.html #zacatek dalsi kapitoly
		echo "<li><a href="$FILE">$H1</a></li>" >> $OUTDIR/obsah.html # prvni trik v kapitole

		echo "
		<navPoint class=\"section\" id=\"navpoint$PO\" playOrder=\"$PO\">
		<navLabel><text>$H1</text></navLabel>
		<content src=\"$FILE\"/>
		</navPoint>
	" >> $OUTDIR/slabikar.ncx

	else
		# polozky v kapitole
		echo "<li><a href="$FILE">$H1</a></li>" >> $OUTDIR/obsah.html

	echo "
	<navPoint class=\"section\" id=\"navpoint$PO\" playOrder=\"$PO\">
	<navLabel><text>$H1</text></navLabel>
	<content src=\"$FILE\"/>
	</navPoint>
" >> $OUTDIR/slabikar.ncx

	fi


	cat $INDIR/$FILE | \
	sed /'<!-- start -->'/,/'<!-- stop -->'/d |\
	sed /'<\?xml.*>'/,/'<div id="obsah">'/d |\
	sed /'<p class="drobky">'/,/'<\/p>'/d |\
	sed /'<div class="kamdal">'/,/'<\/html>'/d |\
	sed /'<!-- obsah konec -->'/,/'<\/html>'/d |\
	sed s/'<img \(.*\)>'/'<img \1><\/td><td>'/ |\
	sed s/'<\/p>'/'<\/td><\/tr><\/table>'/ |\
	sed s/'<p>'/'<table><tr><td>'/ |\
	./reformat.php \
	> $OUTDIR/$FILE.obsah
	echo "<html><head>
	<meta http-equiv=\"content-type\" content=\"text/html; charset=utf-8\" />
	<title>$H1</title>
	</head>
	<body>" > $OUTDIR/$FILE.pre
	[ "$PART" != "$PREV" ] && echo "<h1>$PART</h1>" >> $OUTDIR/$FILE.pre
	cat $OUTDIR/$FILE.pre $OUTDIR/$FILE.obsah > $OUTDIR/$FILE
	echo "<mbp:pagebreak/></body></html>" >> $OUTDIR/$FILE
	rm $OUTDIR/$FILE.obsah $OUTDIR/$FILE.pre
	PREV="$PART"
	let POS++
	let PO++
done

echo '</ul>' >> $OUTDIR/obsah.html

echo '
	</navPoint>
	<!--<navPoint class="appendix" id="appendix" playOrder="$PO">
		<navLabel>
			<text>Závěr</text>
		</navLabel>
		<content src="zaver.html"/>
	</navPoint>-->
  </navMap>
</ncx>
' >> $OUTDIR/slabikar.ncx

echo '<?xml version="1.0" encoding="utf-8"?>
<package xmlns="http://www.idpf.org/2007/opf" version="2.0" unique-identifier="BookId">
<metadata xmlns:dc="http://purl.org/dc/elements/1.1/" xmlns:opf="http://www.idpf.org/2007/opf">
    <dc:title>Žonglérův slabikář</dc:title>
    <dc:language>cs</dc:language>
    <meta name="cover" content="obalka" />
    <dc:creator>zonglovani.info</dc:creator>
    <dc:publisher>zonglovani.info</dc:publisher>
    <dc:subject>Žonglérův slabikář</dc:subject>
    <dc:date>'`date '+%Y-%m-%d'`'</dc:date>
	  <dc:description>Obrázková učebnice žonglování s míčky, kruhy a kužely.</dc:description>
		<x-metadata>
			<DatabaseName>ZongleruvSlabikar</DatabaseName>
		</x-metadata>
</metadata>
<manifest>' > $OUTDIR/slabikar.opf
echo '<item id="obsah" media-type="application/xhtml+xml" href="obsah.html"></item>' >> $OUTDIR/slabikar.opf

NUM=0
for foo in `cat kniha.url`
do
	PART=`echo $foo | cut -d: -f1`
	FILE=`echo $foo | cut -d: -f2`
	echo "<item id=\"item$NUM\" media-type=\"application/xhtml+xml\" href=\"$FILE\"></item>" >> $OUTDIR/slabikar.opf
	let NUM++
done
   
echo '
	<item id="zs_obsah" media-type="application/x-dtbncx+xml" href="slabikar.ncx"/>
  <item id="obalka" media-type="image/jpeg" href="obalka.png"/>
</manifest>
<spine toc="zs_obsah">
	' >> $OUTDIR/slabikar.opf

echo '<itemref idref="obsah" />' >> $OUTDIR/slabikar.opf
NUM=0
for foo in `cat kniha.url`
do
	echo "<itemref idref=\"item$NUM\" />" >> $OUTDIR/slabikar.opf
	let NUM++
done

echo '
</spine>
<guide>
	<reference type="toc" title="Obsah" href="obsah.html"></reference>
	<reference type="text" title="Jak začít žonglovat s míčky" href="micky/jak-zacit.html"></reference>
</guide>
</package>' >> $OUTDIR/slabikar.opf
