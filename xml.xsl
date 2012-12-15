<?xml version="1.0" encoding="UTF-8"?>
<xsl:stylesheet xmlns:xsl="http://www.w3.org/1999/XSL/Transform" xmlns:dc="http://purl.org/dc/elements/1.1/" version="1.0">
  <xsl:output method="html"/>
  <xsl:template match="/rss/channel">
    <xsl:variable name="description" select="description"/>
<html>
	<head>
		<title><xsl:value-of select="title" disable-output-escaping="no"/></title>			
    <link rel="alternate" type="application/rss+xml" title="{title}" href="{link}" />
		<style type="text/css">
			body{font-family:sans-serif;font-size:1.2em;line-height:1.7em;color:#000;background:#fff;}
			.indent{margin-left: 1.25em; }
			.heading{font-weight:bold;padding-top:0.25em;margin-top:2em;border-top:solid 3px #ccccee;}
			h1,h2,h3,h4,h5,h6{line-height:1em;}
		</style>
	</head>
	<body onload="decode_xml_doey_fix();">
    <div id="doey_test" style="display: none"><xsl:text disable-output-escaping="yes">&amp;amp;</xsl:text></div>
    <p class="heading">RSS kanál</p>
    <p class="indent">
      Název: <strong name="doey_decode"><xsl:value-of select="title" disable-output-escaping="no"/></strong><br />
      Adresa: <a href="{link}"><xsl:value-of select="link"/></a>
    </p>
	  <p class="heading">Popis</p>
	  <p class="indent" name="doey_decode"><xsl:value-of select="description" disable-output-escaping="yes"/></p>
    <p class="heading">Články</p>
    <xsl:choose>
      <xsl:when test="item"><xsl:apply-templates select="item"/></xsl:when>
      <xsl:otherwise><div class="indent">RSS zatím nic neobsahuje.</div></xsl:otherwise>
    </xsl:choose>
	</body>
</html>
  </xsl:template>
  <xsl:template match="item">
    <div class="indent" style="margin-bottom: 2em;">
      <p>
        <table cellpadding="0" cellspacing="0" border="0">
          <tr>
            <td><strong>Titulek: </strong></td>
            <td width="10px"></td>
            <td><a href="{link}" name="doey_decode"><xsl:value-of select="title" disable-output-escaping="no"/></a></td>
          </tr>
          <tr>
            <td><strong>Datum: </strong></td>
            <td width="10px"></td>
            <td><xsl:value-of select="pubDate"/></td>
          </tr>
        </table>
      </p>
      <div class="indent" name="doey_decode"><xsl:value-of select="description" disable-output-escaping="yes"/></div>
    </div>
  </xsl:template>
  <xsl:template match="category">
		<xsl:value-of select="."/> |  
  </xsl:template>
</xsl:stylesheet>
