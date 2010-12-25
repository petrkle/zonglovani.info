<?xml version="1.0" encoding="UTF-8"?> 
<xsl:stylesheet version="2.0" 
    xmlns:html="http://www.w3.org/TR/REC-html40"
    xmlns:sitemap="http://www.sitemaps.org/schemas/sitemap/0.9"
    xmlns:video="http://www.google.com/schemas/sitemap-video/1.1"
    xmlns:xsl="http://www.w3.org/1999/XSL/Transform"> 
  <xsl:output method="html" version="1.0" encoding="UTF-8" indent="yes"/> 
  <xsl:template match="/"> 
    <html xmlns="http://www.w3.org/1999/xhtml"> 
    <head> 
    <title>Žonglérská videa</title> 
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" /> 
		<style type="text/css">body{font-family:sans-serif;font-size:1em;line-height:1.5em;color:#000;background:#fff;margin:0;padding:0;}.labnol{margin:10px;float:left;border-top-width:1px;border-right-width:2px;border-bottom-width:2px;border-left-width:1px;border-top-style:solid;border-right-style:solid;border-bottom-style:solid;border-left-style:solid;border-top-color:#ccc;border-right-color:#ccc;border-bottom-color:#ccc;border-left-color:#ccc;width:350px;height:110px;overflow:hidden;padding-top:5px;padding-right:5px;padding-bottom:10px;padding-left:5px;background:#eed;}.labnol h1{font-size:1.2em;margin:0;padding:0 0 5px}.labnol p{color:#000;margin:0px;padding-top:10px}.labnol img{float:right;padding-top:0;padding-bottom:5px;padding-left:10px;border:none}/style> 
    </head> 
    <body> 
    <xsl:for-each select="sitemap:urlset/sitemap:url"> 
      <div class="labnol"> 
        <xsl:variable name="u"> <xsl:value-of select="sitemap:loc"/> </xsl:variable> 
        <h1><a href="{$u}"><xsl:value-of select="video:video/video:title"/></a> </h1> 
        <xsl:variable name="t"> <xsl:value-of select="video:video/video:thumbnail_loc"/> </xsl:variable> 
        <a href="{$u}"><img src="{$t}" width="120" height="80" /></a> 
        <p> 
          <xsl:variable name="d"><xsl:value-of select="video:video/video:description"/> </xsl:variable> 
          <xsl:value-of select="$d"/> 
        </p> 
      </div> 
    </xsl:for-each> 
    </body> 
    </html> 
  </xsl:template> 
</xsl:stylesheet>
