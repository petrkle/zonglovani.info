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

	var ctaLayer = new google.maps.KmlLayer('https://zonglovani.info/mapa/mapa-zongleri.kml',{preserveViewport:true,suppressInfoWindows:true});
	ctaLayer.setMap(map);

	infoWindow = new google.maps.InfoWindow();
	google.maps.event.addListener(ctaLayer, 'click', function(kmlMouseEvent) {
		var name = kmlMouseEvent.featureData.name;
        var descr = kmlMouseEvent.featureData.description.replace(/ target="_blank"/ig, '');
        var dom = '<div>' +
            '<h3>' +
            name +
            '</h3>' +
            '<div>' +
            descr +
            '</div>' +
            '</div>';
        infoWindow.setContent(dom);
        infoWindow.setPosition(kmlMouseEvent.latLng);
        infoWindow.open(map);;
	});

}
function loadScript() {
	var script = document.createElement("script");
	script.type = "text/javascript";
	script.src = "//maps.google.com/maps/api/js?sensor=false&callback=initialize";
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
Mapa s vyznačením měst, kde jsou žongléři.
</p>
<p>
Přidat se můžeš tak, že si <a href="/lide/novy-ucet.php" class="add">založíš účet</a> v žonglérově slabikáři.
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
&nbsp;
</td>
</tr>
<tr>
<td>
{if isset($k_cz)}
<ul>
{foreach from=$k_cz item=kr}
<li>{if isset($kr.selected)}<strong>{else}<a href="/mapa/kraj/{$kr.id|escape}/">{/if}{$kr.nazev|escape}{if isset($kr.selected)}</strong>{else}</a>{/if}</li>
{/foreach}
</ul>
{/if}
</td>
<td>
{if isset($k_sk)}
<ul>
{foreach from=$k_sk item=kr}
<li>{if isset($kr.selected)}<strong>{else}<a href="/mapa/kraj/{$kr.id|escape}/">{/if}{$kr.nazev|escape}{if isset($kr.selected)}</strong>{else}</a>{/if}</li>
{/foreach}
</ul>
{/if}
</td>
</tr>
</table>
</div>
