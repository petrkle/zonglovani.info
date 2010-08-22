<?xml version="1.0" encoding="UTF-8"?>
<kml xmlns="http://www.opengis.net/kml/2.2">
<Document>
  <name>Žognlování v ČR</name>
  <description><![CDATA[Žonglérská mapa České republiky]]></description>

<Style id="spendlik">
    <BalloonStyle>
      <!-- a background color for the balloon -->
      <bgColor>ff336699</bgColor>
      <!-- styling of the balloon text -->
      <text><![CDATA[
			<h3 class="baloontitle">$[name]</h3>
      $[description]
      ]]></text>
    </BalloonStyle>
      <Icon>
         <color>ffff0000</color>
      </Icon>
  </Style>
<Style id="red">
  <IconStyle>
    <Icon>
      <href>http://www.google.com/intl/en_us/mapfiles/ms/icons/red-dot.png</href>
    </Icon>
  </IconStyle>
</Style>

{foreach from=$mista item=misto key=id}
{if is_array($misto.lide)}
<Placemark>
<styleUrl>#spendlik</styleUrl>
<styleUrl>#red</styleUrl>
<name>{$misto.nazev|escape}</name>
<description><![CDATA[
<p>
Žongléři {$misto.odkud|escape}.
</p>
<ul>
{foreach from=$misto.lide item=clovek name=vypislidi}
{if $smarty.foreach.vypislidi.index<=8}
<li><a href="http://{$smarty.server.SERVER_NAME}{$smarty.const.LIDE_URL}{$clovek.login|escape}.html" title="Detail uživatele {$clovek.jmeno|escape}" class="mlink">{$clovek.jmeno|escape}</a></li>
{/if}
{if $smarty.foreach.vypislidi.index==9}
<li><a href="http://{$smarty.server.SERVER_NAME}{$smarty.const.LIDE_URL}misto/{$id}.html" title="Další uživatelé." class="mlink">Další ...</a></li>
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
