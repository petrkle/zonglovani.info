#!/bin/bash

OUTDIR=zs
INDIR=zongleruv-slabikar
export IFS='
'

cp obalka.png $OUTDIR
cp zaver.html $INDIR
cat aktualizace.html | sed "s/RELEASE_VERSION/$1/;s/RELEASE_DATE/`date '+%d. %m. %Y' | sed "s/^0//;s/\. 0/. /"`/" > $INDIR/aktualizace.html

echo '<?xml version="1.0" encoding="utf-8"?>

<fo:root xmlns:fo="http://www.w3.org/1999/XSL/Format">

    <fo:layout-master-set>
        <!-- layout for the first page -->
        <fo:simple-page-master master-name="first"
                      page-height="29.7cm"
                      page-width="21cm"
                      margin-top="1cm"
                      margin-bottom="2cm"
                      margin-left="2.5cm"
                      margin-right="2.5cm">
          <fo:region-body margin-top="3cm" margin-bottom="2cm"/>
          <fo:region-before extent="3cm"/>
          <fo:region-after extent="1.5cm"/>
        </fo:simple-page-master>
    
        <!-- layout for the other pages -->
        <fo:simple-page-master master-name="rest"
                      page-height="29.7cm"
                      page-width="21cm"
                      margin-top="1cm"
                      margin-bottom="2cm"
                      margin-left="2.5cm"
                      margin-right="2.5cm">
          <fo:region-body margin-top="1.5cm" margin-bottom="1.5cm"/>
          <fo:region-before extent="1.5cm"/>
          <fo:region-after extent="1.5cm"/>
        </fo:simple-page-master>
    
        <fo:page-sequence-master master-name="basicPSM" >
          <fo:repeatable-page-master-alternatives>
            <fo:conditional-page-master-reference master-reference="first"
              page-position="first" />
            <fo:conditional-page-master-reference master-reference="rest"
              page-position="rest" />
            <!-- recommended fallback procedure -->
            <fo:conditional-page-master-reference master-reference="rest" />
          </fo:repeatable-page-master-alternatives>
        </fo:page-sequence-master>
    </fo:layout-master-set>
    
<fo:declarations>
  <x:xmpmeta xmlns:x="adobe:ns:meta/">
    <rdf:RDF xmlns:rdf="http://www.w3.org/1999/02/22-rdf-syntax-ns#">
      <rdf:Description rdf:about="" xmlns:dc="http://purl.org/dc/elements/1.1/">
        <!-- Dublin Core properties go here -->
        <dc:title>Žonglérův slabikář</dc:title>
        <dc:creator>www.zonglovani.info</dc:creator>
        <dc:description>Obrázková učebnice žonglování s míčky, kruhy a kužely.</dc:description>
      </rdf:Description>
      <rdf:Description rdf:about="" xmlns:xmp="http://ns.adobe.com/xap/1.0/">
        <xmp:CreatorTool>www.zonglovani.info</xmp:CreatorTool>
      </rdf:Description>
    </rdf:RDF>
  </x:xmpmeta>
</fo:declarations>

<!-- actual layout -->
<fo:page-sequence master-reference="basicPSM">

<fo:static-content flow-name="xsl-region-before">
<fo:block text-align-last="justify" border-after-style="solid" border-after-width="0.1pt" padding-bottom="0.1cm">Žonglérův slabikář<fo:leader/>www.zonglovani.info</fo:block>
</fo:static-content>

<fo:static-content flow-name="xsl-region-after">
<fo:block text-align-last="justify" border-before-style="solid" border-before-width="0.1pt" padding-top="0.2cm">Žonglérův slabikář<fo:leader/><fo:page-number/><fo:leader/>www.zonglovani.info</fo:block>
</fo:static-content>

<fo:flow flow-name="xsl-region-body">

' >$OUTDIR/zs.fo

POCET=`cat kniha.url | wc -l`
PREV=""
POS=1
POS1=1
POS2=1
POS3=1
PO=2
for foo in `cat kniha.url`
do
	PART=`echo $foo | cut -d: -f1`
	FILE=`echo $foo | cut -d: -f2`
	H1="`cat $INDIR/$FILE | grep "<h1>" | sed "s/<h1>\(.*\)<\/h1>/\1/"`"

#	if [ "$PART" != "$PREV" ]
#	then
#		# zmena kapitoly
#		[ $POS -ne 1 ] && echo "</ul>" >> $OUTDIR/obsah.html # konec kapitoly
#		[ $POS -ne 1 ] && echo "</navPoint>" >> $OUTDIR/slabikar.ncx # konec kapitoly
#
#		echo "<h2>$PART</h2>" >> $OUTDIR/obsah.html
#    echo "<navPoint class=\"chapter\" id=\"chapter$PO\" playOrder=\"$PO\"><content src=\"$FILE\" /><navLabel><text>$PART</text></navLabel>" >> $OUTDIR/slabikar.ncx
#
#		[ $POS -ne $POCET ] && echo "<ul>" >> $OUTDIR/obsah.html #zacatek dalsi kapitoly
#		echo "<li><a href="$FILE">$H1</a></li>" >> $OUTDIR/obsah.html # prvni trik v kapitole
#
#		echo "
#		<navPoint class=\"section\" id=\"navpoint$PO\" playOrder=\"$PO\">
#		<navLabel><text>$H1</text></navLabel>
#		<content src=\"$FILE\"/>
#		</navPoint>
#	" >> $OUTDIR/slabikar.ncx
#
#	else
#		# polozky v kapitole
#		echo "<li><a href="$FILE">$H1</a></li>" >> $OUTDIR/obsah.html
#
#	echo "
#	<navPoint class=\"section\" id=\"navpoint$PO\" playOrder=\"$PO\">
#	<navLabel><text>$H1</text></navLabel>
#	<content src=\"$FILE\"/>
#	</navPoint>
#" >> $OUTDIR/slabikar.ncx
#
#	fi


	cat $INDIR/$FILE | \
	sed /'<!-- start -->'/,/'<!-- stop -->'/d |\
	sed /'<\?xml.*>'/,/'<div id="obsah">'/d |\
	sed /'<p class="drobky">'/,/'<\/p>'/d |\
	sed /'<div class="kamdal">'/,/'<\/html>'/d |\
	sed /'<!-- obsah konec -->'/,/'<\/html>'/d |\
	sed 's/<\/a>//g;s/<a href=[^>]*>//g;s/<a name=[^>]*>//g;s/\&nbsp;/ /g;s/<b>\([^<]*\)<\/b>/<fo:inline font-weight="bold">\1<\/fo:inline>/g;s/<strong>\([^<]*\)<\/strong>/<fo:inline font-weight="bold">\1<\/fo:inline>/g;s/ src="[^"]*img/ src="img/g' |\
	sed 's/<h1>\([^>]*\)<\/h1>/<fo:block font-size="18pt" font-family="serif" line-height="20pt" space-before.optimum="20pt" space-after.optimum="14pt">\1<\/fo:block>/' |\
	sed 's/<h2>\([^>]*\)<\/h2>/<fo:block font-size="16pt" font-family="serif" line-height="18pt" space-before.optimum="20pt" space-after.optimum="14pt">\1<\/fo:block>/' |\
	sed 's/<h3>\([^>]*\)<\/h3>/<fo:block font-size="14pt" font-family="serif" line-height="16pt" space-before.optimum="20pt" space-after.optimum="14pt">\1<\/fo:block>/' |\
	sed 's/<pre[^>]*>/<fo:block font-family="monospace" white-space-collapse="false" wrap-option="no-wrap">/g;s/<\/pre>/<\/fo:block>/g' |\
	sed 's/<img src="\([^"]*\)"[^>]*>/<fo:external-graphic src="\1" \/><\/fo:block><\/fo:table-cell><fo:table-cell><fo:block>/' |\
	sed 's/<\/p>/<\/fo:block><\/fo:table-cell><\/fo:table-row><\/fo:table-body><\/fo:table>/' |\
	sed 's/<p>/<fo:table table-layout="fixed" width="100%"><fo:table-body><fo:table-row><fo:table-cell><fo:block>/' |\
	./reformat.fop.php \
	>> $OUTDIR/zs.fo

	PREV="$PART"
	let POS++
	let POS1++
	let POS2++
	let POS3++
	let PO++
done


echo '
</fo:flow>
</fo:page-sequence>
</fo:root>
' >> $OUTDIR/zs.fo
