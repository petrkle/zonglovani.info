{literal}
<script type="text/javascript">
function initialize() {
	var myLatlng = new google.maps.LatLng(49.453567975668975,16.816765);
	var myOptions = {
		zoom: 6,
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
