<xsl:stylesheet version="2.0" xmlns:html="http://www.w3.org/TR/REC-html40"
xmlns:sitemap="http://www.sitemaps.org/schemas/sitemap/0.9"
xmlns:xsl="http://www.w3.org/1999/XSL/Transform">
<xsl:output method="html" version="1.0" encoding="UTF-8" indent="yes"/>
<xsl:template match="/">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="cs" lang="cs">
<head>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<title>Žonglérův slabikář - mapa stránek</title>
<style type="text/css">
	tr.suda{background-color: #ff9;}
	td, th{padding:2px 10px;}
</style>
</head> 
<body>
	<h1>Žonglérův slabikář - mapa stránek</h1>

            <table>
                <tr>
                    <th>Adresa</th>
                    <th>Důležitost</th>
		    <th>Frekvence změn</th>
		</tr> 
	     <xsl:for-each select="sitemap:urlset/sitemap:url"> 

				<tr>
						<xsl:if test="position() mod 2 != 1">
								<xsl:attribute name="class">suda</xsl:attribute>
						</xsl:if> 

						<td>
								<xsl:variable name="itemURL">
								<xsl:value-of select="sitemap:loc"/>
								</xsl:variable>
								<a href="{$itemURL}"><xsl:value-of select="sitemap:loc"/></a>
						</td> 

						<td>
								<xsl:value-of select="concat(sitemap:priority*100,'%')"/>
						</td> 

						<td>
								<xsl:value-of select="sitemap:changefreq"/>
						</td> 

				</tr> 

        </xsl:for-each>
        </table>
</body>
</html>
</xsl:template>
</xsl:stylesheet>
