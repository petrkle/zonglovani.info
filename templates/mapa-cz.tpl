<?xml version="1.0" encoding="UTF-8"?>
<kml xmlns="http://www.opengis.net/kml/2.2">
<Document>
  <name>Žognlování v ČR</name>
  <description><![CDATA[Žonglérská mapa České republiky]]></description>

{foreach from=$mista item=misto key=id}
{if is_array($misto.lide)}
<Placemark>
<name>{$misto.nazev|escape}</name>
<description><![CDATA[
Žongléři {$misto.odkud|escape}
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
