{literal}
<script type="text/javascript">
//<![CDATA[
function initialize() {
{/literal}
	var myLatlng = new google.maps.LatLng({$poloha.lat},{$poloha.lng});
{literal}
	var myOptions = {
{/literal}
		zoom: {$poloha.zoom},
{literal}
		center: myLatlng,
		mapTypeId: google.maps.MapTypeId.ROADMAP,
		mapTypeControl: false
	}
	var map = new google.maps.Map(document.getElementById("map_canvas"), myOptions);

	var ctaLayer = new google.maps.KmlLayer('http://zonglovani.info/mapa/mapa-zongleri.kml',{preserveViewport:true});
	ctaLayer.setMap(map);

	google.maps.event.addListener(ctaLayer, 'click', function(kmlEvent) {
		kmlEvent.featureData.info_window_html = kmlEvent.featureData.info_window_html.replace('_blank','_self');
		kmlEvent.featureData.description = kmlEvent.featureData.description.replace('_blank','_self');
	});

}
function loadScript() {
	var script = document.createElement("script");
	script.type = "text/javascript";
	script.src = "http://maps.google.com/maps/api/js?sensor=false&callback=initialize";
	document.body.appendChild(script);
}
window.onload = loadScript;
//]]>
</script> 
{/literal}

<div class="kontejner">
<div id="map_canvas"></div><div id="legenda">
<h3>Žonglérská mapa</h3>
<p>
Mapa s vyznačením měst kde jsou žongléři.
</p>
<p>
Přidat se můžeš tak, že si <a href="/lide/pravidla.php" class="add">založíš účet</a> v žonglérově slabikáři.
</p>
</div>
<div class="clear">&nbsp;</div>
</div>

<div class="oblasti">
<h3>Oblasti na mapě</h3>

<table>
<tr>
<th>{if isset($cr)}<h4>Česká republika</h4>{else}<a href="/mapa/cr.html" title="Žonglérská mapa česka"><h4>Česká republika</h4></a>{/if}</th>
<th>{if isset($sk)}<h4>Slovenská republika</h4>{else}<a href="/mapa/sk.html" title="Žonglérská mapa slovenska"><h4>Slovenská republika</h4></a>{/if}</th>
<td rowspan="2">
<script type="text/javascript">//<![CDATA[
		document.write('<iframe src="http://www.facebook.com/plugins/likebox.php?href=http%3A%2F%2Fwww.facebook.com%2Fzongleruv.slabikar&amp;width=300&amp;colorscheme=light&amp;connections=6&amp;stream=false&amp;header=false&amp;height=250" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:300; height:250px;" allowTransparency="true"></iframe>');
//]]></script>
</td>
</tr>
<tr>
<td>
{if $k_cz}
<ul>
{foreach from=$k_cz item=kr}
<li>{if $kr.selected}<strong>{else}<a href="/mapa/kraj/{$kr.id|escape}/">{/if}{$kr.nazev|escape}{if $kr.selected}</strong>{else}</a>{/if}</li>
{/foreach}
</ul>
{/if}
</td>
<td>
{if $k_sk}
<ul>
{foreach from=$k_sk item=kr}
<li>{if $kr.selected}<strong>{else}<a href="/mapa/kraj/{$kr.id|escape}/">{/if}{$kr.nazev|escape}{if $kr.selected}</strong>{else}</a>{/if}</li>
{/foreach}
</ul>
{/if}
</td>
</tr>
</table>
</div>
