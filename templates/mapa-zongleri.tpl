<?xml version="1.0" encoding="UTF-8"?>
<kml xmlns="http://www.opengis.net/kml/2.2"  xmlns:atom="http://www.w3.org/2005/Atom">
<Document>
  <name>Žongléři</name>
  <description><![CDATA[Žonglérská mapa České a Slovenské republiky]]></description>
    <atom:author>      
      <atom:name>Žongléři</atom:name>    
    </atom:author>    
    <atom:link href="http://zonglovani.info" />

<Style id="spendlik">
    <BalloonStyle>
      <!-- a background color for the balloon -->
      <bgColor>ff336699</bgColor>
      <!-- styling of the balloon text -->
      <text><![CDATA[
			<h3>$[name]</h3>
      $[description]
      ]]></text>
    </BalloonStyle>
		<IconStyle>
			<Icon>
				<href>http://www.google.com/intl/en_us/mapfiles/ms/icons/red-dot.png</href>
			</Icon>
		</IconStyle>
  </Style>

{foreach from=$mista item=misto key=id}
{if is_array($misto.lide)}
<Placemark id="{$id|escape}">
<styleUrl>#spendlik</styleUrl>
<name>{$misto.nazev|escape}</name>
<description><![CDATA[
<p>
Žongléři {$misto.odkud|escape}.
</p>
<ul>
{foreach from=$misto.lide item=clovek name=vypislidi}
{if $smarty.foreach.vypislidi.index<=4}
<li><a href="http://{$smarty.server.SERVER_NAME}{$smarty.const.LIDE_URL}{$clovek.login|escape}.html" title="Detail uživatele {$clovek.jmeno|escape}">{$clovek.jmeno|escape}</a></li>
{/if}
{if $smarty.foreach.vypislidi.index==5}
<li><a href="http://{$smarty.server.SERVER_NAME}{$smarty.const.LIDE_URL}misto/{$id}.html" title="Další uživatelé.">Další ...</a></li>
{/if}
{/foreach}
</ul>
]]></description>
<Point>
<coordinates>{$misto.lng|escape},{$misto.lat|escape},0</coordinates>
</Point>
</Placemark>
{/if}
{/foreach}

</Document>
</kml>
