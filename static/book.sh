#!/bin/bash

export IFS='
'

echo '
<html><head>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	</head>
	<body>' > zs/obsah.html

POCET=`cat kniha.url | wc -l`
PREV=""
POS=1
for foo in `cat kniha.url`
do
	PART=`echo $foo | cut -d: -f1`
	FILE=`echo $foo | cut -d: -f2`
	H1="`cat zongleruv-slabikar/$FILE | grep "<h1>" | sed "s/<h1>\(.*\)<\/h1>/\1/"`"
	if [ "$PART" != "$PREV" ]
	then
		[ $POS -ne 1 ] && echo "</ul>" >> zs/obsah.html
		echo "<h2>$PART</h2>" >> zs/obsah.html
		[ $POS -ne $POCET ] && echo "<ul>" >> zs/obsah.html
		echo "<li><a href="$FILE">$H1</a></li>" >> zs/obsah.html
	else
		echo "<li><a href="$FILE">$H1</a></li>" >> zs/obsah.html
	fi

	cat zongleruv-slabikar/$FILE | \
	sed /'<!-- start -->'/,/'<!-- stop -->'/d |\
	sed /'<\?xml.*>'/,/'<div id="obsah">'/d |\
	sed /'<p class="drobky">'/,/'<\/p>'/d |\
	sed /'<div class="kamdal">'/,/'<\/html>'/d |\
	sed /'<!-- obsah konec -->'/,/'<\/html>'/d |\
	sed s/'<img \(.*\)>'/'<img \1><\/td><td>'/ |\
	sed s/'<\/p>'/'<\/td><\/tr><\/table>'/ |\
	sed s/'<p>'/'<table><tr><td>'/ |\
	./reformat.php \
	> zs/$FILE.obsah
	echo "<html><head>
	<meta http-equiv=\"content-type\" content=\"text/html; charset=utf-8\" />
	<title>$H1</title>
	</head>
	<body>" > zs/$FILE.pre
	[ "$PART" != "$PREV" ] && echo "<h1>$PART</h1>" >> zs/$FILE.pre
	cat zs/$FILE.pre zs/$FILE.obsah > zs/$FILE
	echo "<mbp:pagebreak/></body></html>" >> zs/$FILE
	rm zs/$FILE.obsah zs/$FILE.pre
	PREV="$PART"
	let POS++
done

echo '</ul>' >> zs/obsah.html

echo '<?xml version="1.0" encoding="utf-8"?>
<package xmlns="http://www.idpf.org/2007/opf" version="2.0" unique-identifier="BookId">
<metadata xmlns:dc="http://purl.org/dc/elements/1.1/" xmlns:opf="http://www.idpf.org/2007/opf">
    <dc:title>Žonglérův slabikář</dc:title>
    <dc:language>cs</dc:language>
    <meta name="cover" content="obalka" />
    <dc:creator>zonglovani.info</dc:creator>
    <dc:publisher>zonglovani.info</dc:publisher>
    <dc:subject>Žonglérův slabikář</dc:subject>
    <dc:date></dc:date>
  <dc:description>Obrázková učebnice žonglování s míčky, kruhy a kužely.</dc:description>
</metadata>
<manifest>' > zs/slabikar.opf
echo '<item id="obsah" media-type="application/xhtml+xml" href="obsah.html"></item>' >> zs/slabikar.opf

NUM=0
for foo in `cat kniha.url`
do
	PART=`echo $foo | cut -d: -f1`
	FILE=`echo $foo | cut -d: -f2`
	echo "<item id=\"item$NUM\" media-type=\"application/xhtml+xml\" href=\"$FILE\"></item>" >> zs/slabikar.opf
	let NUM++
done
   
echo '
  <!-- cover image [mandatory] -->
  <item id="obalka" media-type="image/jpeg" href="obalka.png"/>
</manifest>
<spine toc="My_Table_of_Contents">
  <!-- the spine defines the linear reading order of the book -->
	' >> zs/slabikar.opf

echo '<itemref idref="obsah" />' >> zs/slabikar.opf
NUM=0
for foo in `cat kniha.url`
do
	echo "<itemref idref=\"item$NUM\" />" >> zs/slabikar.opf
	let NUM++
done

echo '
</spine>
<guide>
	<reference type="toc" title="Obsah" href="obsah.html"></reference>
	<reference type="text" title="Jak začít žonglovat s míčky" href="micky/jak-zacit.html"></reference>
</guide>
</package>' >> zs/slabikar.opf
